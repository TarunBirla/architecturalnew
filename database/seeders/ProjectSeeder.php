<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'The Atrium Pavilion & Bio-Skylight',
                'slug' => 'the-atrium-pavilion-bio-skylight',
                'category' => 'Academic & Research',
                'subtitle' => 'Parametric Timber Structure & Natural Daylight Optimization',
                'client' => 'University Architecture & Urban Design Guild',
                'location' => 'Cambridge, UK',
                'year' => 2026,
                'area_sqm' => '1,450 m²',
                'overview' => 'An award-winning academic design research project exploring zero-carbon glulam timber frameworks combined with dynamic solar-tracking glass roof geometry. Designed as a university collaborative research hub.',
                'concept_design' => 'Integrates Voronoi biomimicry roof trusses with high-performance double-skin thermal facades. The pavilion optimizes natural cross-ventilation while providing fluid spatial zoning for design exhibitions.',
                'sustainability_specs' => 'BREEAM Outstanding Target • 100% Recycled Cross-Laminated Timber (CLT) • Photovoltaic Integrated Glass • Rainwater Harvesting Reservoir',
                'hero_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1200&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?q=80&w=1200&auto=format&fit=crop',
                ],
                'specifications' => [
                    'Structure' => 'Engineered Glulam & Recycled Steel',
                    'Facade' => 'Triple Glazed Low-E Glass with Smart Shading',
                    'Floor Plan Type' => 'Open-Plan Fluid Zoning',
                    'Energy Rating' => 'A+ Net Zero Operational Energy',
                ],
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Kensington Minimalist Villa & Spatial Plan',
                'slug' => 'kensington-minimalist-villa',
                'category' => 'Residential',
                'subtitle' => 'Luxury 3-Tier Residence & Land Registry Compliant Floor Layout',
                'client' => 'Private Client',
                'location' => 'Kensington, London',
                'year' => 2025,
                'area_sqm' => '680 m²',
                'overview' => 'Complete architectural redesign and floor plan reconfiguration of a classic Victorian townhouse into a contemporary light-filled 5-bedroom luxury residence.',
                'concept_design' => 'Seamless indoor-outdoor transitions achieved via full-height floating glass doors, custom micro-cement staircases, and hidden acoustic partitions.',
                'sustainability_specs' => 'Sub-floor Geothermal Heat Pump • Smart Lighting Automation • Green Roof Terrace',
                'hero_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=1200&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1600573472591-ee6b68d14c68?q=80&w=1200&auto=format&fit=crop',
                ],
                'specifications' => [
                    'Bedrooms' => '5 Luxury En-suite Suites',
                    'Floor Plan' => '2D CAD & 3D Interactive Walkthrough',
                    'Lease Plan' => 'HM Land Registry Compliant',
                    'Materials' => 'Travertine Stone, Brushed Brass, Fluted Glass',
                ],
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'The Meridian Corporate Tower & Masterplan',
                'slug' => 'the-meridian-corporate-tower',
                'category' => 'Commercial',
                'subtitle' => 'High-Performance Vertical Workplace & Biophilic Atrium',
                'client' => 'Meridian Global Development',
                'location' => 'City of London, UK',
                'year' => 2026,
                'area_sqm' => '28,500 m²',
                'overview' => 'A landmark 24-story commercial workplace tower featuring spiral vertical garden terraces, flexible hybrid workstation layouts, and floor-by-floor BIM modeling.',
                'concept_design' => 'Designed to maximize tenant wellness and collaboration. Features a central double-height atrium that serves as a solar chimney for passive cooling.',
                'sustainability_specs' => 'WELL Building Gold Certified • Solar Exoskeleton • Kinetic Energy Recovery Elevators',
                'hero_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b3?q=80&w=1200&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1200&auto=format&fit=crop',
                ],
                'specifications' => [
                    'Height' => '115 Metres / 24 Floors',
                    'Workstation Capacity' => '2,400 People',
                    'Floor Plans' => '3D Rendered Floor Layouts & Fire Evacuation Plans',
                    'Rating' => 'LEED Platinum',
                ],
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Mayfair Gallery & 3D Spatial Floor Layouts',
                'slug' => 'mayfair-gallery-3d-spatial-floor-layouts',
                'category' => 'Floor Planning',
                'subtitle' => 'High-Precision 2D CAD Blueprint & 3D Architectural Renderings',
                'client' => 'Mayfair Art Syndicate',
                'location' => 'Mayfair, London',
                'year' => 2025,
                'area_sqm' => '420 m²',
                'overview' => 'Comprehensive architectural floor plan mapping and 3D spatial simulation for a subterranean art gallery and private auction lounge.',
                'concept_design' => 'Precision laser-measured 2D CAD floor plans integrated with photorealistic 3D lighting simulations to ensure optimal artwork preservation and visitor circulation.',
                'sustainability_specs' => 'Precision Climate Control • Recessed Low-Heat LED Track Arrays',
                'hero_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=1200&auto=format&fit=crop',
                ],
                'specifications' => [
                    'Measurement Technique' => '3D LiDAR Laser Scanner',
                    'Outputs' => '2D DWG/PDF, 3D SketchUp/Revit, Interactive 360° VR',
                    'Compliance' => 'RICS Property Measurement Standards (IPMS3)',
                ],
                'featured' => false,
                'sort_order' => 4,
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(['slug' => $proj['slug']], $proj);
        }
    }
}
