<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Settings\Infrastructure\Models\Setting;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissions = collect(['dashboard.view', 'users.view', 'users.create', 'users.update', 'users.delete', 'roles.manage', 'permissions.manage', 'settings.manage', 'audit-logs.view'])
            ->mapWithKeys(fn ($name) => [$name => Permission::firstOrCreate(['name' => $name])]);

        $roles = collect(['Super Admin', 'Administrator', 'Manager', 'User', 'Guest'])
            ->mapWithKeys(fn ($name) => [$name => Role::firstOrCreate(['name' => $name])]);
        $roles['Super Admin']->syncPermissions($permissions);
        $roles['Administrator']->syncPermissions($permissions->except('permissions.manage'));
        $roles['Manager']->syncPermissions($permissions->only(['dashboard.view', 'users.view', 'audit-logs.view']));
        $roles['User']->syncPermissions($permissions->only('dashboard.view'));

        $this->call(AdminUserSeeder::class);

        foreach (['app_name' => config('app.name'), 'timezone' => config('app.timezone'), 'date_format' => 'M d, Y', 'currency' => 'USD'] as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['group' => 'general', 'value' => $value]);
        }
    }
}
