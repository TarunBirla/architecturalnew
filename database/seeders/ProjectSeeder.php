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
            // ================= LUXURY HOTELS & RESORTS =================
            [
                'title' => 'The Azure Horizon Resort & Ocean Villas',
                'slug' => 'the-azure-horizon-resort-ocean-villas',
                'category' => 'Luxury Hotels & Resorts',
                'subtitle' => '5-Star Overwater Resort & Biomimicry Masterplan',
                'client' => 'Azure Global Hospitality Group',
                'location' => 'Maldives Atoll',
                'year' => 2026,
                'area_sqm' => '42,000 m²',
                'overview' => 'An ultra-luxury 5-star oceanfront resort featuring 60 overwater pavilion villas, a central bio-skylight atrium, infinity lagoon pools, and zero-carbon solar energy integration.',
                'concept_design' => 'Designed with fluid curved bamboo geometry and floating timber decks. Features submerged glass underwater dining lounges and thermal ocean-water cooling.',
                'sustainability_specs' => 'LEED Platinum Target • 100% Solar PV Canopy • Desalination Reservoir • Coral Restoration Reef',
                'hero_image' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Villas & Suites' => '60 Luxury Ocean Villas + 4 Presidential Suites',
                    'Floor Plan Type' => '3D Isometric Suite Layouts & Masterplan',
                    'Amenities' => 'Helipad, Submerged Spa, Michelin Star Lounge',
                    'Energy Rating' => 'A+ Net Zero Operational Energy',
                ],
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'The Grand Metropolitan Hotel & Sky Lounge',
                'slug' => 'the-grand-metropolitan-hotel-sky-lounge',
                'category' => 'Luxury Hotels & Resorts',
                'subtitle' => '28-Story High-Rise Luxury Hotel & Panoramic Sky Atrium',
                'client' => 'Metropolitan Hotel Development',
                'location' => 'Mayfair, London',
                'year' => 2025,
                'area_sqm' => '34,500 m²',
                'overview' => 'Full architectural design and spatial planning for a 28-story luxury boutique hotel in central London featuring 210 guest rooms, rooftop cantilevered infinity pool, and ballroom.',
                'concept_design' => 'Combines bronze curtain-wall facades with double-skin acoustic glass. The sky lounge offers 360-degree views across London skyline with integrated vertical garden walls.',
                'sustainability_specs' => 'BREEAM Outstanding • Rainwater Harvesting • Smart Climate Automation',
                'hero_image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Rooms & Suites' => '210 Luxury Rooms + 24 Penthouse Suites',
                    'Height' => '120 Metres / 28 Floors',
                    'Compliance' => 'RICS & London Building Control Compliant',
                    'Materials' => 'Fluted Bronze, Calacatta Marble, Triple Low-E Glass',
                ],
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'The Kyoto Imperial Eco-Resort & Spa',
                'slug' => 'the-kyoto-imperial-eco-resort-spa',
                'category' => 'Luxury Hotels & Resorts',
                'subtitle' => 'Timber Pavilion Architecture & Japanese Zen Gardens',
                'client' => 'Imperial Heritage Hotels',
                'location' => 'Kyoto, Japan',
                'year' => 2026,
                'area_sqm' => '18,200 m²',
                'overview' => 'A serene luxury wellness resort harmonizing traditional Sukiya-style timber joinery with contemporary glass pavilions, private hot spring baths, and tea ceremony gardens.',
                'concept_design' => 'Interlocking cedar beams crafted without nails, integrated natural daylight chimneys, and indoor-outdoor sliding shoji screen walls.',
                'sustainability_specs' => '100% Locally Sourced Timber • Geothermal Onsen Heating • Biophilic Zen Courtyard',
                'hero_image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Pavilions' => '32 Private Onsen Villas',
                    'Spa Area' => '3,500 m² Hydrotherapy Complex',
                    'Floor Plans' => '2D CAD Laser Drawings & 3D Spatial VR',
                ],
                'featured' => true,
                'sort_order' => 3,
            ],

            // ================= CORPORATE OFFICES & TOWERS =================
            [
                'title' => 'The Meridian Financial Tower & Headquarters',
                'slug' => 'the-meridian-financial-tower-headquarters',
                'category' => 'Corporate Offices & Towers',
                'subtitle' => '32-Story Biophilic Workplace & Vertical Atrium',
                'client' => 'Meridian Global Holdings',
                'location' => 'City of London, UK',
                'year' => 2026,
                'area_sqm' => '52,000 m²',
                'overview' => 'A landmark 32-story corporate tower engineered for hybrid work excellence, featuring spiral vertical garden terraces, double-height auditorium, and floor-by-floor BIM layout.',
                'concept_design' => 'Parametric solar exoskeleton that reduces HVAC cooling load by 40% while providing column-free open office layouts and executive boardroom suites.',
                'sustainability_specs' => 'WELL Gold Certified • Kinetic Elevators • Triple Double-Skin Thermal Facade',
                'hero_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Capacity' => '4,500 Workstations',
                    'Height' => '145 Metres / 32 Floors',
                    'Floor Plans' => '3D Rendered Floor Plans & Fire Evacuation Layouts',
                    'Rating' => 'LEED Platinum',
                ],
                'featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Silicon Square Innovation Hub & Tech Campus',
                'slug' => 'silicon-square-innovation-hub-tech-campus',
                'category' => 'Corporate Offices & Towers',
                'subtitle' => 'Zero-Carbon Tech Headquarters & Research Pavilion',
                'client' => 'Cambridge Science Syndicate',
                'location' => 'Cambridge, UK',
                'year' => 2025,
                'area_sqm' => '24,000 m²',
                'overview' => 'A futuristic 4-building corporate research campus incorporating cross-laminated timber roof canopies, robotics testing labs, and collaborative open-plan zones.',
                'concept_design' => 'Central glass domed atrium serving as a social heart and natural air recirculation chimney for the entire corporate campus.',
                'sustainability_specs' => 'BREEAM Outstanding • Photovoltaic Canopy • Green Roof Terrace & EV Charging Matrix',
                'hero_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Buildings' => '4 Interconnected Blocks',
                    'Lab & Office Area' => '24,000 m²',
                    'Compliance' => 'RICS IPMS3 Office Standards',
                ],
                'featured' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Apex Helix Commercial Tower',
                'slug' => 'apex-helix-commercial-tower',
                'category' => 'Corporate Offices & Towers',
                'subtitle' => 'High-Performance Financial HQ & Sky Gardens',
                'client' => 'Apex Real Estate Fund',
                'location' => 'Frankfurt, Germany',
                'year' => 2026,
                'area_sqm' => '38,000 m²',
                'overview' => 'A sleek twisting glass tower featuring spiraling indoor botanical gardens, high-speed smart elevators, and flexible multi-tenant office floors.',
                'concept_design' => 'Dynamic twisting floorplates providing self-shading against harsh afternoon sunlight while maximizing daylight penetration.',
                'sustainability_specs' => 'DGNB Platinum • Geothermal Foundation Piles • Smart IoT Building Control',
                'hero_image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b3?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Height' => '130 Metres',
                    'Workstations' => '3,200 Capacity',
                    'Lease Plans' => 'Commercial Lease Plans for Land Registration',
                ],
                'featured' => false,
                'sort_order' => 6,
            ],

            // ================= LUXURY ESTATES & HOUSE REDESIGN =================
            [
                'title' => 'Kensington Grand Mansion Estate & Rest-Design',
                'slug' => 'kensington-grand-mansion-estate-rest-design',
                'category' => 'Luxury Estates & House Redesign',
                'subtitle' => 'Full Architectural Rest-Design & 3-Tier Residence Plan',
                'client' => 'Private Client Estate',
                'location' => 'Kensington, London',
                'year' => 2025,
                'area_sqm' => '1,250 m²',
                'overview' => 'Complete architectural restructuring and interior rest-design of an 8-bedroom historic Victorian mansion into a modern luxury estate with subterranean spa and car gallery.',
                'concept_design' => 'Harmonizing historic brick facade preservation with modern rear glass extensions, floating micro-cement staircases, and subterranean daylight wells.',
                'sustainability_specs' => 'Sub-floor Geothermal Heating • Hidden Acoustic Walls • Green Roof Pool Terrace',
                'hero_image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Suites' => '8 Luxury En-suite Bedrooms + 2 Staff Apartments',
                    'Floor Plans' => 'HM Land Registry Compliant Lease Plans & 3D Walkthrough',
                    'Materials' => 'Travertine Stone, Brushed Brass, Fluted Glass',
                ],
                'featured' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'The Glass Pavilion & Cliffside Estate',
                'slug' => 'the-glass-pavilion-cliffside-estate',
                'category' => 'Luxury Estates & House Redesign',
                'subtitle' => 'Cantilevered Luxury Villa & Masterplan',
                'client' => 'Private Estate Trust',
                'location' => 'Cote d\'Azur, France',
                'year' => 2026,
                'area_sqm' => '980 m²',
                'overview' => 'A dramatic cliffside luxury estate featuring cantilevered infinity pools, full-height motorized glass walls, and subterranean wine cellar.',
                'concept_design' => 'Floating concrete slabs anchored into limestone cliffs with panoramic Mediterranean sea views and integrated solar roof glass.',
                'sustainability_specs' => 'Passive House Certified • Rainwater Harvesting • Solar Battery Array',
                'hero_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Bedrooms' => '6 Suite Villas',
                    'Outdoor Area' => '2,200 m² Landscaped Terraces',
                    'Floor Plans' => '2D CAD Blueprints & 3D VR Renders',
                ],
                'featured' => true,
                'sort_order' => 8,
            ],
            [
                'title' => 'Belgravia Historic Manor Re-Development',
                'slug' => 'belgravia-historic-manor-re-development',
                'category' => 'Luxury Estates & House Redesign',
                'subtitle' => 'Grade II Listed Manor House Rest-Design & Lease Plan',
                'client' => 'Belgravia Properties',
                'location' => 'Belgravia, London',
                'year' => 2025,
                'area_sqm' => '850 m²',
                'overview' => 'Substantial restoration and spatial reconfiguration of a Grade II listed Regency manor house, creating 4 multi-story luxury apartments and private courtyard.',
                'concept_design' => 'Restoration of ornate stucco moldings integrated with hidden state-of-the-art HVAC, elevator shaft insertion, and acoustic floor dampening.',
                'sustainability_specs' => 'Restored Double Sash Windows with Thermal Vacuum Glass • Heritage Heat Pumps',
                'hero_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'blueprint_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
                'specifications' => [
                    'Units' => '4 Luxury Apartments',
                    'Compliance' => 'HM Land Registry Practice Guide 40 Lease Plans',
                    'Measurement' => '3D LiDAR Laser Scan',
                ],
                'featured' => false,
                'sort_order' => 9,
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(['slug' => $proj['slug']], $proj);
        }
    }
}
