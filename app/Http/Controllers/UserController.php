<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }

    public function update(Request $request)
    {
        $rules = [
            'title' => 'required | string',
            'name' => 'required |string',
        ];

        $this->validate($request, $rules);
        if(! Auth::user()->update($request->except('_token'))){
            $request->session()->flash('error', 'Cannot update profile at the moment!');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Profile updated');
        return redirect()->route('dashboard');
    }
}
