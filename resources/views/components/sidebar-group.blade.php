@props(['label', 'open' => true])
<section x-data="{ open: {{ $open ? 'true' : 'false' }} }" class="rounded-lg border border-white/5 bg-white/[0.03]">
    <button type="button" @click="open = !open" class="flex w-full items-center justify-between px-3 py-2 text-left text-[10px] font-semibold uppercase tracking-[.16em] text-[#82b8b0]">
        <span>{{ $label }}</span>
        <x-icon name="chevron-down" class="h-3.5 w-3.5 transition-transform duration-150" x-bind:class="open ? 'rotate-180' : ''" />
    </button>
    <div x-show="open" x-transition class="space-y-1 px-1 pb-2">
        {{ $slot }}
    </div>
</section>
