<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function edit()
    {
        return view('dashboard.company.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required | string | max:150',
            'website' => 'required | url',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'address_line1' => 'string',
            'address_line2' => 'string',
            'city' => 'string',
            'country' => 'required | string',
            'state' => 'string',
            'zip' => 'numeric',
            'description' => 'required | string | max:500'
        ];

        $this->validate($request, $rules);

        if(! Company::create($this->buildUpData($request))){
            $request->session()->flash('error', 'Cannot create company at the moment!');
            return redirect()->back()->withInput();
        }

        $message = 'Your company information has been saved and will require admin approval before this is made available to public';

        $request->session()->flash('success', $message);
        return redirect()->route('dashboard');
    }

    protected function buildUpData($requestObject){
        $data = $requestObject->except('_token');
        $data['user_id'] = Auth::id();
        $data['link_to_go'] = $requestObject->website;
        return $data;
    }

    public function show()
    {
        if(! Auth::user()->hasCompany()){
            $request->session()->flash('error', 'You have not created a company yet!');
            return redirect()->back();
        }

        return view('dashboard.company.edit');
    }

    public function update()
    {
        return $company = Auth::user()->company;
    }
}
