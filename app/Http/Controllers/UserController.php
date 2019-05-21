<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
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

    public function editByAdmin(User $user){
        $data['user'] = $user;
        return view('dashboard.admin.edituser', $data);
    }

    public function updateByAdmin(Request $request, User $user){
        $rules = [
            'title' => 'string',
            'name' => 'required | string',
            'email' => 'required | email'
        ];
        $this->validate($request, $rules);

        $emailUser = User::whereEmail($request->email)->first();

        if($emailUser){
            if($emailUser->id != $user->id){
                $request->session()->flash('error', 'Email Already Exist');
                return back();
            }
        }

        if(! $user->update($request->except('_token'))){
            $request->session()->flash('error', 'Cannot update profile at the moment!');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Profile updated');
        return redirect()->back();
    }
}
