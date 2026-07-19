<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_guest_is_redirected_from_dashboard(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
    }

    public function test_standard_user_can_view_dashboard_but_not_administration(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $user->assignRole('User');

        $this->actingAs($user)->get(route('dashboard'))->assertOk();
        $this->actingAs($user)->get(route('administration.index', 'users'))->assertForbidden();
    }

    public function test_manager_can_view_users_and_audit_logs_but_not_settings(): void
    {
        $manager = User::factory()->create(['email_verified_at' => now()]);
        $manager->assignRole('Manager');

        $this->actingAs($manager)->get(route('administration.index', 'users'))->assertOk();
        $this->actingAs($manager)->get(route('system.audit'))->assertOk();
        $this->actingAs($manager)->get(route('system.settings'))->assertForbidden();
    }

    public function test_administrator_can_manage_settings_but_not_permissions(): void
    {
        $administrator = User::factory()->create(['email_verified_at' => now()]);
        $administrator->assignRole('Administrator');

        $this->actingAs($administrator)->get(route('system.settings'))->assertOk();
        $this->actingAs($administrator)->get(route('administration.index', 'permissions'))->assertForbidden();
    }

    public function test_super_admin_bypasses_permission_checks(): void
    {
        $superAdmin = User::factory()->create(['email_verified_at' => now()]);
        $superAdmin->assignRole('Super Admin');

        $this->actingAs($superAdmin)->get(route('administration.index', 'permissions'))->assertOk();
        $this->actingAs($superAdmin)->get(route('system.settings'))->assertOk();
    }
}
