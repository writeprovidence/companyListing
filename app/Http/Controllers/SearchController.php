<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\User;
use App\Models\Review;

class SearchController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function search($column = 'created_at', $value = 'desc', $country = null)
    {
        if($country){
            $data['companies'] = Company::where('name', 'LIKE', "%{$this->request->search}%")->orderBy('country', 'asc')->orderBy($column, $value)->paginate(10);
                return view('search.all', $data);
            }

        $data['companies'] = Company::where('name', 'LIKE', "%{$this->request->search}%")->orderBy($column, $value)->paginate(10);

        return view('search.all', $data);
    }

    public function orderSearchBy()
    {
        list($column, $orderValue) = explode(', ', $this->request->order);
       return $this->search($column, $orderValue, $this->request->country);
    }

    public function companies(){
        $data['companies'] = Company::where('name', 'LIKE', "%{$this->request->search}%")->orderBy('name', 'asc')->paginate(100);

        return view('dashboard.admin.companies', $data);
    }

    public function reviews(){
        $data['reviews'] = Review::where('title', 'LIKE', "%{$this->request->search}%")->orderBy('title', 'asc')->paginate(100);

        return view('dashboard.admin.reviews', $data);
    }

    public function users(){
        $data['users'] = User::where('name', 'LIKE', "%{$this->request->search}%")->paginate(40);

        return view('dashboard.admin.users', $data);
    }
}
