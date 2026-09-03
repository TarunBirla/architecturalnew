@extends('layouts.app')

@section('title', $project->title . ' | Emily Royce Architectural Design')

@section('content')

<!-- Project Hero Banner (Light & Fresh) -->
<section class="relative py-16 sm:py-24 bg-white border-b border-stone-200 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-7 space-y-4">
                <div class="inline-flex items-center space-x-2">
                    <span class="px-3.5 py-1 bg-[#141518] text-white rounded-full text-[10px] font-heading font-bold uppercase tracking-wider shadow-sm">
                        {{ $project->subtitle }}
                    </span>
                    <span class="px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#9E825A]">
                        {{ $project->category }}
                    </span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-heading font-bold text-[#141518] leading-tight">
                    {{ $project->title }}
                </h1>

                <p class="text-base sm:text-lg text-[#3A3C44] font-sans font-normal leading-relaxed">
                    {{ $project->overview }}
                </p>
            </div>

            <!-- Hero Feature Visual -->
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-stone-200 shadow-xl bg-stone-100 h-80 sm:h-96">
                    <img src="{{ $project->hero_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Project Meta Bar -->
<section class="bg-stone-50 border-b border-stone-200 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-xs">
            <div>
                <span class="text-[#626570] uppercase tracking-widest font-heading font-bold block">Classification</span>
                <span class="font-bold text-[#141518] text-sm">{{ $project->subtitle }}</span>
            </div>
            <div>
                <span class="text-[#626570] uppercase tracking-widest font-heading font-bold block">Location</span>
                <span class="font-bold text-[#141518] text-sm">{{ $project->location }}</span>
            </div>
            <div>
                <span class="text-[#626570] uppercase tracking-widest font-heading font-bold block">Year & Area</span>
                <span class="font-bold text-[#9E825A] text-sm">{{ $project->year }} &bull; {{ $project->area_sqm }}</span>
            </div>
            <div>
                <span class="text-[#626570] uppercase tracking-widest font-heading font-bold block">Emily's Scope</span>
                <span class="font-bold text-[#141518] text-sm truncate block">{{ $project->sustainability_specs }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Details & Technical Specs -->
<section class="py-16 bg-[#FBF9F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Overview & Architectural Narrative -->
            <div class="lg:col-span-7 space-y-8">
                
                <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-4">
                    <h3 class="text-2xl font-heading font-bold text-[#141518] border-b border-stone-200 pb-3">
                        Design Concept & Scope
                    </h3>
                    <p class="text-[#3A3C44] text-sm sm:text-base leading-relaxed">
                        {{ $project->overview }}
                    </p>
                    @if($project->concept_design)
                        <p class="text-[#525560] text-xs sm:text-sm leading-relaxed pt-2 border-t border-stone-100">
                            {{ $project->concept_design }}
                        </p>
                    @endif
                </div>

                <!-- Scope of Work & Specs Card -->
                @if($project->sustainability_specs)
                    <div class="bg-white p-6 rounded-3xl space-y-3 border border-stone-200 shadow-sm">
                        <div class="flex items-center space-x-3 text-[#9E825A]">
                            <i class="fa-solid fa-layer-group text-lg"></i>
                            <h4 class="font-heading font-bold text-[#141518] text-sm">Scope of Work Delivered</h4>
                        </div>
                        <p class="text-xs text-[#3A3C44] leading-relaxed font-semibold">
                            {{ $project->sustainability_specs }}
                        </p>
                    </div>
                @endif

                <!-- Blueprint / CAD Plan View -->
                @if($project->blueprint_image)
                    <div class="space-y-4 pt-2">
                        <h4 class="text-xl font-heading font-bold text-[#141518] flex items-center space-x-2">
                            <i class="fa-solid fa-ruler-combined text-[#9E825A]"></i>
                            <span>Technical 2D CAD Plan & Drawing Specs</span>
                        </h4>
                        <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 p-4 shadow-sm">
                            <img src="{{ $project->blueprint_image }}" alt="Blueprint CAD Drawing" class="w-full h-80 object-cover rounded-2xl border border-stone-200 bg-stone-50">
                            <div class="p-3 text-xs text-[#525560] font-mono flex justify-between items-center">
                                <span>Scale 1:50 / 1:100 Metric CAD Blueprint</span>
                                <span class="text-[#9E825A] font-bold"><i class="fa-solid fa-check-circle mr-1"></i> Verified Drawing</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right: Specifications Sheet Sidebar -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
                    <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3 flex items-center justify-between">
                        <span>Project Details</span>
                        <i class="fa-solid fa-sliders text-[#9E825A]"></i>
                    </h3>

                    @if($project->specifications)
                        <div class="space-y-4">
                            @foreach($project->specifications as $key => $val)
                                <div class="flex flex-col border-b border-stone-100 pb-3">
                                    <span class="text-[11px] font-heading font-bold uppercase text-[#626570] tracking-wider">{{ $key }}</span>
                                    <span class="text-sm font-semibold text-[#141518] pt-1">{{ $val }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="pt-4 space-y-3">
                        <a href="{{ route('contact') }}?project={{ urlencode($project->title) }}" class="block w-full py-4 bg-[#141518] text-white text-center font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-[#C5A880] hover:text-black transition-all shadow-md">
                            Tell Me About Your Project
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
