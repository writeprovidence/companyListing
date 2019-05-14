<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Review;
use App\Models\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        $data['company_count'] = Company::all()->count();
        $data['review_count'] = Review::all()->count();
        return view('dashboard.admin.index', $data);
    }

    public function showResetForm()
    {
        return view('dashboard.admin.resetpassword');
    }

    public function resetPassword(Request $request)
    {
        $rules = [
            'password' => 'required | string | min:6 | confirmed',
        ];

        $this->validate($request, $rules);

        Auth::user()->password  =  Hash::make($request->password);
        Auth::user()->save();

        $request->session()->flash('key', 'Updated Password Successfully');
        return redirect()->route('admin.dashboard');
    }

    public function users()
    {
        $data['users'] = User::paginate(25);

        return view('dashboard.admin.users', $data);
    }
}
