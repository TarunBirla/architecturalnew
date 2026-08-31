<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Studio CMS Admin Panel | Emily Royce Architecture')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#0A0A0B',
                            sidebar: '#121316',
                            card: '#18191D',
                            accent: '#C5A880',
                            accentHover: '#B3956B',
                            border: '#27292F'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        heading: ['"Space Grotesk"', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { background-color: #0A0A0B; color: #F8F9FA; font-family: 'Plus Jakarta Sans', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0A0A0B; }
        ::-webkit-scrollbar-thumb { background: #27292F; border-radius: 3px; }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-brand-sidebar border-r border-brand-border flex flex-col justify-between p-6 flex-shrink-0">
        <div class="space-y-8">
            <!-- Brand -->
            <div class="flex items-center space-x-3 pb-6 border-b border-brand-border">
                <div class="w-9 h-9 border border-[#C5A880] flex items-center justify-center font-heading font-bold text-[#C5A880] text-sm">
                    ER
                </div>
                <div>
                    <h2 class="font-heading font-bold text-white text-sm">SECRET CMS PORTAL</h2>
                    <span class="text-[10px] text-[#C5A880] uppercase tracking-wider block">Admin Management</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-1 text-xs font-heading font-semibold uppercase tracking-wider">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#C5A880] text-black font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-5"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.settings') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.settings') ? 'bg-[#C5A880] text-black font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-sliders w-5"></i>
                    <span>Manage Site CMS</span>
                </a>

                <a href="{{ route('admin.projects') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.projects*') ? 'bg-[#C5A880] text-black font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-building w-5"></i>
                    <span>Manage Projects</span>
                </a>

                <a href="{{ route('admin.services') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.services*') ? 'bg-[#C5A880] text-black font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-ruler-combined w-5"></i>
                    <span>Floor Plan Services</span>
                </a>

                <a href="{{ route('admin.inquiries') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.inquiries*') ? 'bg-[#C5A880] text-black font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-envelope-open-text w-5"></i>
                    <span>Client Inquiries</span>
                </a>
            </nav>
        </div>

        <!-- Live Site Button -->
        <div class="pt-6 border-t border-brand-border">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center space-x-2 w-full py-3 bg-white/5 hover:bg-[#C5A880] text-gray-300 hover:text-black rounded-xl text-xs font-heading font-bold uppercase transition-all">
                <span>Preview Live Site</span>
                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="mb-6 bg-[#C5A880]/15 border border-[#C5A880] text-[#C5A880] px-6 py-4 rounded-xl flex items-center justify-between text-xs font-bold">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
