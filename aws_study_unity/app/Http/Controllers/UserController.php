<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //

    public function show(User $user) {
        $roles = Role::all();
        // $roles = $user->roles->all();
        return view('admin.users.profile', ['user' => $user, 'roles' => $roles]);
    }

    public function update(User $user, UserRequest $userRequest) {
        $inputs = request()->all();
        if(request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        } elseif($user->avatar != asset('images/initial_ava.png')) {
            $inputs['avatar'] = $user->avatar;
        }

        $user->update($inputs);

        return redirect()->back()->with('success', 'Profile was updated!!');
    }

    public function index() {
        $users = User::paginate(5);

        return view('admin.users.index', ['users' => $users]);
    }

    public function destroy(User $user) {
        $user->delete();

        return back()->with('success', $user->username . ' was deleted!!');
    }

    public function attach(User $user) {

        $role_id = request('role');
        $role = Role::find($role_id);
        // if($user->userHasRole($role->name)) {
        //     return back()->with('danger', 'It role has already attached.');
        // }

        $this->authorize([User::class, $role->name]);

        $user->roles()->attach($role_id);
        

        return back()->with('success', $role->name . ' has attached.');
    }

    public function detach(User $user) {

        $role_id = request('role');
        $role = Role::find($role_id);

        // if(!$user->userHasRole($role->name)) {
        //     return back()->with('danger', 'It role has already detached.');
        // }
        $this->authorize([User::class, $role->name]);
        // $this->authorize('detach', [User::class, $role->name]);

        $user->roles()->detach($role_id);
        

        return back()->with('success', $role->name . ' has detached.');
    }
}
