<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Luxury Hotels & Resorts', 'sort_order' => 1],
            ['name' => 'Corporate Offices & Towers', 'sort_order' => 2],
            ['name' => 'Luxury Estates & House Redesign', 'sort_order' => 3],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['name' => $cat['name']],
                [
                    'slug' => Str::slug($cat['name']),
                    'sort_order' => $cat['sort_order'],
                ]
            );
        }
    }
}
