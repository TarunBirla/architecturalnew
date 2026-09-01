@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('about_designer_name', 'Emily Royce') . ' | Architecture & Spatial Design')

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-blueprint py-20">
    <!-- Dark Vignette Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0E] via-[#0D0D0E]/70 to-transparent z-10"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#0D0D0E] via-transparent to-[#0D0D0E] z-10"></div>

    <!-- Hero Background Image Carousel (Alpine.js) -->
    <div x-data="{ 
            slides: [
                '{{ \App\Models\SiteSetting::get('hero_image_1', 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1800&auto=format&fit=crop') }}',
                '{{ \App\Models\SiteSetting::get('hero_image_2', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1800&auto=format&fit=crop') }}',
                '{{ \App\Models\SiteSetting::get('hero_image_3', 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=1800&auto=format&fit=crop') }}'
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
                    {{ \App\Models\SiteSetting::get('hero_badge_text', 'Luxury Hotels, Corporate Offices & Estates') }}
                </span>
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-heading font-bold text-white tracking-tight leading-[1.1]">
                {{ \App\Models\SiteSetting::get('hero_headline', 'Grand Architecture & Spatial Masterplanning') }}
            </h1>

            <p class="text-base sm:text-xl text-gray-300 font-sans font-light leading-relaxed max-w-2xl">
                {{ \App\Models\SiteSetting::get('hero_subheadline', 'Specializing in luxury 5-star hotel resorts, corporate office towers, and grand estate rest-design. Led by Emily Royce.') }}
            </p>

            <div class="pt-4 flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#signature-works" class="w-full sm:w-auto px-8 py-4 bg-[#C5A880] text-black font-heading font-bold text-sm uppercase tracking-wider hover:bg-white transition-all duration-300 shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-3">
                    <span>Explore Architectural Works</span>
                    <i class="fa-solid fa-arrow-down text-xs"></i>
                </a>
                <a href="{{ route('projects.index') }}" class="w-full sm:w-auto px-8 py-4 border border-white/20 hover:border-[#C5A880] text-white hover:text-[#C5A880] font-heading font-semibold text-sm uppercase tracking-wider transition-all duration-300 flex items-center justify-center space-x-2">
                    <span>View All Projects</span>
                </a>
            </div>

            <!-- Stats Bar -->
            <div class="pt-10 grid grid-cols-3 gap-6 border-t border-white/10 max-w-lg">
                <div>
                    <div class="font-heading text-2xl font-bold text-[#C5A880]">100%</div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider">RICS & Land Registry Compliant</div>
                </div>
                <div>
                    <div class="font-heading text-2xl font-bold text-[#C5A880]">24 - 48h</div>
                    <div class="text-[11px] text-gray-400 uppercase tracking-wider">CAD & 3D Turnaround</div>
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
<section class="py-10 bg-[#111215] border-y border-white/5 relative">
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
                    About the Lead Designer
                </div>
                
                <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white leading-tight">
                    {{ \App\Models\SiteSetting::get('about_heading', 'Bridging Academic Excellence & Practical Architectural Innovation') }}
                </h2>

                <p class="text-gray-300 text-base leading-relaxed">
                    {{ \App\Models\SiteSetting::get('about_bio', 'Currently completing advanced studies in Design & Architecture at University, Emily Royce combines structural engineering principles with modern parametric design and high-precision spatial layout techniques for luxury hotels, commercial towers, and estate rest-designs.') }}
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="glass-card p-4 rounded-xl border border-white/5 space-y-2">
                        <div class="flex items-center space-x-3 text-[#C5A880]">
                            <i class="fa-solid fa-hotel text-lg"></i>
                            <h4 class="font-heading font-bold text-white text-sm">Hotels & Office Masterplans</h4>
                        </div>
                        <p class="text-xs text-gray-400">High-capacity hospitality suites & commercial workplace layouts.</p>
                    </div>

                    <div class="glass-card p-4 rounded-xl border border-white/5 space-y-2">
                        <div class="flex items-center space-x-3 text-[#C5A880]">
                            <i class="fa-solid fa-landmark text-lg"></i>
                            <h4 class="font-heading font-bold text-white text-sm">Estate Rest-Design</h4>
                        </div>
                        <p class="text-xs text-gray-400">Historic mansion restoration & luxury penthouse spatial planning.</p>
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

