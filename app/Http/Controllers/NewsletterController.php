<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function create(){
        return view('newsletter');
    }

    public function store()
    {
        if(!Newsletter::isSubscribed($request->email))
        {
            Newsletter::subscribePending($request->email);
            return redirect('newsletter')->with('success', 'Thanks For Subscribing');
        }

        return redirect('newsletter')->with('failure', 'Sorry! You are already a subscribed Member');
    }
}
