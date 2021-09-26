<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $models = DB::table('users')
            ->where('usertype', 'model')
            ->get();
        return view('models', compact('models'));
    }
    public function detail($name)
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        $posts = DB::table('posts')
            ->where('username', $name)
            ->get();
        $model = DB::table('users')
            ->where('name', $name)
            ->get();
        return view(
            'detailmodels',
            ['model' => json_decode($model)],
            ['posts' => json_decode($posts)]
        );
    }
    public function chat()
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        return view('chatmodels');
    }
}