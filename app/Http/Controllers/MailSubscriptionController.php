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
            $request->session()->flash('success', 'Thanks For Subscribe');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Sorry! You have already subscribed ');
        return redirect()->back();
    }
}
