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

    <!-- CENTRAL FRONTEND THEME SYSTEM -->
    @include('partials.theme-frontend')

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-[#C5A880] selection:text-black">

    <!-- HEADER / NAVIGATION (LIGHT GLASSMORPHIC) -->
    <header class="sticky top-0 z-40 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand Name -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 border-2 border-[#C5A880] flex items-center justify-center font-heading font-bold text-[#C5A880] text-base group-hover:bg-[#C5A880] group-hover:text-black transition-colors rounded-lg">
                        ER
                    </div>
                    <div class="flex flex-col">
                        <span class="font-heading font-bold text-[#141518] tracking-wider text-sm group-hover:text-[#9E825A] transition-colors">
                            EMILY ROYCE
                        </span>
                        <span class="text-[10px] text-[#626570] tracking-widest font-heading font-bold uppercase">
                            Architecture & Design Student
                        </span>
                    </div>
                </a>

                <!-- Streamlined 5-Item Navigation Menu -->
                <nav class="hidden md:flex items-center space-x-8 font-heading text-xs font-bold uppercase tracking-wider">
                    <a href="{{ route('home') }}" 
                       class="transition-colors hover:text-[#9E825A] {{ request()->routeIs('home') ? 'text-[#141518] font-extrabold border-b-2 border-[#C5A880] pb-1' : 'text-[#626570]' }}">
                        HOME
                    </a>

                    <a href="{{ route('services.index') }}" 
                       class="transition-colors hover:text-[#9E825A] {{ request()->routeIs('services*') || request()->routeIs('floor-plans*') ? 'text-[#141518] font-extrabold border-b-2 border-[#C5A880] pb-1' : 'text-[#626570]' }}">
                        SERVICES
                    </a>

                    <a href="{{ route('projects.index') }}" 
                       class="transition-colors hover:text-[#9E825A] {{ request()->routeIs('projects*') ? 'text-[#141518] font-extrabold border-b-2 border-[#C5A880] pb-1' : 'text-[#626570]' }}">
                        PROJECTS
                    </a>

                    <a href="{{ route('about') }}" 
                       class="transition-colors hover:text-[#9E825A] {{ request()->routeIs('about') ? 'text-[#141518] font-extrabold border-b-2 border-[#C5A880] pb-1' : 'text-[#626570]' }}">
                        ABOUT
                    </a>

                    <a href="{{ route('contact') }}" 
                       class="transition-colors hover:text-[#9E825A] {{ request()->routeIs('contact') ? 'text-[#141518] font-extrabold border-b-2 border-[#C5A880] pb-1' : 'text-[#626570]' }}">
                        CONTACT
                    </a>
                </nav>

                <!-- Primary CTA Button: TELL ME ABOUT YOUR PROJECT -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="{{ route('contact') }}" class="px-5 py-2.5 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all duration-300 shadow-sm flex items-center space-x-2">
                        <span>Tell Me About Your Project</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Mobile Menu Button (Alpine.js toggle) -->
                <div class="md:hidden flex items-center" x-data="{ open: false }">
                    <button @click="open = !open" class="text-[#141518] p-2 focus:outline-none">
                        <i class="fa-solid" :class="open ? 'fa-xmark text-xl' : 'fa-bars text-xl'"></i>
                    </button>

                    <!-- Mobile Drawer -->
                    <div x-show="open" 
                         @click.away="open = false" 
                         x-transition
                         class="absolute top-20 left-0 right-0 bg-white border-b border-stone-200 p-6 space-y-4 shadow-xl z-50">
                        <a href="{{ route('home') }}" class="block text-sm font-heading font-bold text-[#141518]">HOME</a>
                        <a href="{{ route('services.index') }}" class="block text-sm font-heading font-bold text-[#141518]">SERVICES</a>
                        <a href="{{ route('projects.index') }}" class="block text-sm font-heading font-bold text-[#141518]">PROJECTS</a>
                        <a href="{{ route('about') }}" class="block text-sm font-heading font-bold text-[#141518]">ABOUT</a>
                        <a href="{{ route('contact') }}" class="block text-sm font-heading font-bold text-[#141518]">CONTACT</a>
                        
                        <div class="pt-4 border-t border-stone-100">
                            <a href="{{ route('contact') }}" class="block w-full py-3 bg-[#141518] text-white text-center font-heading font-bold text-xs uppercase tracking-wider rounded-xl">
                                Tell Me About Your Project
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- MAIN PAGE CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER (DARK CONTRAST LUXURY) -->
    <footer class="bg-[#141518] text-white border-t border-white/10 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 pb-12 border-b border-white/10">
                
                <!-- Col 1: Brand Narrative -->
                <div class="md:col-span-5 space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 border border-[#C5A880] flex items-center justify-center font-heading font-bold text-[#C5A880] text-sm rounded-lg">
                            ER
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-white text-base">EMILY ROYCE</h3>
                            <span class="text-[10px] text-[#C5A880] font-heading font-bold uppercase tracking-widest block">Architectural Design & Visualisation</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed max-w-md">
                        Architecture & Design Student focusing on creative spatial design, precise 2D CAD floor plans, and 3D visualisations.
                    </p>
                </div>

                <!-- Col 2: Navigation Links -->
                <div class="md:col-span-3 space-y-3">
                    <h4 class="font-heading font-bold text-xs uppercase tracking-widest text-[#C5A880]">Navigation</h4>
                    <ul class="space-y-2 text-xs text-gray-300 font-heading font-semibold">
                        <li><a href="{{ route('home') }}" class="hover:text-[#C5A880] transition-colors">Home</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-[#C5A880] transition-colors">Services & Pricing</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-[#C5A880] transition-colors">Architectural Concepts</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#C5A880] transition-colors">Meet Emily</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#C5A880] transition-colors">Contact & Brief</a></li>
                    </ul>
                </div>

                <!-- Col 3: Direct Studio Contact -->
                <div class="md:col-span-4 space-y-3">
                    <h4 class="font-heading font-bold text-xs uppercase tracking-widest text-[#C5A880]">Studio Contact</h4>
                    <div class="space-y-2 text-xs text-gray-300 font-mono">
                        <div><i class="fa-solid fa-envelope text-[#C5A880] mr-2"></i> emily@emilyroyce.com</div>
                        <div><i class="fa-solid fa-location-dot text-[#C5A880] mr-2"></i> London & Cambridge Studio, UK</div>
                        <div class="pt-2 text-[11px] text-gray-400 font-sans">
                            Typical turnaround: 24–48 hours (depending on project scope and availability).
                        </div>
                    </div>
                </div>

            </div>

            <!-- Copyright & Secret Admin Portal Link -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-gray-500 font-mono gap-4">
                <div>
                    &copy; {{ date('Y') }} Emily Royce. Architectural Design & Visualisation. All rights reserved.
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.login') }}" class="text-gray-600 hover:text-[#C5A880] transition-colors text-[11px]">
                        <i class="fa-solid fa-lock text-[10px] mr-1"></i> Studio Admin Portal
                    </a>
                </div>
            </div>

        </div>
    </footer>

</body>
</html>
