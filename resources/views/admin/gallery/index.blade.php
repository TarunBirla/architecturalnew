@extends('admin.layout')

@section('title', 'Manage Photo Gallery | Admin Panel')

@section('content')

<div class="space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Manage Architectural Photo Gallery</h1>
            <p class="text-xs text-gray-400 mt-1">Upload high-resolution photos directly from your device to show across homepage gallery & /gallery page.</p>
        </div>
    </div>

    <!-- Upload New Photo Card -->
    <div class="bg-brand-card p-6 sm:p-8 rounded-2xl border border-brand-border space-y-6">
        <h3 class="text-lg font-heading font-bold text-[#C5A880] border-b border-brand-border pb-3 flex items-center space-x-2">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <span>Upload New Photo to Gallery</span>
        </h3>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Photo Title *</label>
                    <input type="text" name="title" required placeholder="e.g. Overwater Villa Lagoon Atrium"
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
                </div>

                <!-- Category -->
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Category *</label>
                    <select name="category" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Caption -->
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Short Caption / Description</label>
                    <input type="text" name="caption" placeholder="e.g. 5-Star Oceanfront Villa Pavilion & Bio-Lagoon Lounge"
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs">
                </div>

                <!-- Aspect Ratio -->
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Masonry Card Display Height *</label>
                    <select name="aspect_ratio" required class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs">
                        <option value="tall">Tall / Vertical (Portrait format)</option>
                        <option value="wide">Wide / Landscape (Horizontal format)</option>
                        <option value="square">Medium / Square format</option>
                    </select>
                </div>
            </div>

            <!-- Upload File or URL -->
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 space-y-3">
                <label class="text-xs font-heading uppercase text-[#C5A880] font-bold block">Photo File Input</label>
                <div class="space-y-2">
                    <label class="text-[11px] text-gray-300 block">Choose Photo File from Computer / Device:</label>
                    <input type="file" name="image_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
                </div>
                <div>
                    <label class="text-[11px] text-gray-400 block">Or Paste Photo Image URL:</label>
                    <input type="text" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
                </div>
            </div>

            <button type="submit" class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-plus"></i>
                <span>Upload & Publish Photo to Gallery</span>
            </button>
        </form>
    </div>

    <!-- Active Gallery Photos Table -->
    <div class="bg-brand-card rounded-2xl border border-brand-border p-6 space-y-4">
        <h3 class="font-heading font-bold text-lg text-white">Uploaded Gallery Photos ({{ count($galleries) }})</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($galleries as $photo)
                <div class="bg-black/50 p-3 rounded-xl border border-brand-border flex flex-col justify-between space-y-3">
                    <div class="space-y-2">
                        <div class="relative h-36 overflow-hidden rounded-lg border border-brand-border">
                            <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}" class="w-full h-full object-cover">
                            <span class="absolute top-2 left-2 px-2 py-0.5 bg-black/70 rounded text-[9px] font-bold text-[#C5A880]">
                                {{ $photo->aspect_ratio }}
                            </span>
                        </div>
                        <h4 class="font-heading font-bold text-white text-xs line-clamp-1">{{ $photo->title }}</h4>
                        <p class="text-[10px] text-gray-400 line-clamp-1">{{ $photo->category }}</p>
                    </div>

                    <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Remove photo from gallery?');">
                        @csrf
                        <button type="submit" class="w-full py-1.5 bg-red-500/20 hover:bg-red-500 text-red-400 hover:text-white rounded text-[10px] font-bold transition-colors">
                            <i class="fa-solid fa-trash mr-1"></i> Remove Photo
                        </button>
                    </form>
                </div>
            @empty
                <div class="col-span-4 text-center py-8 text-gray-500 text-xs">
                    No gallery photos uploaded yet.
                </div>
            @endforelse
        </div>
    </div>

</div>

@endsection
