<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class NewpostController extends Controller
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
        return view('newpost');
    }
    public function add(Request $request)
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        $name = $request->file('image_video')->getClientOriginalName();
        $fileName = time() . '_' . $name;
        // $filePath = $request
        //     ->file('image_video')
        //     ->storeAs('uploads', $fileName, 'public');
        $request->image_video = $fileName;
        if ($request->type == 'Free' || $request->type == 'Subscriber') {
            $validatedData = $request->validate([
                'description' => 'required',
                'type' => 'required',
            ]);
            $validatedData = Arr::add($validatedData, 'amount', '$0.00');
        } else {
            $validatedData = $request->validate([
                'description' => 'required',
                'type' => 'required',
                'amount' => 'required',
            ]);
        }
        $user = Auth::user()->name;
        $validatedData = Arr::add($validatedData, 'image_video', $fileName);
        $validatedData = Arr::add($validatedData, 'username', $user);
        Post::create($validatedData);
        return redirect()->route('managepost');
    }
    public function editsave(Request $request, Post $post)
    {
        if (session('accept') == false) {
            return redirect()->route('waitaccept');
        }
        $name = $request->file('image_video')->getClientOriginalName();
        $fileName = time() . '_' . $name;
        $filePath = $request
            ->file('image_video')
            ->storeAs('uploads', $fileName, 'public');
        $request->image_video = $fileName;
        if ($request->type == 'Free' || $request->type == 'Subscriber') {
            $validatedData = $request->validate([
                'description' => 'required',
                'type' => 'required',
            ]);
            $validatedData = Arr::add($validatedData, 'amount', '$0.00');
        } else {
            $validatedData = $request->validate([
                'description' => 'required',
                'type' => 'required',
                'amount' => 'required',
            ]);
        }
        $user = Auth::user()->name;
        $validatedData = Arr::add($validatedData, 'image_video', $fileName);
        $validatedData = Arr::add($validatedData, 'username', $user);
        $post = Post::find($request->id)->delete();
        Post::create($validatedData);
        return redirect()->route('managepost');
    }
}