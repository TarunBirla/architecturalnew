@extends('admin.layout')

@section('title', 'Edit Project | Studio CMS')

@section('content')

<div class="max-w-4xl space-y-8">

    <div class="flex items-center justify-between bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">CMS Portfolio Manager</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Edit Project: {{ $project->title }}</h1>
            <p class="text-xs text-[#525560] mt-1">Update hero cover photo, CAD drawings, overview narrative, and project details.</p>
        </div>
        <a href="{{ route('admin.projects') }}" class="text-xs text-[#525560] hover:text-[#9E825A] font-bold">&larr; Back to Projects</a>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Project Title *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Category *</label>
                <select name="category" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->name }}" {{ $project->category == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Project Badge / Classification *</label>
                <select name="subtitle" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                    <option value="ACADEMIC PROJECT" {{ $project->subtitle == 'ACADEMIC PROJECT' ? 'selected' : '' }}>ACADEMIC PROJECT (University Coursework)</option>
                    <option value="PERSONAL CONCEPT PROJECT" {{ $project->subtitle == 'PERSONAL CONCEPT PROJECT' ? 'selected' : '' }}>PERSONAL CONCEPT PROJECT (Independent Design)</option>
                    <option value="CLIENT PROJECT" {{ $project->subtitle == 'CLIENT PROJECT' ? 'selected' : '' }}>CLIENT PROJECT (Real Client Floor Plan / Visual)</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Location</label>
                <input type="text" name="location" value="{{ old('location', $project->location) }}"
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Year & Area</label>
                <div class="flex space-x-2">
                    <input type="number" name="year" value="{{ old('year', $project->year) }}"
                           class="w-1/2 px-3 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-mono font-semibold">
                    <input type="text" name="area_sqm" value="{{ old('area_sqm', $project->area_sqm) }}"
                           class="w-1/2 px-3 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-mono font-semibold">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Emily's Scope of Work *</label>
                <input type="text" name="sustainability_specs" value="{{ old('sustainability_specs', $project->sustainability_specs) }}"
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Project Overview Narrative *</label>
            <textarea name="overview" rows="4" required
                      class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">{{ old('overview', $project->overview) }}</textarea>
        </div>

        <!-- File Upload Section -->
        <div class="space-y-6 pt-4 border-t border-stone-200">
            <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                <label class="text-xs font-heading font-bold uppercase text-[#9E825A] block">1. Update Cover Photo</label>
                <input type="file" name="hero_image_file" accept="image/*" class="text-xs text-[#525560] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                <div>
                    <label class="text-[11px] text-[#626570] block font-semibold">Or Image URL:</label>
                    <input type="text" name="hero_image" value="{{ old('hero_image', $project->hero_image) }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                </div>
            </div>

            <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                <label class="text-xs font-heading font-bold uppercase text-[#9E825A] block">2. Update 2D CAD Blueprint Image</label>
                <input type="file" name="blueprint_image_file" accept="image/*" class="text-xs text-[#525560] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                <div>
                    <label class="text-[11px] text-[#626570] block font-semibold">Or Image URL:</label>
                    <input type="text" name="blueprint_image" value="{{ old('blueprint_image', $project->blueprint_image) }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-stone-200 flex items-center justify-between">
            <label class="flex items-center space-x-2 cursor-pointer text-xs font-bold text-[#141518]">
                <input type="checkbox" name="featured" value="1" {{ $project->featured ? 'checked' : '' }} class="w-4 h-4 rounded text-[#141518]">
                <span>Feature on Homepage Portfolio Showcase</span>
            </label>

            <button type="submit" class="px-8 py-4 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-md">
                Update Project
            </button>
        </div>

    </form>

</div>

@endsection
