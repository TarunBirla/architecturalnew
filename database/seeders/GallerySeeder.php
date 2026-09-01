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
            // Luxury Hotels & Resorts
            [
                'title' => 'Overwater Villa Lagoon Atrium',
                'category' => 'Luxury Hotels & Resorts',
                'image_url' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop',
                'caption' => '5-Star Oceanfront Villa Pavilion & Bio-Lagoon Lounge',
                'aspect_ratio' => 'tall',
                'sort_order' => 1,
            ],
            [
                'title' => 'The Mayfair Grand Sky Atrium',
                'category' => 'Luxury Hotels & Resorts',
                'image_url' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1600&auto=format&fit=crop',
                'caption' => '28-Story High-Rise Sky Bar & Panoramic City View',
                'aspect_ratio' => 'wide',
                'sort_order' => 2,
            ],
            [
                'title' => 'Kyoto Zen Garden Pavilion',
                'category' => 'Luxury Hotels & Resorts',
                'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Traditional Timber Joinery & Geothermal Onsen Spa',
                'aspect_ratio' => 'square',
                'sort_order' => 3,
            ],
            [
                'title' => 'Submerged Hydrotherapy Spa',
                'category' => 'Luxury Hotels & Resorts',
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Subterranean Stone Hydrotherapy Complex',
                'aspect_ratio' => 'tall',
                'sort_order' => 4,
            ],
            [
                'title' => 'Infinity Edge Ocean Lounge',
                'category' => 'Luxury Hotels & Resorts',
                'image_url' => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Sunset Terrace & Cantilevered Infinity Pool',
                'aspect_ratio' => 'wide',
                'sort_order' => 5,
            ],

            // Corporate Offices & Towers
            [
                'title' => 'The Meridian Financial Tower',
                'category' => 'Corporate Offices & Towers',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1600&auto=format&fit=crop',
                'caption' => '32-Story Biophilic Commercial Headquarters in London',
                'aspect_ratio' => 'tall',
                'sort_order' => 6,
            ],
            [
                'title' => 'Silicon Square Innovation Hub',
                'category' => 'Corporate Offices & Towers',
                'image_url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Open-Plan Tech Campus & Central Glass Chimney Atrium',
                'aspect_ratio' => 'wide',
                'sort_order' => 7,
            ],
            [
                'title' => 'Apex Helix Skyscraper Facade',
                'category' => 'Corporate Offices & Towers',
                'image_url' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186a5b3?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Twisting Double-Skin Glass & Parametric Solar Exoskeleton',
                'aspect_ratio' => 'square',
                'sort_order' => 8,
            ],
            [
                'title' => 'Executive Boardroom Suite',
                'category' => 'Corporate Offices & Towers',
                'image_url' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'High-Performance Executive Suite with Integrated Acoustic Walls',
                'aspect_ratio' => 'wide',
                'sort_order' => 9,
            ],
            [
                'title' => 'Biophilic Office Garden Terrace',
                'category' => 'Corporate Offices & Towers',
                'image_url' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Spiraling Vertical Garden & Employee Wellness Hub',
                'aspect_ratio' => 'tall',
                'sort_order' => 10,
            ],

            // Luxury Estates & House Redesign
            [
                'title' => 'Kensington Grand Mansion Rest-Design',
                'category' => 'Luxury Estates & House Redesign',
                'image_url' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1600&auto=format&fit=crop',
                'caption' => '8-Bedroom Estate Restoration & Rear Glass Pavilion',
                'aspect_ratio' => 'tall',
                'sort_order' => 11,
            ],
            [
                'title' => 'Cote d\'Azur Cliffside Villa',
                'category' => 'Luxury Estates & House Redesign',
                'image_url' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Cantilevered Concrete Slabs & Panoramic Ocean Terraces',
                'aspect_ratio' => 'wide',
                'sort_order' => 12,
            ],
            [
                'title' => 'Belgravia Regency Manor Interior',
                'category' => 'Luxury Estates & House Redesign',
                'image_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Grade II Listed Manor Restoration & Travertine Lounge',
                'aspect_ratio' => 'square',
                'sort_order' => 13,
            ],
            [
                'title' => 'Subterranean Car Gallery & Spa',
                'category' => 'Luxury Estates & House Redesign',
                'image_url' => 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Sub-Level Automobile Display Vault & Daylight Well',
                'aspect_ratio' => 'wide',
                'sort_order' => 14,
            ],
            [
                'title' => 'Penthouse Sky Estate Lounge',
                'category' => 'Luxury Estates & House Redesign',
                'image_url' => 'https://images.unsplash.com/photo-1600573472591-ee6b68d14c68?q=80&w=1600&auto=format&fit=crop',
                'caption' => 'Double-Height Penthouse Living Room with Fluted Glass Walls',
                'aspect_ratio' => 'tall',
                'sort_order' => 15,
            ],
        ];

        foreach ($galleryItems as $item) {
            Gallery::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
