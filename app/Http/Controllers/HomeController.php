<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\FloorPlanService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('featured', true)->orderBy('sort_order')->take(6)->get();
        $allProjects = Project::orderBy('sort_order')->get();
        $services = FloorPlanService::where('featured', true)->get();

        return view('home', compact('featuredProjects', 'allProjects', 'services'));
    }

    public function about()
    {
        return view('about');
    }
}
