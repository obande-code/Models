<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // $user = Auth::user()->name;
        // $models = User::join('favorites', 'favorites.modelname', '=', 'users.name')
        //     ->where('favorites.fanname', $user)
        //     ->where('users.usertype', 'model')
        //     ->get(['users.*']);
        return view('favorites', compact('models'));
    }
    public function add(Request $request) {
        $user = Auth::user()->name;
        $validatedData = $request->validate([
            'modelname' => 'required',
        ]);
        $validatedData = Arr::add($validatedData, 'fanname', $user);
        Favorite::create($validatedData);
        echo "success";
    }
    public function remove(Request $request) {
        $user = Auth::user()->name;
        $favorite = DB::table('favorites')
            ->where('fanname', $user)
            ->where('modelname', $request->modelname)
            ->delete();
        echo "success";
    }
}