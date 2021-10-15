<?php

namespace App\Http\Controllers;
use Session;
use Stripe;

use Illuminate\Http\Request;

class VideoStripeController extends Controller
{
    public function stripe(Request $request)
    {
        return view('videostripe')->with('video', $request->video)->with('amount', $request->amount);
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (int)substr($request->amount, 1) * 1.06 * 100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of websolutionstuff.com",
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}