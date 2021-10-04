<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Banner;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    public function model()
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
    public function banner()
    {
        $banners = DB::table('banners')
            ->get();
        return view('managebanner', compact('banners'));
    }
    public function advertise()
    {
        $advertisements = DB::table('advertisements')
            ->get();
        return view('manageadvertise', compact('advertisements'));
    }
    public function newbanner()
    {
        return view('newbanner');
    }
    public function newadvertise()
    {
        return view('newadvertise');
    }
    public function addnewbanner(Request $request)
    {
        $name = $request->file('image_video')->getClientOriginalName();
        $fileName = time() . '_' . $name;
        $filePath = $request
            ->file('image_video')
            ->storeAs('uploads', $fileName, 'public');
        // $request->image_video = $fileName;
        // $validatedData = $request->validate([
        //     'description' => 'required',
        // ]);
        $validatedData = Arr::add($validatedData, 'path', $fileName);
        Banner::create($validatedData);
        return redirect()->route('bannermanagement');
    }
    public function addnewadvertise(Request $request)
    {
        $name = $request->file('image_video')->getClientOriginalName();
        $fileName = time() . '_' . $name;
        $filePath = $request
            ->file('image_video')
            ->storeAs('uploads', $fileName, 'public');
        $request->image_video = $fileName;
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        $validatedData = Arr::add($validatedData, 'path', $fileName);
        Advertisement::create($validatedData);
        return redirect()->route('advertisemanagement');
    }
    public function delbanner($image)
    {
        $post = DB::table('banners')
            ->where('path', $image)
            ->delete();
        return redirect()->route('bannermanagement');
    }
    public function deladvertise($image)
    {
        $post = DB::table('advertisements')
            ->where('path', $image)
            ->delete();
        return redirect()->route('advertisemanagement');
    }
    public function editbanner($image)
    {
        $post = DB::table('banners')
            ->where('path', $image)
            ->get();
        return view('editbanner', ['post' => json_decode($post)]);
    }
    public function editadvertise($image)
    {
        $post = DB::table('advertisements')
            ->where('path', $image)
            ->get();
        return view('editadvertise', ['post' => json_decode($post)]);
    }
    public function editsavebanner(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        if ($request->file('image_video') != NULL) {
            $name = $request->file('image_video')->getClientOriginalName();
            $fileName = time() . '_' . $name;
            $filePath = $request
                ->file('image_video')
                ->storeAs('uploads', $fileName, 'public');
            $data = DB::table('banners')
                ->where('id', $request->id)
               ->update(['path' => $fileName]);
        }
        $data = DB::table('banners')
                ->where('id', $request->id)
               ->update(['description' => $request->description]);
        return redirect()->route('bannermanagement');
    }
    public function editsaveadvertise(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        if ($request->file('image_video') != NULL) {
            $name = $request->file('image_video')->getClientOriginalName();
            $fileName = time() . '_' . $name;
            $filePath = $request
                ->file('image_video')
                ->storeAs('uploads', $fileName, 'public');
            $data = DB::table('advertisements')
                ->where('id', $request->id)
               ->update(['path' => $fileName]);
        }
        $data = DB::table('advertisements')
                ->where('id', $request->id)
               ->update(['description' => $request->description]);
        return redirect()->route('advertisemanagement');
    }
}