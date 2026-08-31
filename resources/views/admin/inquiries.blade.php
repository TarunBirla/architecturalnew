@extends('admin.layout')

@section('title', 'Inquiry Management Portal | Admin Panel')

@section('content')

<div class="space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Client Inquiry Logs</h1>
            <p class="text-xs text-gray-400 mt-1">Review project briefs, update status, or contact clients directly.</p>
        </div>
        <div class="text-xs text-gray-400 font-mono">
            Total Briefs: <span class="text-[#C5A880] font-bold">{{ count($inquiries) }}</span>
        </div>
    </div>

    <div class="bg-brand-card rounded-2xl border border-brand-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-gray-300">
                <thead class="bg-black/50 text-[#C5A880] uppercase font-heading font-bold text-[10px] tracking-widest border-b border-brand-border">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Client Details</th>
                        <th class="p-4">Service</th>
                        <th class="p-4">Budget / Size</th>
                        <th class="p-4">Brief / Message</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-border">
                    @forelse($inquiries as $inq)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="p-4 font-mono text-[#C5A880]">#{{ $inq->id }}</td>
                            <td class="p-4">
                                <div class="font-bold text-white text-sm">{{ $inq->name }}</div>
                                <div class="text-gray-400 font-mono text-[11px]"><a href="mailto:{{ $inq->email }}" class="underline hover:text-[#C5A880]">{{ $inq->email }}</a></div>
                                @if($inq->phone)
                                    <div class="text-gray-500 text-[10px]"><i class="fa-solid fa-phone mr-1"></i>{{ $inq->phone }}</div>
                                @endif
                            </td>
                            <td class="p-4 font-medium text-white">
                                <span class="px-2 py-1 bg-[#C5A880]/15 border border-[#C5A880]/30 text-[#C5A880] rounded text-[10px] font-bold uppercase">
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
                                <div class="line-clamp-3 leading-relaxed">{{ $inq->message }}</div>
                            </td>
                            <td class="p-4">
                                <form action="{{ route('admin.inquiries.status', $inq->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" 
                                            class="bg-black/60 border border-brand-border text-[10px] font-bold rounded px-2 py-1 uppercase text-white focus:outline-none focus:border-[#C5A880]">
                                        <option value="pending" {{ $inq->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="contacted" {{ $inq->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                        <option value="completed" {{ $inq->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td class="p-4 text-right">
                                <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this inquiry?');">
                                    @csrf
                                    <button type="submit" class="p-2 bg-red-500/10 hover:bg-red-500 text-red-400 hover:text-white rounded transition-colors">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
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

@endsection
