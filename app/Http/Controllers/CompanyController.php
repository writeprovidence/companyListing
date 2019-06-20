<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\AlexaLog;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNewCompanyMailable;
use App\Mail\NewCompanyMailable;

class CompanyController extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('auth', ['only' => ['show','store','edit', 'update']]);
        $this->middleware('verified', ['only' => ['show','store','edit', 'update','add']]);
        $this->middleware('approvedCompany', ['only' => ['companyProfile']]);
    }

    public function index($column = 'created_at', $value = 'desc', $country = null)
    {

        if($country){
            // $this->loadCompaniesByCountry()
            $data['companies'] = Company::whereIsPublic(1)->with(
                array('reviews' => function($query)
                {
                    $query->whereIsVerified(1);
                    $query->whereIsPublic(1);
                })
            )->orderBy('country','asc')->orderBy($column, $value)->paginate(25);
            if($data['companies']->count() == 0){
                $this->request->session()->flash('info', 'No companies yet!');
                if(! Auth::user()){
                    return redirect()->route('index');
                }
                return redirect()->route('dashboard');
            }
            return view('company.index', $data);
        }

        $data['companies'] = Company::whereIsPublic(1)->with(
            array('reviews' => function($query)
            {
                $query->whereIsVerified(1);
                $query->whereIsPublic(1);
            })
        )->orderBy($column, $value)->paginate(25);
        if($data['companies']->count() == 0){
            $this->request->session()->flash('info', 'No companies yet!');
            return redirect()->back();
        }
        return view('company.index', $data);
    }

    public function ranking($column = 'created_at', $orderValue = 'desc', $country = null)
    {
        if($country){
            $data['companies'] = Company::orderBy($column, $orderValue)->orderBy('country', 'asc')->paginate(25);
            return view('ranking', $data);
        }

        $data['companies'] = Company::orderBy($column, $orderValue)->paginate(25);
        return view('ranking', $data);
    }

    public function show(Request $request)
    {
        return view('dashboard.company.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required | string | max:150',
            'website' => 'required | url',
            'avatar' => 'image | mimes:jpg,jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'address_line1' => 'string',
            'city' => 'string',
            'country' => 'required | string',
            'state' => 'string',
            'zip' => 'numeric',
            'description' => 'required | string | max:500'
        ];

        $this->validate($request, $rules);

        if(! $company = Company::create($data = $this->buildUpData($request))){
            $request->session()->flash('error', 'Cannot create company at the moment!');
            return redirect()->back()->withInput();
        }
        if($request->hasFile('avatar')){
            $request->avatar->storeAs('companies',
                $data['avatar']
            );
        }

        AlexaLog::create([
            'company_id' => $company->id
        ]);

        Product::create([
            'company_id' => $company->id
        ]);

        $this->sendNewCompanyAlertEmail(Auth::user()->email);
        $this->sendAdminNewCompanyAlertEmail($company);

        $message = 'Your company information has been saved and will require admin approval before it is made available to the public!';

        $request->session()->flash('success', $message);
        return redirect()->route('dashboard');
    }

    protected function sendNewCompanyAlertEmail($email)
    {
        Mail::to($email)->send(new NewCompanyMailable());
    }

    protected function sendAdminNewCompanyAlertEmail($company)
    {
        $adminUsers = User::whereRole('admin')->get();
        foreach($adminUsers as $user){
            Mail::to($user->email)->send(new AdminNewCompanyMailable($company));
        }
    }

    protected function buildUpData($requestObject)
    {
        $data = $requestObject->except('_token');
        $data['user_id'] = Auth::id();
        $data['description'] = strip_tags($data['description']);
        $data['link_to_go'] = $requestObject->website;
        $data['slug'] = str_slug($requestObject->name) . '.com';

        if($requestObject->hasFile('avatar')){
            $data['avatar'] = str_slug($requestObject->name) . '.' . time() . '.' . $requestObject->file('avatar')->getClientOriginalExtension();
        }
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
         if($request->hasFile('avatar')){
             $request->avatar->storeAs('companies',
                $imageName = str_slug($request->name) . '.' . time() . '.' . $request->file('avatar')->getClientOriginalExtension()
            );
            unset($data['avatar']);
            $data['avatar'] = $imageName;
        }

        if(! $company->update($data)){
            $request->session()->flash('error', 'Cannot update company at the moment!');
            return redirect()->back();
        }

        if($company->is_public){
            $message = 'Your company information has been updated!';
        }else{
            $message = 'Your company information has been saved and will require admin approval before this is made available to public';
        }

        $request->session()->flash('success', $message);
        return redirect()->route('dashboard');
    }

    public function companyProfile($companySlug, $orderValue = 'desc')
    {
        $data['company'] = Company::whereSlug($companySlug)->with(
                                array('reviews' => function($query)
                                    {
                                        $query->whereIsVerified(1);
                                        $query->whereIsPublic(1);
                                    })
                            )->first();
        $data['company']->increment('page_views');
        $data['reviews'] = Review::whereCompanyId($data['company']->id)->whereIsVerified(1)
                            ->whereIsPublic(1)->orderBy('created_at', $orderValue)
                            ->paginate(5);

        return view('dashboard.company.show', $data);
    }

    public function ordercompanyProfileBy($companySlug)
    {
        return $this->companyProfile($companySlug, $this->request->order);
    }

    public function redirectToWebsite($companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();
        if(Auth::user()){
            if($company->id != Auth::user()->company->id){
                $company->increment('clicks_sent');
            }
        }else{
            $company->increment('clicks_sent');
        }

        return redirect($company->link_to_go);
    }
    public function orderBy()
    {
        if(! $this->checkIfFilterByStar($this->request)){
            list($column, $orderValue) = explode(', ', $this->request->order);
            return $this->index($column, $orderValue, $this->request->country);
        }


        $data['companies'] = Company::whereRating(explode(',', $this->request->stars))->with(
                                array('reviews' => function($query)
                                {
                                    $query->whereIsVerified(1);
                                    $query->whereIsPublic(1);
                                })
                            )->paginate(25);

        return view('company.index', $data);
    }

    public function checkIfFilterByStar(Request $request)
    {
        return $request->has('stars');
    }

    public function orderRankingBy()
    {
        if(! $this->checkIfFilterByStar($this->request)){
            list($column, $orderValue) = explode(', ', $this->request->order);
            return $this->ranking($column, $orderValue, $this->request->country);
        }

        $dataH = collect(explode(',', $this->request->stars))->map(function($star){
            return (array) explode(',', "rating,{$star}");
        });

        $dataH = \Illuminate\Support\Collection::unwrap($dataH);

        switch(count($dataH)){
            case 6:
                $data['companies'] = Company::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                    ->orWhere($dataH[2][0], $dataH[2][1])->orWhere($dataH[3][0], $dataH[3][1])
                                    ->orWhere($dataH[4][0], $dataH[4][1])->orWhere($dataH[5][0], $dataH[5][1])->with(
                                        array('reviews' => function($query)
                                        {
                                            $query->whereIsVerified(1);
                                            $query->whereIsPublic(1);
                                        })
                                    )->paginate(25);
                break;
            case 5:
                $data['companies'] = Company::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                        ->orWhere($dataH[2][0], $dataH[2][1])->orWhere($dataH[3][0], $dataH[3][1])
                                        ->orWhere($dataH[4][0], $dataH[4][1])->with(
                                            array('reviews' => function($query)
                                            {
                                                $query->whereIsVerified(1);
                                                $query->whereIsPublic(1);
                                            })
                                        )->paginate(25);
            break;
            case 4:
            $data['companies'] = Company::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                ->orWhere($dataH[2][0], $dataH[2][1])->orWhere($dataH[3][0], $dataH[3][1])->with(
                                    array('reviews' => function($query)
                                    {
                                        $query->whereIsVerified(1);
                                        $query->whereIsPublic(1);
                                    })
                                )->paginate(25);
            break;
            case 3:
             $data['companies'] = Company::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                ->orWhere($dataH[2][0], $dataH[2][1])->with(
                                    array('reviews' => function($query)
                                    {
                                        $query->whereIsVerified(1);
                                        $query->whereIsPublic(1);
                                    })
                                )->paginate(25);
            break;
            case 2:
            $data['companies'] = Company::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])->with(
                                    array('reviews' => function($query)
                                    {
                                        $query->whereIsVerified(1);
                                        $query->whereIsPublic(1);
                                    })
                                )->paginate(25);
            break;
            case 1:
            $data['companies'] = Company::where($dataH[0][0], $dataH[0][1])->with(
                                    array('reviews' => function($query)
                                    {
                                        $query->whereIsVerified(1);
                                        $query->whereIsPublic(1);
                                    })
                                )->paginate(25);
            break;
            default:
            $data['companies'] = Company::orderBy('created_at', 'desc')->with(
                                    array('reviews' => function($query)
                                    {
                                        $query->whereIsVerified(1);
                                        $query->whereIsPublic(1);
                                    })
                                )->paginate(25);
            break;
        }

        return view('ranking', $data);
    }

    public function country($country, $column = 'created_at', $value = 'desc')
    {
        $data['companies'] = Company::whereIsPublic(1)->with(
            array('reviews' => function($query)
                {
                    $query->whereIsVerified(1);
                    $query->whereIsPublic(1);
                })
        )->orderBy($column, $value)->paginate(25);
        if($data['companies']->count() == 0){
            $this->request->session()->flash('info', 'No companies yet!');
            return redirect()->back();
        }
        return view('countries', $data);
    }

    public function orderCountryBy($country)
    {
       list($column, $orderValue) = explode(', ', $this->request->order);
       return $this->country($country, $column, $orderValue);
    }

    public function addTagLine()
    {

        if(Auth::user()->company()->update(['tag_line' => $this->request->tag_line])){
            $this->request->session()->flash('success', 'Added Tag Line Successfully!');
            return back();
        }
        $this->request->session()->flash('error', 'Can not add Tag Line!');
        return back();
    }
}
