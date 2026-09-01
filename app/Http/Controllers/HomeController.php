<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\FloorPlanService;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allProjects = Project::orderBy('sort_order')->get();
        $featuredProjects = Project::where('featured', true)->orderBy('sort_order')->get();
        $services = FloorPlanService::where('featured', true)->get();
        $galleryItems = Gallery::orderBy('sort_order')->take(9)->get();
        $categories = Category::orderBy('sort_order')->get();

        return view('home', compact('allProjects', 'featuredProjects', 'services', 'galleryItems', 'categories'));
    }

    public function about()
    {
        return view('about');
    }
}
