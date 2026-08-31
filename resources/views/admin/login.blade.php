<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Studio Login | Emily Royce Architecture</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

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
        body { background-color: #0D0D0E; color: #F8F9FA; font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Ambient Glow Orbs -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-amber-600/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-brand-card p-8 sm:p-10 rounded-3xl border border-white/10 shadow-2xl relative z-10 space-y-6">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="w-12 h-12 mx-auto border-2 border-[#C5A880] flex items-center justify-center font-heading text-lg font-bold text-[#C5A880] mb-2">
                ER
            </div>
            <h1 class="text-2xl font-heading font-bold text-white tracking-wide">EMILY ROYCE</h1>
            <p class="text-xs text-[#C5A880] uppercase tracking-widest font-heading font-semibold">Studio Admin Portal Login</p>
        </div>

        <!-- Session Flash / Error Messages -->
        @if(session('success'))
            <div class="p-3 bg-[#C5A880]/15 border border-[#C5A880] text-[#C5A880] rounded-xl text-xs font-bold text-center">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-3 bg-red-500/15 border border-red-500/40 text-red-400 rounded-xl text-xs font-bold text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Admin Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500 text-xs">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email', 'admin@emilyroyce.com') }}" required placeholder="admin@emilyroyce.com"
                           class="w-full pl-10 pr-4 py-3 bg-black/60 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-heading uppercase tracking-wider text-gray-300">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500 text-xs">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" required placeholder="••••••••"
                           class="w-full pl-10 pr-4 py-3 bg-black/60 border border-white/10 rounded-xl text-white text-sm focus:border-[#C5A880] focus:outline-none transition-colors">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs text-gray-400">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 accent-[#C5A880] rounded">
                    <span>Remember session</span>
                </label>
            </div>

            <button type="submit" 
                    class="w-full py-4 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-white transition-all shadow-xl shadow-[#C5A880]/20 flex items-center justify-center space-x-2">
                <span>Access CMS Dashboard</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </button>
        </form>

        <div class="pt-4 text-center text-[11px] text-gray-500 font-mono border-t border-white/5">
            Default Credentials: <code>admin@emilyroyce.com</code> / <code>password123</code>
        </div>
    </div>

</body>
</html>
