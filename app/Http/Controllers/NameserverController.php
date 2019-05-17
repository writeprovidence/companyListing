<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Nameservers;
use Illuminate\Http\Request;


class NameserverController extends Controller
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

        if(! Auth::user()->company->hasNameservers()){
            return view('dashboard.nameservers.add');
        }

        $data['nameservers'] = Auth::user()->company->nameservers;
        return view('dashboard.nameservers.edit', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_1' => 'required'
        ]);
        $data = $request->except('_token');
        $data['company_id'] = Auth::user()->company->id;

        Nameservers::create($data);

        $request->session()->flash('success', 'Added Nameserver to company!');
        return redirect()->route('dashboard');

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name_1' => 'required'
        ]);
        $data = $request->except('_token');

        Nameservers::whereCompanyId(Auth::user()->company->id)->first()->update($data);

        $request->session()->flash('success', 'Updated Nameserver to successfully!');
        return redirect()->route('dashboard');

    }
}
