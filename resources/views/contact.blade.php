@extends('layouts.app')

@section('title', 'Contact Studio | Emily Royce Architecture')

@section('content')

<!-- Header Banner -->
<section class="py-16 bg-[#111215] border-b border-white/5 bg-blueprint">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880]">
                Direct Studio Inquiry
            </div>
            <h1 class="text-4xl sm:text-6xl font-heading font-bold text-white tracking-tight">
                Start Your <span class="gold-gradient-text">Architectural Brief</span>
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                Send us your project details, required floor plan service, or architectural inquiry. We respond within 24 hours.
            </p>
        </div>
    </div>
</section>

<!-- Contact Form & Studio Info -->
<section class="py-20 bg-[#0D0D0E]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Interactive Form -->
            <div class="lg:col-span-7">
                <div class="glass-card p-8 sm:p-10 rounded-3xl border border-white/10 shadow-2xl">
                    <h2 class="text-2xl font-heading font-bold text-white mb-6">
                        Commission Brief / Inquiry Form
                    </h2>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6"
                          x-data="{ 
                            submitting: false,
                            service: '{{ request()->query('service') }}' || '2D Architectural CAD Floor Plans'
                          }">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Your Full Name *</label>
                                <input type="text" name="name" required placeholder="e.g. Alexander Vance"
                                       class="w-full px-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Email Address *</label>
                                <input type="email" name="email" required placeholder="name@domain.com"
                                       class="w-full px-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Telephone / WhatsApp</label>
                                <input type="text" name="phone" placeholder="+44 7700 900000"
                                       class="w-full px-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>

                            <!-- Service Type -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Service Category</label>
                                <select name="service_type" x-model="service"
                                        class="w-full px-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                                    <option value="2D Architectural CAD Floor Plans">2D Architectural CAD Floor Plans</option>
                                    <option value="3D Photorealistic Rendered Floor Plans">3D Photorealistic Rendered Floor Plans</option>
                                    <option value="HM Land Registry Compliant Lease Plans">HM Land Registry Compliant Lease Plans</option>
                                    <option value="Planning Permission & Building Control Drawings">Planning Permission Drawings</option>
                                    <option value="Full Architectural Design Consultation">Full Architectural Design Consultation</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Budget Range -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Target Budget</label>
                                <select name="budget_range"
                                        class="w-full px-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                                    <option value="Under £250">Under £250 (Standard Floor Plan)</option>
                                    <option value="£250 - £1,000">£250 - £1,000 (Multi-tier 3D / Lease Package)</option>
                                    <option value="£1,000 - £5,000">£1,000 - £5,000 (Planning Application Package)</option>
                                    <option value="£5,000+">£5,000+ (Bespoke Architectural Project)</option>
                                </select>
                            </div>

                            <!-- Property Size -->
                            <div class="space-y-2">
                                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Approx. Floor Area (SQM)</label>
                                <input type="text" name="property_size_sqm" value="{{ request()->query('sqm') }}" placeholder="e.g. 120 m²"
                                       class="w-full px-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                            </div>
                        </div>

                        <!-- Message Brief -->
                        <div class="space-y-2">
                            <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Project Brief & Site Location *</label>
                            <textarea name="message" rows="5" required placeholder="Describe your property layout, intended deadlines, or specific architectural requirements..."
                                      class="w-full px-4 py-3 bg-black/50 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" @click="submitting = true"
                                class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-3">
                            <span x-text="submitting ? 'Transmitting Brief via SMTP...' : 'Send Architectural Brief'"></span>
                            <i class="fa-solid fa-paper-plane text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right: Direct Studio Info -->
            <div class="lg:col-span-5 space-y-8">
                <div class="glass-card p-8 rounded-3xl border border-white/10 space-y-6">
                    <h3 class="text-xl font-heading font-bold text-white border-b border-white/10 pb-4">
                        Studio Contact Info
                    </h3>

                    <div class="space-y-4 text-sm text-gray-300">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-heading uppercase text-gray-500 block tracking-wider">Direct Email</span>
                                <a href="mailto:emily@emilyroyce.com" class="font-bold text-white hover:text-[#C5A880] transition-colors">emily@emilyroyce.com</a>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-paper-plane text-sm"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-heading uppercase text-gray-500 block tracking-wider">SMTP Dispatch Relay</span>
                                <span class="font-mono text-xs text-gray-400">phil.andreson@nexteck.uk</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-location-dot text-sm"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-heading uppercase text-gray-500 block tracking-wider">Studio Locations</span>
                                <span class="font-medium text-white">London & Cambridge, United Kingdom</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Database Status Badge -->
                <div class="glass-card p-6 rounded-2xl border border-[#C5A880]/30 space-y-2">
                    <div class="flex items-center space-x-2 text-[#C5A880]">
                        <i class="fa-solid fa-database text-xs"></i>
                        <h4 class="font-heading font-bold text-xs uppercase tracking-wider">MySQL Connected: `architecture` DB</h4>
                    </div>
                    <p class="text-[11px] text-gray-400 leading-relaxed">
                        Inquiries are logged securely into host <code>103.171.180.169</code> and dispatched simultaneously to studio inbox.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
