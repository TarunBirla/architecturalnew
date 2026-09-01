<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        
        $query = Gallery::query();
        if ($category && $category !== 'All') {
            $query->where('category', $category);
        }

        $galleries = $query->orderBy('sort_order')->paginate(12)->withQueryString();

        $categories = array_merge(['All'], Category::orderBy('sort_order')->pluck('name')->toArray());

        return view('gallery.index', compact('galleries', 'categories', 'category'));
    }
}
