@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('about_designer_name', 'Emily Royce') . ' | Architecture, Spatial Design & Floor Plans')

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-blueprint py-20">
    <!-- Dark Vignette Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0E] via-[#0D0D0E]/70 to-transparent z-10"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#0D0D0E] via-transparent to-[#0D0D0E] z-10"></div>

    <!-- Hero Background Image Carousel (Alpine.js) -->
    <div x-data="{ 
            slides: [
                '{{ \App\Models\SiteSetting::get('hero_image_1', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1800&auto=format&fit=crop') }}',
                '{{ \App\Models\SiteSetting::get('hero_image_2', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1800&auto=format&fit=crop') }}',
                '{{ \App\Models\SiteSetting::get('hero_image_3', 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1800&auto=format&fit=crop') }}'
            ],
            active: 0,
            init() { setInterval(() => { this.active = (this.active + 1) % this.slides.length }, 5500); }
         }" class="absolute inset-0 z-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="active === index" 
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute inset-0 bg-cover bg-center"
                 :style="`background-image: url('${slide}')`">
            </div>
        </template>
    </div>

    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
        <div class="max-w-3xl space-y-6">
            <div class="inline-flex items-center space-x-2 px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#C5A880] animate-ping"></span>
                <span class="text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                    {{ \App\Models\SiteSetting::get('hero_badge_text', 'Design & Architecture Studio') }}
                </span>
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-heading font-bold text-white tracking-tight leading-[1.1]">
                {{ \App\Models\SiteSetting::get('hero_headline', 'Precision Spatial Architecture & Floor Plans') }}
            </h1>

            <p class="text-base sm:text-xl text-gray-300 font-sans font-light leading-relaxed max-w-2xl">
                {{ \App\Models\SiteSetting::get('hero_subheadline', 'Elevating spaces through minimalist architectural concepts, 2D/3D CAD floor planning, Land Registry lease plans, and sustainable urban design.') }}
            </p>

            <div class="pt-4 flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#floor-plan-visualizer" class="w-full sm:w-auto px-8 py-4 bg-[#C5A880] text-black font-heading font-bold text-sm uppercase tracking-wider hover:bg-white transition-all duration-300 shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-3">
                    <span>{{ \App\Models\SiteSetting::get('hero_cta_button_text', 'Explore 2D vs 3D Floor Plans') }}</span>
                    <i class="fa-solid fa-arrows-left-right text-xs"></i>
                </a>
                <a href="{{ route('projects.index') }}" class="w-full sm:w-auto px-8 py-4 border border-white/20 hover:border-[#C5A880] text-white hover:text-[#C5A880] font-heading font-semibold text-sm uppercase tracking-wider transition-all duration-300 flex items-center justify-center space-x-2">
                    <span>View Project Catalog</span>
                </a>
            </div>

            <!-- Stats Bar -->
            <div class="pt-10 grid grid-cols-3 gap-6 border-t border-white/10 max-w-lg">
                <div>
                    <div class="font-heading text-2xl font-bold text-[#C5A880]">100%</div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider">RICS / Land Registry Compliant</div>
                </div>
                <div>
                    <div class="font-heading text-2xl font-bold text-[#C5A880]">24 - 48h</div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider">Fast Turnaround</div>
                </div>
                <div>
                    <div class="font-heading text-2xl font-bold text-[#C5A880]">3D VR</div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider">Spatial Walkthroughs</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= EMILY ROYCE PROFILE SPOTLIGHT ================= -->
