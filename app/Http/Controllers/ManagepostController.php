<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagepostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('usertype');
        $this->middleware('ensureaccept');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        // $username = Auth::user()->name;
        $posts = DB::table('posts')
            ->where('username', $username)
            ->get();
        return view('managepost', compact('posts'));
    }
    public function edit($image)
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        $post = DB::table('posts')
            ->where('image_video', $image)
            ->get();
        return view('editpost', ['post' => json_decode($post)]);
    }
    public function delete($image)
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        $post = DB::table('posts')
            ->where('image_video', $image)
            ->delete();
        return redirect()->route('managepost');
    }
}