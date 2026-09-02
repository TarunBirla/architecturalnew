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
            ['name' => 'Academic Concepts', 'sort_order' => 1],
            ['name' => '2D Floor Plans', 'sort_order' => 2],
            ['name' => '3D Visualisations', 'sort_order' => 3],
            ['name' => 'Client Projects', 'sort_order' => 4],
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
