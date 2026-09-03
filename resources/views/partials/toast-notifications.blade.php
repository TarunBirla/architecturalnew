<!-- Centralized Luxury Toast Notifications Container -->
<div class="fixed top-6 right-6 z-[9999] space-y-3 max-w-sm w-full pointer-events-none px-4 sm:px-0">

    <!-- SUCCESS TOAST NOTIFICATION -->
    @if(session('success'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 5000)"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-300 transform"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95"
             class="pointer-events-auto bg-[#141518] text-white p-4 rounded-2xl border border-[#C5A880]/50 shadow-2xl flex items-start space-x-3">
            
            <div class="w-8 h-8 rounded-xl bg-[#C5A880]/20 border border-[#C5A880]/40 text-[#C5A880] flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-circle-check text-sm"></i>
            </div>
            
            <div class="flex-grow space-y-0.5">
                <h4 class="font-heading font-bold text-xs uppercase tracking-wider text-[#C5A880]">Success</h4>
                <p class="text-xs text-gray-200 leading-relaxed font-sans">{{ session('success') }}</p>
            </div>

            <button @click="show = false" class="text-gray-400 hover:text-white transition-colors text-xs p-1">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    <!-- ERROR TOAST NOTIFICATION -->
    @if(session('error'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 6000)"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-300 transform"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95"
             class="pointer-events-auto bg-red-950 text-white p-4 rounded-2xl border border-red-500/50 shadow-2xl flex items-start space-x-3">
            
            <div class="w-8 h-8 rounded-xl bg-red-500/20 border border-red-500/40 text-red-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-circle-xmark text-sm"></i>
            </div>
            
            <div class="flex-grow space-y-0.5">
                <h4 class="font-heading font-bold text-xs uppercase tracking-wider text-red-300">Action Failed</h4>
                <p class="text-xs text-red-100 leading-relaxed font-sans">{{ session('error') }}</p>
            </div>

            <button @click="show = false" class="text-red-300 hover:text-white transition-colors text-xs p-1">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    <!-- VALIDATION ERRORS TOAST -->
    @if(isset($errors) && $errors->any())
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 7000)"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-300 transform"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95"
             class="pointer-events-auto bg-stone-900 text-white p-4 rounded-2xl border border-amber-500/50 shadow-2xl flex items-start space-x-3">
            
            <div class="w-8 h-8 rounded-xl bg-amber-500/20 border border-amber-500/40 text-amber-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-triangle-exclamation text-sm"></i>
            </div>
            
            <div class="flex-grow space-y-1">
                <h4 class="font-heading font-bold text-xs uppercase tracking-wider text-amber-300">Please Check Input</h4>
                <ul class="text-xs text-stone-200 list-disc list-inside space-y-0.5 font-sans">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <button @click="show = false" class="text-stone-400 hover:text-white transition-colors text-xs p-1">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

</div>
