@extends('admin.layout')

@section('title', 'Manage Work Categories | Studio CMS')

@section('content')

<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">CMS Category Manager</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Work Categories</h1>
            <p class="text-xs text-[#525560] mt-1">Add, update, or remove dynamic work categories across projects & photo gallery.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Create Category Form -->
        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-4">
                <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3">Add New Category</h3>
                
                <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Category Name *</label>
                        <input type="text" name="name" required placeholder="e.g. 3D Visualisations"
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Sort Order</label>
                        <input type="number" name="sort_order" value="0" min="0"
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-md">
                        Create Category
                    </button>
                </form>
            </div>
        </div>

        <!-- Right: Category List -->
        <div class="lg:col-span-8">
            <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden p-6 space-y-4">
                <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3">Existing Work Categories</h3>

                <div class="space-y-3">
                    @forelse($categories as $cat)
                        <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h4 class="font-heading font-bold text-[#141518] text-sm">{{ $cat->name }}</h4>
                                <span class="text-[11px] font-mono text-[#626570]">Slug: {{ $cat->slug }} &bull; Order: {{ $cat->sort_order }}</span>
                            </div>

                            <div class="flex items-center space-x-2">
                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white rounded-lg text-xs font-bold transition-colors border border-red-200">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-[#525560] py-4 text-center">No categories found.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
