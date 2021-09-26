<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $models = DB::table('users')
            ->where('usertype', 'model')
            ->get();
        return view('modellist', compact('models'));
    }
    public function accept(Request $request)
    {
        $model = User::find($request->accept);
        $model->isaccept = true;
        $model->save();
        echo $request->accept;
    }
    public function reject(Request $request)
    {
        $model = User::find($request->accept);
        $model->isaccept = false;
        $model->save();
        echo $request->accept;
    }
}