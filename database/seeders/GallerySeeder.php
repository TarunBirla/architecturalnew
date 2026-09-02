<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleryItems = [
            // 2D CAD & Floor Plans
            [
                'title' => 'Mayfair Townhouse 2D CAD Layout',
                'category' => '2D CAD & Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Laser-Measured 2D Floor Plan Survey & Wall Thickness Mapping',
                'aspect_ratio' => 'wide',
                'sort_order' => 1,
            ],
            [
                'title' => 'HM Land Registry Demised Lease Plan',
                'category' => '2D CAD & Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'PG40 Compliant Color-Coded Lease Plan Blueprint',
                'aspect_ratio' => 'square',
                'sort_order' => 2,
            ],
            [
                'title' => 'Residential Loft Conversion CAD Plan',
                'category' => '2D CAD & Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'caption' => '1:50 Scale Detailed Interior Furniture & Electrical Layout',
                'aspect_ratio' => 'tall',
                'sort_order' => 3,
            ],

            // 3D Spatial Renders
            [
                'title' => 'Soho Artisan Coffee 3D Render',
                'category' => '3D Spatial Renders',
                'image_url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'V-Ray Photorealistic 3D Interior Lighting & Material Study',
                'aspect_ratio' => 'wide',
                'sort_order' => 4,
            ],
            [
                'title' => 'Cambridge Glass Villa Extension 3D View',
                'category' => '3D Spatial Renders',
                'image_url' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Daylight & Glass Reflection Exterior 3D Visualisation',
                'aspect_ratio' => 'tall',
                'sort_order' => 5,
            ],
            [
                'title' => 'Residential Living Room 3D Room Render',
                'category' => '3D Spatial Renders',
                'image_url' => 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Warm Timber & Natural Daylight Interior Modeling',
                'aspect_ratio' => 'square',
                'sort_order' => 6,
            ],

            // Academic & Concept Designs
            [
                'title' => 'The Eco-Study Pavilion Model',
                'category' => 'Academic & Concept Designs',
                'image_url' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'University Architecture Thesis Sustainable Timber Canopy',
                'aspect_ratio' => 'tall',
                'sort_order' => 7,
            ],
            [
                'title' => 'Biophilic Courtyard Infill Concept',
                'category' => 'Academic & Concept Designs',
                'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Student Architectural Competition Entry - Urban Garden Dome',
                'aspect_ratio' => 'wide',
                'sort_order' => 8,
            ],
            [
                'title' => 'Parametric Timber Joinery Detail',
                'category' => 'Academic & Concept Designs',
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Rhino & Grasshopper Parametric Canopy Model',
                'aspect_ratio' => 'square',
                'sort_order' => 9,
            ],
        ];

        foreach ($galleryItems as $item) {
            Gallery::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
