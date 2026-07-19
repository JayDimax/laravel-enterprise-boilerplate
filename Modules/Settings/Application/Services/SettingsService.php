<?php

namespace Modules\Settings\Application\Services;

use Illuminate\Support\Facades\Cache;
use Modules\Settings\Infrastructure\Models\Setting;

class SettingsService
{
    public function get(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting.$key", 3600, fn () => Setting::where('key', $key)->value('value')) ?? $default;
    }

    public function set(string $key, mixed $value, string $group = 'general', string $type = 'string'): Setting
    {
        $setting = Setting::updateOrCreate(['key' => $key], compact('value', 'group', 'type'));
        Cache::forget("setting.$key");

        return $setting;
    }

    public function group(string $group): array
    {
        return Setting::where('group', $group)->pluck('value', 'key')->all();
    }
}
