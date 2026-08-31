<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // Residential, Commercial, Academic, Floor Planning, Urban Design
            $table->string('subtitle')->nullable();
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->integer('year')->nullable();
            $table->string('area_sqm')->nullable();
            $table->text('overview');
            $table->text('concept_design')->nullable();
            $table->text('sustainability_specs')->nullable();
            $table->string('hero_image');
            $table->string('blueprint_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->json('specifications')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
