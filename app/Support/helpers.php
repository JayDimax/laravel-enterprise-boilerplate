<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

if (! function_exists('formatDate')) {
    function formatDate($date, ?string $format = null): string
    {
        return $date ? Carbon::parse($date)->format($format ?? 'M d, Y') : '—';
    }
}
if (! function_exists('formatCurrency')) {
    function formatCurrency($amount, string $currency = 'USD'): string
    {
        return class_exists(NumberFormatter::class) ? numfmt_format_currency(numfmt_create(app()->getLocale(), NumberFormatter::CURRENCY), (float) $amount, $currency) : $currency.' '.number_format((float) $amount, 2);
    }
}
if (! function_exists('generateReference')) {
    function generateReference(string $prefix = 'REF'): string
    {
        return $prefix.'-'.now()->format('Ymd').'-'.Str::upper(Str::random(8));
    }
}
if (! function_exists('statusBadge')) {
    function statusBadge(string $status): string
    {
        return match ($status) {
            'active','success','completed' => 'success', 'pending','warning' => 'warning', 'inactive','error','failed' => 'danger', default => 'gray'
        };
    }
}
if (! function_exists('activeMenu')) {
    function activeMenu(string|array $patterns, string $class = 'is-active'): string
    {
        return request()->routeIs($patterns) ? $class : '';
    }
}
if (! function_exists('userAvatar')) {
    function userAvatar($user): ?string
    {
        return $user?->avatar ? asset('storage/'.$user->avatar) : null;
    }
}
if (! function_exists('initials')) {
    function initials(?string $name): string
    {
        return Str::of($name ?: '?')->explode(' ')->filter()->take(2)->map(fn ($part) => Str::upper(Str::substr($part, 0, 1)))->implode('');
    }
}
if (! function_exists('fileSize')) {
    function fileSize(int $bytes, int $precision = 1): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = $bytes > 0 ? min((int) floor(log($bytes, 1024)), 4) : 0;

        return round($bytes / (1024 ** $i), $precision).' '.$units[$i];
    }
}
