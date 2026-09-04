@extends('layouts.app')

@section('title', 'Services & Pricing | Emily Royce Architectural Design')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-white border-b border-stone-200 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Clear Services & Pricing
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-[#141518] tracking-tight">
                SERVICES & <span class="gold-gradient-text">PRICING</span>
            </h1>
            <p class="text-[#4A4D57] text-sm sm:text-base leading-relaxed">
                Accurate, professionally prepared 2D CAD floor plans, Land Registry lease plans, and 3D visualisations.
            </p>
        </div>
    </div>
</section>

<!-- 4 Simple Services breakdown -->
<section class="py-20 bg-[#FBF9F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($services as $service)
                <div class="bg-white rounded-3xl p-8 border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between border-b border-stone-100 pb-4">
                            <span class="px-3 py-1 bg-[#C5A880]/20 text-[#9E825A] border border-[#C5A880]/40 rounded-md text-xs font-heading font-bold uppercase">
                                {{ $service->category }}
                            </span>
                            <span class="text-xs text-[#626570] font-mono"><i class="fa-solid fa-clock text-[#9E825A] mr-1"></i> {{ $service->turnaround_time }}</span>
                        </div>

                        <h2 class="text-2xl font-heading font-bold text-[#141518]">
                            {{ $service->title }}
                        </h2>

                        <div class="text-3xl font-heading font-bold text-[#9E825A]">
                            From £{{ number_format($service->starting_price, 0) }}
                        </div>

                        <p class="text-[#3A3C44] text-sm leading-relaxed">
                            {{ $service->short_description }} {{ $service->full_description }}
                        </p>

                        @if($service->included_features)
                            <div class="space-y-2 pt-2 border-t border-stone-100">
                                @foreach($service->included_features as $feat)
                                    <div class="flex items-center space-x-2.5 text-xs text-[#141518]">
                                        <i class="fa-solid fa-check text-[#9E825A]"></i>
                                        <span>{{ $feat }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}" class="w-full py-4 bg-[#141518] text-white font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-[#C5A880] hover:text-black transition-all shadow-md flex items-center justify-center space-x-2">
                            <span>Book {{ $service->title }}</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Credibility Note Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6">
            <div class="p-6 bg-white rounded-2xl border border-stone-200 space-y-2">
                <div class="flex items-center space-x-2 text-[#9E825A]">
                    <i class="fa-solid fa-shield-halved text-base"></i>
                    <h3 class="font-heading font-bold text-sm text-[#141518]">HM Land Registry Wording</h3>
                </div>
                <p class="text-xs text-[#525560] leading-relaxed">
                    Prepared in accordance with HM Land Registry requirements.
                </p>
            </div>

            <div class="p-6 bg-white rounded-2xl border border-stone-200 space-y-2">
                <div class="flex items-center space-x-2 text-[#9E825A]">
                    <i class="fa-solid fa-clock text-base"></i>
                    <h3 class="font-heading font-bold text-sm text-[#141518]">Turnaround Notice</h3>
                </div>
                <p class="text-xs text-[#525560] leading-relaxed">
                    Typical turnaround: 24–48 hours (depending on project scope and availability).
                </p>
            </div>
        </div>

    </div>
</section>

@endsection
