@extends('admin.layout')

@section('title', 'Admin Dashboard | Studio CMS')

@section('content')

<div class="space-y-8">
    <!-- Top Welcome Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">CMS Management Portal</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Welcome Back, Emily</h1>
            <p class="text-xs text-[#525560] mt-1">Manage your architectural concepts, photo gallery, categories, services, and client inquiries.</p>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.projects.create') }}" class="px-5 py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-md flex items-center space-x-2">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Add New Project</span>
            </a>
            <a href="{{ route('admin.gallery') }}" class="px-5 py-3 bg-stone-100 border border-stone-200 hover:border-[#C5A880] text-[#141518] font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all flex items-center space-x-2">
                <i class="fa-solid fa-upload text-xs"></i>
                <span>Upload Photos</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-[#9E825A]">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[#626570]">Projects</span>
                <i class="fa-solid fa-folder-open text-xl"></i>
            </div>
            <div class="text-3xl font-heading font-bold text-[#141518]">{{ $stats['total_projects'] ?? 0 }}</div>
            <span class="text-[11px] text-[#525560]">Active Case Studies</span>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-[#9E825A]">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[#626570]">Photo Archive</span>
                <i class="fa-solid fa-images text-xl"></i>
            </div>
            <div class="text-3xl font-heading font-bold text-[#141518]">{{ $stats['total_photos'] ?? 0 }}</div>
            <span class="text-[11px] text-[#525560]">Gallery Uploads</span>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-[#9E825A]">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[#626570]">Categories</span>
                <i class="fa-solid fa-tags text-xl"></i>
            </div>
            <div class="text-3xl font-heading font-bold text-[#141518]">{{ $stats['total_categories'] ?? 0 }}</div>
            <span class="text-[11px] text-[#525560]">Dynamic Work Types</span>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-[#9E825A]">
                <span class="text-xs font-heading font-bold uppercase tracking-wider text-[#626570]">Client Inquiries</span>
                <i class="fa-solid fa-envelope-open-text text-xl"></i>
            </div>
            <div class="text-3xl font-heading font-bold text-[#141518]">{{ $stats['total_inquiries'] ?? 0 }}</div>
            <span class="text-[11px] text-[#525560]">Received Messages</span>
        </div>
    </div>

    <!-- Quick Navigation Modules -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="{{ route('admin.projects') }}" class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all space-y-3 block group">
            <div class="w-10 h-10 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-base group-hover:bg-[#C5A880] group-hover:text-black transition-colors">
                <i class="fa-solid fa-folder-open"></i>
            </div>
            <h3 class="text-lg font-heading font-bold text-[#141518]">Manage Projects & Concepts</h3>
            <p class="text-xs text-[#525560]">Create, edit, or remove academic projects, CAD surveys, and client visualisations.</p>
        </a>

        <a href="{{ route('admin.gallery') }}" class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all space-y-3 block group">
            <div class="w-10 h-10 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-base group-hover:bg-[#C5A880] group-hover:text-black transition-colors">
                <i class="fa-solid fa-cloud-arrow-up"></i>
            </div>
            <h3 class="text-lg font-heading font-bold text-[#141518]">Upload Photo Gallery</h3>
            <p class="text-xs text-[#525560]">Upload new CAD floor plan blueprints and 3D room renders with aspect ratios.</p>
        </a>

        <a href="{{ route('admin.categories') }}" class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:border-[#C5A880] transition-all space-y-3 block group">
            <div class="w-10 h-10 rounded-2xl bg-[#141518] text-[#C5A880] flex items-center justify-center font-bold text-base group-hover:bg-[#C5A880] group-hover:text-black transition-colors">
                <i class="fa-solid fa-tags"></i>
            </div>
            <h3 class="text-lg font-heading font-bold text-[#141518]">Manage Work Categories</h3>
            <p class="text-xs text-[#525560]">Add, rename, or reorder dynamic category filter tabs across the portfolio.</p>
        </a>
    </div>

</div>

@endsection
