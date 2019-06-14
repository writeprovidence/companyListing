<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Domain;
use Illuminate\Http\Request;


class DomainController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        if(! Auth::user()->hasCompany()){
             $request->session()->flash('error', 'Must add company before adding domain');
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
        $domainsCollection = collect($data['name']);
        // $existingDomainNames = collect([ Domain::whereCompanyId(Auth::user()->company->id)->pluck('name')->toArray() ]);



        $domainsCollection->each(function($domain){

            // $matched = $existingDomainNames->first(function($existingDomain) use ($domain){
            //     return $existingDomain == $domain ? true : false;
            // });

            // // return $matched;
            // if($matched != NULL){
            //     return;
            // }

            if($domain != NULL){
                Domain::create([
                    'company_id' => Auth::user()->company->id,
                    'name' => $domain,
                ]);
            }
        });

        $request->session()->flash('success', 'Added Domain(s) to company!');
        return redirect()->back();

    }

    public function update(Request $request, Domain $domain)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $data = $request->except('_token');

        $domain->update($data);

        $request->session()->flash('success', 'Updated Domain successfully!');
        return redirect()->back();

    }
}
