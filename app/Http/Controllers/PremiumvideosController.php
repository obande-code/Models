<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PremiumvideosController extends Controller
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
        $user = Auth::user()->name;
        $premium = DB::table('posts')
            ->where('type', 'Premium')
            ->get();
        $paids = DB::table('paids')
            ->where('name', $user)
            ->get();
        $models = DB::table('users')
            ->where('usertype', 'model')
            ->get();
        $premium = json_decode($premium);
        shuffle($premium);
        return view('premiumvideos', compact('premium'), compact('models'))->with('paids', json_decode($paids));
    }
    public function search(Request $request)
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        if ($request->search != '') {
            $premium = DB::table('posts')
            ->where('type', 'Premium')
            ->where('username', 'like', '%' . $request->search . '%')
            ->get();
        }
        else {
            $premium = DB::table('posts')
            ->where('type', 'Premium')
            ->get();
        }
        // $premium = json_decode($premium);
        // shuffle($premium);
        // $username = Auth::user()->name;
        return view('premiumvideos', compact('premium'));
    }
}