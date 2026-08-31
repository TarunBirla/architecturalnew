<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Emily Royce | Architecture & Spatial Design Studio')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#0D0D0E',
                            card: '#16171A',
                            border: '#27292D',
                            accent: '#C5A880',
                            accentHover: '#B3956B',
                            light: '#F8F9FA',
                            muted: '#8E9299'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        heading: ['"Space Grotesk"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif']
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #0D0D0E;
            color: #F8F9FA;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0D0D0E;
        }
        ::-webkit-scrollbar-thumb {
            background: #27292D;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #C5A880;
        }

        /* Glassmorphic Styles */
        .glass-nav {
            background: rgba(13, 13, 14, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(22, 23, 26, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .glass-card:hover {
            border-color: rgba(197, 168, 128, 0.4);
            box-shadow: 0 10px 30px -10px rgba(197, 168, 128, 0.15);
        }

        /* Gold Accent Gradients & Glow */
        .gold-gradient-text {
            background: linear-gradient(135deg, #FFF 0%, #C5A880 50%, #EFECE6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gold-glow {
            box-shadow: 0 0 25px rgba(197, 168, 128, 0.25);
        }

        /* Architecture Grid Blueprint Line */
        .bg-blueprint {
            background-image: radial-gradient(rgba(197, 168, 128, 0.12) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Before/After Split Slider */
        .ba-slider-container {
            position: relative;
            overflow: hidden;
            user-select: none;
        }
        .ba-slider-after {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            overflow: hidden;
        }

        /* Animations */
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.05); }
        }
        .animate-glow {
            animation: pulseGlow 6s infinite ease-in-out;
        }
    </style>
</head>
<body x-data="{ mobileMenuOpen: false, activeModal: null }">

    <!-- Ambient Glowing Orbs background -->
    <div class="fixed top-0 left-1/4 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl pointer-events-none animate-glow z-0"></div>
    <div class="fixed bottom-10 right-10 w-96 h-96 bg-amber-600/5 rounded-full blur-3xl pointer-events-none animate-glow z-0"></div>

    <!-- Navigation Header -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="group flex items-center space-x-3">
                <div class="w-10 h-10 border border-[#C5A880]/40 flex items-center justify-center font-heading text-lg font-bold text-[#C5A880] group-hover:bg-[#C5A880] group-hover:text-black transition-all duration-300">
                    ER
                </div>
                <div class="flex flex-col">
                    <span class="font-heading text-lg font-bold tracking-wider text-white group-hover:text-[#C5A880] transition-colors">EMILY ROYCE</span>
                    <span class="text-[10px] tracking-[0.25em] text-brand-muted uppercase font-sans">Architecture & Design</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-8 text-sm font-medium tracking-wide">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#C5A880] font-semibold' : 'text-gray-300 hover:text-white' }} transition-colors py-1 relative group">
                    Home
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('home') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'text-[#C5A880] font-semibold' : 'text-gray-300 hover:text-white' }} transition-colors py-1 relative group">
                    Portfolio Projects
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('projects.*') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('floor-plans.index') }}" class="{{ request()->routeIs('floor-plans.*') ? 'text-[#C5A880] font-semibold' : 'text-gray-300 hover:text-white' }} transition-colors py-1 relative group flex items-center space-x-1">
                    <span>Floor Plans</span>
                    <span class="px-1.5 py-0.5 text-[9px] bg-[#C5A880]/20 text-[#C5A880] border border-[#C5A880]/30 rounded uppercase font-bold">2D/3D</span>
                </a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-[#C5A880] font-semibold' : 'text-gray-300 hover:text-white' }} transition-colors py-1 relative group">
                    About Emily
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('about') ? 'scale-x-100' : '' }}"></span>
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('contact') }}" class="px-5 py-2.5 bg-[#C5A880] text-black font-heading text-xs font-bold uppercase tracking-wider hover:bg-white transition-all duration-300 shadow-lg shadow-[#C5A880]/20 flex items-center space-x-2">
                    <span>Request Consultation</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-300 hover:text-white focus:outline-none p-2">
                    <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark text-2xl' : 'fa-bars text-xl'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden glass-card border-t border-white/10 px-6 py-6 space-y-4">
            <a href="{{ route('home') }}" class="block text-lg font-medium text-white hover:text-[#C5A880]">Home</a>
            <a href="{{ route('projects.index') }}" class="block text-lg font-medium text-white hover:text-[#C5A880]">Portfolio Projects</a>
            <a href="{{ route('floor-plans.index') }}" class="block text-lg font-medium text-white hover:text-[#C5A880]">Floor Planning Services</a>
            <a href="{{ route('about') }}" class="block text-lg font-medium text-white hover:text-[#C5A880]">About Emily Royce</a>
            <a href="{{ route('contact') }}" class="block w-full text-center py-3 bg-[#C5A880] text-black font-heading font-bold uppercase tracking-wider text-xs">
                Request Consultation
            </a>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="relative z-10 pt-20">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-6">
                <div class="bg-[#C5A880]/15 border border-[#C5A880] text-[#C5A880] px-6 py-4 rounded-lg flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                        <span class="font-medium text-sm">{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Studio Footer -->
    <footer class="relative z-10 bg-[#09090A] border-t border-white/10 pt-16 pb-12 mt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-white/10">
                <!-- Column 1: Studio Info -->
                <div class="md:col-span-1 space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 border border-[#C5A880] flex items-center justify-center font-heading text-sm font-bold text-[#C5A880]">
                            ER
                        </div>
                        <span class="font-heading text-base font-bold tracking-wider text-white">EMILY ROYCE</span>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed">
                        Design & Architecture Studio specializing in sustainable architectural concepts, 2D/3D floor planning, land registry lease plans, and urban spatial design.
                    </p>
                    <div class="pt-2 text-xs text-[#C5A880]">
                        <i class="fa-solid fa-graduation-cap mr-2"></i>University Architecture Scholar
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="space-y-3">
                    <h4 class="font-heading text-xs font-bold uppercase tracking-widest text-[#C5A880]">Navigation</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home Studio</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-white transition-colors">Architectural Projects</a></li>
                        <li><a href="{{ route('floor-plans.index') }}" class="hover:text-white transition-colors">Floor Plan Services</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Emily Royce</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Book Consultation</a></li>
                    </ul>
                </div>

                <!-- Column 3: Floor Plan Services -->
                <div class="space-y-3">
                    <h4 class="font-heading text-xs font-bold uppercase tracking-widest text-[#C5A880]">Services</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="{{ route('floor-plans.index') }}" class="hover:text-white transition-colors">2D Architectural CAD Plans</a></li>
                        <li><a href="{{ route('floor-plans.index') }}" class="hover:text-white transition-colors">3D Photorealistic Renders</a></li>
                        <li><a href="{{ route('floor-plans.index') }}" class="hover:text-white transition-colors">Land Registry Lease Plans</a></li>
                        <li><a href="{{ route('floor-plans.index') }}" class="hover:text-white transition-colors">Planning Permission Drawings</a></li>
                    </ul>
                </div>

                <!-- Column 4: Direct Contact -->
                <div class="space-y-3">
                    <h4 class="font-heading text-xs font-bold uppercase tracking-widest text-[#C5A880]">Direct Contact</h4>
                    <ul class="space-y-2.5 text-xs text-gray-400">
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-envelope text-[#C5A880]"></i>
                            <a href="mailto:emily@emilyroyce.com" class="hover:text-white transition-colors">emily@emilyroyce.com</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-location-dot text-[#C5A880]"></i>
                            <span>{{ \App\Models\SiteSetting::get('contact_location', 'London & Cambridge Studio, UK') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Emily Royce Architecture & Design. All rights reserved.</p>
                <p class="mt-4 md:mt-0 font-serif italic text-gray-400">"Architecture is the learned game, correct and magnificent, of forms assembled in the light."</p>
            </div>
        </div>
    </footer>

</body>
</html>
