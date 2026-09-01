<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
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

        $categories = [
            'All',
            'Luxury Hotels & Resorts',
            'Corporate Offices & Towers',
            'Luxury Estates & House Redesign',
        ];

        return view('gallery.index', compact('galleries', 'categories', 'category'));
    }
}
