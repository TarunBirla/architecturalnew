@extends('admin.layout')

@section('title', 'Admin Dashboard | Emily Royce Architecture CMS')

@section('content')

<div class="space-y-8">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Studio Management Dashboard</h1>
            <p class="text-xs text-gray-400 mt-1">Full control over site content, banners, images, projects, and floor plan services.</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.settings') }}" class="px-4 py-2.5 bg-[#C5A880] text-black font-heading font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-white transition-colors">
                <i class="fa-solid fa-sliders mr-2"></i> Edit Site Banners & Content
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-2">
            <span class="text-gray-500 uppercase text-[10px] font-heading font-bold tracking-widest">Active Projects</span>
            <div class="font-heading text-3xl font-bold text-white">{{ $projectCount }}</div>
            <a href="{{ route('admin.projects') }}" class="text-[11px] text-[#C5A880] hover:underline block pt-1">Manage Catalog &rarr;</a>
        </div>

        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-2">
            <span class="text-gray-500 uppercase text-[10px] font-heading font-bold tracking-widest">Floor Plan Services</span>
            <div class="font-heading text-3xl font-bold text-white">{{ $serviceCount }}</div>
            <a href="{{ route('admin.services') }}" class="text-[11px] text-[#C5A880] hover:underline block pt-1">Manage Pricing & Services &rarr;</a>
        </div>

        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-2">
            <span class="text-gray-500 uppercase text-[10px] font-heading font-bold tracking-widest">Total Inquiries</span>
            <div class="font-heading text-3xl font-bold text-white">{{ $inquiryCount }}</div>
            <a href="{{ route('admin.inquiries') }}" class="text-[11px] text-[#C5A880] hover:underline block pt-1">View All Inquiries &rarr;</a>
        </div>

        <div class="bg-brand-card p-6 rounded-2xl border border-brand-border space-y-2">
            <span class="text-gray-500 uppercase text-[10px] font-heading font-bold tracking-widest">Pending Inquiries</span>
            <div class="font-heading text-3xl font-bold text-[#C5A880]">{{ $pendingInquiries }}</div>
            <a href="{{ route('admin.inquiries') }}" class="text-[11px] text-gray-400 hover:underline block pt-1">Requires Response &rarr;</a>
        </div>
    </div>

    <!-- Recent Inquiries Table -->
    <div class="bg-brand-card rounded-2xl border border-brand-border p-6 space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="font-heading font-bold text-lg text-white">Recent Client Inquiries</h3>
            <a href="{{ route('admin.inquiries') }}" class="text-xs text-[#C5A880] hover:underline">View All &rarr;</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-gray-300">
                <thead class="bg-black/50 text-[#C5A880] uppercase font-heading font-bold text-[10px] tracking-widest border-b border-brand-border">
                    <tr>
                        <th class="p-3">Client</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Service</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-border">
                    @forelse($recentInquiries as $inq)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="p-3 font-bold text-white">{{ $inq->name }}</td>
                            <td class="p-3 font-mono text-gray-400">{{ $inq->email }}</td>
                            <td class="p-3">{{ $inq->service_type ?? 'General Inquiry' }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 bg-[#C5A880]/15 text-[#C5A880] rounded text-[10px] font-bold uppercase">
                                    {{ $inq->status }}
                                </span>
                            </td>
                            <td class="p-3 font-mono text-gray-500">{{ $inq->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">No client inquiries yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
