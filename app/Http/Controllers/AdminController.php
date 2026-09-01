<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\FloorPlanService;
use App\Models\Inquiry;
use App\Models\SiteSetting;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

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

        return view('admin.dashboard', compact('projectCount', 'serviceCount', 'inquiryCount', 'galleryCount', 'categoryCount', 'pendingInquiries', 'recentInquiries'));
    }

    /**
     * Gallery Management (CMS Upload)
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

        $imagePath = $this->processUpload($request, 'image_file', 'image_url');
        if (!$imagePath) {
            return redirect()->back()->withErrors(['image_file' => 'Please upload an image file or provide an image URL.']);
        }

        $validated['image_url'] = $imagePath;
        $validated['sort_order'] = 0;

        Gallery::create($validated);

        return redirect()->route('admin.gallery')->with('success', 'New architectural photo uploaded to gallery successfully!');
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
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $inputs = $request->except(['_token', 'hero_image_1_file', 'hero_image_2_file', 'hero_image_3_file', 'about_designer_image_file']);

        if ($uploadedImg1 = $this->processUpload($request, 'hero_image_1_file', 'hero_image_1')) {
            $inputs['hero_image_1'] = $uploadedImg1;
        }
        if ($uploadedImg2 = $this->processUpload($request, 'hero_image_2_file', 'hero_image_2')) {
            $inputs['hero_image_2'] = $uploadedImg2;
        }
        if ($uploadedImg3 = $this->processUpload($request, 'hero_image_3_file', 'hero_image_3')) {
            $inputs['hero_image_3'] = $uploadedImg3;
        }
        if ($uploadedProfile = $this->processUpload($request, 'about_designer_image_file', 'about_designer_image')) {
            $inputs['about_designer_image'] = $uploadedProfile;
        }

        foreach ($inputs as $key => $val) {
            SiteSetting::set($key, $val ?? '');
        }

        return redirect()->back()->with('success', 'All site content, banners, headings, and uploaded photos updated successfully!');
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
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.projects.create', compact('categories'));
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
            'hero_image' => 'nullable|string',
            'blueprint_image' => 'nullable|string',
            'featured' => 'nullable|boolean',
        ]);

        $validated['hero_image'] = $this->processUpload($request, 'hero_image_file', 'hero_image') ?? 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop';
        $validated['blueprint_image'] = $this->processUpload($request, 'blueprint_image_file', 'blueprint_image');

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']) . '-' . rand(100, 999);
        $validated['featured'] = $request->has('featured');

        Project::create($validated);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully!');
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
            'subtitle' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'area_sqm' => 'nullable|string|max:100',
            'overview' => 'required|string',
            'concept_design' => 'nullable|string',
            'sustainability_specs' => 'nullable|string',
            'hero_image' => 'nullable|string',
            'blueprint_image' => 'nullable|string',
            'featured' => 'nullable|boolean',
        ]);

        $uploadedHero = $this->processUpload($request, 'hero_image_file', 'hero_image', $project->hero_image);
        if ($uploadedHero) {
            $validated['hero_image'] = $uploadedHero;
        }

        $uploadedBlueprint = $this->processUpload($request, 'blueprint_image_file', 'blueprint_image', $project->blueprint_image);
        if ($uploadedBlueprint) {
            $validated['blueprint_image'] = $uploadedBlueprint;
        }

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
            'featured_image' => 'nullable|string',
        ]);

        $validated['featured_image'] = $this->processUpload($request, 'featured_image_file', 'featured_image') ?? 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1200&auto=format&fit=crop';
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
            'featured_image' => 'nullable|string',
        ]);

        $uploadedServiceImg = $this->processUpload($request, 'featured_image_file', 'featured_image', $service->featured_image);
        if ($uploadedServiceImg) {
            $validated['featured_image'] = $uploadedServiceImg;
        }

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
