<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('settings.manage') ?? false;
    }

    public function rules(): array
    {
        return [
            'app_name' => ['required', 'string', 'max:255'],
            'support_email' => ['nullable', 'email', 'max:255'],
            'timezone' => ['required', 'timezone'],
            'locale' => ['required', 'string', 'max:10'],
            'require_verification' => ['sometimes', 'boolean'],
            'audit_changes' => ['sometimes', 'boolean'],
            'maintenance' => ['sometimes', 'boolean'],
        ];
    }
}
