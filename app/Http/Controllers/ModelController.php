<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

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
        $username = Auth::user()->name;
        $user = DB::table('users')
            ->where('name', $username)
            ->get();
        $profile = DB::table('profiles')
            ->where('name', $username)
            ->get();
        return view('editprofile',['user' => json_decode($user)], ['profile' => json_decode($profile)]);
    }
    public function waitaccept()
    {
        return view('auth.waitaccept');
    }
    public function saveprofile(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
                'description' => 'required',
                'facebook' => 'required',
                'instagram' => 'required',
                'subscriptionfee' => 'required',
            ]);
        $user = Auth::user()->name;
        $validatedData = Arr::add($validatedData, 'name', $user);
        Profile::where('name', $user)->delete();
        Profile::create($validatedData);
        return redirect()->route('userprofile');
    }
    public function cover(Request $request)
    {
        $name = $request->file('cover_img')->getClientOriginalName();
        $fileName = time() . '_' . $name;
        $filePath = $request
            ->file('cover_img')
            ->storeAs('uploads', $fileName, 'public');
        $user = Auth::user()->name;
        $data = DB::table('users')
                ->where('name', $user)
               ->update(['cover' => $fileName]);
        return redirect()->route('userprofile');
    }
    public function profileimg(Request $request)
    {
        $name = $request->file('user_img')->getClientOriginalName();
        $fileName = time() . '_' . $name;
        $filePath = $request
            ->file('user_img')
            ->storeAs('uploads', $fileName, 'public');
        // $user = Auth::user()->name;
        // $data = DB::table('users')
        //         ->where('name', $user)
        //        ->update(['profile' => $fileName]);
        return redirect()->route('userprofile');
    }
}