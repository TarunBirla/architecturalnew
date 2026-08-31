@extends('layouts.app')

@section('title', $project->title . ' | Architectural Case Study')

@section('content')

<!-- Project Hero Banner -->
<section class="relative h-[65vh] flex items-end overflow-hidden">
    <img src="{{ $project->hero_image }}" alt="{{ $project->title }}" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0E] via-[#0D0D0E]/60 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 w-full">
        <div class="space-y-4 max-w-3xl">
            <span class="px-3 py-1 bg-[#C5A880]/20 text-[#C5A880] border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest">
                {{ $project->category }}
            </span>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-heading font-bold text-white leading-tight">
                {{ $project->title }}
            </h1>
            <p class="text-lg text-gray-300 font-sans font-light">
                {{ $project->subtitle }}
            </p>
        </div>
    </div>
</section>

<!-- Project Meta Bar -->
<section class="bg-[#111215] border-y border-white/5 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-xs">
            <div>
                <span class="text-gray-500 uppercase tracking-widest font-heading block">Client / Guild</span>
                <span class="font-semibold text-white text-sm">{{ $project->client ?? 'Private Client' }}</span>
            </div>
            <div>
                <span class="text-gray-500 uppercase tracking-widest font-heading block">Location</span>
                <span class="font-semibold text-white text-sm">{{ $project->location }}</span>
            </div>
            <div>
                <span class="text-gray-500 uppercase tracking-widest font-heading block">Year & Area</span>
                <span class="font-semibold text-[#C5A880] text-sm">{{ $project->year }} &bull; {{ $project->area_sqm }}</span>
            </div>
            <div>
                <span class="text-gray-500 uppercase tracking-widest font-heading block">Lead Designer</span>
                <span class="font-semibold text-white text-sm">Emily Royce</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Details & Technical Specs -->
<section class="py-16 bg-[#0D0D0E]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Overview & Architectural Narrative -->
            <div class="lg:col-span-7 space-y-8">
                <div class="space-y-4">
                    <h3 class="text-2xl font-heading font-bold text-white border-b border-white/10 pb-3">
                        Architectural Concept & Brief
                    </h3>
                    <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                        {{ $project->overview }}
                    </p>
                </div>

                @if($project->concept_design)
                    <div class="space-y-4">
                        <h4 class="text-xl font-heading font-bold text-[#C5A880]">Spatial & Structural Strategy</h4>
                        <p class="text-gray-300 text-sm leading-relaxed">
                            {{ $project->concept_design }}
                        </p>
                    </div>
                @endif

                @if($project->sustainability_specs)
                    <div class="glass-card p-6 rounded-2xl space-y-3 border border-[#C5A880]/20">
                        <div class="flex items-center space-x-3 text-[#C5A880]">
                            <i class="fa-solid fa-seedling text-lg"></i>
                            <h4 class="font-heading font-bold text-white text-sm">Sustainability & Environmental Performance</h4>
                        </div>
                        <p class="text-xs text-gray-300 leading-relaxed">
                            {{ $project->sustainability_specs }}
                        </p>
                    </div>
                @endif

                <!-- Blueprint / CAD Plan View -->
                @if($project->blueprint_image)
                    <div class="space-y-4 pt-4">
                        <h4 class="text-xl font-heading font-bold text-white flex items-center space-x-2">
                            <i class="fa-solid fa-ruler-combined text-[#C5A880]"></i>
                            <span>Floor Plan Drawing & CAD Specs</span>
                        </h4>
                        <div class="glass-card rounded-2xl overflow-hidden border border-white/10 p-3">
                            <img src="{{ $project->blueprint_image }}" alt="Blueprint CAD Drawing" class="w-full h-80 object-cover rounded-xl">
                            <div class="p-3 text-xs text-gray-400 font-mono flex justify-between items-center">
                                <span>Scale 1:100 @ A1 &bull; RICS IPMS3 Compliant</span>
                                <span class="text-[#C5A880]"><i class="fa-solid fa-check-circle mr-1"></i> Verified Layout</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right: Specifications Sheet Sidebar -->
            <div class="lg:col-span-5 space-y-6">
                <div class="glass-card p-6 rounded-2xl border border-white/10 space-y-6">
                    <h3 class="text-lg font-heading font-bold text-white border-b border-white/10 pb-3 flex items-center justify-between">
                        <span>Technical Specs</span>
                        <i class="fa-solid fa-sliders text-[#C5A880]"></i>
                    </h3>

                    @if($project->specifications)
                        <div class="space-y-4">
                            @foreach($project->specifications as $key => $val)
                                <div class="flex flex-col border-b border-white/5 pb-3">
                                    <span class="text-[11px] font-heading uppercase text-gray-500 tracking-wider">{{ $key }}</span>
                                    <span class="text-sm font-medium text-white pt-1">{{ $val }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="pt-4 space-y-3">
                        <a href="{{ route('contact') }}?project={{ urlencode($project->title) }}" class="block w-full py-3 bg-[#C5A880] text-black text-center font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-all shadow-lg shadow-[#C5A880]/20">
                            Commission Similar Project
                        </a>
                    </div>
                </div>

                <!-- Gallery Images -->
                @if($project->gallery_images)
                    <div class="space-y-3">
                        <h4 class="text-xs font-heading uppercase tracking-widest text-gray-400">Project Gallery</h4>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($project->gallery_images as $img)
                                <img src="{{ $img }}" alt="Gallery shot" class="w-full h-28 object-cover rounded-xl border border-white/10 hover:border-[#C5A880] transition-colors cursor-pointer">
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>

@endsection
