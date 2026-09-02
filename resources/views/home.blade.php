@extends('layouts.app')

@section('title', 'Emily Royce | Architectural Design & Visualisation')

@section('content')

<!-- ================= 1. HERO SECTION (HONEST, PROFESSIONAL & PERSONAL) ================= -->
<section class="relative min-h-[80vh] flex items-center justify-center bg-blueprint py-16 sm:py-24 border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <!-- Left Column: Honest Positioning -->
            <div class="lg:col-span-6 space-y-6 text-left">
                <div class="inline-flex items-center space-x-2 px-4 py-1.5 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#C5A880] animate-ping"></span>
                    <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                        Architecture & Design Student
                    </span>
                </div>

                <div class="space-y-2">
                    <h1 class="text-4xl sm:text-6xl font-heading font-bold text-[#141518] tracking-tight">
                        EMILY ROYCE
                    </h1>
                    <p class="text-lg sm:text-xl font-heading font-bold text-[#9E825A] uppercase tracking-wider">
                        Architectural Design & Visualisation
                    </p>
                </div>

                <p class="text-base sm:text-lg text-[#3A3C44] font-sans leading-relaxed">
                    Creative spatial design, precise floor plans and 3D visualisations.
                </p>

                <div class="pt-2 flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-4 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider transition-all duration-300 shadow-xl flex items-center justify-center space-x-3 rounded-xl">
                        <span>Tell Me About Your Project</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="#services" class="w-full sm:w-auto px-8 py-4 bg-white border border-stone-300 hover:border-[#C5A880] text-[#141518] hover:text-[#9E825A] font-heading font-bold text-xs uppercase tracking-wider transition-all duration-300 shadow-sm flex items-center justify-center space-x-2 rounded-xl">
                        <span>View Services & Rates</span>
                    </a>
                </div>

                <!-- Credibility Note -->
                <div class="pt-6 border-t border-stone-200 flex items-center space-x-6 text-xs text-[#626570]">
                    <span><i class="fa-solid fa-clock text-[#9E825A] mr-1"></i> Typical turnaround: 24–48 hours</span>
                    <span><i class="fa-solid fa-check text-[#9E825A] mr-1"></i> HM Land Registry compliant</span>
                </div>
            </div>

            <!-- Right Column: Featured Visual -->
            <div class="lg:col-span-6 relative">
                <div class="bg-white rounded-3xl p-4 border border-stone-200 shadow-xl overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop" 
                         alt="Emily Royce Spatial Visualisation" 
                         class="w-full h-[360px] sm:h-[420px] object-cover rounded-2xl">
                    <div class="pt-3 px-2 flex items-center justify-between text-xs text-[#525560] font-mono">
                        <span>3D Visualisation & Spatial Concept</span>
                        <span class="text-[#9E825A] font-bold">Emily Royce Studio</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= 2. THE 3 CORE QUESTIONS (IMMEDIATE CLARITY) ================= -->
<section class="py-16 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-2">
                <div class="text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">What does Emily do?</div>
                <h3 class="text-base font-heading font-bold text-[#141518]">2D Floor Plans • 3D Visualisations</h3>
                <p class="text-xs text-[#525560] leading-relaxed">Spatial planning, CAD drawings, lease plans and photorealistic 3D room concepts.</p>
            </div>

            <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-2">
                <div class="text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">Who is it for?</div>
                <h3 class="text-base font-heading font-bold text-[#141518]">Homeowners • Property Pros • Businesses</h3>
                <p class="text-xs text-[#525560] leading-relaxed">Tailored floor plans and visualisations for residential extensions, lease requirements, and interior reconfigurations.</p>
            </div>

            <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-2">
                <div class="text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">Why Emily?</div>
                <h3 class="text-base font-heading font-bold text-[#141518]">Thoughtful Design. Precise Drawings.</h3>
                <p class="text-xs text-[#525560] leading-relaxed">Combining architectural thinking with clear communication and affordable starting rates.</p>
            </div>

        </div>
    </div>
</section>

