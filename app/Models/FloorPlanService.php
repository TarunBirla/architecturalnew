<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlanService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'full_description',
        'turnaround_time',
        'starting_price',
        'icon',
        'featured_image',
        'included_features',
        'featured',
    ];

    protected $casts = [
        'included_features' => 'array',
        'featured' => 'boolean',
        'starting_price' => 'decimal:2',
    ];
}
