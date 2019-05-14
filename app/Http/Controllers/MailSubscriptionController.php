<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class MailSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {

        if (! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect()->back()->with('success', 'Thanks For Subscribe');
        }
         return redirect()->back()->with('error', 'Sorry! You have already subscribed ');
    }
}
