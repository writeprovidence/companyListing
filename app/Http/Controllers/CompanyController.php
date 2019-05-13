<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show()
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
        $data['slug'] = str_slug($requestObject->name) . '.com';
        return $data;
    }

    public function edit()
    {
        if(! Auth::user()->hasCompany()){
            return redirect()->route('add.company');
        }

        return view('dashboard.company.edit');
    }

    public function update(Request $request)
    {
         $rules = [
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'city' => 'string',
            'state' => 'string',
            'zip' => 'numeric',
            'description' => 'required | string | max:500'
        ];

        $this->validate($request, $rules);
        $company = Auth::user()->company;

        if(! $company->update($request->except('_token'))){
            $request->session()->flash('error', 'Cannot update company at the moment!');
            return redirect()->back();
        }

        $message = 'Your company information has been saved and will require admin approval before this is made available to public';

        $request->session()->flash('success', $message);
        return redirect()->route('dashboard');
    }

    public function companyProfile($companySlug)
    {
        $data['company'] = Company::whereSlug($companySlug)->first();
        // $data['company']->increment('page_views');

        return view('dashboard.company.show', $data);
    }

    public function redirectToWebsite($companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();
        $company->increment('clicks_sent');

        return redirect($company->website);
    }
}