<!-- ================= SIGNATURE ARCHITECTURAL WORKS (HOMEPAGE TAB FILTER SHOWING TOP 3) ================= -->
<section id="signature-works" class="py-12 bg-[#0D0D0E]"
         x-data="{
            activeTab: 'All',
            projects: {{ json_encode($allProjects) }},
            get filteredProjects() {
                if (this.activeTab === 'All') {
                    return this.projects.slice(0, 3);
                }
                return this.projects.filter(p => p.category === this.activeTab).slice(0, 3);
            }
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8">
            <div class="space-y-3">
                <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                    Portfolio Showcase
                </div>
                <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
                    Signature <span class="gold-gradient-text">Architectural Works</span>
                </h2>
            </div>
            <a href="{{ route('projects.index') }}" class="mt-4 md:mt-0 text-sm font-heading font-bold uppercase tracking-wider text-[#C5A880] hover:text-white transition-colors flex items-center space-x-2">
                <span>View Full Catalog</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Category Filter Tabs on Homepage -->
        <div class="flex flex-wrap items-center gap-3 mb-10 border-b border-white/10 pb-4">
            <button @click="activeTab = 'All'" 
                    :class="activeTab === 'All' ? 'bg-[#C5A880] text-black shadow-lg shadow-[#C5A880]/20' : 'glass-card text-gray-300 hover:text-white hover:border-[#C5A880]/40'"
                    class="px-5 py-2.5 rounded-xl font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300">
                All Categories
            </button>
            @foreach($categories as $cat)
                <button @click="activeTab = '{{ $cat->name }}'" 
                        :class="activeTab === '{{ $cat->name }}' ? 'bg-[#C5A880] text-black shadow-lg shadow-[#C5A880]/20' : 'glass-card text-gray-300 hover:text-white hover:border-[#C5A880]/40'"
                        class="px-5 py-2.5 rounded-xl font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300">
                    <span>{{ $cat->name }}</span>
                </button>
            @endforeach
        </div>

        <!-- Top 3 Filtered Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="project in filteredProjects" :key="project.id">
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col justify-between transition-all duration-500 hover:-translate-y-2">
                    <div>
                        <!-- Project Hero Image -->
                        <div class="relative h-64 overflow-hidden">
                            <img :src="project.hero_image" 
                                 :alt="project.title" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 px-3 py-1 bg-black/70 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#C5A880] border border-[#C5A880]/30"
                                  x-text="project.category">
                            </span>
                        </div>

                        <!-- Details -->
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-heading font-bold text-white group-hover:text-[#C5A880] transition-colors"
                                x-text="project.title">
                            </h3>
                            <p class="text-xs text-gray-400 line-clamp-2"
                               x-text="project.overview">
                            </p>

                            <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 font-mono">
                                <span><i class="fa-solid fa-location-dot text-[#C5A880] mr-1"></i> <span x-text="project.location"></span></span>
                                <span x-text="project.area_sqm"></span>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2">
                        <a :href="`/projects/${project.slug}`" class="w-full py-2.5 bg-white/5 hover:bg-[#C5A880] text-gray-300 hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-lg transition-all duration-300 flex items-center justify-center space-x-2">
                            <span>View Case Study</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </template>
        </div>

    </div>
</section>

<!-- ================= ARCHITECTURAL MASONRY GALLERY SECTION ================= -->
<section class="py-12 bg-[#111215] border-t border-white/5"
         x-data="{
            galleryTab: 'All',
            items: {{ json_encode($galleryItems) }},
            get filteredGallery() {
                if (this.galleryTab === 'All') {
                    return this.items.slice(0, 6);
                }
                return this.items.filter(i => i.category === this.galleryTab).slice(0, 6);
            }
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-3">
                <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                    Visual Gallery
                </div>
                <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
                    Architectural <span class="gold-gradient-text">Photo Archive</span>
                </h2>
            </div>
            <a href="{{ route('gallery.index') }}" class="mt-4 md:mt-0 text-sm font-heading font-bold uppercase tracking-wider text-[#C5A880] hover:text-white transition-colors flex items-center space-x-2">
                <span>View Full Photo Gallery</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Gallery Category Tabs -->
        <div class="flex flex-wrap items-center gap-3 mb-10 border-b border-white/10 pb-4">
            <button @click="galleryTab = 'All'" 
                    :class="galleryTab === 'All' ? 'bg-[#C5A880] text-black shadow-lg shadow-[#C5A880]/20' : 'glass-card text-gray-300 hover:text-white hover:border-[#C5A880]/40'"
                    class="px-5 py-2.5 rounded-xl font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300">
                All Photos
            </button>
            @foreach($categories as $cat)
                <button @click="galleryTab = '{{ $cat->name }}'" 
                        :class="galleryTab === '{{ $cat->name }}' ? 'bg-[#C5A880] text-black shadow-lg shadow-[#C5A880]/20' : 'glass-card text-gray-300 hover:text-white hover:border-[#C5A880]/40'"
                        class="px-5 py-2.5 rounded-xl font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300">
                    <span>{{ $cat->name }}</span>
                </button>
            @endforeach
        </div>

        <!-- Masonry Photo Grid -->
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            <template x-for="item in filteredGallery" :key="item.id">
                <div class="break-inside-avoid glass-card rounded-2xl overflow-hidden group border border-white/10 relative transition-all duration-500 hover:-translate-y-1.5 hover:border-[#C5A880]/50">
                    <a href="{{ route('gallery.index') }}" class="block relative overflow-hidden">
                        <img :src="item.image_url" 
                             :alt="item.title" 
                             class="w-full object-cover group-hover:scale-105 transition-transform duration-700"
                             :class="item.aspect_ratio === 'tall' ? 'h-96' : (item.aspect_ratio === 'wide' ? 'h-56' : 'h-72')">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-95 transition-opacity"></div>

                        <span class="absolute top-4 left-4 px-3 py-1 bg-black/70 backdrop-blur-md rounded-full text-[10px] font-heading font-bold uppercase tracking-wider text-[#C5A880] border border-[#C5A880]/30"
                              x-text="item.category">
                        </span>

                        <div class="absolute bottom-4 left-4 right-4 space-y-1">
                            <h4 class="font-heading font-bold text-white text-base group-hover:text-[#C5A880] transition-colors" x-text="item.title"></h4>
                            <p class="text-xs text-gray-300 font-sans line-clamp-1" x-text="item.caption"></p>
                        </div>
                    </a>
                </div>
            </template>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('gallery.index') }}" class="inline-flex items-center space-x-2 px-8 py-3.5 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-all shadow-lg shadow-[#C5A880]/20">
                <span>Open Full Architectural Gallery</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

    </div>
</section>

<!-- ================= INTERACTIVE 2D VS 3D FLOOR PLAN COMPARE SLIDER ================= -->
<section id="floor-plan-visualizer" class="py-12 bg-blueprint relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-12">
            <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                Interactive Visualizer
            </div>
            <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
                2D CAD Blueprint vs. <span class="gold-gradient-text">3D Hotel/Estate Render</span>
            </h2>
            <p class="text-gray-400 text-sm sm:text-base">
                Drag the divider below to compare a raw 2D CAD laser floor plan with our 3D spatial rendering.
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
                    <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop" 
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

<!-- ================= CONTACT CTA SECTION ================= -->
<section class="py-12 bg-[#0D0D0E] relative">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-6">
        <h2 class="text-3xl sm:text-5xl font-heading font-bold text-white">
            Have a Grand Project in Mind? <br>
            <span class="gold-gradient-text">Let's Design Together</span>
        </h2>
        <p class="text-gray-300 text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
            Whether you require high-end hotel concept masterplans, corporate office layouts, or luxury estate rest-designs, {{ \App\Models\SiteSetting::get('about_designer_name', 'Emily Royce') }} Architecture delivers uncompromised quality.
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
