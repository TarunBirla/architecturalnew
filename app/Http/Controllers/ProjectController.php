<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        
        $query = Project::query();
        if ($category && $category !== 'All') {
            $query->where('category', $category);
        }
        
        // Paginate 6 projects per page
        $projects = $query->orderBy('sort_order')->paginate(6)->withQueryString();
        
        $categories = [
            'All',
            'Luxury Hotels & Resorts',
            'Corporate Offices & Towers',
            'Luxury Estates & House Redesign'
        ];

        return view('projects.index', compact('projects', 'categories', 'category'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->take(3)
            ->get();

        if ($relatedProjects->isEmpty()) {
            $relatedProjects = Project::where('id', '!=', $project->id)->take(3)->get();
        }

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
