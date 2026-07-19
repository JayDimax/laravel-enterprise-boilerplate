<?php

namespace Modules\IAM\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuditLogService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Modules\IAM\Http\Requests\StoreAdministrationRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdministrationController extends Controller
{
    public function __construct(private readonly AuditLogService $auditLog) {}

    public function index(string $section): View
    {
        Gate::authorize($this->permissionFor($section, 'view'));
        $items = match ($section) {
            'users' => User::latest()->take(20)->get(),
            'roles' => Role::withCount(['permissions', 'users'])->take(20)->get(),
            'permissions' => Permission::withCount('roles')->take(20)->get(),
        };

        return view('administration.index', compact('section', 'items'));
    }

    public function create(string $section): View
    {
        Gate::authorize($this->permissionFor($section, 'create'));

        return view('administration.form', compact('section'));
    }

    public function show(string $section, string $id): View
    {
        Gate::authorize($this->permissionFor($section, 'view'));

        return view('administration.show', compact('section', 'id'));
    }

    public function store(StoreAdministrationRequest $request, string $section): RedirectResponse
    {
        $record = match ($section) {
            'users' => $this->createUser($request->validated()),
            'roles' => Role::create($request->safe()->only('name')),
            'permissions' => Permission::create($request->safe()->only('name')),
        };
        $this->auditLog->record('created', $record, ucfirst(str()->singular($section)).' created');

        return redirect()->route('administration.index', $section)->with('toast', ['type' => 'success', 'message' => 'Record created successfully.']);
    }

    public function destroy(string $section, string $id): RedirectResponse
    {
        $record = $this->findRecord($section, $id);
        if ($record instanceof User) {
            Gate::authorize('delete', $record);
        } else {
            Gate::authorize($this->permissionFor($section, 'delete'));
        }
        $this->auditLog->record('deleted', $record, ucfirst(str()->singular($section)).' deleted', $record->toArray());
        $record->delete();

        return redirect()->route('administration.index', $section)->with('toast', ['type' => 'success', 'message' => 'Record deleted.']);
    }

    private function createUser(array $data): User
    {
        $user = User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => Hash::make(str()->password()), 'status' => $data['active'] ? 'active' : 'inactive']);
        if ($data['role'] ?? null) {
            $user->assignRole($data['role']);
        }

        return $user;
    }

    private function findRecord(string $section, string $id): Model
    {
        return match ($section) {
            'users' => User::findOrFail($id), 'roles' => Role::findOrFail($id), 'permissions' => Permission::findOrFail($id)
        };
    }

    private function permissionFor(string $section, string $action): string
    {
        return match ($section) {
            'users' => match ($action) {
                'view' => 'users.view', 'create' => 'users.create', 'delete' => 'users.delete'
            },
            'roles' => 'roles.manage',
            'permissions' => 'permissions.manage',
        };
    }
}
