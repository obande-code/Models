<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FavoritesController extends Controller
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
        return view('favorites', compact('models'));
    }
}