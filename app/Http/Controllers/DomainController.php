<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Domain;
use Illuminate\Http\Request;


class DomainController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if(! Auth::user()->hasCompany()){
             $request->session()->flash('error', 'Must add company before adding server');
            return redirect()->back();
        }

        $data['domains'] = Auth::user()->company->domains;
        return view('dashboard.domain.add', $data);
    }

    public function edit()
    {
        if(! Auth::user()->hasCompany()){
             $request->session()->flash('error', 'Must add company before adding server');
            return redirect()->back();
        }
        return view('dashboard.domain.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $data = $request->except('_token');
        $data['company_id'] = Auth::user()->company->id;

        Domain::create($data);

        $request->session()->flash('success', 'Added Domain to company!');
        return redirect()->back();

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name_1' => 'required'
        ]);
        $data = $request->except('_token');

        Domain::whereCompanyId(Auth::user()->company->id)->first()->update($data);

        $request->session()->flash('success', 'Updated Domain successfully!');
        return redirect()->route('dashboard');

    }
}
