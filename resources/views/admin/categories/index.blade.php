@extends('admin.layout')

@section('title', 'Manage Categories | Admin Panel')

@section('content')

<div class="space-y-8 max-w-5xl" x-data="{ editingCategory: null }">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Manage Categories</h1>
            <p class="text-xs text-gray-400 mt-1">Add, edit, or delete categories. All changes automatically update project forms, gallery uploads, and website filter tabs.</p>
        </div>
    </div>

    <!-- Add New Category Card -->
    <div class="bg-brand-card p-6 sm:p-8 rounded-2xl border border-brand-border space-y-4">
        <h3 class="text-lg font-heading font-bold text-[#C5A880] flex items-center space-x-2">
            <i class="fa-solid fa-plus-circle"></i>
            <span>Add New Category</span>
        </h3>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="flex flex-col sm:flex-row items-center gap-4">
            @csrf
            <div class="flex-1 w-full space-y-1">
                <input type="text" name="name" required placeholder="e.g. Resort & Spa Masterplans"
                       class="w-full px-4 py-3 bg-black/60 border border-brand-border rounded-xl text-white text-sm font-bold focus:border-[#C5A880] focus:outline-none">
            </div>
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-all shadow-lg shadow-[#C5A880]/20 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-folder-plus"></i>
                <span>Add Category</span>
            </button>
        </form>
    </div>

    <!-- Active Categories Table -->
    <div class="bg-brand-card rounded-2xl border border-brand-border overflow-hidden">
        <div class="p-6 border-b border-brand-border flex items-center justify-between">
            <h3 class="font-heading font-bold text-lg text-white">Active Website Categories ({{ count($categories) }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-gray-300">
                <thead class="bg-black/40 text-[10px] font-heading font-bold uppercase tracking-wider text-gray-400 border-b border-brand-border">
                    <tr>
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Category Name</th>
                        <th class="py-4 px-6">Slug</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-border">
                    @forelse($categories as $cat)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="py-4 px-6 font-mono text-gray-500">#{{ $cat->id }}</td>
                            <td class="py-4 px-6 font-heading font-bold text-white text-sm">
                                <template x-if="editingCategory !== {{ $cat->id }}">
                                    <span>{{ $cat->name }}</span>
                                </template>
                                <template x-if="editingCategory === {{ $cat->id }}">
                                    <form action="{{ route('admin.categories.update', $cat->id) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        <input type="text" name="name" value="{{ $cat->name }}" required class="px-3 py-1 bg-black border border-[#C5A880] rounded text-white text-xs font-bold">
                                        <button type="submit" class="px-3 py-1 bg-[#C5A880] text-black text-[10px] font-bold rounded">Save</button>
                                        <button type="button" @click="editingCategory = null" class="px-2 py-1 bg-gray-700 text-white text-[10px] rounded">Cancel</button>
                                    </form>
                                </template>
                            </td>
                            <td class="py-4 px-6 font-mono text-gray-400 text-xs">{{ $cat->slug }}</td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <button type="button" @click="editingCategory = {{ $cat->id }}" class="px-3 py-1.5 bg-white/10 hover:bg-[#C5A880] text-gray-300 hover:text-black rounded text-[11px] font-bold transition-colors">
                                    <i class="fa-solid fa-pen mr-1"></i> Edit
                                </button>

                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this category? Projects using it will remain intact.');">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 bg-red-500/20 hover:bg-red-500 text-red-400 hover:text-white rounded text-[11px] font-bold transition-colors">
                                        <i class="fa-solid fa-trash mr-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-500">No categories found. Add one above.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