<section class="py-20 bg-[#111215] border-y border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Avatar / Studio Portrait -->
            <div class="lg:col-span-5 relative">
                <div class="relative z-10 rounded-2xl overflow-hidden border border-white/10 shadow-2xl group">
                    <img src="{{ \App\Models\SiteSetting::get('about_designer_image', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop') }}" 
                         alt="{{ \App\Models\SiteSetting::get('about_designer_name', 'Emily Royce') }}" 
                         class="w-full h-[480px] object-cover object-center group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    
                    <div class="absolute bottom-6 left-6 right-6 p-4 glass-card rounded-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-heading text-lg font-bold text-white">{{ \App\Models\SiteSetting::get('about_designer_name', 'Emily Royce') }}</h4>
                                <p class="text-xs text-[#C5A880]">{{ \App\Models\SiteSetting::get('about_designer_title', 'University Architecture Scholar & Consultant') }}</p>
                            </div>
                            <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'emily@emilyroyce.com') }}" class="w-9 h-9 rounded-full bg-[#C5A880]/20 border border-[#C5A880] flex items-center justify-center text-[#C5A880] hover:bg-[#C5A880] hover:text-black transition-colors">
                                <i class="fa-solid fa-envelope text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Backdrop Gold Accent Frame -->
                <div class="absolute -bottom-4 -right-4 w-full h-full border-2 border-[#C5A880]/30 rounded-2xl pointer-events-none -z-0"></div>
            </div>

            <!-- Text Content -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-block px-3 py-1 bg-[#C5A880]/10 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                    About the Designer
                </div>
                
                <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white leading-tight">
                    {{ \App\Models\SiteSetting::get('about_heading', 'Bridging Academic Excellence & Practical Architectural Innovation') }}
                </h2>

                <p class="text-gray-300 text-base leading-relaxed">
                    {{ \App\Models\SiteSetting::get('about_bio', 'Currently completing advanced studies in Design & Architecture at University, Emily Royce combines rigorous structural principles with modern parametric design and high-precision spatial layout techniques.') }}
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="glass-card p-4 rounded-xl border border-white/5 space-y-2">
                        <div class="flex items-center space-x-3 text-[#C5A880]">
                            <i class="fa-solid fa-drafting-compass text-lg"></i>
                            <h4 class="font-heading font-bold text-white text-sm">2D & 3D Spatial Plans</h4>
                        </div>
                        <p class="text-xs text-gray-400">High-resolution CAD floor drawings & photorealistic 3D interior renderings.</p>
                    </div>

                    <div class="glass-card p-4 rounded-xl border border-white/5 space-y-2">
                        <div class="flex items-center space-x-3 text-[#C5A880]">
                            <i class="fa-solid fa-leaf text-lg"></i>
                            <h4 class="font-heading font-bold text-white text-sm">Sustainable Architecture</h4>
                        </div>
                        <p class="text-xs text-gray-400">Net-zero thermal envelope strategies and daylight optimization.</p>
                    </div>
                </div>

                <div class="pt-4 flex items-center space-x-6">
                    <a href="{{ route('about') }}" class="inline-flex items-center space-x-2 text-sm font-heading font-bold uppercase tracking-wider text-[#C5A880] hover:text-white transition-colors">
                        <span>Read Full Profile & CV</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= INTERACTIVE 2D VS 3D FLOOR PLAN COMPARE SLIDER ================= -->
<section id="floor-plan-visualizer" class="py-24 bg-blueprint relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-12">
            <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                Interactive Visualizer
            </div>
            <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
                2D Blueprint vs. <span class="gold-gradient-text">3D Spatial Render</span>
            </h2>
            <p class="text-gray-400 text-sm sm:text-base">
                Drag the divider below to compare a raw 2D CAD floor plan drawing with our photorealistic 3D architectural rendering. Inspired by top London property standards.
            </p>
        </div>

        <!-- Interactive Split Slider Component (Alpine.js) -->
        <div x-data="{ 
                sliderPos: 50,
                isDragging: false,
                updatePos(e) {
                    let rect = $refs.container.getBoundingClientRect();
                    let pageX = e.touches ? e.touches[0].pageX : e.pageX;
                    let x = pageX - rect.left;
                    this.sliderPos = Math.max(0, Math.min(100, (x / rect.width) * 100));
                }
             }" 
             class="max-w-5xl mx-auto glass-card rounded-2xl p-4 sm:p-6 border border-white/10 shadow-2xl">
            
            <div ref="container" 
                 @mousedown="isDragging = true; updatePos($event)"
                 @mouseup="isDragging = false"
                 @mouseleave="isDragging = false"
                 @mousemove="if (isDragging) updatePos($event)"
                 @touchstart="isDragging = true; updatePos($event)"
                 @touchend="isDragging = false"
                 @touchmove="if (isDragging) updatePos($event)"
                 class="ba-slider-container relative w-full h-[400px] sm:h-[550px] rounded-xl cursor-ew-resize overflow-hidden">
                
                <!-- BEFORE: 2D Blueprint Floor Plan Image -->
                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop" 
                     alt="2D Blueprint Floor Plan" 
                     class="w-full h-full object-cover">
                <div class="absolute top-4 left-4 bg-black/80 backdrop-blur-md px-4 py-2 rounded-lg border border-white/20 text-xs font-heading font-bold uppercase tracking-wider text-white">
                    <i class="fa-solid fa-[#C5A880] fa-ruler-combined mr-2 text-[#C5A880]"></i> 2D Laser CAD Blueprint
                </div>

                <!-- AFTER: 3D Rendered Floor Plan Image -->
                <div class="ba-slider-after" :style="`width: ${100 - sliderPos}%`" style="right: 0; left: auto;">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop" 
                         alt="3D Rendered Floor Plan" 
                         class="absolute right-0 top-0 h-full max-w-none object-cover"
                         :style="`width: ${$refs.container ? $refs.container.clientWidth : 900}px`">
                    <div class="absolute top-4 right-4 bg-black/80 backdrop-blur-md px-4 py-2 rounded-lg border border-[#C5A880]/40 text-xs font-heading font-bold uppercase tracking-wider text-[#C5A880]">
                        <i class="fa-solid fa-cube mr-2"></i> 3D Photorealistic Render
                    </div>
                </div>

                <!-- Divider Line & Handle -->
                <div class="absolute top-0 bottom-0 w-1 bg-[#C5A880] shadow-lg pointer-events-none" 
                     :style="`left: ${sliderPos}%`">
                    <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-10 h-10 rounded-full bg-[#C5A880] text-black flex items-center justify-center shadow-xl border-2 border-white text-xs">
                        <i class="fa-solid fa-arrows-left-right"></i>
                    </div>
                </div>
            </div>

            <!-- Controls bar -->
            <div class="mt-4 flex items-center justify-between text-xs text-gray-400 font-mono px-2">
                <span>← Drag left for 3D render</span>
                <span>Drag right for 2D CAD →</span>
            </div>
        </div>

    </div>
</section>

<!-- ================= FEATURED ARCHITECTURAL PROJECTS ================= -->
<section class="py-24 bg-[#0D0D0E]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-3">
                <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                    Portfolio Highlights
                </div>
                <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
                    Signature <span class="gold-gradient-text">Architectural Works</span>
                </h2>
            </div>
            <a href="{{ route('projects.index') }}" class="mt-4 md:mt-0 text-sm font-heading font-bold uppercase tracking-wider text-[#C5A880] hover:text-white transition-colors flex items-center space-x-2">
                <span>Explore All Projects</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProjects as $project)
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col justify-between transition-all duration-500 hover:-translate-y-2">
                    <div>
                        <!-- Project Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $project->hero_image }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 px-3 py-1 bg-black/70 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#C5A880] border border-[#C5A880]/30">
                                {{ $project->category }}
                            </span>
                        </div>

                        <!-- Project Details -->
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-heading font-bold text-white group-hover:text-[#C5A880] transition-colors">
                                {{ $project->title }}
                            </h3>
                            <p class="text-xs text-gray-400 line-clamp-2">
                                {{ $project->overview }}
                            </p>

                            <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 font-mono">
                                <span><i class="fa-solid fa-location-dot text-[#C5A880] mr-1"></i> {{ $project->location }}</span>
                                <span>{{ $project->area_sqm }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('projects.show', $project->slug) }}" class="w-full py-2.5 bg-white/5 hover:bg-[#C5A880] text-gray-300 hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-lg transition-all duration-300 flex items-center justify-center space-x-2">
                            <span>View Case Study</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ================= FLOOR PLAN SERVICES HUB ================= -->
<section class="py-24 bg-[#111215] border-t border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                Floor Plan Services
            </div>
            <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
                Professional Property <span class="gold-gradient-text">Floor Plans in UK</span>
            </h2>
            <p class="text-gray-400 text-sm sm:text-base">
                Compliant with RICS measurement standards and HM Land Registry practice guides. Trusted by estate agents, architects, landlords, and private homeowners.
            </p>
        </div>

        <!-- Services Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
                <div class="glass-card p-6 rounded-2xl flex flex-col justify-between hover:border-[#C5A880]/50 transition-all duration-300 group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#C5A880]/10 border border-[#C5A880]/30 flex items-center justify-center text-[#C5A880] group-hover:bg-[#C5A880] group-hover:text-black transition-all duration-300">
                            @if($service->icon == 'cube-transparent')
                                <i class="fa-solid fa-ruler-combined text-xl"></i>
                            @elseif($service->icon == 'sparkles')
                                <i class="fa-solid fa-cube text-xl"></i>
                            @elseif($service->icon == 'document-check')
                                <i class="fa-solid fa-file-contract text-xl"></i>
                            @else
                                <i class="fa-solid fa-building text-xl"></i>
                            @endif
                        </div>

                        <h3 class="text-lg font-heading font-bold text-white group-hover:text-[#C5A880] transition-colors">
                            {{ $service->title }}
                        </h3>

                        <p class="text-xs text-gray-400 leading-relaxed">
                            {{ $service->short_description }}
                        </p>

                        <div class="space-y-2 pt-2 border-t border-white/5">
                            @if($service->included_features)
                                @foreach(array_slice($service->included_features, 0, 3) as $feat)
                                    <div class="flex items-center space-x-2 text-[11px] text-gray-300">
                                        <i class="fa-solid fa-check text-[#C5A880]"></i>
                                        <span>{{ $feat }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/10 mt-6 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-gray-500 uppercase tracking-wider">From</span>
                            <div class="font-heading text-lg font-bold text-white">£{{ number_format($service->starting_price, 2) }}</div>
                        </div>
                        <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}" class="px-3 py-2 bg-[#C5A880]/20 hover:bg-[#C5A880] text-[#C5A880] hover:text-black font-heading text-xs font-bold rounded-lg transition-colors">
                            Book Plan
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ================= INSTANT INTERACTIVE FLOOR PLAN FEE ESTIMATOR ================= -->
<section class="py-20 bg-blueprint relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card p-8 sm:p-12 rounded-3xl border border-[#C5A880]/30 shadow-2xl relative overflow-hidden" 
             x-data="{
                planType: '2d',
                sqm: 120,
                get estimatedCost() {
                    let base = this.planType === '2d' ? 85 : (this.planType === '3d' ? 175 : 145);
                    let multiplier = this.sqm > 100 ? 1 + ((this.sqm - 100) * 0.004) : 1;
                    return Math.round(base * multiplier);
                }
             }">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-4">
                    <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                        Instant Quote Estimator
                    </div>
                    <h3 class="text-2xl sm:text-4xl font-heading font-bold text-white">
                        Calculate Your <span class="gold-gradient-text">Floor Plan Fee</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-300">
                        Select your required floor plan format and property size for an instant baseline quote.
                    </p>

                    <!-- Type Selector -->
                    <div class="space-y-2 pt-2">
                        <label class="text-xs font-heading uppercase tracking-wider text-gray-400">1. Select Floor Plan Format</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button @click="planType = '2d'" :class="planType === '2d' ? 'bg-[#C5A880] text-black border-[#C5A880]' : 'bg-black/40 text-gray-300 border-white/10'" class="p-3 text-xs font-heading font-bold rounded-xl border transition-all">
                                2D CAD Plan
                            </button>
                            <button @click="planType = '3d'" :class="planType === '3d' ? 'bg-[#C5A880] text-black border-[#C5A880]' : 'bg-black/40 text-gray-300 border-white/10'" class="p-3 text-xs font-heading font-bold rounded-xl border transition-all">
                                3D Rendered
                            </button>
                            <button @click="planType = 'lease'" :class="planType === 'lease' ? 'bg-[#C5A880] text-black border-[#C5A880]' : 'bg-black/40 text-gray-300 border-white/10'" class="p-3 text-xs font-heading font-bold rounded-xl border transition-all">
                                Lease Plan
                            </button>
                        </div>
                    </div>

                    <!-- SQM Slider -->
                    <div class="space-y-2 pt-2">
                        <div class="flex justify-between text-xs text-gray-400 font-heading">
                            <span>2. Property Size (SQM)</span>
                            <span class="text-[#C5A880] font-bold" x-text="`${sqm} m²`"></span>
                        </div>
                        <input type="range" min="30" max="500" step="5" x-model="sqm" class="w-full accent-[#C5A880] cursor-pointer">
                    </div>
                </div>

                <!-- Price Box -->
                <div class="lg:col-span-5 bg-black/60 p-6 rounded-2xl border border-white/10 text-center space-y-4">
                    <span class="text-xs uppercase tracking-widest text-gray-400 font-heading">Estimated Turnaround: 24h</span>
                    <div class="font-heading text-4xl sm:text-5xl font-bold text-[#C5A880]" x-text="`£${estimatedCost}`"></div>
                    <p class="text-[11px] text-gray-400">Includes PDF, High-Res PNG, & RICS Area Calculations</p>
                    
                    <a :href="`{{ route('contact') }}?service=${planType.toUpperCase()}%20Floor%20Plan&sqm=${sqm}&budget=${estimatedCost}`" 
                       class="block w-full py-3.5 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-all shadow-lg shadow-[#C5A880]/20">
                        Book Plan For £<span x-text="estimatedCost"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CONTACT CTA SECTION ================= -->
<section class="py-24 bg-[#0D0D0E] relative">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-6">
        <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
            Have a Project in Mind? <br>
            <span class="gold-gradient-text">Let's Design Together</span>
        </h2>
        <p class="text-gray-300 text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
            Whether you require high-end architectural concepts, rapid 2D/3D property floor plans, or land registry documentation, {{ \App\Models\SiteSetting::get('about_designer_name', 'Emily Royce') }} Architecture delivers uncompromised quality.
        </p>
        <div class="pt-4">
            <a href="{{ route('contact') }}" class="inline-flex items-center space-x-3 px-10 py-5 bg-[#C5A880] text-black font-heading font-bold text-sm uppercase tracking-wider hover:bg-white transition-all shadow-2xl shadow-[#C5A880]/25 rounded-xl">
                <span>Start Architectural Brief</span>
                <i class="fa-solid fa-paper-plane text-xs"></i>
            </a>
        </div>
    </div>
</section>

@endsection
