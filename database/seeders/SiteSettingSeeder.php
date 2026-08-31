<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Hero Section
            ['key' => 'hero_badge_text', 'value' => 'Design & Architecture Studio', 'group' => 'hero'],
            ['key' => 'hero_headline', 'value' => 'Precision Spatial Architecture & Floor Plans', 'group' => 'hero'],
            ['key' => 'hero_subheadline', 'value' => 'Elevating spaces through minimalist architectural concepts, 2D/3D CAD floor planning, Land Registry lease plans, and sustainable urban design. Led by Emily Royce.', 'group' => 'hero'],
            ['key' => 'hero_cta_button_text', 'value' => 'Explore 2D vs 3D Floor Plans', 'group' => 'hero'],
            ['key' => 'hero_image_1', 'value' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1800&auto=format&fit=crop', 'group' => 'hero'],
            ['key' => 'hero_image_2', 'value' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1800&auto=format&fit=crop', 'group' => 'hero'],
            ['key' => 'hero_image_3', 'value' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1800&auto=format&fit=crop', 'group' => 'hero'],

            // About Section
            ['key' => 'about_designer_name', 'value' => 'Emily Royce', 'group' => 'about'],
            ['key' => 'about_designer_title', 'value' => 'University Architecture Scholar & Consultant', 'group' => 'about'],
            ['key' => 'about_designer_image', 'value' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop', 'group' => 'about'],
            ['key' => 'about_heading', 'value' => 'Bridging Academic Excellence & Practical Architectural Innovation', 'group' => 'about'],
            ['key' => 'about_bio', 'value' => 'Currently completing advanced studies in Design & Architecture at University, Emily Royce combines rigorous structural principles with modern parametric design and high-precision spatial layout techniques.', 'group' => 'about'],
            ['key' => 'about_dept_title', 'value' => 'University Architecture Department', 'group' => 'about'],
            ['key' => 'about_dept_subtitle', 'value' => 'Focus: Sustainable Parametric Canopy & Spatial CAD Optimization', 'group' => 'about'],

            // Contact & Footer Settings
            ['key' => 'contact_email', 'value' => 'emily@emilyroyce.com', 'group' => 'contact'],
            ['key' => 'contact_relay_email', 'value' => 'phil.andreson@nexteck.uk', 'group' => 'contact'],
            ['key' => 'contact_location', 'value' => 'London & Cambridge Studio, United Kingdom', 'group' => 'contact'],
            ['key' => 'footer_quote', 'value' => '"Architecture is the learned game, correct and magnificent, of forms assembled in the light."', 'group' => 'contact'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::set($setting['key'], $setting['value'], $setting['group']);
        }
    }
}
