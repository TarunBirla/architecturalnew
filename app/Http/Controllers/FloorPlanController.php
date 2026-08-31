<?php

namespace App\Http\Controllers;

use App\Models\FloorPlanService;
use Illuminate\Http\Request;

class FloorPlanController extends Controller
{
    public function index()
    {
        $services = FloorPlanService::all();
        return view('floor-plans.index', compact('services'));
    }

    public function show($slug)
    {
        $service = FloorPlanService::where('slug', $slug)->firstOrFail();
        return view('floor-plans.show', compact('service'));
    }
}
