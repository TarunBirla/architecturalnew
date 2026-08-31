@extends('admin.layout')

@section('title', 'Manage Site CMS & Content | Emily Royce Architecture')

@section('content')

<div class="max-w-5xl space-y-8">

    <div>
        <h1 class="text-3xl font-heading font-bold text-white">Manage Site Content & Upload Photos (CMS)</h1>
        <p class="text-xs text-gray-400 mt-1">Upload photos directly from your device or paste image URLs. Active photos are previewed below and reflect live on the website immediately.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- SECTION 1: HERO BANNER & SLIDER -->
        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#C5A880] border-b border-brand-border pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-image"></i>
                <span>Homepage Hero Banner & Background Photos Carousel</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Hero Badge Tagline</label>
                    <input type="text" name="hero_badge_text" value="{{ $settings['hero_badge_text'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">CTA Button Text</label>
                    <input type="text" name="hero_cta_button_text" value="{{ $settings['hero_cta_button_text'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Main Hero Headline</label>
                <input type="text" name="hero_headline" value="{{ $settings['hero_headline'] ?? '' }}" 
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Hero Sub-headline / Paragraph</label>
                <textarea name="hero_subheadline" rows="3" 
                          class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">{{ $settings['hero_subheadline'] ?? '' }}</textarea>
            </div>

            <div class="space-y-6 pt-4 border-t border-brand-border">
                <h4 class="text-xs font-heading uppercase text-gray-400 flex items-center space-x-2">
                    <i class="fa-solid fa-camera text-[#C5A880]"></i>
                    <span>Hero Carousel Background Photos (Upload or URL)</span>
                </h4>
                
                <!-- Hero Image 1 -->
                <div class="p-4 bg-black/40 rounded-xl border border-white/5 grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                    <div class="sm:col-span-3">
                        <span class="text-[10px] text-gray-500 block uppercase font-heading">Currently Active Photo 1</span>
                        <img src="{{ $settings['hero_image_1'] ?? '' }}" alt="Hero 1" class="w-full h-24 object-cover rounded-lg border border-brand-border mt-1">
                    </div>
                    <div class="sm:col-span-9 space-y-3">
                        <div>
                            <label class="text-[11px] text-[#C5A880] font-bold block mb-1">Upload New Photo 1 from Device:</label>
                            <input type="file" name="hero_image_1_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
                        </div>
                        <div>
                            <label class="text-[11px] text-gray-400 block">Or Paste Image URL:</label>
                            <input type="text" name="hero_image_1" value="{{ $settings['hero_image_1'] ?? '' }}" class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
                        </div>
                    </div>
                </div>

                <!-- Hero Image 2 -->
                <div class="p-4 bg-black/40 rounded-xl border border-white/5 grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                    <div class="sm:col-span-3">
                        <span class="text-[10px] text-gray-500 block uppercase font-heading">Currently Active Photo 2</span>
                        <img src="{{ $settings['hero_image_2'] ?? '' }}" alt="Hero 2" class="w-full h-24 object-cover rounded-lg border border-brand-border mt-1">
                    </div>
                    <div class="sm:col-span-9 space-y-3">
                        <div>
                            <label class="text-[11px] text-[#C5A880] font-bold block mb-1">Upload New Photo 2 from Device:</label>
                            <input type="file" name="hero_image_2_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
                        </div>
                        <div>
                            <label class="text-[11px] text-gray-400 block">Or Paste Image URL:</label>
                            <input type="text" name="hero_image_2" value="{{ $settings['hero_image_2'] ?? '' }}" class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
                        </div>
                    </div>
                </div>

                <!-- Hero Image 3 -->
                <div class="p-4 bg-black/40 rounded-xl border border-white/5 grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                    <div class="sm:col-span-3">
                        <span class="text-[10px] text-gray-500 block uppercase font-heading">Currently Active Photo 3</span>
                        <img src="{{ $settings['hero_image_3'] ?? '' }}" alt="Hero 3" class="w-full h-24 object-cover rounded-lg border border-brand-border mt-1">
                    </div>
                    <div class="sm:col-span-9 space-y-3">
                        <div>
                            <label class="text-[11px] text-[#C5A880] font-bold block mb-1">Upload New Photo 3 from Device:</label>
                            <input type="file" name="hero_image_3_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
                        </div>
                        <div>
                            <label class="text-[11px] text-gray-400 block">Or Paste Image URL:</label>
                            <input type="text" name="hero_image_3" value="{{ $settings['hero_image_3'] ?? '' }}" class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: ABOUT EMILY ROYCE CMS -->
        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#C5A880] border-b border-brand-border pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-user-graduate"></i>
                <span>About Emily Royce Profile Photo & Details</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Designer Full Name</label>
                    <input type="text" name="about_designer_name" value="{{ $settings['about_designer_name'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Designer Title / Role</label>
                    <input type="text" name="about_designer_title" value="{{ $settings['about_designer_title'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>

            <!-- Profile Photo Upload -->
            <div class="p-4 bg-black/40 rounded-xl border border-white/5 grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-3">
                    <span class="text-[10px] text-gray-500 block uppercase font-heading">Active Profile Photo</span>
                    <img src="{{ $settings['about_designer_image'] ?? '' }}" alt="Emily Royce" class="w-full h-32 object-cover object-center rounded-lg border border-brand-border mt-1">
                </div>
                <div class="sm:col-span-9 space-y-3">
                    <div>
                        <label class="text-[11px] text-[#C5A880] font-bold block mb-1">Upload New Emily Profile Photo from Device:</label>
                        <input type="file" name="about_designer_image_file" accept="image/*" class="text-xs text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#C5A880] file:text-black hover:file:bg-white cursor-pointer">
                    </div>
                    <div>
                        <label class="text-[11px] text-gray-400 block">Or Paste Profile Image URL:</label>
                        <input type="text" name="about_designer_image" value="{{ $settings['about_designer_image'] ?? '' }}" class="w-full px-3 py-1.5 bg-black/60 border border-brand-border rounded-lg text-white text-xs font-mono">
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">About Section Main Heading</label>
                <input type="text" name="about_heading" value="{{ $settings['about_heading'] ?? '' }}" 
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Biography / Academic Narrative</label>
                <textarea name="about_bio" rows="4" 
                          class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">{{ $settings['about_bio'] ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2 border-t border-brand-border">
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">University Department Title</label>
                    <input type="text" name="about_dept_title" value="{{ $settings['about_dept_title'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">University Department Focus/Subtitle</label>
                    <input type="text" name="about_dept_subtitle" value="{{ $settings['about_dept_subtitle'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>
        </div>

        <!-- SECTION 3: CONTACT & FOOTER -->
        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#C5A880] border-b border-brand-border pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-address-book"></i>
                <span>Contact & Footer Information</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">Public Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading uppercase text-gray-300">SMTP Relay Inbox Email</label>
                    <input type="email" name="contact_relay_email" value="{{ $settings['contact_relay_email'] ?? '' }}" 
                           class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Office / Studio Locations</label>
                <input type="text" name="contact_location" value="{{ $settings['contact_location'] ?? '' }}" 
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Footer Quote</label>
                <input type="text" name="footer_quote" value="{{ $settings['footer_quote'] ?? '' }}" 
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs focus:border-[#C5A880] focus:outline-none">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-cloud-arrow-up text-sm"></i>
                <span>Upload Photos & Publish All Content Changes Live</span>
            </button>
        </div>

    </form>

</div>

@endsection
