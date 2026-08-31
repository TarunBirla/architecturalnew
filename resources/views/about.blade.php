@extends('layouts.app')

@section('title', 'About Emily Royce | Design & Architecture Studio')

@section('content')

<!-- Hero Section -->
<section class="py-20 bg-[#111215] border-b border-white/5 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop" 
                         alt="Emily Royce" 
                         class="w-full h-[500px] object-cover object-center">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                    Architectural Scholar & Consultant
                </div>

                <h1 class="text-4xl sm:text-6xl font-heading font-bold text-white tracking-tight">
                    Emily <span class="gold-gradient-text">Royce</span>
                </h1>

                <p class="text-gray-300 text-base sm:text-lg leading-relaxed font-light">
                    Currently attending <strong>University studying Design & Architecture</strong>, Emily Royce is dedicated to exploring the intersection of parametric form-making, carbon-neutral materials, and high-precision spatial floor planning.
                </p>

                <div class="p-4 glass-card rounded-xl border border-[#C5A880]/30 flex items-center space-x-4">
                    <div class="w-10 h-10 rounded-full bg-[#C5A880]/20 text-[#C5A880] flex items-center justify-center font-bold">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h4 class="font-heading font-bold text-white text-sm">University Architecture Department</h4>
                        <p class="text-xs text-gray-400">Focus: Sustainable Parametric Canopy & Spatial CAD Optimization</p>
                    </div>
                </div>

                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="mailto:emily@emilyroyce.com" class="px-6 py-3.5 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-all shadow-lg shadow-[#C5A880]/20">
                        Email emily@emilyroyce.com
                    </a>
                    <a href="{{ route('contact') }}" class="px-6 py-3.5 border border-white/20 hover:border-[#C5A880] text-white hover:text-[#C5A880] font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-colors">
                        Book Consultation
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Design Philosophy Section -->
<section class="py-20 bg-[#0D0D0E]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <h2 class="text-3xl font-heading font-bold text-white">
                Studio Design <span class="gold-gradient-text">Pillars</span>
            </h2>
            <p class="text-xs text-gray-400">Core principles guiding every architectural drawing, 3D render, and spatial masterplan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-card p-8 rounded-2xl border border-white/5 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center font-bold text-xl">01</div>
                <h3 class="text-xl font-heading font-bold text-white">Spatial Precision</h3>
                <p class="text-xs text-gray-400 leading-relaxed">
                    Laser-measured CAD accuracy ensuring 100% compliance with RICS property standards and HM Land Registry rules.
                </p>
            </div>

            <div class="glass-card p-8 rounded-2xl border border-white/5 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center font-bold text-xl">02</div>
                <h3 class="text-xl font-heading font-bold text-white">Material Authenticity</h3>
                <p class="text-xs text-gray-400 leading-relaxed">
                    Emphasizing natural textures—cross-laminated timber, raw micro-cement, honed limestone, and dynamic solar glass.
                </p>
            </div>

            <div class="glass-card p-8 rounded-2xl border border-white/5 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center font-bold text-xl">03</div>
                <h3 class="text-xl font-heading font-bold text-white">Environmental Stewardship</h3>
                <p class="text-xs text-gray-400 leading-relaxed">
                    Designing for net-zero carbon operation through daylight optimization and passive ventilation thermal chimneys.
                </p>
            </div>
        </div>

    </div>
</section>

@endsection
