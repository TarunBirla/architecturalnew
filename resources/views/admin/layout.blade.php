<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Studio CMS Admin Panel | Emily Royce')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#141518',
                            sidebar: '#FFFFFF',
                            card: '#FFFFFF',
                            accent: '#C5A880',
                            accentHover: '#B3956B',
                            border: '#E5E2D9'
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
        body { background-color: #FBF9F5; color: #1A1B20; font-family: 'Plus Jakarta Sans', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #FBF9F5; }
        ::-webkit-scrollbar-thumb { background: #C5A880; border-radius: 3px; }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar Navigation (Light Luxury) -->
    <aside class="w-64 bg-white border-r border-stone-200 flex flex-col justify-between p-6 flex-shrink-0 shadow-sm">
        <div class="space-y-8">
            <!-- Brand -->
            <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 pb-6 border-b border-stone-200 group">
                <div class="w-9 h-9 border-2 border-[#C5A880] flex items-center justify-center font-heading font-bold text-[#C5A880] text-sm group-hover:bg-[#C5A880] group-hover:text-black transition-colors">
                    ER
                </div>
                <div>
                    <h2 class="font-heading font-bold text-[#141518] text-sm tracking-wider">STUDIO CMS</h2>
                    <span class="text-[10px] text-[#9E825A] uppercase tracking-wider block font-semibold">Emily Royce Admin</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="space-y-1.5 text-xs font-heading font-bold uppercase tracking-wider">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#141518] text-white shadow-md' : 'text-[#141518] hover:bg-stone-100 hover:text-[#9E825A]' }}">
                    <i class="fa-solid fa-chart-pie w-5 text-sm"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.projects') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.projects*') ? 'bg-[#141518] text-white shadow-md' : 'text-[#141518] hover:bg-stone-100 hover:text-[#9E825A]' }}">
                    <i class="fa-solid fa-folder-open w-5 text-sm"></i>
                    <span>Projects & Concepts</span>
                </a>

                <a href="{{ route('admin.gallery') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.gallery*') ? 'bg-[#141518] text-white shadow-md' : 'text-[#141518] hover:bg-stone-100 hover:text-[#9E825A]' }}">
                    <i class="fa-solid fa-images w-5 text-sm"></i>
                    <span>Photo Gallery CMS</span>
                </a>

                <a href="{{ route('admin.categories') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.categories*') ? 'bg-[#141518] text-white shadow-md' : 'text-[#141518] hover:bg-stone-100 hover:text-[#9E825A]' }}">
                    <i class="fa-solid fa-tags w-5 text-sm"></i>
                    <span>Category Manager</span>
                </a>

                <a href="{{ route('admin.services') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.services*') ? 'bg-[#141518] text-white shadow-md' : 'text-[#141518] hover:bg-stone-100 hover:text-[#9E825A]' }}">
                    <i class="fa-solid fa-ruler-combined w-5 text-sm"></i>
                    <span>Services & Pricing</span>
                </a>

                <a href="{{ route('admin.inquiries') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.inquiries*') ? 'bg-[#141518] text-white shadow-md' : 'text-[#141518] hover:bg-stone-100 hover:text-[#9E825A]' }}">
                    <i class="fa-solid fa-envelope-open-text w-5 text-sm"></i>
                    <span>Client Inquiries</span>
                </a>

                <a href="{{ route('admin.settings') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.settings') ? 'bg-[#141518] text-white shadow-md' : 'text-[#141518] hover:bg-stone-100 hover:text-[#9E825A]' }}">
                    <i class="fa-solid fa-sliders w-5 text-sm"></i>
                    <span>Site Settings</span>
                </a>
            </nav>
        </div>

        <!-- Footer Actions: Live Site & Logout -->
        <div class="pt-6 border-t border-stone-200 space-y-3">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center space-x-2 w-full py-2.5 bg-stone-100 hover:bg-[#141518] text-[#141518] hover:text-white rounded-xl text-xs font-heading font-bold uppercase transition-all shadow-sm">
                <span>Preview Live Site</span>
                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
            </a>

            <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="flex items-center justify-center space-x-2 w-full py-2.5 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white rounded-xl text-xs font-heading font-bold uppercase transition-colors border border-red-200">
                    <i class="fa-solid fa-right-from-bracket text-xs"></i>
                    <span>Admin Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="mb-6 bg-[#C5A880]/15 border border-[#C5A880] text-[#9E825A] px-6 py-4 rounded-xl flex items-center justify-between text-xs font-bold shadow-sm">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-lg text-[#C5A880]"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
