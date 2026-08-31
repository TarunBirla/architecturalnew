@extends('admin.layout')

@section('title', 'Add Floor Plan Service | Admin Panel')

@section('content')

<div class="max-w-4xl space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Add New Floor Plan Service</h1>
            <p class="text-xs text-gray-400 mt-1">Configure service category, starting fee, turnaround time, image, and features.</p>
        </div>
        <a href="{{ route('admin.services') }}" class="text-xs text-gray-400 hover:text-white">&larr; Back to Services</a>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="bg-brand-card p-8 rounded-2xl border border-brand-border space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Service Title *</label>
                <input type="text" name="title" required placeholder="e.g. 2D Architectural CAD Floor Plans"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Category *</label>
                <select name="category" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                    <option value="2D Layouts">2D Layouts</option>
                    <option value="3D Renders">3D Renders</option>
                    <option value="Lease Plans">Lease Plans</option>
                    <option value="Architectural Drawings">Architectural Drawings</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Starting Price (£) *</label>
                <input type="number" step="0.01" name="starting_price" required placeholder="85.00"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Turnaround Time *</label>
                <input type="text" name="turnaround_time" required placeholder="24 - 48 Hours"
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Icon Key *</label>
                <select name="icon" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs">
                    <option value="cube-transparent">2D Ruler CAD Icon</option>
                    <option value="sparkles">3D Cube Icon</option>
                    <option value="document-check">Lease Plan Contract Icon</option>
                    <option value="home-modern">Building Elevation Icon</option>
                </select>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Short Summary *</label>
            <input type="text" name="short_description" required placeholder="High-precision 2D floor plans laser-measured..."
                   class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs">
        </div>

        <div class="space-y-2">
            <label class="text-xs font-heading uppercase text-gray-300">Full Service Overview *</label>
            <textarea name="full_description" rows="4" required placeholder="Accurate 2D CAD floor plans drawn to scale according to RICS standards..."
                      class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none"></textarea>
        </div>

        <!-- Featured Service Image Upload -->
        <div class="p-4 bg-black/40 rounded-xl border border-white/5 space-y-3">
            <label class="text-xs font-heading uppercase text-[#C5A880] font-bold block">Featured Service Photo</label>
            <div class="space-y-2">
                <label class="text-[11px] text-gray-300 block">Choose Photo File from Device:</label>
                <input type="file" name="featured_image_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
            </div>
            <div>
                <label class="text-[11px] text-gray-400 block">Or Paste Image URL:</label>
                <input type="text" name="featured_image" placeholder="https://images.unsplash.com/..." class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span>Upload Photo & Save Service</span>
            </button>
        </div>

    </form>

</div>

@endsection
