<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Mail\InquirySubmittedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Convert services[] array into string if provided
        if ($request->has('services') && is_array($request->input('services'))) {
            $request->merge([
                'service_type' => implode(', ', $request->input('services'))
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service_type' => 'nullable|string|max:255',
            'budget_range' => 'nullable|string|max:255',
            'property_size_sqm' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'message' => 'required|string|min:5',
        ]);

        if ($request->filled('location')) {
            $validated['property_size_sqm'] = $request->input('location');
        }

        $validated['ip_address'] = $request->ip();

        $inquiry = Inquiry::create($validated);

        // Try sending email via SMTP
        try {
            Mail::to('phil.andreson@nexteck.uk')
                ->cc('emily@emilyroyce.com')
                ->send(new InquirySubmittedMail($inquiry));
        } catch (\Exception $e) {
            Log::error('SMTP Mail Dispatch Error: ' . $e->getMessage());
            // Proceed gracefully as inquiry is saved to DB
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your architectural inquiry has been sent to Emily Royce Architecture. We will contact you within 24 hours.',
            ]);
        }

        return redirect()->back()->with('success', 'Thank you! Your inquiry has been submitted successfully. We will get in touch with you shortly.');
    }
}
