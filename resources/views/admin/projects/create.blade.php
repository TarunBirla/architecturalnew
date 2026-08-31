@extends('admin.layout')

@section('title', 'Add New Project | Admin Panel')

@section('content')

<div class="max-w-4xl space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Add New Architectural Project</h1>
            <p class="text-xs text-gray-400 mt-1">Enter project overview, hero image URL, blueprint image URL, and specs.</p>
        </div>
        <a href="{{ route('admin.projects') }}" class="text-xs text-gray-400 hover:text-white">&larr; Back to Projects</a>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" class="bg-brand-card p-8 rounded-2xl border border-brand-border space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Project Title *</label>
                <input type="text" name="title" required placeholder="e.g. Modern Glass Pavilion"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                    <option value="Residential">Residential</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Academic & Research">Academic & Research</option>
                    <option value="Floor Planning">Floor Planning</option>
                    <option value="Urban Design">Urban Design</option>
                </select>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Subtitle / Tagline</label>
            <input type="text" name="subtitle" placeholder="e.g. Parametric Timber Structure & Daylight Optimization"
                   class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Client</label>
                <input type="text" name="client" placeholder="e.g. Private Client"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Location</label>
                <input type="text" name="location" placeholder="e.g. Kensington, London"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Year & Area</label>
                <div class="flex space-x-2">
                    <input type="number" name="year" value="{{ date('Y') }}" placeholder="2026"
                           class="w-1/2 px-3 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
                    <input type="text" name="area_sqm" placeholder="680 m²"
                           class="w-1/2 px-3 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
                </div>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Project Overview Narrative *</label>
            <textarea name="overview" rows="4" required placeholder="Detailed architectural description..."
                      class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none"></textarea>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Spatial & Concept Strategy</label>
            <textarea name="concept_design" rows="3" placeholder="Structural principles, ventilation, zoning..."
                      class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none"></textarea>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Sustainability & Specs</label>
            <input type="text" name="sustainability_specs" placeholder="e.g. BREEAM Outstanding Target • Photovoltaic Integrated Glass"
                   class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2 border-t border-brand-border">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Hero Image URL *</label>
                <input type="text" name="hero_image" required placeholder="https://images.unsplash.com/..."
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Blueprint CAD Image URL</label>
                <input type="text" name="blueprint_image" placeholder="https://images.unsplash.com/..."
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono focus:border-[#C5A880] focus:outline-none">
            </div>
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="featured" value="1" id="featuredCheck" class="w-4 h-4 accent-[#C5A880]">
            <label for="featuredCheck" class="text-xs font-heading uppercase text-gray-300">Feature this project on homepage grid</label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20">
                Save & Publish Project
            </button>
        </div>

    </form>

</div>

@endsection
