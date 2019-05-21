<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function showUserResetForm()
    {
        return view('dashboard.admin.resetpassword');
    }

    public function resetUserPassword(Request $request)
    {
        $rules = [
            'password' => 'required | string | min:6 | confirmed',
        ];

        $this->validate($request, $rules);

        Auth::user()->password  =  Hash::make($request->password);
        Auth::user()->save();

        $request->session()->flash('success', 'Updated Password Successfully!');
        return redirect()->route('dashboard');
    }
}
