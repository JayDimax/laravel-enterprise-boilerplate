@props([
    'caption' => null,
    'loading' => false,
    'empty' => false,
    'emptyTitle' => 'No records found',
    'emptyDescription' => 'There are no records to display.',
    'columns' => 1,
    'sticky' => true,
])

<section class="min-w-0 max-w-full overflow-hidden rounded-card border border-[#eadfd8] bg-white shadow-card dark:border-slate-800 dark:bg-slate-900">
    @isset($toolbar)<div class="border-b border-slate-200 p-4 dark:border-slate-800">{{ $toolbar }}</div>@endisset
    <p class="border-b border-slate-100 px-4 py-2 text-[11px] font-medium text-slate-500 dark:border-slate-800 sm:hidden">Swipe horizontally to view all columns</p>
    <div class="max-w-full overflow-x-auto overscroll-x-contain">
        <table {{ $attributes->class(['w-full min-w-[640px] text-left text-sm', '[&_thead]:sticky [&_thead]:top-0 [&_thead]:z-10' => $sticky]) }}>
            @if($caption)<caption class="sr-only">{{ $caption }}</caption>@endif
            @isset($head)<thead>{{ $head }}</thead>@endisset
            @if($loading)
                <tbody><tr><td colspan="{{ $columns }}"><x-loading label="Loading records" /></td></tr></tbody>
            @elseif($empty)
                <tbody><tr><td colspan="{{ $columns }}"><x-empty-state :title="$emptyTitle" :description="$emptyDescription" /></td></tr></tbody>
            @else
                {{ $slot }}
            @endif
        </table>
    </div>
    @isset($footer)<div class="border-t border-slate-200 p-4 dark:border-slate-800">{{ $footer }}</div>@endisset
</section>
