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
