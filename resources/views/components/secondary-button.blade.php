<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-control border border-slate-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-wider text-primary shadow-sm transition hover:border-accent hover:text-accent focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 disabled:opacity-25 dark:border-slate-700 dark:bg-slate-900 dark:text-white']) }}>
    {{ $slot }}
</button>
