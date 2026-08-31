@extends('layouts.app')

@section('title', 'Property Floor Plan Services London & UK | 2D CAD, 3D Renders & Lease Plans')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-[#111215] border-b border-white/5 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                Floor Plan Specialists UK
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-white tracking-tight">
                Architectural <span class="gold-gradient-text">Floor Plan Services</span>
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                Professional 2D CAD floor plans, photorealistic 3D spatial renders, and HM Land Registry compliant lease plans for estate agents, developers, landlords, and architects.
            </p>
        </div>
    </div>
</section>

<!-- Main Services breakdown -->
<section class="py-20 bg-[#0D0D0E]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

        @foreach($services as $index => $service)
            <div class="glass-card rounded-3xl p-8 sm:p-12 border border-white/10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left: Info & Features -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="flex items-center space-x-3">
                        <span class="px-3 py-1 bg-[#C5A880]/20 text-[#C5A880] border border-[#C5A880]/40 rounded-md text-xs font-heading font-bold uppercase">
                            {{ $service->category }}
                        </span>
                        <span class="text-xs text-gray-400 font-mono"><i class="fa-solid fa-clock text-[#C5A880] mr-1"></i> {{ $service->turnaround_time }}</span>
                    </div>

                    <h2 class="text-2xl sm:text-4xl font-heading font-bold text-white">
                        {{ $service->title }}
                    </h2>

                    <p class="text-gray-300 text-sm leading-relaxed">
                        {{ $service->full_description }}
                    </p>

                    @if($service->included_features)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                            @foreach($service->included_features as $feat)
                                <div class="flex items-center space-x-2.5 text-xs text-gray-200">
                                    <div class="w-5 h-5 rounded-full bg-[#C5A880]/20 text-[#C5A880] flex items-center justify-center text-[10px]">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <span>{{ $feat }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="pt-4 flex items-center space-x-6">
                        <div>
                            <span class="text-[10px] text-gray-500 uppercase tracking-widest block font-heading">Starting Rate</span>
                            <span class="font-heading text-3xl font-bold text-[#C5A880]">£{{ number_format($service->starting_price, 2) }}</span>
                        </div>

                        <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}" class="px-6 py-3.5 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-all shadow-lg shadow-[#C5A880]/20">
                            Book {{ $service->category }} Plan
                        </a>
                    </div>
                </div>

                <!-- Right: Image Sample -->
                <div class="lg:col-span-5 relative">
                    <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl">
                        <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" class="w-full h-72 object-cover">
                    </div>
                </div>

            </div>
        @endforeach

    </div>
</section>

<!-- FAQ Section inspired by InterInfinity -->
<section class="py-20 bg-[#111215] border-t border-white/5">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center space-y-3">
            <h2 class="text-3xl font-heading font-bold text-white">
                Frequently Asked <span class="gold-gradient-text">Questions</span>
            </h2>
            <p class="text-xs text-gray-400">Everything you need to know about our floor plan drawing & RICS standards.</p>
        </div>

        <div class="space-y-4">
            <div class="glass-card p-6 rounded-2xl border border-white/5 space-y-2">
                <h4 class="font-heading font-bold text-white text-sm">Are your lease plans guaranteed to be accepted by HM Land Registry?</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Yes, 100%. All our lease plans strictly follow HM Land Registry Practice Guide 40 rules, incorporating Ordnance Survey site plans, precise scale ratios (1:50/1:100), and color-coded boundary demised lines.</p>
            </div>

            <div class="glass-card p-6 rounded-2xl border border-white/5 space-y-2">
                <h4 class="font-heading font-bold text-white text-sm">What formats do I receive?</h4>
                <p class="text-xs text-gray-400 leading-relaxed">You receive print-ready vector PDFs, high-resolution PNGs/JPEGs for online listing portals, and optional raw DWG CAD files upon request.</p>
            </div>

            <div class="glass-card p-6 rounded-2xl border border-white/5 space-y-2">
                <h4 class="font-heading font-bold text-white text-sm">How fast is turnaround?</h4>
                <p class="text-xs text-gray-400 leading-relaxed">Standard 2D floor plans and lease plans are delivered within 24 to 48 hours of site measurement or CAD file upload. Express 12-hour turnaround is available upon request.</p>
            </div>
        </div>
    </div>
</section>

@endsection
