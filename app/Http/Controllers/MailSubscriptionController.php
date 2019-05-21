<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use App\Models\Newsletter as DBNewsletter;


class MailSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {

        if (! Newsletter::isSubscribed($request->email) )
        {
            Newsletter::subscribePending($request->email);
            DBNewsletter::create([
                'name' => $request->name,
                'email' => $request->email,
                'ip_address' => request()->ip(),
            ]);
            $request->session()->flash('success', 'Thanks For Subscribe');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Sorry! You have already subscribed ');
        return redirect()->back();
    }
}
