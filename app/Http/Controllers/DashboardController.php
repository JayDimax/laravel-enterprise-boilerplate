<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'metrics' => [
                ['label' => 'Total users', 'value' => User::count(), 'note' => 'Registered accounts', 'tone' => 'blue'],
                ['label' => 'Active roles', 'value' => Role::count(), 'note' => 'Access profiles', 'tone' => 'teal'],
                ['label' => 'Permissions', 'value' => Permission::count(), 'note' => 'Policy rules', 'tone' => 'amber'],
                ['label' => 'System health', 'value' => '99.9%', 'note' => 'All services operational', 'tone' => 'green'],
            ],
        ]);
    }
}
