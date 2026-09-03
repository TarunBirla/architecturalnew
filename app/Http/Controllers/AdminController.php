<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\FloorPlanService;
use App\Models\Inquiry;
use App\Models\SiteSetting;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Helper to process file upload or return URL string fallback
     */
    private function processUpload(Request $request, string $fileInputName, ?string $urlInputName = null, ?string $currentFallback = null): ?string
    {
        if ($request->hasFile($fileInputName)) {
            $file = $request->file($fileInputName);
            $filename = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            
            $uploadPath = public_path('uploads');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $file->move($uploadPath, $filename);
            return '/uploads/' . $filename;
        }

        if ($urlInputName && $request->filled($urlInputName)) {
            return $request->input($urlInputName);
        }

        return $currentFallback;
    }

    /**
     * Dashboard Overview
     */
    public function dashboard()
    {
        $projectCount = Project::count();
        $serviceCount = FloorPlanService::count();
        $inquiryCount = Inquiry::count();
        $galleryCount = Gallery::count();
        $categoryCount = Category::count();
        $pendingInquiries = Inquiry::where('status', 'pending')->count();
        $recentInquiries = Inquiry::orderBy('created_at', 'desc')->take(5)->get();

        $stats = [
            'total_projects' => $projectCount,
            'total_services' => $serviceCount,
            'total_inquiries' => $inquiryCount,
            'total_photos' => $galleryCount,
            'total_categories' => $categoryCount,
            'pending_inquiries' => $pendingInquiries,
        ];

        return view('admin.dashboard', compact('projectCount', 'serviceCount', 'inquiryCount', 'galleryCount', 'categoryCount', 'pendingInquiries', 'recentInquiries', 'stats'));
    }

    /**
     * Gallery Management (CMS Upload & Edit)
     */
    public function gallery()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.gallery.index', compact('galleries', 'categories'));
    }

    public function storeGallery(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
            'aspect_ratio' => 'required|string|in:tall,wide,square',
            'image_url' => 'nullable|string',
        ]);

        $imagePath = $this->processUpload($request, 'image', 'image_url');
        if (!$imagePath) {
            return redirect()->back()->withErrors(['image' => 'Please upload an image file or provide an image URL.']);
        }

        $validated['image_url'] = $imagePath;
        $validated['sort_order'] = 0;

        Gallery::create($validated);

        return redirect()->route('admin.gallery')->with('success', 'New architectural photo uploaded to gallery successfully!');
    }

    public function updateGallery(Request $request, $id)
    {
        $item = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
            'aspect_ratio' => 'required|string|in:tall,wide,square',
            'image_url' => 'nullable|string',
        ]);

        $imagePath = $this->processUpload($request, 'image_file', 'image_url', $item->image_url);
        $validated['image_url'] = $imagePath;

        $item->update($validated);

        return redirect()->route('admin.gallery')->with('success', 'Gallery photo updated successfully!');
    }

    public function destroyGallery($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.gallery')->with('success', 'Photo removed from gallery successfully.');
    }

    /**
     * Site Settings / Content CMS Manager
     */
    public function settings()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $inputs = $request->except('_token');

        // Process file uploads for image fields
        $imageFields = [
            'hero_image_1', 'hero_image_2', 'hero_image_3', 'hero_image_4',
            'from_plan_2d_image', 'from_plan_3d_image',
            'about_designer_image'
        ];

        foreach ($imageFields as $field) {
            $fileKey = $field . '_file';
            if ($request->hasFile($fileKey)) {
                $inputs[$field] = $this->processUpload($request, $fileKey);
            }
        }

        foreach ($inputs as $key => $val) {
            if (!is_array($val) && strpos($key, '_file') === false) {
                SiteSetting::set($key, $val);
            }
        }

        return redirect()->back()->with('success', 'All site content & image settings updated successfully!');
    }

    /**
     * Projects Management
     */
    public function projects()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function createProject()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'area_sqm' => 'nullable|string|max:100',
            'overview' => 'required|string',
            'concept_design' => 'nullable|string',
            'sustainability_specs' => 'required|string',
            'hero_image' => 'nullable|string',
            'blueprint_image' => 'nullable|string',
            'featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['hero_image'] = $this->processUpload($request, 'hero_image_file', 'hero_image', 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop');
        $validated['blueprint_image'] = $this->processUpload($request, 'blueprint_image_file', 'blueprint_image', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop');
        $validated['featured'] = $request->has('featured');

        Project::create($validated);

        return redirect()->route('admin.projects')->with('success', 'New architectural project created successfully!');
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'area_sqm' => 'nullable|string|max:100',
            'overview' => 'required|string',
            'concept_design' => 'nullable|string',
            'sustainability_specs' => 'required|string',
            'hero_image' => 'nullable|string',
            'blueprint_image' => 'nullable|string',
            'featured' => 'nullable|boolean',
        ]);

        $validated['hero_image'] = $this->processUpload($request, 'hero_image_file', 'hero_image', $project->hero_image);
        $validated['blueprint_image'] = $this->processUpload($request, 'blueprint_image_file', 'blueprint_image', $project->blueprint_image);
        $validated['featured'] = $request->has('featured');

        $project->update($validated);

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully.');
    }

    /**
     * Services Management
     */
    public function services()
    {
        $services = FloorPlanService::all();
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'starting_price' => 'required|numeric',
            'turnaround_time' => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'featured_image' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['featured_image'] = $this->processUpload($request, 'featured_image_file', 'featured_image', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop');
        $validated['icon'] = 'ruler';

        FloorPlanService::create($validated);

        return redirect()->route('admin.services')->with('success', 'Floor Plan Service created successfully!');
    }

    public function editService($id)
    {
        $service = FloorPlanService::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $service = FloorPlanService::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'starting_price' => 'required|numeric',
            'turnaround_time' => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'featured_image' => 'nullable|string',
        ]);

        $validated['featured_image'] = $this->processUpload($request, 'featured_image_file', 'featured_image', $service->featured_image);

        $service->update($validated);

        return redirect()->route('admin.services')->with('success', 'Floor Plan Service updated successfully!');
    }

    public function destroyService($id)
    {
        $service = FloorPlanService::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services')->with('success', 'Service deleted successfully!');
    }

    /**
     * Inquiries Management
     */
    public function inquiries()
    {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->get();
        return view('admin.inquiries', compact('inquiries'));
    }

    public function updateInquiryStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->status = $request->input('status', 'contacted');
        $inquiry->save();

        return redirect()->back()->with('success', 'Inquiry status updated successfully.');
    }

    public function updateInquiry(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service_type' => 'nullable|string|max:255',
            'status' => 'required|string|in:pending,contacted,completed',
            'message' => 'required|string',
        ]);

        $inquiry->update($validated);

        return redirect()->back()->with('success', 'Inquiry details updated successfully.');
    }

    public function destroyInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted successfully.');
    }
}
