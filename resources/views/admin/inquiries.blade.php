@extends('layouts.app')

@section('title', 'Inquiry Management Portal | Studio Admin')

@section('content')

<section class="py-12 bg-[#111215] border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <div class="inline-block px-3 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 rounded-full text-xs font-heading font-semibold uppercase tracking-widest text-[#C5A880] mb-2">
                    Studio Administrative Portal
                </div>
                <h1 class="text-3xl font-heading font-bold text-white">Client Inquiry Logs</h1>
            </div>
            <div class="text-xs text-gray-400 font-mono">
                Total Logs: <span class="text-[#C5A880] font-bold">{{ count($inquiries) }}</span>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-[#0D0D0E]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="glass-card rounded-2xl border border-white/10 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-black/50 text-[#C5A880] uppercase font-heading font-bold text-[10px] tracking-widest border-b border-white/10">
                        <tr>
                            <th class="p-4">ID</th>
                            <th class="p-4">Client Name & Email</th>
                            <th class="p-4">Requested Service</th>
                            <th class="p-4">Budget / Size</th>
                            <th class="p-4">Message / Brief</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Submitted At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($inquiries as $inq)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="p-4 font-mono text-[#C5A880]">#{{ $inq->id }}</td>
                                <td class="p-4">
                                    <div class="font-bold text-white">{{ $inq->name }}</div>
                                    <div class="text-gray-400 font-mono text-[11px]"><a href="mailto:{{ $inq->email }}" class="underline hover:text-[#C5A880]">{{ $inq->email }}</a></div>
                                    @if($inq->phone)
                                        <div class="text-gray-500 text-[10px]"><i class="fa-solid fa-phone mr-1"></i>{{ $inq->phone }}</div>
                                    @endif
                                </td>
                                <td class="p-4 font-medium text-white">
                                    <span class="px-2 py-1 bg-[#C5A880]/10 border border-[#C5A880]/30 text-[#C5A880] rounded text-[10px]">
                                        {{ $inq->service_type ?? 'General Inquiry' }}
                                    </span>
                                </td>
                                <td class="p-4 font-mono text-gray-400">
                                    <div>{{ $inq->budget_range ?? 'N/A' }}</div>
                                    @if($inq->property_size_sqm)
                                        <div class="text-[10px] text-gray-500">{{ $inq->property_size_sqm }} m²</div>
                                    @endif
                                </td>
                                <td class="p-4 max-w-xs text-gray-300">
                                    <div class="line-clamp-3">{{ $inq->message }}</div>
                                </td>
                                <td class="p-4">
                                    <form action="{{ route('admin.inquiries.status', $inq->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" 
                                                class="bg-black/60 border border-white/20 text-[10px] font-bold rounded px-2 py-1 uppercase text-white focus:outline-none">
                                            <option value="pending" {{ $inq->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="contacted" {{ $inq->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="completed" {{ $inq->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="p-4 font-mono text-gray-500 text-[10px]">
                                    {{ $inq->created_at->format('Y-m-d H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-8 text-center text-gray-500">
                                    No client inquiries logged yet. Submissions via the contact form will appear here.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

@endsection
