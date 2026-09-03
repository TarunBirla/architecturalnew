@extends('admin.layout')

@section('title', 'Manage Services | Studio CMS')

@section('content')

<div class="space-y-8">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">CMS Service Manager</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Services & Rates</h1>
            <p class="text-xs text-[#525560] mt-1">Configure starting rates, turnaround times, descriptions, and features for 2D, 3D, and Lease plans.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="px-5 py-3 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-md flex items-center space-x-2">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Add New Service</span>
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-[#3A3C44]">
                <thead class="bg-stone-50 text-[#141518] uppercase font-heading font-bold text-[10px] tracking-widest border-b border-stone-200">
                    <tr>
                        <th class="p-4">Image</th>
                        <th class="p-4">Service Name & Category</th>
                        <th class="p-4">Turnaround</th>
                        <th class="p-4">Starting Rate</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($services as $service)
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="p-4 w-24">
                                <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" class="w-16 h-12 object-cover rounded-xl border border-stone-200">
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-[#141518] text-sm">{{ $service->title }}</div>
                                <div class="text-[#626570] text-[11px] font-semibold">{{ $service->category }}</div>
                            </td>
                            <td class="p-4 font-mono text-[#525560]">{{ $service->turnaround_time }}</td>
                            <td class="p-4 font-heading font-bold text-[#9E825A] text-sm">£{{ number_format($service->starting_price, 0) }}</td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="px-3 py-1.5 bg-stone-100 hover:bg-[#141518] text-[#141518] hover:text-white rounded-lg text-[11px] font-bold transition-colors inline-block border border-stone-200">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                                </a>

                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this floor plan service?');">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white rounded-lg text-[11px] font-bold transition-colors border border-red-200">
                                        <i class="fa-solid fa-trash mr-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-[#525560]">No floor plan services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
