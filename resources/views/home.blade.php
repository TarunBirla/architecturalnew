@extends('layouts.app')

@section('title', 'Emily Royce | Architectural Design & Visualisation')

@section('content')

@php
    $heroImages = array_values(array_filter([
        \App\Models\SiteSetting::get('hero_image_1', 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop'),
        \App\Models\SiteSetting::get('hero_image_2', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop'),
        \App\Models\SiteSetting::get('hero_image_3', 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop'),
        \App\Models\SiteSetting::get('hero_image_4', 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop'),
    ]));

    $fromPlan2d = \App\Models\SiteSetting::get('from_plan_2d_image', 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop');
    $fromPlan3d = \App\Models\SiteSetting::get('from_plan_3d_image', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop');
@endphp

<!-- ================= 1. HERO SECTION (WITH DYNAMIC AUTO-SLIDER CAROUSEL) ================= -->
<section class="relative min-h-[75vh] sm:min-h-[80vh] flex items-center justify-center bg-blueprint py-12  border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-12 items-center">

            <!-- Left Column: Honest Positioning -->
            <div class="lg:col-span-6 space-y-4 sm:space-y-6 text-left">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#C5A880] animate-ping"></span>
                    <span class="text-[11px] sm:text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                        {{ \App\Models\SiteSetting::get('hero_badge_text', 'Architecture & Design Student') }}
                    </span>
                </div>

                <div class="space-y-1.5 sm:space-y-2">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-heading font-bold text-[#141518] tracking-tight">
                        {{ \App\Models\SiteSetting::get('hero_headline', 'EMILY ROYCE') }}
                    </h1>
                    <p class="text-sm sm:text-lg lg:text-xl font-heading font-bold text-[#9E825A] uppercase tracking-wider">
                        Architectural Design & Visualisation
                    </p>
                </div>

                <p class="text-sm sm:text-base lg:text-lg text-[#3A3C44] font-sans leading-relaxed">
                    {{ \App\Models\SiteSetting::get('hero_subheadline', 'Creative spatial design, precise floor plans and 3D visualisations.') }}
                </p>

                <div class="pt-2 flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-4 w-full">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-6 sm:px-8 py-3.5 sm:py-4 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider transition-all duration-300 shadow-xl flex items-center justify-center space-x-3 rounded-xl">
                        <span>Tell Me About Your Project</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="#services" class="w-full sm:w-auto px-6 sm:px-8 py-3.5 sm:py-4 bg-white border border-stone-300 hover:border-[#C5A880] text-[#141518] hover:text-[#9E825A] font-heading font-bold text-xs uppercase tracking-wider transition-all duration-300 shadow-sm flex items-center justify-center space-x-2 rounded-xl">
                        <span>View Services & Rates</span>
                    </a>
                </div>

                <!-- Credibility Note -->
                <div class="pt-4 sm:pt-6 border-t border-stone-200 flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-6 text-xs text-[#626570]">
                    <span><i class="fa-solid fa-clock text-[#9E825A] mr-1"></i> {{ \App\Models\SiteSetting::get('turnaround_note', 'Typical turnaround: 24–48 hours') }}</span>
                    <span><i class="fa-solid fa-check text-[#9E825A] mr-1"></i> {{ \App\Models\SiteSetting::get('land_registry_note', 'HM Land Registry compliant') }}</span>
                </div>
            </div>

            <!-- Right Column: DYNAMIC HERO AUTO-SLIDER CAROUSEL (4 IMAGES) -->
            <div class="lg:col-span-6 relative"
                 x-data="{ 
                    activeIndex: 0, 
                    images: {{ json_encode($heroImages) }},
                    timer: null,
                    startTimer() {
                        this.timer = setInterval(() => {
                            this.activeIndex = (this.activeIndex + 1) % this.images.length;
                        }, 4000);
                    }
                 }"
                 x-init="startTimer()">
                
                <div class="bg-white rounded-3xl p-3 sm:p-4 border border-stone-200 shadow-xl overflow-hidden relative">
                    
                    <!-- Carousel Container -->
                    <div class="relative w-full h-[280px] sm:h-[380px] lg:h-[420px] rounded-2xl overflow-hidden bg-stone-100">
                        <template x-for="(img, idx) in images" :key="idx">
                            <img :src="img" 
                                 x-show="activeIndex === idx"
                                 x-transition:enter="transition ease-out duration-700"
                                 x-transition:enter-start="opacity-0 scale-105"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-500"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 alt="Emily Royce Architectural Showcase" 
                                 class="absolute inset-0 w-full h-full object-cover rounded-2xl">
                        </template>

                        <!-- Next / Prev Overlay Controls -->
                        <button @click="activeIndex = (activeIndex - 1 + images.length) % images.length" 
                                class="absolute left-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/40 hover:bg-[#141518] text-white flex items-center justify-center backdrop-blur-md transition-all text-xs z-10">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button @click="activeIndex = (activeIndex + 1) % images.length" 
                                class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-black/40 hover:bg-[#141518] text-white flex items-center justify-center backdrop-blur-md transition-all text-xs z-10">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <!-- Dots Indicator -->
                        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center space-x-1.5 z-10 bg-black/40 backdrop-blur-md px-3 py-1 rounded-full border border-white/20">
                            <template x-for="(img, idx) in images" :key="idx">
                                <button @click="activeIndex = idx" 
                                        :class="activeIndex === idx ? 'w-5 bg-[#C5A880]' : 'w-2 bg-white/60'"
                                        class="h-2 rounded-full transition-all duration-300"></button>
                            </template>
                        </div>
                    </div>

                    <div class="pt-3 px-1 flex flex-col sm:flex-row sm:items-center justify-between text-[11px] sm:text-xs text-[#525560] font-mono gap-1">
                        <span>3D Visualisation & Spatial Concept</span>
                        <span class="text-[#9E825A] font-bold">Slide <span x-text="activeIndex + 1"></span> of <span x-text="images.length"></span></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= 2. THE 3 CORE QUESTIONS (IMMEDIATE CLARITY) ================= -->
<section class="py-12 sm:py-16 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            
            <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-2">
                <div class="text-[11px] sm:text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">What does Emily do?</div>
                <h3 class="text-sm sm:text-base font-heading font-bold text-[#141518]">2D Floor Plans • 3D Visualisations</h3>
                <p class="text-xs text-[#525560] leading-relaxed">Spatial planning, CAD drawings, lease plans and photorealistic 3D room concepts.</p>
            </div>

            <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-2">
                <div class="text-[11px] sm:text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">Who is it for?</div>
                <h3 class="text-sm sm:text-base font-heading font-bold text-[#141518]">Homeowners • Property Pros • Businesses</h3>
                <p class="text-xs text-[#525560] leading-relaxed">Tailored floor plans and visualisations for residential extensions, lease requirements, and interior reconfigurations.</p>
            </div>

            <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-2">
                <div class="text-[11px] sm:text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">Why Emily?</div>
                <h3 class="text-sm sm:text-base font-heading font-bold text-[#141518]">Thoughtful Design. Precise Drawings.</h3>
                <p class="text-xs text-[#525560] leading-relaxed">Combining architectural thinking with clear communication and affordable starting rates.</p>
            </div>

        </div>
    </div>
</section>

<!-- ================= 3. FEATURED SKILL: FROM PLAN TO SPACE (ADMIN CMS MANAGED IMAGES) ================= -->
<section id="from-plan-to-space" class="py-16  bg-[#FBF9F5] border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-8 sm:mb-12">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Skill Showcase
            </div>
            <h2 class="text-2xl sm:text-4xl lg:text-5xl font-heading font-bold text-[#141518]">
                FROM PLAN <span class="gold-gradient-text">TO SPACE</span>
            </h2>
            <p class="text-[#525560] text-xs sm:text-base">
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
             class="max-w-5xl mx-auto bg-white rounded-2xl sm:rounded-3xl p-3 sm:p-6 border border-stone-200 shadow-xl space-y-3 sm:space-y-4">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-stone-200 pb-3 sm:pb-4 gap-3">
                <span class="text-[11px] sm:text-xs font-heading font-bold uppercase tracking-wider text-[#141518] text-center sm:text-left">
                    Interactive CAD ↔ 3D Visualizer
                </span>
                
                <div class="flex items-center justify-center space-x-1 bg-stone-100 p-1 rounded-xl w-full sm:w-auto">
                    <button @click="mode = '2d'" 
                            :class="mode === '2d' ? 'bg-[#141518] text-white shadow-sm' : 'text-[#525560] hover:text-[#141518]'"
                            class="px-2.5 sm:px-3.5 py-1.5 rounded-lg font-heading text-[10px] sm:text-xs font-bold transition-all flex items-center space-x-1 flex-1 sm:flex-initial justify-center">
                        <i class="fa-solid fa-ruler-combined text-[10px] sm:text-xs"></i>
                        <span>2D CAD</span>
                    </button>
                    <button @click="mode = '3d'" 
                            :class="mode === '3d' ? 'bg-[#141518] text-white shadow-sm' : 'text-[#525560] hover:text-[#141518]'"
                            class="px-2.5 sm:px-3.5 py-1.5 rounded-lg font-heading text-[10px] sm:text-xs font-bold transition-all flex items-center space-x-1 flex-1 sm:flex-initial justify-center">
                        <i class="fa-solid fa-cube text-[10px] sm:text-xs"></i>
                        <span>3D Visual</span>
                    </button>
                    <button @click="mode = 'compare'" 
                            :class="mode === 'compare' ? 'bg-[#C5A880] text-black font-bold shadow-sm' : 'text-[#525560] hover:text-[#141518]'"
                            class="px-2.5 sm:px-3.5 py-1.5 rounded-lg font-heading text-[10px] sm:text-xs font-bold transition-all flex items-center space-x-1 flex-1 sm:flex-initial justify-center">
                        <i class="fa-solid fa-sliders text-[10px] sm:text-xs"></i>
                        <span>Split Slider</span>
                    </button>
                </div>
            </div>

            <!-- View Canvas Container -->
            <div class="relative w-full h-[280px] xs:h-[340px] sm:h-[500px] rounded-xl sm:rounded-2xl overflow-hidden border border-stone-200 bg-stone-100">
                
                <!-- MODE: 2D ONLY -->
                <template x-if="mode === '2d'">
                    <div class="relative w-full h-full">
                        <img src="{{ $fromPlan2d }}" 
                             alt="Technical 2D CAD Floor Plan" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-2.5 left-2.5 sm:top-4 sm:left-4 bg-white/95 backdrop-blur-md px-2.5 py-1 sm:px-4 sm:py-2 rounded-lg border border-stone-300 text-[10px] sm:text-xs font-heading font-bold text-[#141518] shadow-md flex items-center space-x-1.5">
                            <i class="fa-solid fa-ruler-combined text-[#9E825A]"></i>
                            <span>Technical 2D CAD Plan</span>
                        </div>
                    </div>
                </template>

                <!-- MODE: 3D ONLY -->
                <template x-if="mode === '3d'">
                    <div class="relative w-full h-full">
                        <img src="{{ $fromPlan3d }}" 
                             alt="3D Spatial Visualisation" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-2.5 left-2.5 sm:top-4 sm:left-4 bg-[#141518]/90 backdrop-blur-md px-2.5 py-1 sm:px-4 sm:py-2 rounded-lg border border-[#C5A880]/40 text-[10px] sm:text-xs font-heading font-bold text-[#C5A880] shadow-md flex items-center space-x-1.5">
                            <i class="fa-solid fa-cube"></i>
                            <span>3D Spatial Concept</span>
                        </div>
                    </div>
                </template>

                <!-- MODE: SPLIT SLIDER -->
                <template x-if="mode === 'compare'">
                    <div ref="container" 
                         @mousedown="isDragging = true; updatePos($event)"
                         @mouseup="isDragging = false"
                         @mouseleave="isDragging = false"
                         @mousemove="if (isDragging) updatePos($event)"
                         @touchstart="isDragging = true; updatePos($event)"
                         @touchend="isDragging = false"
                         @touchmove="if (isDragging) updatePos($event)"
                         class="relative w-full h-full cursor-ew-resize select-none overflow-hidden touch-none">
                        
                        <!-- Base Layer: 2D Technical Blueprint -->
                        <div class="absolute inset-0 w-full h-full">
                            <img src="{{ $fromPlan2d }}" 
                                 alt="2D Blueprint Floor Plan" 
                                 class="w-full h-full object-cover">
                            <div class="absolute top-2.5 left-2.5 sm:top-4 sm:left-4 bg-white/95 backdrop-blur-md px-2.5 py-1 sm:px-3.5 sm:py-1.5 rounded-lg border border-stone-300 text-[10px] sm:text-xs font-heading font-bold text-[#141518] shadow-sm flex items-center space-x-1 z-10 max-w-[45%] truncate">
                                <i class="fa-solid fa-ruler-combined text-[#9E825A]"></i>
                                <span class="truncate">2D CAD Plan</span>
                            </div>
                        </div>

                        <!-- Top Layer: 3D Spatial Visualisation -->
                        <div class="absolute inset-0 w-full h-full pointer-events-none"
                             :style="`clip-path: polygon(${sliderPos}% 0, 100% 0, 100% 100%, ${sliderPos}% 100%)`">
                            <img src="{{ $fromPlan3d }}" 
                                 alt="3D Spatial Concept" 
                                 class="w-full h-full object-cover">
                            <div class="absolute top-2.5 right-2.5 sm:top-4 sm:right-4 bg-[#141518]/90 backdrop-blur-md px-2.5 py-1 sm:px-3.5 sm:py-1.5 rounded-lg border border-[#C5A880]/40 text-[10px] sm:text-xs font-heading font-bold text-[#C5A880] shadow-sm flex items-center space-x-1 z-10 max-w-[45%] truncate">
                                <i class="fa-solid fa-cube"></i>
                                <span class="truncate">3D Concept</span>
                            </div>
                        </div>

                        <!-- Slider Handle & Vertical Line -->
                        <div class="absolute top-0 bottom-0 w-1 bg-[#C5A880] shadow-2xl pointer-events-none z-20" 
                             :style="`left: ${sliderPos}%`">
                            <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#141518] text-[#C5A880] flex items-center justify-center shadow-2xl border-2 border-[#C5A880] text-[10px] sm:text-xs">
                                <i class="fa-solid fa-arrows-left-right"></i>
                            </div>
                        </div>

                    </div>
                </template>

            </div>

            <!-- Drag Instruction Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between text-[10px] sm:text-xs text-[#525560] font-mono px-1 sm:px-2 pt-1 gap-1 text-center sm:text-left">
                <span>← Drag left to reveal 3D Spatial Concept</span>
                <span>Drag right to inspect 2D CAD Blueprint →</span>
            </div>
        </div>

    </div>
</section>

<!-- ================= 4. 4 SIMPLE SERVICES & PRICING ================= -->
<section id="services" class="py-16  bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-10 sm:mb-16">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Services & Pricing
            </div>
            <h2 class="text-2xl sm:text-4xl lg:text-5xl font-heading font-bold text-[#141518]">
                Clear Services. <span class="gold-gradient-text">Transparent Pricing.</span>
            </h2>
            <p class="text-[#525560] text-xs sm:text-base">
                Professional drawings and visualisations tailored around your requirements.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            
            <!-- Service 1: 2D FLOOR PLANS -->
            <div class="bg-stone-50 p-6 sm:p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-3 sm:space-y-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-base sm:text-lg">
                        <i class="fa-solid fa-ruler-combined"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-heading font-bold text-[#141518]">2D FLOOR PLANS</h3>
                    <div class="text-xl sm:text-2xl font-heading font-bold text-[#9E825A]">From £85</div>
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
            <div class="bg-stone-50 p-6 sm:p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-3 sm:space-y-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-base sm:text-lg">
                        <i class="fa-solid fa-cube"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-heading font-bold text-[#141518]">3D VISUALISATIONS</h3>
                    <div class="text-xl sm:text-2xl font-heading font-bold text-[#9E825A]">From £175</div>
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
            <div class="bg-stone-50 p-6 sm:p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-3 sm:space-y-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-base sm:text-lg">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-heading font-bold text-[#141518]">LEASE PLANS</h3>
                    <div class="text-xl sm:text-2xl font-heading font-bold text-[#9E825A]">From £145</div>
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
            <div class="bg-stone-50 p-6 sm:p-8 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between">
                <div class="space-y-3 sm:space-y-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-base sm:text-lg">
                        <i class="fa-solid fa-landmark"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-heading font-bold text-[#141518]">DESIGN & PLANNING</h3>
                    <div class="text-xl sm:text-2xl font-heading font-bold text-[#9E825A]">From £350</div>
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
        <div class="mt-8 sm:mt-12 p-5 sm:p-6 bg-stone-100 rounded-2xl border border-stone-200 flex flex-col sm:flex-row items-start sm:items-center justify-between text-xs text-[#525560] gap-3 sm:gap-4">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-shield-halved text-base text-[#9E825A] flex-shrink-0"></i>
                <span class="font-semibold text-[#141518]">{{ \App\Models\SiteSetting::get('land_registry_note', 'Prepared in accordance with HM Land Registry requirements.') }}</span>
            </div>
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-clock text-base text-[#9E825A] flex-shrink-0"></i>
                <span>{{ \App\Models\SiteSetting::get('turnaround_note', 'Typical turnaround: 24–48 hours (depending on project scope and availability).') }}</span>
            </div>
        </div>

    </div>
</section>

<!-- ================= 5. PORTFOLIO SHOWCASE ================= -->
<section id="projects" class="py-16  bg-[#FBF9F5] border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-3">
            <div class="space-y-2 sm:space-y-3">
                <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                    Portfolio Showcase
                </div>
                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-heading font-bold text-[#141518]">
                    ARCHITECTURAL CONCEPTS & <span class="gold-gradient-text">DESIGN STUDIES</span>
                </h2>
            </div>
            <a href="{{ route('projects.index') }}" class="text-xs sm:text-sm font-heading font-bold uppercase tracking-wider text-[#141518] hover:text-[#9E825A] transition-colors flex items-center space-x-2">
                <span>View Full Catalog</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($allProjects->take(6) as $project)
                <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] group flex flex-col justify-between transition-all duration-500 hover:-translate-y-2">
                    <div>
                        <div class="relative h-52 sm:h-64 overflow-hidden bg-stone-100">
                            <img src="{{ $project->hero_image }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-2.5 py-1 bg-white/95 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#141518] border border-stone-200 shadow-sm">
                                {{ $project->subtitle }}
                            </span>
                        </div>

                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 class="text-lg sm:text-xl font-heading font-bold text-[#141518] group-hover:text-[#9E825A] transition-colors">
                                {{ $project->title }}
                            </h3>
                            
                            <p class="text-xs text-[#525560] leading-relaxed">
                                {{ $project->overview }}
                            </p>

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

                    <div class="px-5 sm:px-6 pb-5 sm:pb-6 pt-1 sm:pt-2">
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

<!-- ================= 6. PRO-LEVEL MASONRY PHOTO GALLERY SHOWCASE ================= -->
<section id="photo-gallery" class="py-16  bg-white border-b border-stone-200" x-data="{ activeLightbox: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4">
            <div class="space-y-2 sm:space-y-3">
                <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                    High-Resolution Visual Archive
                </div>
                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-heading font-bold text-[#141518]">
                    PHOTO <span class="gold-gradient-text">GALLERY</span>
                </h2>
            </div>
            <a href="{{ route('gallery.index') }}" class="w-full sm:w-auto text-center px-6 py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black text-xs font-heading font-bold uppercase tracking-wider rounded-xl transition-all shadow-md flex items-center justify-center space-x-2">
                <span>View All Gallery Photos</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 sm:gap-6 space-y-4 sm:space-y-6">
            @foreach($galleryItems->take(6) as $item)
                <div class="break-inside-avoid bg-white rounded-2xl sm:rounded-3xl overflow-hidden group cursor-pointer border border-stone-200 relative transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl hover:border-[#C5A880]"
                     @click="activeLightbox = {{ json_encode($item) }}">
                    
                    <div class="relative overflow-hidden bg-stone-100">
                        <img src="{{ $item->image_url }}" 
                             alt="{{ $item->title }}" 
                             class="w-full object-cover group-hover:scale-105 transition-transform duration-700
                                    {{ $item->aspect_ratio == 'tall' ? 'h-72 sm:h-96' : ($item->aspect_ratio == 'wide' ? 'h-48 sm:h-60' : 'h-60 sm:h-72') }}">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-75 group-hover:opacity-90 transition-opacity"></div>

                        <span class="absolute top-3 left-3 sm:top-4 sm:left-4 px-2.5 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#141518] border border-stone-200 shadow-sm">
                            {{ $item->category }}
                        </span>

                        <div class="absolute top-3 right-3 sm:top-4 sm:right-4 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/90 backdrop-blur-md border border-stone-200 text-[#141518] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-md">
                            <i class="fa-solid fa-expand text-xs"></i>
                        </div>

                        <div class="absolute bottom-3 left-3 right-3 sm:bottom-4 sm:left-4 sm:right-4 space-y-1">
                            <h3 class="font-heading font-bold text-white text-sm sm:text-base group-hover:text-[#C5A880] transition-colors">
                                {{ $item->title }}
                            </h3>
                            @if($item->caption)
                                <p class="text-[11px] sm:text-xs text-gray-200 font-sans line-clamp-1">
                                    {{ $item->caption }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!-- LIGHTBOX MODAL -->
    <div x-show="activeLightbox" 
         x-transition
         class="fixed inset-0 z-50 bg-black/90 backdrop-blur-xl flex items-center justify-center p-3 sm:p-8"
         @keydown.escape.window="activeLightbox = null"
         style="display: none;">
        
        <button @click="activeLightbox = null" class="absolute top-4 right-4 text-gray-300 hover:text-white text-2xl sm:text-3xl focus:outline-none z-50">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="max-w-4xl w-full bg-white rounded-2xl sm:rounded-3xl border border-stone-200 overflow-hidden shadow-2xl space-y-3 sm:space-y-4 p-3 sm:p-6"
             @click.away="activeLightbox = null">
            
            <div class="relative max-h-[65vh] sm:max-h-[75vh] overflow-hidden rounded-xl sm:rounded-2xl border border-stone-200 bg-black">
                <img :src="activeLightbox?.image_url" :alt="activeLightbox?.title" class="w-full h-full max-h-[65vh] sm:max-h-[75vh] object-contain mx-auto bg-black">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-2 border-t border-stone-200 px-1 gap-2">
                <div>
                    <span class="px-2.5 py-0.5 bg-[#C5A880]/20 text-[#9E825A] border border-[#C5A880]/40 rounded text-[10px] font-heading font-bold uppercase tracking-wider"
                          x-text="activeLightbox?.category"></span>
                    <h3 class="text-lg sm:text-xl font-heading font-bold text-[#141518] mt-1" x-text="activeLightbox?.title"></h3>
                    <p class="text-xs text-[#525560]" x-text="activeLightbox?.caption"></p>
                </div>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto text-center px-5 py-2.5 bg-[#141518] text-white font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-[#C5A880] hover:text-black transition-colors">
                    Tell Me About Your Project
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 7. HOW IT WORKS (ADMIN CMS MANAGED 5 STEPS) ================= -->
<section class="py-16  bg-[#FBF9F5] border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-10 sm:mb-16">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Simple Client Process
            </div>
            <h2 class="text-2xl sm:text-4xl lg:text-5xl font-heading font-bold text-[#141518]">
                HOW IT <span class="gold-gradient-text">WORKS</span>
            </h2>
            <p class="text-[#525560] text-xs sm:text-base">
                Getting started with your drawings or visualisation is simple and clear.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6">
            
            <div class="p-5 sm:p-6 bg-white rounded-2xl border border-stone-200 space-y-3 relative shadow-sm">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-xs sm:text-sm">01</div>
                <h4 class="font-heading font-bold text-xs sm:text-sm text-[#141518]">{{ \App\Models\SiteSetting::get('step_1_title', '01 - TELL ME ABOUT YOUR PROJECT') }}</h4>
                <p class="text-xs text-[#525560] leading-relaxed">{{ \App\Models\SiteSetting::get('step_1_desc', 'Tell me what you need and what you want to achieve.') }}</p>
            </div>

            <div class="p-5 sm:p-6 bg-white rounded-2xl border border-stone-200 space-y-3 relative shadow-sm">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-xs sm:text-sm">02</div>
                <h4 class="font-heading font-bold text-xs sm:text-sm text-[#141518]">{{ \App\Models\SiteSetting::get('step_2_title', '02 - SEND YOUR INFORMATION') }}</h4>
                <p class="text-xs text-[#525560] leading-relaxed">{{ \App\Models\SiteSetting::get('step_2_desc', 'Plans, measurements, photographs or sketches.') }}</p>
            </div>

            <div class="p-5 sm:p-6 bg-white rounded-2xl border border-stone-200 space-y-3 relative shadow-sm">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-xs sm:text-sm">03</div>
                <h4 class="font-heading font-bold text-xs sm:text-sm text-[#141518]">{{ \App\Models\SiteSetting::get('step_3_title', '03 - DESIGN') }}</h4>
                <p class="text-xs text-[#525560] leading-relaxed">{{ \App\Models\SiteSetting::get('step_3_desc', 'Your drawings or visualisation are developed around your requirements.') }}</p>
            </div>

            <div class="p-5 sm:p-6 bg-white rounded-2xl border border-stone-200 space-y-3 relative shadow-sm">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-xs sm:text-sm">04</div>
                <h4 class="font-heading font-bold text-xs sm:text-sm text-[#141518]">{{ \App\Models\SiteSetting::get('step_4_title', '04 - REVIEW') }}</h4>
                <p class="text-xs text-[#525560] leading-relaxed">{{ \App\Models\SiteSetting::get('step_4_desc', 'You review the work and provide feedback.') }}</p>
            </div>

            <div class="p-5 sm:p-6 bg-white rounded-2xl border border-stone-200 space-y-3 relative shadow-sm sm:col-span-2 lg:col-span-1">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-xs sm:text-sm">05</div>
                <h4 class="font-heading font-bold text-xs sm:text-sm text-[#141518]">{{ \App\Models\SiteSetting::get('step_5_title', '05 - FINAL DELIVERY') }}</h4>
                <p class="text-xs text-[#525560] leading-relaxed">{{ \App\Models\SiteSetting::get('step_5_desc', 'You receive your completed drawings and files.') }}</p>
            </div>

        </div>

    </div>
</section>

<!-- ================= 8. MEET EMILY (PERSONAL & WARM STORY) ================= -->
<section id="about-emily" class="py-16  bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-stone-200 shadow-xl bg-white">
                    <img src="{{ \App\Models\SiteSetting::get('about_designer_image', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop') }}" 
                         alt="Emily Royce - Architecture & Design Student" 
                         class="w-full h-[320px] sm:h-[480px] object-cover object-center">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-4 sm:space-y-6">
                <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                    About The Designer
                </div>

                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-heading font-bold text-[#141518]">
                    {{ \App\Models\SiteSetting::get('about_heading', 'MEET EMILY') }}
                </h2>

                <div class="space-y-3 sm:space-y-4 text-[#3A3C44] text-sm sm:text-base leading-relaxed whitespace-pre-line">
                    {{ \App\Models\SiteSetting::get('about_bio', "I'm Emily, an Architecture & Design student...") }}
                </div>

                <div class="pt-2">
                    <a href="{{ route('about') }}" class="inline-flex items-center space-x-2 text-xs sm:text-sm font-heading font-bold uppercase tracking-wider text-[#141518] hover:text-[#9E825A] transition-colors">
                        <span>Read More About Emily</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= 9. CONTACT CTA SECTION ================= -->
<section class="py-16  bg-[#FBF9F5]">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4 sm:space-y-6">
        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-heading font-bold text-[#141518]">
            Have a project in mind? <br>
            <span class="gold-gradient-text">TELL ME ABOUT YOUR PROJECT</span>
        </h2>
        <p class="text-[#3A3C44] text-xs sm:text-base max-w-xl mx-auto leading-relaxed">
            Whether you need a 2D CAD floor plan, a Land Registry lease plan, or a 3D visualisation, I'd love to help you bring your space to life.
        </p>
        <div class="pt-2 sm:pt-4">
            <a href="{{ route('contact') }}" class="inline-flex items-center space-x-3 px-8 sm:px-10 py-4 sm:py-5 bg-[#141518] text-white font-heading font-bold text-xs sm:text-sm uppercase tracking-wider hover:bg-[#C5A880] hover:text-black transition-all shadow-xl rounded-xl w-full sm:w-auto justify-center">
                <span>Tell Me About Your Project</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</section>

@endsection
