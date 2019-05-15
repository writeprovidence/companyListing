<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Company;
use App\Models\Review;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('auth', ['except' => ['ranking','index']]);
        $this->middleware('verified', ['except' => ['ranking','index']]);
        $this->middleware('approvedCompany', ['only' => ['companyProfile']]);
    }

    public function index($column = 'created_at', $value = 'desc', $country = null)
    {
        if($country){
            $data['companies'] = Company::whereIsPublic(1)->orderBy('country','asc')->orderBy($column, $value)->paginate(25);
            if($data['companies']->count() == 0){
                $this->request->session()->flash('info', 'No companies yet!');
                return redirect()->back();
            }
            return view('companies', $data);
        }

        $data['companies'] = Company::whereIsPublic(1)->orderBy($column, $value)->paginate(25);
        if($data['companies']->count() == 0){
            $this->request->session()->flash('info', 'No companies yet!');
            return redirect()->back();
        }
        return view('companies', $data);
    }

    public function ranking($column = 'created_at', $orderValue = 'desc', $country = null)
    {
        if($country){
            $data['companies'] = Company::orderBy('country', 'asc')->orderBy($column, $orderValue)->paginate(25);
            return view('ranking', $data);
        }

        $data['companies'] = Company::orderBy($column, $orderValue)->paginate(25);
        return view('ranking', $data);
    }

    public function show(Request $request)
    {
        // if(Auth::user()->hasCompany()){
        //     $request->session()->flash('error', 'Can only add one company');
        //     return redirect()->route('home');
        // }

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

        if(! $company = Company::create($this->buildUpData($request))){
            $request->session()->flash('error', 'Cannot create company at the moment!');
            return redirect()->back()->withInput();
        }

        AlexaLog::create([
            'company_id' => $company->id
        ]);

        $message = 'Your company information has been saved and will require admin approval before this is made available to public';

        $request->session()->flash('success', $message);
        return redirect()->route('dashboard');
    }

    protected function buildUpData($requestObject){
        $data = $requestObject->except('_token');
        $data['user_id'] = Auth::id();
        $data['description'] = strip_tags($data['description']);
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
        $data = $request->except('_token');
        $data['description'] = strip_tags($data['description']);

        if(! $company->update($data)){
            $request->session()->flash('error', 'Cannot update company at the moment!');
            return redirect()->back();
        }

        $message = 'Your company information has been saved and will require admin approval before this is made available to public';

        $request->session()->flash('success', $message);
        return redirect()->route('dashboard');
    }

    public function companyProfile($companySlug, $orderValue = 'desc')
    {
        $data['company'] = Company::whereSlug($companySlug)->first();
        $data['company']->increment('page_views');
        $data['reviews'] = Review::whereCompanyId($data['company']->id)->orderBy('created_at', $orderValue)->paginate(6);

        return view('dashboard.company.show', $data);
    }

    public function ordercompanyProfileBy($companySlug)
    {
        return $this->companyProfile($companySlug, $this->request->order);
    }

    public function redirectToWebsite($companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();
        $company->increment('clicks_sent');

        return redirect($company->website);
    }
    public function orderBy()
    {
       list($column, $orderValue) = explode(', ', $this->request->order);
       return $this->index($column, $orderValue, $this->request->country);
    }


    public function orderRankingBy()
    {
        list($column, $orderValue) = explode(', ', $this->request->order);
       return $this->ranking($column, $orderValue, $this->request->country);
    }
}
