@extends('layouts.app')

@section('title', 'Architectural Concepts & Design Studies | Emily Royce')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-white border-b border-stone-200 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Portfolio & Design Studies
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-[#141518] tracking-tight">
                ARCHITECTURAL CONCEPTS & <span class="gold-gradient-text">DESIGN STUDIES</span>
            </h1>
            <p class="text-[#4A4D57] text-sm sm:text-base leading-relaxed">
                A selection of academic projects, personal design studies, and client CAD floor plans by Emily Royce.
            </p>
        </div>
    </div>
</section>

<!-- Filterable Projects Section -->
<section class="py-16 bg-[#FBF9F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap items-center gap-3 mb-12 border-b border-stone-200 pb-6">
            @foreach($categories as $cat)
                <a href="{{ route('projects.index', ['category' => $cat]) }}" 
                   class="px-5 py-2.5 rounded-xl font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300 {{ ($category == $cat || (!$category && $cat == 'All')) ? 'bg-[#141518] text-white shadow-md' : 'bg-white text-[#141518] border border-stone-200 hover:border-[#C5A880]' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] group flex flex-col justify-between transition-all duration-500 hover:-translate-y-2">
                    <div>
                        <!-- Hero Image -->
                        <div class="relative h-64 overflow-hidden bg-stone-100">
                            <img src="{{ $project->hero_image }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <!-- HONEST CLASSIFICATION BADGE -->
                            <span class="absolute top-4 left-4 px-3 py-1 bg-white/95 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#141518] border border-stone-200 shadow-sm">
                                {{ $project->subtitle }}
                            </span>
                        </div>

                        <!-- Details -->
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-heading font-bold text-[#141518] group-hover:text-[#9E825A] transition-colors">
                                {{ $project->title }}
                            </h3>
                            <p class="text-xs text-[#525560] leading-relaxed">
                                {{ $project->overview }}
                            </p>

                            <!-- Explicit Scope of Work -->
                            <div class="pt-2">
                                <span class="text-[10px] font-heading font-bold uppercase text-[#9E825A] block tracking-wider">Scope of Work</span>
                                <span class="text-xs text-[#141518] font-medium block">{{ $project->sustainability_specs }}</span>
                            </div>

                            <div class="pt-3 border-t border-stone-100 flex items-center justify-between text-xs text-[#626570] font-mono">
                                <span><i class="fa-solid fa-location-dot text-[#9E825A] mr-1"></i> {{ $project->location }}</span>
                                <span>{{ $project->area_sqm }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('projects.show', $project->slug) }}" class="w-full py-3 bg-stone-100 hover:bg-[#141518] text-[#141518] hover:text-white font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-300 flex items-center justify-center space-x-2">
                            <span>View Project Details</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white border border-stone-200 rounded-2xl">
                    <p class="text-[#525560] text-sm">No projects found in this category.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Section -->
        <div class="mt-16 flex items-center justify-center">
            <div class="bg-white px-6 py-4 rounded-2xl border border-stone-200 shadow-sm">
                {{ $projects->links() }}
            </div>
        </div>

    </div>
</section>

@endsection
