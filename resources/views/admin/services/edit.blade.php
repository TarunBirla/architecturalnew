@extends('admin.layout')

@section('title', 'Edit Service | Studio CMS')

@section('content')

<div class="max-w-4xl space-y-8">

    <div class="flex items-center justify-between bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">CMS Service Manager</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Edit Service: {{ $service->title }}</h1>
            <p class="text-xs text-[#525560] mt-1">Update service category, starting fee, turnaround time, image, and description.</p>
        </div>
        <a href="{{ route('admin.services') }}" class="text-xs text-[#525560] hover:text-[#9E825A] font-bold">&larr; Back to Services</a>
    </div>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Service Title *</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Category *</label>
                <select name="category" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                    <option value="2D Layouts" {{ $service->category == '2D Layouts' ? 'selected' : '' }}>2D Layouts</option>
                    <option value="3D Renders" {{ $service->category == '3D Renders' ? 'selected' : '' }}>3D Renders</option>
                    <option value="Lease Plans" {{ $service->category == 'Lease Plans' ? 'selected' : '' }}>Lease Plans</option>
                    <option value="Architectural Drawings" {{ $service->category == 'Architectural Drawings' ? 'selected' : '' }}>Architectural Drawings</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Starting Price (£) *</label>
                <input type="number" step="0.01" name="starting_price" value="{{ old('starting_price', $service->starting_price) }}" required
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-mono font-semibold">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Turnaround Time *</label>
                <input type="text" name="turnaround_time" value="{{ old('turnaround_time', $service->turnaround_time) }}" required
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Short Summary *</label>
            <input type="text" name="short_description" value="{{ old('short_description', $service->short_description) }}" required
                   class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Full Service Overview *</label>
            <textarea name="full_description" rows="4" required
                      class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">{{ old('full_description', $service->full_description) }}</textarea>
        </div>

        <!-- Featured Service Image Upload -->
        <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
            <label class="text-xs font-heading font-bold uppercase text-[#9E825A] block">Update Service Photo</label>
            <input type="file" name="featured_image_file" accept="image/*" class="text-xs text-[#525560] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
            <div>
                <label class="text-[11px] text-[#626570] block font-semibold">Or Image URL:</label>
                <input type="text" name="featured_image" value="{{ old('featured_image', $service->featured_image) }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
            </div>
        </div>

        <div class="pt-4 border-t border-stone-200 flex items-center justify-end">
            <button type="submit" class="px-8 py-4 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-md">
                Update Service
            </button>
        </div>

    </form>

</div>

@endsection
