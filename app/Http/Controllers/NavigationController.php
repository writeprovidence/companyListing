<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Review;
use App\Models\Company;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function __construct(){
        $this->middleware('userOnly', ['only' => ['dashboard']]);
    }
    public function index()
    {
        $data['company_count'] = Company::whereIsPublic(1)->get()->count();
        $data['review_count'] = Review::whereIsVerified(1)->get()->count();
        $data['featured_companies'] = Company::whereIsPublic(1)->whereFeature(1)->orderBy('created_at', 'desc')->limit(4)->get();
        $data['featured_reviews'] = Review::whereIsPublic(1)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('index', $data);
    }

    public function dashboard()
    {
         $data['reviews_count'] = Review::whereIsVerified(1)->whereIsPublic(1)->whereCompanyId(Auth::user()->company->id)->orderBy('created_at', 'desc')->count();
        return view('dashboard.index', $data);
    }
}
