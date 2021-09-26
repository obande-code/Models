<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('models');
    }
    public function signup()
    {
        session(['usertype' => 'model']);
        return redirect()->route('register');
    }
    public function profile()
    {
        $username = Auth::user()->name;
        $posts = DB::table('posts')
            ->where('username', $username)
            ->get();
        $model = DB::table('users')
            ->where('name', $username)
            ->get();
        return view(
            'profilemodel',
            ['model' => json_decode($model)],
            ['posts' => json_decode($posts)]
        );
    }
    public function editprofile()
    {
        return view('editprofile');
    }
    public function waitaccept()
    {
        return view('auth.waitaccept');
    }
}