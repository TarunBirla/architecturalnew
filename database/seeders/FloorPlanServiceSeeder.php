<?php

namespace Database\Seeders;

use App\Models\FloorPlanService;
use Illuminate\Database\Seeder;

class FloorPlanServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => '2D Architectural CAD Floor Plans',
                'slug' => '2d-architectural-cad-floor-plans',
                'category' => '2D Layouts',
                'short_description' => 'High-precision 2D floor plans laser-measured on-site or created from existing sketches for estate agents, architects, and developers.',
                'full_description' => 'Accurate 2D CAD floor plans drawn to scale according to RICS property measurement standards. Ideal for residential sales, lettings, planning applications, and spatial redesigns. Includes room dimensions, door orientations, window positioning, gross internal area (GIA) calculations, and key structural walls.',
                'turnaround_time' => '24 - 48 Hours',
                'starting_price' => 85.00,
                'icon' => 'cube-transparent',
                'featured_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1200&auto=format&fit=crop',
                'included_features' => [
                    'Laser Measurement / CAD Drafting',
                    'PDF, DWG & High-Res PNG Exports',
                    'Gross Internal Area (GIA) Breakdown',
                    'Free Revisions & Custom Branding',
                ],
                'featured' => true,
            ],
            [
                'title' => '3D Photorealistic Rendered Floor Plans',
                'slug' => '3d-photorealistic-rendered-floor-plans',
                'category' => '3D Renders',
                'short_description' => 'Fully textured 3D floor plan visualizations showcasing furniture layouts, lighting dynamics, and spatial atmosphere.',
                'full_description' => 'Transform 2D blueprints into immersive 3D architectural representations. Our 3D floor plans feature photorealistic lighting, material textures (hardwood, marble, glass, micro-cement), furniture placement, and realistic depth cues, allowing buyers and stakeholders to visualize spaces intuitively.',
                'turnaround_time' => '48 - 72 Hours',
                'starting_price' => 175.00,
                'icon' => 'sparkles',
                'featured_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&auto=format&fit=crop',
                'included_features' => [
                    'Full 3D Cutaway Isometric Views',
                    'Realistic Lighting & Material Textures',
                    'Interior Styling & Furniture Zoning',
                    'Ideal for Off-Plan Marketing & High-End Sales',
                ],
                'featured' => true,
            ],
            [
                'title' => 'HM Land Registry Compliant Lease Plans',
                'slug' => 'hm-land-registry-compliant-lease-plans',
                'category' => 'Lease Plans',
                'short_description' => 'Official lease plans drafted in strict accordance with HM Land Registry practice guide 40 requirements.',
                'full_description' => 'Legal floor plans required for new leases, lease extensions, property splits, and land registration in the UK. Fully compliant with Land Registry guidelines including Ordnance Survey location maps, colored boundary demarcations (demised area, communal zones, rights of way), and precise scale ratios (1:50 or 1:100).',
                'turnaround_time' => '24 - 48 Hours',
                'starting_price' => 145.00,
                'icon' => 'document-check',
                'featured_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1200&auto=format&fit=crop',
                'included_features' => [
                    '100% Land Registry Acceptance Guarantee',
                    'Ordnance Survey Location Maps Included',
                    'Colored Boundary & Access Red-Lines',
                    'Signed Solicitor-Ready PDF & Printed Copies',
                ],
                'featured' => true,
            ],
            [
                'title' => 'Planning Permission & Building Control Drawings',
                'slug' => 'planning-permission-building-control-drawings',
                'category' => 'Architectural Drawings',
                'short_description' => 'Comprehensive architectural plans, elevation drawings, and sectional cuts for Council planning applications.',
                'full_description' => 'Complete architectural package for home extensions, loft conversions, basement excavations, and change-of-use applications. Includes existing and proposed floor plans, front/rear/side elevations, site block plans, and structural sections formatted for local authority submission.',
                'turnaround_time' => '3 - 5 Days',
                'starting_price' => 350.00,
                'icon' => 'home-modern',
                'featured_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1200&auto=format&fit=crop',
                'included_features' => [
                    'Existing & Proposed Floor Plans',
                    'Front, Rear & Side Elevation Views',
                    'Site Location & Ordnance Survey Block Plan',
                    'Direct Coordination with Council Planning Officers',
                ],
                'featured' => true,
            ],
        ];

        foreach ($services as $service) {
            FloorPlanService::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
