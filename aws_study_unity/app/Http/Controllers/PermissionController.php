<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Str;
use App\Http\Requests\PermissionRequest;


class PermissionController extends Controller
{
    //
    public function index() {
        return view('admin.permissions.index', ['permissions' => Permission::all()]);
    }

    public function store(Request $request) {
        $request['name'] = Str::ucfirst($request['name']);
        $request['slug'] = Str::slug(Str::lower($request['name']), '-');
        // dd($request);
        $this->validate($request, [
            'name' => ['required'],
            'slug' => ['required', 'unique:permissions']
        ]);

        Permission::create($request->all());

        return back()->with('success', 'Created!!');
    }

    public function edit(Permission $permission) {
        return view('admin.permissions.edit', ['permission' => $permission]);
    }

    public function destroy(Permission $permission) {
        $permission->delete();

        return back()->with('success', 'Deleted!!');
    }

    public function update(Permission $permission, PermissionRequest $permissionRequest) {
        $permission->name = Str::ucfirst($permissionRequest['name']);
        $permission->slug = Str::slug(Str::lower($permissionRequest['name']), '-');

        if($permission->isDirty('name')) {
            $permission->update();
            session()->flash('success', 'Updated!!');
        } else {
            session()->flash('danger', 'Not changed.');
        }
        return back();
    }
}   
