@extends('admin.layout')

@section('title', 'Manage Floor Plan Services | Admin Panel')

@section('content')

<div class="space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Manage Floor Plan Services</h1>
            <p class="text-xs text-gray-400 mt-1">Configure pricing, turnaround times, descriptions, and features for 2D, 3D, and Lease plans.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="px-4 py-2.5 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-colors flex items-center space-x-2">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Add New Service</span>
        </a>
    </div>

    <div class="bg-brand-card rounded-2xl border border-brand-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-gray-300">
                <thead class="bg-black/50 text-[#C5A880] uppercase font-heading font-bold text-[10px] tracking-widest border-b border-brand-border">
                    <tr>
                        <th class="p-4">Image</th>
                        <th class="p-4">Service Name & Category</th>
                        <th class="p-4">Turnaround</th>
                        <th class="p-4">Starting Rate</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-border">
                    @forelse($services as $service)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="p-4 w-24">
                                <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" class="w-16 h-12 object-cover rounded-lg border border-brand-border">
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-white text-sm">{{ $service->title }}</div>
                                <div class="text-gray-400 text-[11px]">{{ $service->category }}</div>
                            </td>
                            <td class="p-4 font-mono text-gray-400">{{ $service->turnaround_time }}</td>
                            <td class="p-4 font-heading font-bold text-[#C5A880] text-sm">£{{ number_format($service->starting_price, 2) }}</td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="px-3 py-1.5 bg-white/10 hover:bg-[#C5A880] text-white hover:text-black rounded text-[11px] font-bold transition-colors inline-block">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                                </a>

                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this floor plan service?');">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 bg-red-500/20 hover:bg-red-500 text-red-400 hover:text-white rounded text-[11px] font-bold transition-colors">
                                        <i class="fa-solid fa-trash mr-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500">No floor plan services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