<!-- ================= 3. FEATURED SKILL: FROM PLAN TO SPACE (2D → 3D INTERACTIVE) ================= -->
<section id="from-plan-to-space" class="py-24 bg-[#FBF9F5] border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-12">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Skill Showcase
            </div>
            <h2 class="text-3xl sm:text-5xl font-heading font-bold text-[#141518]">
                FROM PLAN <span class="gold-gradient-text">TO SPACE</span>
            </h2>
            <p class="text-[#525560] text-sm sm:text-base">
                See how a technical 2D floor plan becomes a 3D spatial concept.
            </p>
        </div>

        <!-- Interactive Split Slider Widget -->
        <div x-data="{ 
                mode: 'compare', 
                sliderPos: 50,
                isDragging: false,
                updatePos(e) {
                    let rect = $refs.container.getBoundingClientRect();
                    let pageX = e.touches ? e.touches[0].pageX : e.pageX;
                    let x = pageX - rect.left;
                    this.sliderPos = Math.max(0, Math.min(100, (x / rect.width) * 100));
                }
             }" 
             class="max-w-5xl mx-auto bg-white rounded-3xl p-4 sm:p-6 border border-stone-200 shadow-xl space-y-4">
            
            <!-- Controls -->
            <div class="flex items-center justify-between border-b border-stone-200 pb-4 px-2">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">
                    Interactive CAD ↔ 3D Visualizer
                </span>
                
                <div class="flex items-center space-x-1.5 bg-stone-100 p-1 rounded-xl">
                    <button @click="mode = '2d'" 
                            :class="mode === '2d' ? 'bg-[#141518] text-white shadow-sm' : 'text-[#525560] hover:text-[#141518]'"
                            class="px-3.5 py-1.5 rounded-lg font-heading text-xs font-bold transition-all">
                        📐 2D CAD Plan
                    </button>
                    <button @click="mode = '3d'" 
                            :class="mode === '3d' ? 'bg-[#141518] text-white shadow-sm' : 'text-[#525560] hover:text-[#141518]'"
                            class="px-3.5 py-1.5 rounded-lg font-heading text-xs font-bold transition-all">
                        🧊 3D Visualisation
                    </button>
                    <button @click="mode = 'compare'" 
                            :class="mode === 'compare' ? 'bg-[#C5A880] text-black font-bold shadow-sm' : 'text-[#525560] hover:text-[#141518]'"
                            class="px-3.5 py-1.5 rounded-lg font-heading text-xs font-bold transition-all">
                        ↔ Split Slider
                    </button>
                </div>
            </div>

            <!-- View Canvas -->
            <div class="relative w-full h-[400px] sm:h-[500px] rounded-2xl overflow-hidden border border-stone-200 bg-stone-100">
                
                <!-- 2D ONLY -->
                <template x-if="mode === '2d'">
                    <div class="relative w-full h-full">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop" 
                             alt="Technical 2D CAD Floor Plan" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-4 py-2 rounded-lg border border-stone-300 text-xs font-heading font-bold text-[#141518] shadow-md">
                            📐 Technical 2D CAD Floor Plan
                        </div>
                    </div>
                </template>

                <!-- 3D ONLY -->
                <template x-if="mode === '3d'">
                    <div class="relative w-full h-full">
                        <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop" 
                             alt="3D Spatial Visualisation" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-[#141518]/90 backdrop-blur-md px-4 py-2 rounded-lg border border-[#C5A880]/40 text-xs font-heading font-bold text-[#C5A880] shadow-md">
                            🧊 3D Spatial Visualisation
                        </div>
                    </div>
                </template>

                <!-- SPLIT SLIDER -->
                <template x-if="mode === 'compare'">
                    <div ref="container" 
                         @mousedown="isDragging = true; updatePos($event)"
                         @mouseup="isDragging = false"
                         @mouseleave="isDragging = false"
                         @mousemove="if (isDragging) updatePos($event)"
                         @touchstart="isDragging = true; updatePos($event)"
                         @touchend="isDragging = false"
                         @touchmove="if (isDragging) updatePos($event)"
                         class="ba-slider-container relative w-full h-full cursor-ew-resize">
                        
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop" 
                             alt="2D Blueprint Floor Plan" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-lg border border-stone-300 text-xs font-heading font-bold text-[#141518] shadow-sm">
                            📐 Technical 2D CAD Plan
                        </div>

                        <div class="ba-slider-after" :style="`width: ${100 - sliderPos}%`" style="right: 0; left: auto;">
                            <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop" 
                                 alt="3D Rendered Floor Plan" 
                                 class="absolute right-0 top-0 h-full max-w-none object-cover"
                                 :style="`width: ${$refs.container ? $refs.container.clientWidth : 800}px`">
                            <div class="absolute top-4 right-4 bg-[#141518]/90 backdrop-blur-md px-3.5 py-1.5 rounded-lg border border-[#C5A880]/40 text-xs font-heading font-bold text-[#C5A880] shadow-sm">
                                🧊 3D Spatial Concept
                            </div>
                        </div>

                        <div class="absolute top-0 bottom-0 w-1 bg-[#C5A880] shadow-lg pointer-events-none" 
                             :style="`left: ${sliderPos}%`">
                            <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-10 h-10 rounded-full bg-[#141518] text-[#C5A880] flex items-center justify-center shadow-2xl border-2 border-[#C5A880] text-xs">
                                <i class="fa-solid fa-arrows-left-right"></i>
                            </div>
                        </div>
                    </div>
                </template>

            </div>

            <div class="flex items-center justify-between text-xs text-[#525560] font-mono px-2 pt-1">
                <span>← Drag left to reveal 3D Spatial Concept</span>
                <span>Drag right to inspect 2D CAD Blueprint →</span>
            </div>
        </div>

    </div>
</section>

<!-- ================= 4. 4 SIMPLE SERVICES & PRICING ================= -->
<section id="services" class="py-24 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Services & Pricing
            </div>
            <h2 class="text-3xl sm:text-5xl font-heading font-bold text-[#141518]">
                Clear Services. <span class="gold-gradient-text">Transparent Pricing.</span>
            </h2>
            <p class="text-[#525560] text-sm sm:text-base">
                Professional drawings and visualisations tailored around your requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Service 1: 2D FLOOR PLANS -->
            <div class="bg-stone-50 p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-lg">
                        📐
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#141518]">2D FLOOR PLANS</h3>
                    <div class="text-2xl font-heading font-bold text-[#9E825A]">From £85</div>
                    <p class="text-xs text-[#525560] leading-relaxed">
                        Accurate and professionally prepared CAD floor plans.
                    </p>
                </div>
                <div class="pt-6">
                    <a href="{{ route('contact') }}?service=2D Floor Plans" class="w-full py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all flex items-center justify-center space-x-2">
                        <span>Book 2D Plan</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Service 2: 3D VISUALISATIONS -->
            <div class="bg-stone-50 p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-lg">
                        🧊
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#141518]">3D VISUALISATIONS</h3>
                    <div class="text-2xl font-heading font-bold text-[#9E825A]">From £175</div>
                    <p class="text-xs text-[#525560] leading-relaxed">
                        Bring your space to life before construction begins.
                    </p>
                </div>
                <div class="pt-6">
                    <a href="{{ route('contact') }}?service=3D Visualisations" class="w-full py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all flex items-center justify-center space-x-2">
                        <span>Book 3D Visualisation</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Service 3: LEASE PLANS -->
            <div class="bg-stone-50 p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-lg">
                        📄
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#141518]">LEASE PLANS</h3>
                    <div class="text-2xl font-heading font-bold text-[#9E825A]">From £145</div>
                    <p class="text-xs text-[#525560] leading-relaxed">
                        Clear and accurate plans prepared for property requirements.
                    </p>
                </div>
                <div class="pt-6">
                    <a href="{{ route('contact') }}?service=Lease Plans" class="w-full py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all flex items-center justify-center space-x-2">
                        <span>Book Lease Plan</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Service 4: DESIGN & PLANNING DRAWINGS -->
            <div class="bg-stone-50 p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-lg">
                        🏛️
                    </div>
                    <h3 class="text-xl font-heading font-bold text-[#141518]">DESIGN & PLANNING</h3>
                    <div class="text-2xl font-heading font-bold text-[#9E825A]">From £350</div>
                    <p class="text-xs text-[#525560] leading-relaxed">
                        Tailored drawings developed around your project.
                    </p>
                </div>
                <div class="pt-6">
                    <a href="{{ route('contact') }}?service=Planning Drawings" class="w-full py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all flex items-center justify-center space-x-2">
                        <span>Book Planning Drawings</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Credibility Footer Banner -->
        <div class="mt-12 p-6 bg-stone-100 rounded-2xl border border-stone-200 flex flex-col sm:flex-row items-center justify-between text-xs text-[#525560] gap-4">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-shield-halved text-base text-[#9E825A]"></i>
                <span class="font-semibold text-[#141518]">Prepared in accordance with HM Land Registry requirements.</span>
            </div>
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-clock text-base text-[#9E825A]"></i>
                <span>Typical turnaround: 24–48 hours (depending on project scope and availability).</span>
            </div>
        </div>

    </div>
</section>

<!-- ================= 5. HONEST PORTFOLIO: ARCHITECTURAL CONCEPTS & DESIGN STUDIES ================= -->
<section id="projects" class="py-24 bg-[#FBF9F5] border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-3">
                <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                    Portfolio Showcase
                </div>
                <h2 class="text-3xl sm:text-5xl font-heading font-bold text-[#141518]">
                    ARCHITECTURAL CONCEPTS & <span class="gold-gradient-text">DESIGN STUDIES</span>
                </h2>
            </div>
            <a href="{{ route('projects.index') }}" class="mt-4 md:mt-0 text-sm font-heading font-bold uppercase tracking-wider text-[#141518] hover:text-[#9E825A] transition-colors flex items-center space-x-2">
                <span>View Full Catalog</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Filtered Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($allProjects->take(6) as $project)
                <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] group flex flex-col justify-between transition-all duration-500 hover:-translate-y-2">
                    <div>
                        <!-- Project Hero Image -->
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
            @endforeach
        </div>

    </div>
</section>

<!-- ================= 6. HOW IT WORKS (SIMPLE CLIENT JOURNEY) ================= -->
<section class="py-24 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Simple Client Process
            </div>
            <h2 class="text-3xl sm:text-5xl font-heading font-bold text-[#141518]">
                HOW IT <span class="gold-gradient-text">WORKS</span>
            </h2>
            <p class="text-[#525560] text-sm sm:text-base">
                Getting started with your drawings or visualisation is simple and clear.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            
            <div class="p-6 bg-stone-50 rounded-2xl border border-stone-200 space-y-3 relative">
                <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-sm">01</div>
                <h4 class="font-heading font-bold text-sm text-[#141518]">TELL ME ABOUT YOUR PROJECT</h4>
                <p class="text-xs text-[#525560] leading-relaxed">Tell me what you need and what you want to achieve.</p>
            </div>

            <div class="p-6 bg-stone-50 rounded-2xl border border-stone-200 space-y-3 relative">
                <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-sm">02</div>
                <h4 class="font-heading font-bold text-sm text-[#141518]">SEND YOUR INFORMATION</h4>
                <p class="text-xs text-[#525560] leading-relaxed">Plans, measurements, photographs or sketches.</p>
            </div>

            <div class="p-6 bg-stone-50 rounded-2xl border border-stone-200 space-y-3 relative">
                <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-sm">03</div>
                <h4 class="font-heading font-bold text-sm text-[#141518]">DESIGN</h4>
                <p class="text-xs text-[#525560] leading-relaxed">Your drawings or visualisation are developed around your requirements.</p>
            </div>

            <div class="p-6 bg-stone-50 rounded-2xl border border-stone-200 space-y-3 relative">
                <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-sm">04</div>
                <h4 class="font-heading font-bold text-sm text-[#141518]">REVIEW</h4>
                <p class="text-xs text-[#525560] leading-relaxed">You review the work and provide feedback.</p>
            </div>

            <div class="p-6 bg-stone-50 rounded-2xl border border-stone-200 space-y-3 relative">
                <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-sm">05</div>
                <h4 class="font-heading font-bold text-sm text-[#141518]">FINAL DELIVERY</h4>
                <p class="text-xs text-[#525560] leading-relaxed">You receive your completed drawings and files.</p>
            </div>

        </div>

    </div>
</section>

<!-- ================= 7. MEET EMILY (PERSONAL & WARM STORY) ================= -->
<section id="about-emily" class="py-24 bg-[#FBF9F5] border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-stone-200 shadow-xl bg-white">
                    <img src="{{ \App\Models\SiteSetting::get('about_designer_image', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop') }}" 
                         alt="Emily Royce - Architecture & Design Student" 
                         class="w-full h-[480px] object-cover object-center">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                    About The Designer
                </div>

                <h2 class="text-3xl sm:text-5xl font-heading font-bold text-[#141518]">
                    MEET EMILY
                </h2>

                <div class="space-y-4 text-[#3A3C44] text-base leading-relaxed">
                    <p>
                        I'm Emily, an Architecture & Design student with a passion for creating thoughtful, functional and visually refined spaces.
                    </p>
                    <p>
                        My work combines architectural thinking, precise CAD drawing and 3D visualisation to explore how spaces can work better for the people who use them.
                    </p>
                    <p>
                        I'm currently developing my skills through academic projects and independent design work, while building a portfolio focused on spatial planning, visualisation and contemporary design.
                    </p>
                </div>

                <div class="pt-4">
                    <a href="{{ route('about') }}" class="inline-flex items-center space-x-2 text-sm font-heading font-bold uppercase tracking-wider text-[#141518] hover:text-[#9E825A] transition-colors">
                        <span>Read More About Emily</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= 8. CONTACT CTA SECTION ================= -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-6">
        <h2 class="text-3xl sm:text-5xl font-heading font-bold text-[#141518]">
            Have a project in mind? <br>
            <span class="gold-gradient-text">TELL ME ABOUT YOUR PROJECT</span>
        </h2>
        <p class="text-[#3A3C44] text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
            Whether you need a 2D CAD floor plan, a Land Registry lease plan, or a 3D visualisation, I'd love to help you bring your space to life.
        </p>
        <div class="pt-4">
            <a href="{{ route('contact') }}" class="inline-flex items-center space-x-3 px-10 py-5 bg-[#141518] text-white font-heading font-bold text-sm uppercase tracking-wider hover:bg-[#C5A880] hover:text-black transition-all shadow-xl rounded-xl">
                <span>Tell Me About Your Project</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</section>

@endsection
