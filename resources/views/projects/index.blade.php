@extends('layouts.app')

@section('title', 'Architectural Projects Catalog | Emily Royce')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-[#111215] border-b border-white/5 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                Grand Architecture & Spatial Design
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-white tracking-tight">
                Architectural <span class="gold-gradient-text">Projects Catalog</span>
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                Explore our portfolio of luxury hotels & resorts, high-rise corporate office towers, and grand estate rest-designs.
            </p>
        </div>
    </div>
</section>

<!-- Filterable Projects Section -->
<section class="py-16 bg-[#0D0D0E]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap items-center gap-3 mb-12 border-b border-white/10 pb-6">
            @foreach($categories as $cat)
                <a href="{{ route('projects.index', ['category' => $cat]) }}" 
                   class="px-5 py-2.5 rounded-xl font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300 {{ ($category == $cat || (!$category && $cat == 'All')) ? 'bg-[#C5A880] text-black shadow-lg shadow-[#C5A880]/20' : 'glass-card text-gray-300 hover:text-white hover:border-[#C5A880]/40' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col justify-between transition-all duration-500 hover:-translate-y-2">
                    <div>
                        <!-- Hero Image -->
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $project->hero_image }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 px-3 py-1 bg-black/70 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#C5A880] border border-[#C5A880]/30">
                                {{ $project->category }}
                            </span>
                        </div>

                        <!-- Details -->
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-heading font-bold text-white group-hover:text-[#C5A880] transition-colors">
                                {{ $project->title }}
                            </h3>
                            <p class="text-xs text-gray-400 line-clamp-2">
                                {{ $project->overview }}
                            </p>

                            <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 font-mono">
                                <span><i class="fa-solid fa-location-dot text-[#C5A880] mr-1"></i> {{ $project->location }}</span>
                                <span>{{ $project->year }} &bull; {{ $project->area_sqm }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('projects.show', $project->slug) }}" class="w-full py-2.5 bg-white/5 hover:bg-[#C5A880] text-gray-300 hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-lg transition-all duration-300 flex items-center justify-center space-x-2">
                            <span>Explore Project Specs</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 glass-card rounded-2xl">
                    <p class="text-gray-400 text-sm">No projects found in this category.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Section -->
        <div class="mt-16 flex items-center justify-center">
            <div class="glass-card px-6 py-4 rounded-2xl border border-white/10">
                {{ $projects->links() }}
            </div>
        </div>

    </div>
</section>

@endsection
