<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Domain;
use Illuminate\Http\Request;


class DomainController extends Controller
{
    protected $exceedDomainCount;

    public function __construct()
    {
        $this->exceedDomainCount = false;
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

        $domainsCollection->each(function($domain){
            if($domain != NULL && $this->canAddAnotherDomain()){
                return Domain::create([
                    'company_id' => Auth::user()->company->id,
                    'name' => $domain,
                ]);
            }
            $this->exceedDomainCount = true;
        });

        if($this->exceedDomainCount){
            $request->session()->flash('info', 'Some Domain(s) were not added to company!');
        }

        $request->session()->flash('success', 'Added Domain(s) to company!');
        return redirect()->back();

    }

    protected function canAddAnotherDomain()
    {
        $domainCount = Domain::whereCompanyId(Auth::user()->company->id)->get()->count();

        return $domainCount < Auth::user()->company->domains_count ? true : false;
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
