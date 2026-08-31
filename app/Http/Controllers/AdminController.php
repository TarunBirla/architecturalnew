<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\FloorPlanService;
use App\Models\Inquiry;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Dashboard Overview
     */
    public function dashboard()
    {
        $projectCount = Project::count();
        $serviceCount = FloorPlanService::count();
        $inquiryCount = Inquiry::count();
        $pendingInquiries = Inquiry::where('status', 'pending')->count();
        $recentInquiries = Inquiry::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('projectCount', 'serviceCount', 'inquiryCount', 'pendingInquiries', 'recentInquiries'));
    }

    /**
     * Site Settings / Content CMS Manager
     */
    public function settings()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $inputs = $request->except('_token');

        foreach ($inputs as $key => $val) {
            SiteSetting::set($key, $val ?? '');
        }

        return redirect()->back()->with('success', 'All site content, banners, headings, and images updated successfully!');
    }

    /**
     * Projects Management (CRUD)
     */
    public function projects()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function createProject()
    {
        return view('admin.projects.create');
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'area_sqm' => 'nullable|string|max:100',
            'overview' => 'required|string',
            'concept_design' => 'nullable|string',
            'sustainability_specs' => 'nullable|string',
            'hero_image' => 'required|string',
            'blueprint_image' => 'nullable|string',
            'featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']) . '-' . rand(100, 999);
        $validated['featured'] = $request->has('featured');

        Project::create($validated);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully!');
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'area_sqm' => 'nullable|string|max:100',
            'overview' => 'required|string',
            'concept_design' => 'nullable|string',
            'sustainability_specs' => 'nullable|string',
            'hero_image' => 'required|string',
            'blueprint_image' => 'nullable|string',
            'featured' => 'nullable|boolean',
        ]);

        $validated['featured'] = $request->has('featured');

        $project->update($validated);

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully!');
    }

    /**
     * Floor Plan Services Management (CRUD)
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
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'turnaround_time' => 'required|string|max:100',
            'starting_price' => 'required|numeric',
            'icon' => 'required|string',
            'featured_image' => 'required|string',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        $validated['featured'] = true;

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
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'turnaround_time' => 'required|string|max:100',
            'starting_price' => 'required|numeric',
            'icon' => 'required|string',
            'featured_image' => 'required|string',
        ]);

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

    public function destroyInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted successfully.');
    }
}
