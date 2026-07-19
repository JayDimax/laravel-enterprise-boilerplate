<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-control border border-accent bg-accent px-4 py-2 text-xs font-semibold uppercase tracking-wider text-navy transition hover:border-[#f16f36] hover:bg-[#f16f36] focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
