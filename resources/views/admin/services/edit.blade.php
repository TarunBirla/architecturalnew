@extends('admin.layout')

@section('title', 'Edit Service: ' . $service->title . ' | Admin Panel')

@section('content')

<div class="max-w-4xl space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Edit Floor Plan Service</h1>
            <p class="text-xs text-gray-400 mt-1">Update details for {{ $service->title }}</p>
        </div>
        <a href="{{ route('admin.services') }}" class="text-xs text-gray-400 hover:text-white">&larr; Back to Services</a>
    </div>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="bg-brand-card p-8 rounded-2xl border border-brand-border space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Service Title *</label>
                <input type="text" name="title" value="{{ $service->title }}" required
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                    <option value="2D Layouts" {{ $service->category == '2D Layouts' ? 'selected' : '' }}>2D Layouts</option>
                    <option value="3D Renders" {{ $service->category == '3D Renders' ? 'selected' : '' }}>3D Renders</option>
                    <option value="Lease Plans" {{ $service->category == 'Lease Plans' ? 'selected' : '' }}>Lease Plans</option>
                    <option value="Architectural Drawings" {{ $service->category == 'Architectural Drawings' ? 'selected' : '' }}>Architectural Drawings</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Starting Price (£) *</label>
                <input type="number" step="0.01" name="starting_price" value="{{ $service->starting_price }}" required
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Turnaround Time *</label>
                <input type="text" name="turnaround_time" value="{{ $service->turnaround_time }}" required
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Icon Key *</label>
                <select name="icon" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs">
                    <option value="cube-transparent" {{ $service->icon == 'cube-transparent' ? 'selected' : '' }}>2D Ruler CAD Icon</option>
                    <option value="sparkles" {{ $service->icon == 'sparkles' ? 'selected' : '' }}>3D Cube Icon</option>
                    <option value="document-check" {{ $service->icon == 'document-check' ? 'selected' : '' }}>Lease Plan Contract Icon</option>
                    <option value="home-modern" {{ $service->icon == 'home-modern' ? 'selected' : '' }}>Building Elevation Icon</option>
                </select>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Short Summary *</label>
            <input type="text" name="short_description" value="{{ $service->short_description }}" required
                   class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Full Service Overview *</label>
            <textarea name="full_description" rows="4" required
                      class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">{{ $service->full_description }}</textarea>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Featured Image URL *</label>
            <input type="text" name="featured_image" value="{{ $service->featured_image }}" required
                   class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20">
                Update Service Details
            </button>
        </div>

    </form>

</div>

@endsection
