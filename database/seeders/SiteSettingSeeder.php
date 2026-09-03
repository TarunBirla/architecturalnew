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
            // Brand & Hero Titles
            'hero_badge_text' => 'Architecture & Design Student',
            'hero_headline' => 'EMILY ROYCE',
            'hero_subheadline' => 'Creative spatial design, precise floor plans and 3D visualisations.',

            // Hero Auto-Slider 4 Images
            'hero_image_1' => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop',
            'hero_image_2' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',
            'hero_image_3' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop',
            'hero_image_4' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop',

            // FROM PLAN TO SPACE Images
            'from_plan_2d_image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop',
            'from_plan_3d_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop',

            // HOW IT WORKS Steps
            'step_1_title' => '01 - TELL ME ABOUT YOUR PROJECT',
            'step_1_desc' => 'Tell me what you need and what you want to achieve.',
            'step_2_title' => '02 - SEND YOUR INFORMATION',
            'step_2_desc' => 'Plans, measurements, photographs or sketches.',
            'step_3_title' => '03 - DESIGN',
            'step_3_desc' => 'Your drawings or visualisation are developed around your requirements.',
            'step_4_title' => '04 - REVIEW',
            'step_4_desc' => 'You review the work and provide feedback.',
            'step_5_title' => '05 - FINAL DELIVERY',
            'step_5_desc' => 'You receive your completed drawings and files.',

            // Meet Emily Personal Story
            'about_designer_name' => 'Emily Royce',
            'about_designer_title' => 'Architecture & Design Student',
            'about_designer_image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop',
            'about_heading' => 'MEET EMILY',
            'about_bio' => "I'm Emily, an Architecture & Design student with a passion for creating thoughtful, functional and visually refined spaces.\n\nMy work combines architectural thinking, precise CAD drawing and 3D visualisation to explore how spaces can work better for the people who use them.\n\nI'm currently developing my skills through academic projects and independent design work, while building a portfolio focused on spatial planning, visualisation and contemporary design.",

            // Credibility Statements & Turnaround
            'land_registry_note' => 'Prepared in accordance with HM Land Registry requirements.',
            'turnaround_note' => 'Typical turnaround: 24–48 hours (depending on project scope and availability).',
            'tagline_short' => 'Thoughtful design. Precise drawings.',

            // Contact & Meta
            'contact_email' => 'emily@emilyroyce.com',
            'contact_phone' => '+44 7700 900000',
            'contact_location' => 'London & Cambridge Studio, UK',
            'footer_quote' => 'Thoughtful design. Precise drawings.',
        ];

        foreach ($settings as $key => $val) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $val]
            );
        }
    }
}
