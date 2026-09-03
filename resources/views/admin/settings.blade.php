@extends('admin.layout')

@section('title', 'Manage Site Settings | Studio CMS')

@section('content')

<div class="max-w-5xl space-y-8">

    <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">CMS Settings Manager</span>
        <h1 class="text-3xl font-heading font-bold text-[#141518]">Manage Site Settings & Content</h1>
        <p class="text-xs text-[#525560] mt-1">Upload images or edit text for Hero Carousel, "From Plan To Space", "How It Works" steps, Meet Emily, and Contact info.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- SECTION 1: HOMEPAGE HERO MULTIPLE IMAGES AUTO-CAROUSEL & BRANDING -->
        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-sliders text-[#9E825A]"></i>
                <span>1. Homepage Hero Multiple Images Carousel & Branding</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Hero Badge Tagline</label>
                    <input type="text" name="hero_badge_text" value="{{ $settings['hero_badge_text'] ?? 'Architecture & Design Student' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Main Brand Title</label>
                    <input type="text" name="hero_headline" value="{{ $settings['hero_headline'] ?? 'EMILY ROYCE' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Hero Sub-headline / Paragraph</label>
                <textarea name="hero_subheadline" rows="2" 
                          class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">{{ $settings['hero_subheadline'] ?? 'Creative spatial design, precise floor plans and 3D visualisations.' }}</textarea>
            </div>

            <!-- Hero Images 1 to 4 Carousel Setup -->
            <div class="space-y-4 pt-4 border-t border-stone-200">
                <h4 class="text-xs font-heading font-bold uppercase tracking-wider text-[#9E825A]">Hero Auto-Slider 4 Images (Upload File or Paste URL)</h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Hero Photo 1 -->
                    <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                        <span class="text-xs font-bold text-[#141518]">Hero Photo 1</span>
                        <img src="{{ $settings['hero_image_1'] ?? 'https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=1600&auto=format&fit=crop' }}" class="w-full h-28 object-cover rounded-xl border border-stone-200">
                        <input type="file" name="hero_image_1_file" accept="image/*" class="text-xs text-[#525560] file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                        <input type="text" name="hero_image_1" value="{{ $settings['hero_image_1'] ?? '' }}" placeholder="Image URL 1..." class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                    </div>

                    <!-- Hero Photo 2 -->
                    <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                        <span class="text-xs font-bold text-[#141518]">Hero Photo 2</span>
                        <img src="{{ $settings['hero_image_2'] ?? 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop' }}" class="w-full h-28 object-cover rounded-xl border border-stone-200">
                        <input type="file" name="hero_image_2_file" accept="image/*" class="text-xs text-[#525560] file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                        <input type="text" name="hero_image_2" value="{{ $settings['hero_image_2'] ?? '' }}" placeholder="Image URL 2..." class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                    </div>

                    <!-- Hero Photo 3 -->
                    <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                        <span class="text-xs font-bold text-[#141518]">Hero Photo 3</span>
                        <img src="{{ $settings['hero_image_3'] ?? 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1600&auto=format&fit=crop' }}" class="w-full h-28 object-cover rounded-xl border border-stone-200">
                        <input type="file" name="hero_image_3_file" accept="image/*" class="text-xs text-[#525560] file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                        <input type="text" name="hero_image_3" value="{{ $settings['hero_image_3'] ?? '' }}" placeholder="Image URL 3..." class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                    </div>

                    <!-- Hero Photo 4 -->
                    <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                        <span class="text-xs font-bold text-[#141518]">Hero Photo 4</span>
                        <img src="{{ $settings['hero_image_4'] ?? 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1600&auto=format&fit=crop' }}" class="w-full h-28 object-cover rounded-xl border border-stone-200">
                        <input type="file" name="hero_image_4_file" accept="image/*" class="text-xs text-[#525560] file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                        <input type="text" name="hero_image_4" value="{{ $settings['hero_image_4'] ?? '' }}" placeholder="Image URL 4..." class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: FROM PLAN TO SPACE IMAGES CMS -->
        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-ruler-combined text-[#9E825A]"></i>
                <span>2. "FROM PLAN TO SPACE" Section Images CMS</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- 2D Blueprint Photo -->
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <span class="text-xs font-bold text-[#141518]">Technical 2D CAD Blueprint Image</span>
                    <img src="{{ $settings['from_plan_2d_image'] ?? 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1600&auto=format&fit=crop' }}" class="w-full h-32 object-cover rounded-xl border border-stone-200">
                    <input type="file" name="from_plan_2d_image_file" accept="image/*" class="text-xs text-[#525560] file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                    <input type="text" name="from_plan_2d_image" value="{{ $settings['from_plan_2d_image'] ?? '' }}" placeholder="Image URL..." class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                </div>

                <!-- 3D Concept Photo -->
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <span class="text-xs font-bold text-[#141518]">3D Spatial Concept Image</span>
                    <img src="{{ $settings['from_plan_3d_image'] ?? 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1600&auto=format&fit=crop' }}" class="w-full h-32 object-cover rounded-xl border border-stone-200">
                    <input type="file" name="from_plan_3d_image_file" accept="image/*" class="text-xs text-[#525560] file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                    <input type="text" name="from_plan_3d_image" value="{{ $settings['from_plan_3d_image'] ?? '' }}" placeholder="Image URL..." class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                </div>
            </div>
        </div>

        <!-- SECTION 3: HOW IT WORKS 5 STEPS CMS -->
        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-list-check text-[#9E825A]"></i>
                <span>3. "HOW IT WORKS" 5 Steps CMS</span>
            </h3>

            <div class="space-y-4">
                <!-- Step 1 -->
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <span class="text-xs font-bold text-[#9E825A] uppercase">Step 01</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" name="step_1_title" value="{{ $settings['step_1_title'] ?? '01 - TELL ME ABOUT YOUR PROJECT' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-bold">
                        <input type="text" name="step_1_desc" value="{{ $settings['step_1_desc'] ?? 'Tell me what you need and what you want to achieve.' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs">
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <span class="text-xs font-bold text-[#9E825A] uppercase">Step 02</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" name="step_2_title" value="{{ $settings['step_2_title'] ?? '02 - SEND YOUR INFORMATION' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-bold">
                        <input type="text" name="step_2_desc" value="{{ $settings['step_2_desc'] ?? 'Plans, measurements, photographs or sketches.' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs">
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <span class="text-xs font-bold text-[#9E825A] uppercase">Step 03</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" name="step_3_title" value="{{ $settings['step_3_title'] ?? '03 - DESIGN' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-bold">
                        <input type="text" name="step_3_desc" value="{{ $settings['step_3_desc'] ?? 'Your drawings or visualisation are developed around your requirements.' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs">
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <span class="text-xs font-bold text-[#9E825A] uppercase">Step 04</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" name="step_4_title" value="{{ $settings['step_4_title'] ?? '04 - REVIEW' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-bold">
                        <input type="text" name="step_4_desc" value="{{ $settings['step_4_desc'] ?? 'You review the work and provide feedback.' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs">
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <span class="text-xs font-bold text-[#9E825A] uppercase">Step 05</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" name="step_5_title" value="{{ $settings['step_5_title'] ?? '05 - FINAL DELIVERY' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-bold">
                        <input type="text" name="step_5_desc" value="{{ $settings['step_5_desc'] ?? 'You receive your completed drawings and files.' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs">
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 4: MEET EMILY DESIGNER PROFILE -->
        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-user text-[#9E825A]"></i>
                <span>4. Meet Emily Profile & Photo Upload</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Designer Name</label>
                    <input type="text" name="about_designer_name" value="{{ $settings['about_designer_name'] ?? 'Emily Royce' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Professional Title</label>
                    <input type="text" name="about_designer_title" value="{{ $settings['about_designer_title'] ?? 'Architecture & Design Student' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>

            <!-- Profile Photo Upload -->
            <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-3">
                    <span class="text-[10px] text-[#626570] block font-heading uppercase font-bold">Current Profile Photo</span>
                    <img src="{{ $settings['about_designer_image'] ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop' }}" alt="Emily Royce" class="w-full h-28 object-cover rounded-xl border border-stone-200 mt-1">
                </div>
                <div class="sm:col-span-9 space-y-3">
                    <div>
                        <label class="text-[11px] text-[#9E825A] font-bold block mb-1">Upload New Profile Photo from Device:</label>
                        <input type="file" name="about_designer_image_file" accept="image/*" class="text-xs text-[#525560] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                    </div>
                    <div>
                        <label class="text-[11px] text-[#626570] block font-semibold">Or Image URL:</label>
                        <input type="text" name="about_designer_image" value="{{ $settings['about_designer_image'] ?? '' }}" class="w-full px-3 py-2 bg-white border border-stone-200 rounded-lg text-[#141518] text-xs font-mono">
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Meet Emily Narrative Story</label>
                <textarea name="about_bio" rows="5" 
                          class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">{{ $settings['about_bio'] ?? '' }}</textarea>
            </div>
        </div>

        <!-- SECTION 5: CONTACT & CREDIBILITY -->
        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-envelope text-[#9E825A]"></i>
                <span>5. Contact Info & Credibility Wording</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'emily@emilyroyce.com' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Studio Locations</label>
                    <input type="text" name="contact_location" value="{{ $settings['contact_location'] ?? 'London & Cambridge Studio, UK' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Land Registry Wording</label>
                    <input type="text" name="land_registry_note" value="{{ $settings['land_registry_note'] ?? 'Prepared in accordance with HM Land Registry requirements.' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Turnaround Notice</label>
                    <input type="text" name="turnaround_note" value="{{ $settings['turnaround_note'] ?? 'Typical turnaround: 24–48 hours (depending on project scope and availability).' }}" 
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end pt-4">
            <button type="submit" class="px-10 py-5 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl transition-all shadow-xl">
                Save All Site Settings
            </button>
        </div>

    </form>

</div>

@endsection
