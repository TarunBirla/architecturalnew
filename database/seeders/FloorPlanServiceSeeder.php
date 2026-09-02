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
                'title' => '2D FLOOR PLANS',
                'slug' => '2d-floor-plans',
                'category' => '2D CAD',
                'short_description' => 'Accurate and professionally prepared CAD floor plans.',
                'full_description' => 'Laser-measured or sketch-converted 2D CAD floor plans prepared for estate agents, homeowners, and interior reconfigurations.',
                'starting_price' => 85.00,
                'turnaround_time' => 'Typical turnaround: 24–48 hours',
                'icon' => 'fa-ruler-combined',
                'featured_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'included_features' => [
                    'Laser-measured precision CAD drawings',
                    'Room dimensions & total floor area',
                    'High-resolution PDF & PNG export',
                ],
                'featured' => true,
            ],
            [
                'title' => '3D VISUALISATIONS',
                'slug' => '3d-visualisations',
                'category' => '3D Renders',
                'short_description' => 'Bring your space to life before construction begins.',
                'full_description' => 'Photorealistic 3D interior and exterior spatial visualisations showing materials, lighting, and layout options.',
                'starting_price' => 175.00,
                'turnaround_time' => 'Typical turnaround: 3–5 business days',
                'icon' => 'fa-cube',
                'featured_image' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop',
                'included_features' => [
                    'Photorealistic material & lighting study',
                    'Multiple angle camera renders',
                    'Daylight & artificial lighting views',
                ],
                'featured' => true,
            ],
            [
                'title' => 'LEASE PLANS',
                'slug' => 'lease-plans',
                'category' => 'Legal Plans',
                'short_description' => 'Clear and accurate plans prepared for property requirements.',
                'full_description' => 'Prepared in accordance with HM Land Registry requirements, featuring Ordnance Survey location maps and demised boundaries.',
                'starting_price' => 145.00,
                'turnaround_time' => 'Typical turnaround: 24–48 hours',
                'icon' => 'fa-file-lines',
                'featured_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'included_features' => [
                    'Prepared in accordance with HM Land Registry requirements',
                    'Ordnance Survey site plan integration',
                    'Color-coded demised boundary lines',
                ],
                'featured' => true,
            ],
            [
                'title' => 'DESIGN & PLANNING DRAWINGS',
                'slug' => 'design-planning-drawings',
                'category' => 'Planning',
                'short_description' => 'Tailored drawings developed around your project.',
                'full_description' => 'Existing and proposed floor plans, elevation drawings, and section drawings for residential extensions and interior layouts.',
                'starting_price' => 350.00,
                'turnaround_time' => 'Typical turnaround: 5–7 business days',
                'icon' => 'fa-drafting-compass',
                'featured_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'included_features' => [
                    'Existing & proposed floor plans',
                    'Building elevation & section drawings',
                    'Scale metric CAD drawings',
                ],
                'featured' => true,
            ],
        ];

        foreach ($services as $serv) {
            FloorPlanService::updateOrCreate(['slug' => $serv['slug']], $serv);
        }
    }
}
