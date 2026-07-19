<?php

namespace Modules\IAM\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdministrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        $permission = match ($this->route('section')) {
            'users' => 'users.create', 'roles' => 'roles.manage', 'permissions' => 'permissions.manage'
        };

        return $this->user()?->can($permission) ?? false;
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['active' => $this->boolean('active')]);
    }

    public function rules(): array
    {
        $section = $this->route('section');

        return [
            'name' => ['required', 'string', 'max:255', Rule::unique(match ($section) {
                'users' => 'users', 'roles' => 'roles', 'permissions' => 'permissions'
            }, 'name')],
            'email' => [Rule::requiredIf($section === 'users'), 'nullable', 'email', 'max:255', Rule::unique('users', 'email')],
            'role' => ['nullable', Rule::exists('roles', 'name')],
            'active' => ['boolean'],
        ];
    }
}
