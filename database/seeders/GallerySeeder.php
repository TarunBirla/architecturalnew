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
            // ================= 1. 2D FLOOR PLANS (6 Images) =================
            [
                'title' => 'Mayfair Townhouse 2D CAD Layout',
                'category' => '2D Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Laser-Measured 2D Floor Plan Survey & Wall Thickness Mapping',
                'aspect_ratio' => 'wide',
                'sort_order' => 1,
            ],
            [
                'title' => 'HM Land Registry Demised Lease Plan',
                'category' => '2D Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'PG40 Compliant Color-Coded Lease Plan Blueprint',
                'aspect_ratio' => 'square',
                'sort_order' => 2,
            ],
            [
                'title' => 'Residential Loft Conversion CAD Plan',
                'category' => '2D Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'caption' => '1:50 Scale Detailed Interior Furniture & Electrical Layout',
                'aspect_ratio' => 'tall',
                'sort_order' => 3,
            ],
            [
                'title' => 'Kensington Property Demised Boundary Drawing',
                'category' => '2D Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Ordnance Survey Location Plan & Demised Lease Boundaries',
                'aspect_ratio' => 'square',
                'sort_order' => 4,
            ],
            [
                'title' => 'Chelsea Apartment Reconfiguration CAD Blueprint',
                'category' => '2D Floor Plans',
                'image_url' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Proposed Ground Floor Extension & Partition Wall Survey',
                'aspect_ratio' => 'wide',
                'sort_order' => 5,
            ],

            // ================= 2. 3D VISUALISATIONS (6 Images) =================
            [
                'title' => 'Soho Artisan Coffee 3D Render',
                'category' => '3D Visualisations',
                'image_url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'V-Ray Photorealistic 3D Interior Lighting & Material Study',
                'aspect_ratio' => 'wide',
                'sort_order' => 6,
            ],
            [
                'title' => 'Cambridge Glass Villa Extension 3D View',
                'category' => '3D Visualisations',
                'image_url' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Daylight & Glass Reflection Exterior 3D Visualisation',
                'aspect_ratio' => 'tall',
                'sort_order' => 7,
            ],
            [
                'title' => 'Residential Living Room 3D Room Render',
                'category' => '3D Visualisations',
                'image_url' => 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Warm Timber & Natural Daylight Interior Modeling',
                'aspect_ratio' => 'square',
                'sort_order' => 8,
            ],
            [
                'title' => 'Modern Minimalist Kitchen Spatial Render',
                'category' => '3D Visualisations',
                'image_url' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Custom Cabinetry & Island Spatial Visualisation',
                'aspect_ratio' => 'tall',
                'sort_order' => 9,
            ],
            [
                'title' => 'Contemporary Courtyard Lounge Visual',
                'category' => '3D Visualisations',
                'image_url' => 'https://images.unsplash.com/photo-1600573472550-8090b5e0745e?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Outdoor Patio & Lighting Integration Render',
                'aspect_ratio' => 'wide',
                'sort_order' => 10,
            ],

            // ================= 3. ACADEMIC CONCEPTS (5 Images) =================
            [
                'title' => 'The Eco-Study Pavilion Model',
                'category' => 'Academic Concepts',
                'image_url' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'University Architecture Thesis Sustainable Timber Canopy',
                'aspect_ratio' => 'tall',
                'sort_order' => 11,
            ],
            [
                'title' => 'Biophilic Courtyard Infill Concept',
                'category' => 'Academic Concepts',
                'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Student Architectural Competition Entry - Urban Garden Dome',
                'aspect_ratio' => 'wide',
                'sort_order' => 12,
            ],
            [
                'title' => 'Parametric Timber Joinery Detail',
                'category' => 'Academic Concepts',
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Rhino & Grasshopper Parametric Canopy Model',
                'aspect_ratio' => 'square',
                'sort_order' => 13,
            ],
            [
                'title' => 'Solar Solar Passive Atrium Study',
                'category' => 'Academic Concepts',
                'image_url' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Academic Thermal Circulation & Skylight Sunlight Study',
                'aspect_ratio' => 'tall',
                'sort_order' => 14,
            ],
            [
                'title' => 'Urban Student Hub Massing Study',
                'category' => 'Academic Concepts',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Spatial Circulation & Physical Balsa Model Exploration',
                'aspect_ratio' => 'square',
                'sort_order' => 15,
            ],

            // ================= 4. CLIENT PROJECTS (5 Images) =================
            [
                'title' => 'Mayfair Townhouse Loft Survey & Layout',
                'category' => 'Client Projects',
                'image_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Client Project: Laser Survey & 2D CAD Floor Layout Drawings',
                'aspect_ratio' => 'wide',
                'sort_order' => 16,
            ],
            [
                'title' => 'Kensington Property Lease Plan',
                'category' => 'Client Projects',
                'image_url' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'HM Land Registry Compliant Lease Registration Plan',
                'aspect_ratio' => 'square',
                'sort_order' => 17,
            ],
            [
                'title' => 'Cambridge Villa Rear Extension Visual',
                'category' => 'Client Projects',
                'image_url' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'caption' => '3D Exterior Render for Homeowner Planning Application',
                'aspect_ratio' => 'tall',
                'sort_order' => 18,
            ],
            [
                'title' => 'Belgravia Residence Interior Elevation',
                'category' => 'Client Projects',
                'image_url' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Detailed Architectural Interior Elevation & Joinery Specs',
                'aspect_ratio' => 'square',
                'sort_order' => 19,
            ],
            [
                'title' => 'Shoreditch Office Lease Boundary Plan',
                'category' => 'Client Projects',
                'image_url' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Commercial Unit Lease Registration & Floor Demarcation Plan',
                'aspect_ratio' => 'wide',
                'sort_order' => 20,
            ],
        ];

        foreach ($galleryItems as $item) {
            Gallery::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
