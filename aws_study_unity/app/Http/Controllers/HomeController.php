<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('home', compact('user'));
        // session([
        //     'peter' => 'student'
        // ]);

        // session([
        //     'edwin' => 'student',

        // ]);

        // return session('edwin');

        // return $request->session()->all();

        // $request->session()->forget('edwin');

        // $request->session()->flush();

        // return $request->session()->all();

        // $request->session()->flash('message', 'Post has been created');

        // return $request->session()->all();

        // $request->session()->reflash();

        // $request->session()->keep('message');
    }
}
