@extends('admin.layout')

@section('title', 'Manage Site CMS & Content | Emily Royce Architecture')

@section('content')

<div class="max-w-5xl space-y-8">

    <div>
        <h1 class="text-3xl font-heading font-bold text-white">Manage Site Content & Banners (CMS)</h1>
        <p class="text-xs text-gray-400 mt-1">Update hero headlines, subheadings, images, bio text, and contact information. Changes appear live on the website immediately.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf

        <!-- SECTION 1: HERO BANNER & SLIDER -->
        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#C5A880] border-b border-brand-border pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-image"></i>
                <span>Homepage Hero Banner & Images Carousel</span>
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

            <div class="space-y-4 pt-2 border-t border-brand-border">
                <h4 class="text-xs font-heading uppercase text-gray-400">Hero Background Carousel Image URLs</h4>
                
                <div class="space-y-3">
                    <div>
                        <label class="text-[11px] text-gray-400">Carousel Image 1 URL</label>
                        <input type="text" name="hero_image_1" value="{{ $settings['hero_image_1'] ?? '' }}" 
                               class="w-full px-4 py-2 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
                    </div>

                    <div>
                        <label class="text-[11px] text-gray-400">Carousel Image 2 URL</label>
                        <input type="text" name="hero_image_2" value="{{ $settings['hero_image_2'] ?? '' }}" 
                               class="w-full px-4 py-2 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
                    </div>

                    <div>
                        <label class="text-[11px] text-gray-400">Carousel Image 3 URL</label>
                        <input type="text" name="hero_image_3" value="{{ $settings['hero_image_3'] ?? '' }}" 
                               class="w-full px-4 py-2 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono">
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: ABOUT EMILY ROYCE CMS -->
        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-6">
            <h3 class="text-lg font-heading font-bold text-[#C5A880] border-b border-brand-border pb-3 flex items-center space-x-2">
                <i class="fa-solid fa-user-graduate"></i>
                <span>About Emily Royce Section & Profile Picture</span>
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

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase text-gray-300">Emily Royce Profile Picture Image URL</label>
                <input type="text" name="about_designer_image" value="{{ $settings['about_designer_image'] ?? '' }}" 
                       class="w-full px-4 py-2.5 bg-black/60 border border-brand-border rounded-xl text-white text-xs font-mono focus:border-[#C5A880] focus:outline-none">
                <p class="text-[10px] text-gray-500">Enter image URL to update Emily's studio profile photo across home and about pages.</p>
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
                <i class="fa-solid fa-save"></i>
                <span>Save & Publish All Site Content Changes</span>
            </button>
        </div>

    </form>

</div>

@endsection
