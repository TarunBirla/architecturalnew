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
                'title' => 'The Eco-Study Pavilion & Timber Atrium',
                'slug' => 'the-eco-study-pavilion-timber-atrium',
                'category' => 'Academic Concepts',
                'subtitle' => 'ACADEMIC PROJECT',
                'client' => 'University Architecture Thesis',
                'location' => 'Cambridge, UK',
                'year' => 2026,
                'area_sqm' => '320 m²',
                'overview' => 'An academic thesis project exploring timber joinery, passive solar heating, and biophilic study spaces.',
                'concept_design' => 'Modeled in Rhino and SketchUp. Focuses on natural light penetration and timber construction details.',
                'sustainability_specs' => 'Spatial Planning • Architectural Concept • 3D Visualisation',
                'hero_image' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Project Classification' => 'ACADEMIC PROJECT',
                    'Scope of Work' => 'Spatial Planning • Architectural Concept • 3D Visualisation',
                    'Tools Used' => 'AutoCAD, SketchUp, V-Ray, Photoshop',
                ],
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Mayfair Townhouse Loft Conversion',
                'slug' => 'mayfair-townhouse-loft-conversion',
                'category' => '2D Floor Plans',
                'subtitle' => 'CLIENT PROJECT',
                'client' => 'Private Client',
                'location' => 'Mayfair, London',
                'year' => 2025,
                'area_sqm' => '145 m²',
                'overview' => 'Precise 2D CAD floor plan survey and spatial layout drawings for a townhouse loft conversion.',
                'concept_design' => 'Laser survey measurements converted into clear CAD floor plans for planning permission.',
                'sustainability_specs' => 'Laser CAD Survey • 2D Floor Plan • Planning Layout',
                'hero_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Project Classification' => 'CLIENT PROJECT',
                    'Scope of Work' => 'Laser CAD Survey • 2D Floor Plan • Space Planning',
                    'Delivery' => 'Scale PDF & DWG Drawings',
                ],
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Soho Artisan Coffee & Work Studio',
                'slug' => 'soho-artisan-coffee-work-studio',
                'category' => '3D Visualisations',
                'subtitle' => 'PERSONAL CONCEPT PROJECT',
                'client' => 'Design Exploration',
                'location' => 'Soho, London',
                'year' => 2026,
                'area_sqm' => '120 m²',
                'overview' => 'A personal design concept exploring warm timber finishes, lighting, and interior layout options for a coffee bar.',
                'concept_design' => '3D interior modeling and material study developed to practice commercial lighting renders.',
                'sustainability_specs' => '3D Spatial Visualisation • Lighting Design • Material Study',
                'hero_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Project Classification' => 'PERSONAL CONCEPT PROJECT',
                    'Scope of Work' => '3D Spatial Visualisation • Lighting Design • Interior Layout',
                    'Software' => 'SketchUp, V-Ray, Photoshop',
                ],
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Kensington Property Lease Plan',
                'slug' => 'kensington-property-lease-plan',
                'category' => '2D Floor Plans',
                'subtitle' => 'CLIENT PROJECT',
                'client' => 'Property Landlord',
                'location' => 'Kensington, London',
                'year' => 2025,
                'area_sqm' => '180 m²',
                'overview' => 'Prepared in accordance with HM Land Registry requirements, featuring Ordnance Survey location map and demised boundaries.',
                'concept_design' => 'Accurate CAD demised boundary drawing for lease registration.',
                'sustainability_specs' => 'HM Land Registry Requirements • OS Location Plan • Demised Boundaries',
                'hero_image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Project Classification' => 'CLIENT PROJECT',
                    'Scope of Work' => 'Lease Plan • OS Location Map • Boundary Mapping',
                ],
                'featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'The Biophilic Courtyard Concept',
                'slug' => 'the-biophilic-courtyard-concept',
                'category' => 'Academic Concepts',
                'subtitle' => 'ACADEMIC PROJECT',
                'client' => 'Student Architecture Showcase',
                'location' => 'London, UK',
                'year' => 2025,
                'area_sqm' => '210 m²',
                'overview' => 'A student project exploring biophilic garden infills and natural light penetration in urban courtyards.',
                'concept_design' => 'Designed to study living wall integration and skylight dome construction.',
                'sustainability_specs' => 'Concept Design • 3D Render • Environmental Study',
                'hero_image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Project Classification' => 'ACADEMIC PROJECT',
                    'Scope of Work' => 'Concept Design • 3D Render • Environmental Study',
                ],
                'featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Cambridge Villa Rear Extension Visualisation',
                'slug' => 'cambridge-villa-rear-extension-visualisation',
                'category' => '3D Visualisations',
                'subtitle' => 'CLIENT PROJECT',
                'client' => 'Private Homeowner',
                'location' => 'Cambridge, UK',
                'year' => 2025,
                'area_sqm' => '95 m²',
                'overview' => '3D exterior render showing how a proposed glass rear extension integrates with a traditional brick villa.',
                'concept_design' => 'Helped homeowners explore daylight penetration and zinc roof finishes before starting build.',
                'sustainability_specs' => '3D Exterior Render • Material Options • Visualisation',
                'hero_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Project Classification' => 'CLIENT PROJECT',
                    'Scope of Work' => '3D Exterior Render • Daylight Study • Visualisation',
                ],
                'featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(['slug' => $proj['slug']], $proj);
        }
    }
}
