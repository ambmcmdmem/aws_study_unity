<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //

    public function show(User $user) {
        return view('admin.users.profile', ['user' => $user]);
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
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }
}
