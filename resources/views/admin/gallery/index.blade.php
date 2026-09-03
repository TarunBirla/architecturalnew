@extends('admin.layout')

@section('title', 'Photo Gallery CMS | Studio CMS')

@section('content')

<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">Photo Gallery Manager</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Gallery Uploads</h1>
            <p class="text-xs text-[#525560] mt-1">Upload high-res CAD blueprints & 3D renders into the visual gallery archive.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Upload Photo Form -->
        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-4">
                <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3">Upload New Photo</h3>
                
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    
                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Photo Title *</label>
                        <input type="text" name="title" required placeholder="e.g. Townhouse CAD Floor Plan"
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Category *</label>
                        <select name="category" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Masonry Layout Height *</label>
                        <select name="aspect_ratio" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                            <option value="tall">Tall (Vertical High Model)</option>
                            <option value="wide">Wide (Horizontal Wide Model)</option>
                            <option value="square">Square (Medium Model)</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Image File *</label>
                        <input type="file" name="image" required accept="image/*"
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Caption / Notes</label>
                        <textarea name="caption" rows="2" placeholder="Brief description..."
                                  class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-md">
                        Upload to Gallery
                    </button>
                </form>
            </div>
        </div>

        <!-- Right: Gallery Grid -->
        <div class="lg:col-span-8">
            <div class="bg-white rounded-3xl border border-stone-200 shadow-sm p-6 space-y-4">
                <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3">Gallery Image Archive</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @forelse($galleries as $item)
                        <div class="bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-sm space-y-2 p-3">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-36 object-cover rounded-xl border border-stone-200">
                            <div class="space-y-1">
                                <span class="text-[10px] font-heading font-bold uppercase text-[#9E825A] block">{{ $item->category }}</span>
                                <h4 class="font-heading font-bold text-[#141518] text-xs truncate">{{ $item->title }}</h4>
                            </div>

                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete photo?')">
                                @csrf
                                <button type="submit" class="w-full py-1.5 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white rounded-lg text-[10px] font-bold transition-colors border border-red-200">
                                    Delete Photo
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="col-span-3 text-xs text-[#525560] py-4 text-center">No gallery items uploaded yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
