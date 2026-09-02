<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Emily Royce | Architectural Design & Visualisation')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#141518',
                            card: '#FFFFFF',
                            border: '#E5E2D9',
                            accent: '#C5A880',
                            accentHover: '#B3956B',
                            light: '#FBF9F5',
                            text: '#1A1B20',
                            muted: '#626570'
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
            background-color: #FBF9F5;
            color: #1A1B20;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 7px;
        }
        ::-webkit-scrollbar-track {
            background: #F4F2EB;
        }
        ::-webkit-scrollbar-thumb {
            background: #C5A880;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #B3956B;
        }

        /* Glassmorphic Light Navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(229, 226, 217, 0.8);
        }

        .gold-gradient-text {
            background: linear-gradient(135deg, #1A1B20 0%, #9E825A 60%, #C5A880 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Architecture Blueprint Grid */
        .bg-blueprint {
            background-image: radial-gradient(rgba(197, 168, 128, 0.18) 1px, transparent 1px);
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
    </style>
</head>
<body x-data="{ mobileMenuOpen: false }">

    <!-- Navigation Header -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="group flex items-center space-x-3">
                <div class="w-10 h-10 border-2 border-[#C5A880] flex items-center justify-center font-heading text-lg font-bold text-[#C5A880] group-hover:bg-[#C5A880] group-hover:text-black transition-all duration-300">
                    ER
                </div>
                <div class="flex flex-col">
                    <span class="font-heading text-lg font-bold tracking-wider text-[#141518] group-hover:text-[#C5A880] transition-colors">EMILY ROYCE</span>
                    <span class="text-[10px] tracking-[0.18em] text-[#626570] uppercase font-sans">Architectural Design & Visualisation</span>
                </div>
            </a>

            <!-- Desktop Navigation Links (5 Streamlined Items) -->
            <div class="hidden md:flex items-center space-x-8 text-sm font-semibold tracking-wide">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#C5A880] font-bold' : 'text-[#1A1B20] hover:text-[#C5A880]' }} transition-colors py-1 relative group">
                    Home
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('home') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') || request()->routeIs('floor-plans.*') ? 'text-[#C5A880] font-bold' : 'text-[#1A1B20] hover:text-[#C5A880]' }} transition-colors py-1 relative group">
                    Services
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('services.*') || request()->routeIs('floor-plans.*') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') || request()->routeIs('gallery.*') ? 'text-[#C5A880] font-bold' : 'text-[#1A1B20] hover:text-[#C5A880]' }} transition-colors py-1 relative group">
                    Projects
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('projects.*') || request()->routeIs('gallery.*') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-[#C5A880] font-bold' : 'text-[#1A1B20] hover:text-[#C5A880]' }} transition-colors py-1 relative group">
                    About
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('about') ? 'scale-x-100' : '' }}"></span>
                </a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-[#C5A880] font-bold' : 'text-[#1A1B20] hover:text-[#C5A880]' }} transition-colors py-1 relative group">
                    Contact
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-[#C5A880] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 {{ request()->routeIs('contact') ? 'scale-x-100' : '' }}"></span>
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('contact') }}" class="px-6 py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading text-xs font-bold uppercase tracking-wider transition-all duration-300 shadow-md flex items-center space-x-2 rounded-xl">
                    <span>Tell Me About Your Project</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-[#141518] hover:text-[#C5A880] focus:outline-none p-2">
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
             class="md:hidden bg-white border-t border-stone-200 px-6 py-6 space-y-4 shadow-xl">
            <a href="{{ route('home') }}" class="block text-lg font-bold text-[#141518] hover:text-[#C5A880]">Home</a>
            <a href="{{ route('services.index') }}" class="block text-lg font-bold text-[#141518] hover:text-[#C5A880]">Services</a>
            <a href="{{ route('projects.index') }}" class="block text-lg font-bold text-[#141518] hover:text-[#C5A880]">Projects</a>
            <a href="{{ route('about') }}" class="block text-lg font-bold text-[#141518] hover:text-[#C5A880]">About Emily</a>
            <a href="{{ route('contact') }}" class="block text-lg font-bold text-[#141518] hover:text-[#C5A880]">Contact</a>
            <a href="{{ route('contact') }}" class="block w-full text-center py-3.5 bg-[#141518] text-white font-heading font-bold uppercase tracking-wider text-xs rounded-xl">
                Tell Me About Your Project
            </a>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="relative z-10 pt-20">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-6">
                <div class="bg-[#C5A880]/15 border border-[#C5A880] text-[#9E825A] px-6 py-4 rounded-xl flex items-center justify-between shadow-sm">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-circle-check text-xl text-[#C5A880]"></i>
                        <span class="font-semibold text-sm">{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Studio Footer (Grounding Dark Charcoal Block) -->
    <footer class="relative z-10 bg-[#141518] text-gray-300 pt-16 pb-12 mt-20 border-t border-stone-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-stone-800">
                <!-- Column 1: Designer Profile -->
                <div class="md:col-span-1 space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 border-2 border-[#C5A880] flex items-center justify-center font-heading text-sm font-bold text-[#C5A880]">
                            ER
                        </div>
                        <span class="font-heading text-base font-bold tracking-wider text-white">EMILY ROYCE</span>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed">
                        Architecture & Design Student specializing in creative spatial design, precise 2D CAD floor plans, and 3D visualisations.
                    </p>
                    <div class="pt-2 text-xs text-[#C5A880] font-semibold">
                        <i class="fa-solid fa-graduation-cap mr-2"></i>Architecture & Design Student
                    </div>
                </div>

                <!-- Column 2: Navigation -->
                <div class="space-y-3">
                    <h4 class="font-heading text-xs font-bold uppercase tracking-widest text-[#C5A880]">Navigation</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Services</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-white transition-colors">Projects & Concepts</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Meet Emily</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Column 3: Services Offered -->
                <div class="space-y-3">
                    <h4 class="font-heading text-xs font-bold uppercase tracking-widest text-[#C5A880]">Services Offered</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">2D Floor Plans (From £85)</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">3D Visualisations (From £175)</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Lease Plans (From £145)</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Design & Planning Drawings (From £350)</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Credibility -->
                <div class="space-y-3">
                    <h4 class="font-heading text-xs font-bold uppercase tracking-widest text-[#C5A880]">Contact & Details</h4>
                    <ul class="space-y-2.5 text-xs text-gray-400">
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-envelope text-[#C5A880]"></i>
                            <a href="mailto:emily@emilyroyce.com" class="hover:text-white transition-colors">emily@emilyroyce.com</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fa-solid fa-location-dot text-[#C5A880]"></i>
                            <span>London & Cambridge, UK</span>
                        </li>
                        <li class="pt-2 text-[11px] text-gray-400">
                            <i class="fa-solid fa-shield-halved text-[#C5A880] mr-1"></i> Prepared in accordance with HM Land Registry requirements.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Emily Royce. Architectural Design & Visualisation.</p>
                <p class="mt-4 md:mt-0 font-sans text-gray-400">Thoughtful design. Precise drawings.</p>
            </div>
        </div>
    </footer>

</body>
</html>
