<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
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
        $freeposts = DB::table('posts')
            ->where('type', 'Free')
            ->inRandomOrder()
            ->paginate(16);
        return view('explore', compact('freeposts'));
    }
    public function search(Request $request)
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        if ($request->search != '') {
            $freeposts = DB::table('posts')
            ->where('type', 'Free')
            ->where('username','like', '%' . $request->search . '%')
            ->get();
        }
        else {
            $freeposts = DB::table('posts')
            ->where('type', 'Free')
            ->get();
        }
        $freeposts = json_decode($freeposts);
        shuffle($freeposts);
        return view('explore', compact('freeposts'));
    }
}