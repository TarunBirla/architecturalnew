<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'subtitle',
        'client',
        'location',
        'year',
        'area_sqm',
        'overview',
        'concept_design',
        'sustainability_specs',
        'hero_image',
        'blueprint_image',
        'gallery_images',
        'specifications',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'specifications' => 'array',
        'featured' => 'boolean',
    ];
}
