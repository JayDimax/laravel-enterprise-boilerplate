<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Modules\Settings\Application\Services\SettingsService;
use Modules\Settings\Http\Requests\UpdateSettingsRequest;

class SettingController extends Controller
{
    public function __construct(private readonly SettingsService $settings) {}

    public function edit(): View
    {
        return view('system.settings');
    }

    public function update(UpdateSettingsRequest $request): RedirectResponse
    {
        foreach ($request->safe()->only(['app_name', 'support_email', 'timezone', 'locale']) as $key => $value) {
            $this->settings->set($key, $value);
        }
        foreach (['require_verification', 'audit_changes', 'maintenance'] as $key) {
            $setting = $key === 'maintenance' ? 'maintenance_mode' : $key;
            $this->settings->set($setting, $request->boolean($key) ? '1' : '0', 'system', 'boolean');
        }

        return back()->with('toast', ['type' => 'success', 'message' => 'Settings saved.']);
    }
}
