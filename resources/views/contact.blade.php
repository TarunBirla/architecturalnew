@extends('layouts.app')

@section('title', 'Contact Emily | Architectural Design & Visualisation')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-white border-b border-stone-200 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3.5 py-1 bg-[#C5A880]/15 border border-[#C5A880]/40 rounded-full text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">
                Direct Contact
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-[#141518] tracking-tight">
                TELL ME ABOUT <span class="gold-gradient-text">YOUR PROJECT</span>
            </h1>
            <p class="text-[#4A4D57] text-sm sm:text-base leading-relaxed">
                Tell me what you need and what you want to achieve. I respond within 24 hours.
            </p>
        </div>
    </div>
</section>

<!-- Contact Form & Details -->
<section class="py-20 bg-[#FBF9F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Interactive Form -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 sm:p-10 rounded-3xl border border-stone-200 shadow-sm space-y-6">
                    <div>
                        <h2 class="text-2xl font-heading font-bold text-[#141518]">
                            Project Enquiry Form
                        </h2>
                        <p class="text-xs text-[#525560] mt-1">Fill out the simple options below to get started.</p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6"
                          x-data="{ 
                            submitting: false,
                            selectedServices: []
                          }">
                        @csrf

                        <!-- Checkboxes: WHAT CAN I HELP YOU WITH? -->
                        <div class="space-y-3 p-5 bg-stone-50 rounded-2xl border border-stone-200">
                            <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518] block">
                                WHAT CAN I HELP YOU WITH?
                            </label>
                            
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-1 text-xs text-[#141518] font-semibold">
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="2D Floor Plan" class="w-4 h-4 rounded text-[#141518] focus:ring-[#C5A880]">
                                    <span>2D Floor Plan</span>
                                </label>

                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="3D Visualisation" class="w-4 h-4 rounded text-[#141518] focus:ring-[#C5A880]">
                                    <span>3D Visualisation</span>
                                </label>

                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Home Redesign" class="w-4 h-4 rounded text-[#141518] focus:ring-[#C5A880]">
                                    <span>Home Redesign</span>
                                </label>

                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Planning Drawings" class="w-4 h-4 rounded text-[#141518] focus:ring-[#C5A880]">
                                    <span>Planning Drawings</span>
                                </label>

                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Lease Plan" class="w-4 h-4 rounded text-[#141518] focus:ring-[#C5A880]">
                                    <span>Lease Plan</span>
                                </label>

                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="services[]" value="Property Project" class="w-4 h-4 rounded text-[#141518] focus:ring-[#C5A880]">
                                    <span>Property Project</span>
                                </label>

                                <label class="flex items-center space-x-2 cursor-pointer col-span-2 sm:col-span-1">
                                    <input type="checkbox" name="services[]" value="Other" class="w-4 h-4 rounded text-[#141518] focus:ring-[#C5A880]">
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Your Name *</label>
                                <input type="text" name="name" required placeholder="e.g. Sarah Jenkins"
                                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Email Address *</label>
                                <input type="email" name="email" required placeholder="name@domain.com"
                                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Telephone / WhatsApp</label>
                                <input type="text" name="phone" placeholder="+44 7700 900000"
                                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>

                            <!-- Property Location -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Project Location</label>
                                <input type="text" name="location" placeholder="e.g. London, Cambridge, UK"
                                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Tell me about your project & requirements *</label>
                            <textarea name="message" rows="5" required placeholder="Describe what you need, your property layout, or any sketches/photos you have..."
                                      class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none transition-colors"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" @click="submitting = true"
                                class="w-full py-4 bg-[#141518] text-white font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-[#C5A880] hover:text-black transition-all shadow-md flex items-center justify-center space-x-3">
                            <span x-text="submitting ? 'Sending Message...' : 'Send Message'"></span>
                            <i class="fa-solid fa-paper-plane text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right: Direct Contact Info -->
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
                    <h3 class="text-xl font-heading font-bold text-[#141518] border-b border-stone-200 pb-4">
                        Direct Contact
                    </h3>

                    <div class="space-y-4 text-sm text-[#3A3C44]">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-heading font-bold uppercase text-[#626570] block tracking-wider">Email</span>
                                <a href="mailto:emily@emilyroyce.com" class="font-bold text-[#141518] hover:text-[#9E825A] transition-colors">emily@emilyroyce.com</a>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-location-dot text-sm"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-heading font-bold uppercase text-[#626570] block tracking-wider">Location</span>
                                <span class="font-bold text-[#141518]">London & Cambridge, United Kingdom</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#141518] text-[#C5A880] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-clock text-sm"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-heading font-bold uppercase text-[#626570] block tracking-wider">Turnaround</span>
                                <span class="font-semibold text-[#141518]">Typical turnaround: 24–48 hours</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Credibility Note -->
                <div class="bg-stone-100 p-6 rounded-2xl border border-stone-200 space-y-2">
                    <div class="flex items-center space-x-2 text-[#9E825A]">
                        <i class="fa-solid fa-shield-halved text-xs"></i>
                        <h4 class="font-heading font-bold text-xs uppercase tracking-wider">HM Land Registry Wording</h4>
                    </div>
                    <p class="text-[11px] text-[#525560] leading-relaxed">
                        Lease plans are prepared in accordance with HM Land Registry requirements.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
