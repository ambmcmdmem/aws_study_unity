<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //

    public function index() {
        $roles = Role::all();
        return view('admin.roles.index', ['roles' => $roles]);
    }
    

    public function store(Request $request) {

        $request['slug'] = Str::lower(request('name'));

        $this->validate(request(), [
            'name' => ['required', 'string'],
            'slug' => ['string', 'unique:roles']
        ]);

        Role::create([
            'name' => request('name'),
            'slug' => request('slug')
        ]);

        return back()->with('success', 'Created!!');
    }

    public function destroy(Role $role) {
        $role->delete();

        return back()->with('success', 'Deleted!');
    }

    public function edit(Role $role) {
        return view('admin.roles.edit', [
            'role'        => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function update(Role $role, RoleRequest $roleRequest) {
        $role->name = Str::ucfirst($roleRequest['name']);
        $role->slug = Str::slug(Str::lower($roleRequest['name']), '-');
        // dd($role->isDirty('name'));
        if($role->isDirty('name')) {
            $role->update();
            session()->flash('success', 'Updated!!');
        } else {
            session()->flash('danger', 'Not changed.');
        }
        return back();
        // $roleRequest['name'] = Str::ucfirst($roleRequest['name']);
        // $roleRequest['slug'] = Str::slug(Str::lower($roleRequest['name']), '-');
        // $role->update($roleRequest->all());
    }

    public function attach(Role $role) {
        $permission = Permission::find(request('permission'));
        $this->authorize([$role, $permission]);

        $role->permissions()->attach(request('permission'));

        return back()->with('success', 'Attached!!');
    }

    public function detach(Role $role) {
        $permission = Permission::find(request('permission'));
        $this->authorize([$role, $permission]);

        $role->permissions()->detach(request('permission'));

        return back()->with('success', 'Detached!!');
    }
}
