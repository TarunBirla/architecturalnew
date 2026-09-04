@extends('layouts.app')

@section('title', 'Meet Emily | Architectural Design & Visualisation')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-white border-b border-stone-200 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Architecture & Design Student
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-[#141518] tracking-tight">
                MEET <span class="gold-gradient-text">EMILY</span>
            </h1>
            <p class="text-[#4A4D57] text-sm sm:text-base leading-relaxed">
                Creative spatial design, precise floor plans and 3D visualisations.
            </p>
        </div>
    </div>
</section>

<!-- Meet Emily Story -->
<section class="py-20 bg-[#FBF9F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-stone-200 shadow-xl bg-white">
                    <img src="{{ \App\Models\SiteSetting::get('about_designer_image', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop') }}" 
                         alt="Emily Royce - Architecture & Design Student" 
                         class="w-full h-[520px] object-cover object-center">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <div class="space-y-4 text-[#3A3C44] text-base leading-relaxed">
                    <p class="text-xl font-heading font-bold text-[#141518]">
                        I'm Emily, an Architecture & Design student with a passion for creating thoughtful, functional and visually refined spaces.
                    </p>
                    <p>
                        My work combines architectural thinking, precise CAD drawing and 3D visualisation to explore how spaces can work better for the people who use them.
                    </p>
                    <p>
                        I'm currently developing my skills through academic projects and independent design work, while building a portfolio focused on spatial planning, visualisation and contemporary design.
                    </p>
                </div>

                <!-- Software Expertise Stack -->
                <div class="space-y-3 pt-4 border-t border-stone-200">
                    <h2 class="text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">Tools & Software Expertise</h2>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3.5 py-1.5 bg-white border border-stone-200 rounded-xl text-xs font-mono font-semibold text-[#141518] shadow-sm">AutoCAD 2D</span>
                        <span class="px-3.5 py-1.5 bg-white border border-stone-200 rounded-xl text-xs font-mono font-semibold text-[#141518] shadow-sm">Revit BIM</span>
                        <span class="px-3.5 py-1.5 bg-white border border-stone-200 rounded-xl text-xs font-mono font-semibold text-[#141518] shadow-sm">SketchUp 3D</span>
                        <span class="px-3.5 py-1.5 bg-white border border-stone-200 rounded-xl text-xs font-mono font-semibold text-[#141518] shadow-sm">Rhino 3D</span>
                        <span class="px-3.5 py-1.5 bg-white border border-stone-200 rounded-xl text-xs font-mono font-semibold text-[#141518] shadow-sm">V-Ray Render</span>
                        <span class="px-3.5 py-1.5 bg-white border border-stone-200 rounded-xl text-xs font-mono font-semibold text-[#141518] shadow-sm">Adobe Photoshop</span>
                    </div>
                </div>

                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="px-8 py-4 bg-[#141518] text-white font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-[#C5A880] hover:text-black transition-all shadow-md">
                        Tell Me About Your Project
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
