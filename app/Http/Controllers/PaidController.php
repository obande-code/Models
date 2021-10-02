<?php

namespace App\Http\Controllers;

use App\Models\Paid;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PaidController extends Controller
{
    public function paid(Request $request)
    {
        $user = Auth::user()->name;
        $validatedData = $request->validate([
            'premiumvideo' => 'required',
        ]);
        $validatedData = Arr::add($validatedData, 'name', $user);
        Paid::create($validatedData);
        echo "success";
    }
}
