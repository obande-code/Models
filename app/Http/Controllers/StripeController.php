<?php

namespace App\Http\Controllers;
use Session;
use Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        return view('stripe')->with('subscriptionfee', $request->subscriptionfee)->with('model', $request->model);
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (int)$request->amount * 1.06 * 100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of websolutionstuff.com",
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}