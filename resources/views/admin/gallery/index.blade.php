@extends('admin.layout')

@section('title', 'Photo Gallery CMS | Studio CMS')

@section('content')

<div class="space-y-8" x-data="{ activeEditPhoto: null }">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">Photo Gallery Manager</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Gallery Uploads</h1>
            <p class="text-xs text-[#525560] mt-1">Upload high-res CAD blueprints & 3D renders into the visual gallery archive. Edit or delete existing photos.</p>
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
                        <input type="file" name="image" accept="image/*"
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold focus:border-[#C5A880] focus:outline-none">
                        <span class="text-[10px] text-stone-400 block">Or paste Image URL below:</span>
                        <input type="text" name="image_url" placeholder="https://images.unsplash.com/..."
                               class="w-full px-3 py-2 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-mono">
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
                <h3 class="text-lg font-heading font-bold text-[#141518] border-b border-stone-200 pb-3">Gallery Image Archive ({{ count($galleries) }} Photos)</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @forelse($galleries as $item)
                        <div class="bg-stone-50 rounded-2xl overflow-hidden border border-stone-200 shadow-sm space-y-2 p-3">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-36 object-cover rounded-xl border border-stone-200">
                            <div class="space-y-1">
                                <span class="text-[10px] font-heading font-bold uppercase text-[#9E825A] block">{{ $item->category }} &bull; {{ strtoupper($item->aspect_ratio) }}</span>
                                <h4 class="font-heading font-bold text-[#141518] text-xs truncate">{{ $item->title }}</h4>
                            </div>

                            <div class="flex items-center space-x-2 pt-1">
                                <button type="button" @click="activeEditPhoto = {{ json_encode($item) }}"
                                        class="w-1/2 py-1.5 bg-stone-200 hover:bg-[#141518] text-[#141518] hover:text-white rounded-lg text-[10px] font-bold transition-colors">
                                    Edit Photo
                                </button>
                                
                                <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="w-1/2" onsubmit="return confirm('Delete photo?')">
                                    @csrf
                                    <button type="submit" class="w-full py-1.5 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white rounded-lg text-[10px] font-bold transition-colors border border-red-200">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-3 text-xs text-[#525560] py-4 text-center">No gallery items uploaded yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    <!-- EDIT PHOTO MODAL -->
    <div x-show="activeEditPhoto" 
         x-transition
         class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4"
         style="display: none;">
        
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-lg w-full border border-stone-200 shadow-2xl space-y-6" @click.away="activeEditPhoto = null">
            <div class="flex items-center justify-between border-b border-stone-200 pb-4">
                <h3 class="text-xl font-heading font-bold text-[#141518]">Edit Gallery Photo</h3>
                <button @click="activeEditPhoto = null" class="text-stone-400 hover:text-[#141518]">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <form :action="`{{ url('/studio-cms-portal/gallery') }}/${activeEditPhoto?.id}/update`" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Photo Title *</label>
                    <input type="text" name="title" :value="activeEditPhoto?.title" required
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Category *</label>
                        <select name="category" :value="activeEditPhoto?.category" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-semibold">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Height Model *</label>
                        <select name="aspect_ratio" :value="activeEditPhoto?.aspect_ratio" required class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-semibold">
                            <option value="tall">Tall (High Model)</option>
                            <option value="wide">Wide (Horizontal Model)</option>
                            <option value="square">Square (Medium Model)</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Update Photo File / URL</label>
                    <input type="file" name="image_file" accept="image/*" class="text-xs text-[#525560] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#141518] file:text-white cursor-pointer">
                    <input type="text" name="image_url" :value="activeEditPhoto?.image_url" placeholder="https://..." class="w-full px-3 py-2 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-mono">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Caption / Notes</label>
                    <textarea name="caption" rows="2" :value="activeEditPhoto?.caption"
                              class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold"></textarea>
                </div>

                <div class="pt-4 flex items-center justify-end space-x-3">
                    <button type="button" @click="activeEditPhoto = null" class="px-5 py-2.5 bg-stone-100 text-[#141518] rounded-xl text-xs font-bold">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black rounded-xl text-xs font-bold uppercase tracking-wider transition-colors">
                        Save Photo Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
