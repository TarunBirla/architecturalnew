<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Studio Login | Emily Royce Architecture</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
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
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { background-color: #FBF9F5; color: #1A1B20; font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden bg-blueprint">

    <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-3xl border border-stone-200 shadow-xl relative z-10 space-y-6">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="w-12 h-12 mx-auto border-2 border-[#C5A880] flex items-center justify-center font-heading text-lg font-bold text-[#C5A880] mb-2">
                ER
            </div>
            <h1 class="text-2xl font-heading font-bold text-[#141518] tracking-wide">EMILY ROYCE</h1>
            <p class="text-xs text-[#9E825A] uppercase tracking-widest font-heading font-bold">Studio Admin Portal Login</p>
        </div>

        <!-- Session Flash / Error Messages -->
        @if(session('success'))
            <div class="p-3 bg-[#C5A880]/15 border border-[#C5A880] text-[#9E825A] rounded-xl text-xs font-bold text-center shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-xs font-bold text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form with Password Show/Hide Toggle -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5" x-data="{ showPassword: false }">
            @csrf

            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Admin Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-[#9E825A] text-xs">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email', 'admin@emilyroyce.com') }}" required placeholder="admin@emilyroyce.com"
                           class="w-full pl-10 pr-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none transition-colors">
                </div>
            </div>

            <!-- Password Field with Eye Toggle Icon -->
            <div class="space-y-2">
                <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-[#9E825A] text-xs">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    
                    <input :type="showPassword ? 'text' : 'password'" name="password" required placeholder="••••••••"
                           class="w-full pl-10 pr-10 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none transition-colors">
                    
                    <button type="button" @click="showPassword = !showPassword" 
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-[#525560] hover:text-[#141518] focus:outline-none text-xs">
                        <i class="fa-solid" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full py-4 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl transition-all shadow-md">
                Authenticate Admin Access
            </button>
        </form>

        <div class="pt-4 border-t border-stone-100 text-center">
            <a href="{{ route('home') }}" class="text-xs text-[#525560] hover:text-[#9E825A] font-semibold transition-colors">
                ← Return to Public Portfolio Website
            </a>
        </div>

    </div>

</body>
</html>
