@extends('admin.layout')

@section('title', 'Client Inquiries | Studio CMS')

@section('content')

<div class="space-y-8" x-data="{ activeEditInquiry: null }">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-8 rounded-3xl border border-stone-200 shadow-sm">
        <div>
            <span class="text-xs font-heading font-bold uppercase tracking-widest text-[#9E825A]">Client Inquiries</span>
            <h1 class="text-3xl font-heading font-bold text-[#141518]">Received Messages</h1>
            <p class="text-xs text-[#525560] mt-1">Review project briefs, edit details, update status, or contact clients directly.</p>
        </div>
        <div class="text-xs text-[#525560] font-mono">
            Total Briefs: <span class="text-[#9E825A] font-bold text-sm">{{ count($inquiries) }}</span>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-[#3A3C44]">
                <thead class="bg-stone-50 text-[#141518] uppercase font-heading font-bold text-[10px] tracking-widest border-b border-stone-200">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Client Details</th>
                        <th class="p-4">Service Required</th>
                        <th class="p-4">Location</th>
                        <th class="p-4">Brief / Message</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($inquiries as $inq)
                        <tr class="hover:bg-stone-50 transition-colors">
                            <td class="p-4 font-mono text-[#9E825A] font-bold">#{{ $inq->id }}</td>
                            <td class="p-4">
                                <div class="font-bold text-[#141518] text-sm">{{ $inq->name }}</div>
                                <div class="text-[#525560] font-mono text-[11px]"><a href="mailto:{{ $inq->email }}" class="underline hover:text-[#9E825A]">{{ $inq->email }}</a></div>
                                @if($inq->phone)
                                    <div class="text-[#626570] text-[10px]"><i class="fa-solid fa-phone mr-1"></i>{{ $inq->phone }}</div>
                                @endif
                            </td>
                            <td class="p-4 font-medium text-[#141518]">
                                <span class="px-2.5 py-1 bg-[#C5A880]/20 border border-[#C5A880]/40 text-[#9E825A] rounded-md text-[10px] font-bold uppercase">
                                    {{ $inq->service_type ?? 'General Inquiry' }}
                                </span>
                            </td>
                            <td class="p-4 font-mono text-[#525560]">
                                <div>{{ $inq->property_size_sqm ?? 'N/A' }}</div>
                            </td>
                            <td class="p-4 max-w-xs text-[#3A3C44]">
                                <div class="line-clamp-3 leading-relaxed">{{ $inq->message }}</div>
                            </td>
                            <td class="p-4">
                                <form action="{{ route('admin.inquiries.status', $inq->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" 
                                            class="bg-stone-50 border border-stone-200 text-[10px] font-bold rounded-lg px-2.5 py-1.5 uppercase text-[#141518] focus:outline-none focus:border-[#C5A880]">
                                        <option value="pending" {{ $inq->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="contacted" {{ $inq->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                        <option value="completed" {{ $inq->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td class="p-4 text-right space-x-1.5">
                                <button type="button" @click="activeEditInquiry = {{ json_encode($inq) }}"
                                        class="px-2.5 py-1.5 bg-stone-100 hover:bg-[#141518] text-[#141518] hover:text-white rounded-lg text-[11px] font-bold transition-colors inline-block border border-stone-200">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                                </button>

                                <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this inquiry?');">
                                    @csrf
                                    <button type="submit" class="p-1.5 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white rounded-lg transition-colors border border-red-200 text-xs">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-[#525560]">
                                No client inquiries logged yet. Submissions via the contact form will appear here.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- EDIT INQUIRY MODAL -->
    <div x-show="activeEditInquiry" 
         x-transition
         class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4"
         style="display: none;">
        
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-lg w-full border border-stone-200 shadow-2xl space-y-6" @click.away="activeEditInquiry = null">
            <div class="flex items-center justify-between border-b border-stone-200 pb-4">
                <h3 class="text-xl font-heading font-bold text-[#141518]">Edit Client Inquiry</h3>
                <button @click="activeEditInquiry = null" class="text-stone-400 hover:text-[#141518]">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <form :action="`{{ url('/studio-cms-portal/inquiries') }}/${activeEditInquiry?.id}/update`" method="POST" class="space-y-4">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Client Name *</label>
                    <input type="text" name="name" :value="activeEditInquiry?.name" required
                           class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Email *</label>
                        <input type="email" name="email" :value="activeEditInquiry?.email" required
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-semibold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Phone</label>
                        <input type="text" name="phone" :value="activeEditInquiry?.phone"
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-semibold">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Service Required</label>
                        <input type="text" name="service_type" :value="activeEditInquiry?.service_type"
                               class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-semibold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Status</label>
                        <select name="status" :value="activeEditInquiry?.status" class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-xs font-semibold">
                            <option value="pending">Pending</option>
                            <option value="contacted">Contacted</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-heading font-bold uppercase tracking-wider text-[#141518]">Message / Brief *</label>
                    <textarea name="message" rows="4" :value="activeEditInquiry?.message" required
                              class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-[#141518] text-sm font-semibold"></textarea>
                </div>

                <div class="pt-4 flex items-center justify-end space-x-3">
                    <button type="button" @click="activeEditInquiry = null" class="px-5 py-2.5 bg-stone-100 text-[#141518] rounded-xl text-xs font-bold">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-[#141518] text-white hover:bg-[#C5A880] hover:text-black rounded-xl text-xs font-bold uppercase tracking-wider transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
