<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    public function subscriber(Request $request)
    {
        $user = Auth::user()->name;
        $validatedData = $request->validate([
            'subscriber' => 'required',
        ]);
        $validatedData = Arr::add($validatedData, 'name', $user);
        Subscriber::create($validatedData);
        echo "success";
    }
}
