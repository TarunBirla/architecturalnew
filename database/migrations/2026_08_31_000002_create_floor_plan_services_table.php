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
        Schema::create('floor_plan_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // 2D CAD, 3D Render, Lease Plan, EPC, Planning Permission
            $table->string('short_description');
            $table->text('full_description');
            $table->string('turnaround_time');
            $table->decimal('starting_price', 8, 2);
            $table->string('icon');
            $table->string('featured_image')->nullable();
            $table->json('included_features')->nullable();
            $table->boolean('featured')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floor_plan_services');
    }
};
