<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $banners = DB::table('banners')
        //       ->get();
        $advertisements = DB::table('advertisements')
              ->get();
        return view('home', compact('banners'))->with('advertisements', json_decode($advertisements));
    }
    public function init()
    {
        return redirect()->route('home');
    }
}