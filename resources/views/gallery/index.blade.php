@extends('layouts.app')

@section('title', 'Architectural Photo Gallery | Emily Royce')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-[#111215] border-b border-white/5 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                High-Resolution Visual Archive
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-white tracking-tight">
                Architectural <span class="gold-gradient-text">Photo Gallery</span>
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                Explore our visual showcase of 5-star ocean resorts, commercial workplace towers, and luxury estate rest-designs. Click any photo to view full-resolution lightbox.
            </p>
        </div>
    </div>
</section>

<!-- Gallery Showcase Section (Alpine.js Lightbox Modal) -->
<section class="py-16 bg-[#0D0D0E]" x-data="{ activeLightbox: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap items-center gap-3 mb-12 border-b border-white/10 pb-6">
            @foreach($categories as $cat)
                <a href="{{ route('gallery.index', ['category' => $cat]) }}" 
                   class="px-5 py-2.5 rounded-xl font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300 {{ ($category == $cat || (!$category && $cat == 'All')) ? 'bg-[#C5A880] text-black shadow-lg shadow-[#C5A880]/20' : 'glass-card text-gray-300 hover:text-white hover:border-[#C5A880]/40' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Dynamic Masonry Photo Grid -->
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            @forelse($galleries as $item)
                <div class="break-inside-avoid glass-card rounded-2xl overflow-hidden group cursor-pointer border border-white/10 relative transition-all duration-500 hover:-translate-y-1.5 hover:border-[#C5A880]/50"
                     @click="activeLightbox = {{ json_encode($item) }}">
                    
                    <!-- Image -->
                    <div class="relative overflow-hidden">
                        <img src="{{ $item->image_url }}" 
                             alt="{{ $item->title }}" 
                             class="w-full object-cover group-hover:scale-105 transition-transform duration-700
                                    {{ $item->aspect_ratio == 'tall' ? 'h-96' : ($item->aspect_ratio == 'wide' ? 'h-60' : 'h-72') }}">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-95 transition-opacity"></div>

                        <!-- Category Tag -->
                        <span class="absolute top-4 left-4 px-3 py-1 bg-black/70 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#C5A880] border border-[#C5A880]/30">
                            {{ $item->category }}
                        </span>

                        <!-- Zoom Icon -->
                        <div class="absolute top-4 right-4 w-9 h-9 rounded-full bg-black/60 backdrop-blur-md border border-white/20 text-[#C5A880] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fa-solid fa-expand text-xs"></i>
                        </div>

                        <!-- Caption & Details -->
                        <div class="absolute bottom-4 left-4 right-4 space-y-1">
                            <h3 class="font-heading font-bold text-white text-base group-hover:text-[#C5A880] transition-colors">
                                {{ $item->title }}
                            </h3>
                            @if($item->caption)
                                <p class="text-xs text-gray-300 font-sans line-clamp-1">
                                    {{ $item->caption }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 glass-card rounded-2xl">
                    <p class="text-gray-400 text-sm">No photo gallery entries found for this category.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Section -->
        <div class="mt-16 flex items-center justify-center">
            <div class="glass-card px-6 py-4 rounded-2xl border border-white/10">
                {{ $galleries->links() }}
            </div>
        </div>

    </div>

    <!-- FULL-SCREEN LIGHTBOX MODAL -->
    <div x-show="activeLightbox" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex items-center justify-center p-4 sm:p-8"
         @keydown.escape.window="activeLightbox = null"
         style="display: none;">
        
        <button @click="activeLightbox = null" class="absolute top-6 right-6 text-gray-400 hover:text-white text-3xl focus:outline-none z-50">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="max-w-5xl w-full glass-card rounded-3xl border border-white/10 overflow-hidden shadow-2xl space-y-4 p-4 sm:p-6"
             @click.away="activeLightbox = null">
            
            <div class="relative max-h-[75vh] overflow-hidden rounded-2xl border border-white/10">
                <img :src="activeLightbox?.image_url" :alt="activeLightbox?.title" class="w-full h-full max-h-[75vh] object-contain mx-auto bg-black">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-2 border-t border-white/10 px-2 space-y-2 sm:space-y-0">
                <div>
                    <span class="px-2.5 py-0.5 bg-[#C5A880]/20 text-[#C5A880] border border-[#C5A880]/40 rounded text-[10px] font-heading font-bold uppercase tracking-wider"
                          x-text="activeLightbox?.category"></span>
                    <h3 class="text-xl font-heading font-bold text-white mt-1" x-text="activeLightbox?.title"></h3>
                    <p class="text-xs text-gray-400" x-text="activeLightbox?.caption"></p>
                </div>
                <a href="{{ route('contact') }}" class="px-5 py-2.5 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-colors">
                    Inquire About Design
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
