@extends('admin.layout')

@section('title', 'Edit Project: ' . $project->title . ' | Admin Panel')

@section('content')

<div class="max-w-4xl space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Edit Architectural Project</h1>
            <p class="text-xs text-gray-400 mt-1">Update details & photos for {{ $project->title }}</p>
        </div>
        <a href="{{ route('admin.projects') }}" class="text-xs text-gray-400 hover:text-white">&larr; Back to Projects</a>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="bg-brand-card p-8 rounded-2xl border border-brand-border space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Project Title *</label>
                <input type="text" name="title" value="{{ $project->title }}" required
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                    <option value="Residential" {{ $project->category == 'Residential' ? 'selected' : '' }}>Residential</option>
                    <option value="Commercial" {{ $project->category == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                    <option value="Academic & Research" {{ $project->category == 'Academic & Research' ? 'selected' : '' }}>Academic & Research</option>
                    <option value="Floor Planning" {{ $project->category == 'Floor Planning' ? 'selected' : '' }}>Floor Planning</option>
                    <option value="Urban Design" {{ $project->category == 'Urban Design' ? 'selected' : '' }}>Urban Design</option>
                </select>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Subtitle / Tagline</label>
            <input type="text" name="subtitle" value="{{ $project->subtitle }}"
                   class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Client</label>
                <input type="text" name="client" value="{{ $project->client }}"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Location</label>
                <input type="text" name="location" value="{{ $project->location }}"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Year & Area</label>
                <div class="flex space-x-2">
                    <input type="number" name="year" value="{{ $project->year }}"
                           class="w-1/2 px-3 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
                    <input type="text" name="area_sqm" value="{{ $project->area_sqm }}"
                           class="w-1/2 px-3 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
                </div>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Project Overview Narrative *</label>
            <textarea name="overview" rows="4" required
                      class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">{{ $project->overview }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Spatial & Concept Strategy</label>
            <textarea name="concept_design" rows="3"
                      class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">{{ $project->concept_design }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Sustainability & Specs</label>
            <input type="text" name="sustainability_specs" value="{{ $project->sustainability_specs }}"
                   class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
        </div>

        <!-- File Upload Section for Hero Image & Blueprint CAD Image with Previews -->
        <div class="space-y-6 pt-4 border-t border-brand-border">
            <!-- Hero Image Upload -->
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-3">
                    <span class="text-[10px] text-gray-500 block uppercase font-heading">Active Cover Photo</span>
                    <img src="{{ $project->hero_image }}" alt="Project Hero" class="w-full h-24 object-cover rounded-lg border border-brand-border mt-1">
                </div>
                <div class="sm:col-span-9 space-y-3">
                    <div>
                        <label class="text-[11px] text-[#C5A880] font-bold block mb-1">Upload New Cover Photo from Device:</label>
                        <input type="file" name="hero_image_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
                    </div>
                    <div>
                        <label class="text-[11px] text-gray-400 block">Or Paste Image URL:</label>
                        <input type="text" name="hero_image" value="{{ $project->hero_image }}" class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
                    </div>
                </div>
            </div>

            <!-- Blueprint CAD Image Upload -->
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-3">
                    <span class="text-[10px] text-gray-500 block uppercase font-heading">Active Blueprint CAD</span>
                    @if($project->blueprint_image)
                        <img src="{{ $project->blueprint_image }}" alt="Blueprint CAD" class="w-full h-24 object-cover rounded-lg border border-brand-border mt-1">
                    @else
                        <div class="w-full h-24 bg-black/50 border border-brand-border rounded-lg flex items-center justify-center text-xs text-gray-500">No blueprint</div>
                    @endif
                </div>
                <div class="sm:col-span-9 space-y-3">
                    <div>
                        <label class="text-[11px] text-[#C5A880] font-bold block mb-1">Upload New Blueprint Photo from Device:</label>
                        <input type="file" name="blueprint_image_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
                    </div>
                    <div>
                        <label class="text-[11px] text-gray-400 block">Or Paste Blueprint Image URL:</label>
                        <input type="text" name="blueprint_image" value="{{ $project->blueprint_image }}" class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="featured" value="1" id="featuredCheck" {{ $project->featured ? 'checked' : '' }} class="w-4 h-4 accent-[#C5A880]">
            <label for="featuredCheck" class="text-xs font-heading uppercase text-gray-300">Feature this project on homepage grid</label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span>Upload Photos & Update Project</span>
            </button>
        </div>

    </form>

</div>

@endsection
