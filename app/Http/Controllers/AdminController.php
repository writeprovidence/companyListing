<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Review;
use App\Models\Company;
use App\Models\Domain;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveReviewMailable;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        $data['company_count'] = Company::all()->count();
        $data['review_count'] = Review::all()->count();
        return view('dashboard.admin.index', $data);
    }

    public function showResetForm()
    {
        return view('dashboard.admin.resetpassword');
    }

    public function resetPassword(Request $request)
    {
        $rules = [
            'password' => 'required | string | min:6 | confirmed',
        ];

        $this->validate($request, $rules);

        Auth::user()->password  =  Hash::make($request->password);
        Auth::user()->save();

        $request->session()->flash('success', 'Updated Password Successfully!');
        return redirect()->route('admin.dashboard');
    }

    public function users($orderValue = 'desc')
    {
        $data['users'] = User::whereRole('user')->orderBy('created_at', $orderValue)->paginate(25);

        return view('dashboard.admin.users', $data);
    }

    public function orderUsers(Request $request)
    {
        return $this->users($request->order);
    }
    public function companies($orderValue = 'desc')
    {
        $data['companies'] = Company::orderBy('created_at', $orderValue)->paginate(25);

        return view('dashboard.admin.companies', $data);
    }

    public function orderCompanies(Request $request)
    {
        return $this->companies($request->order);
    }

    public function approveCompany(Request $request, $companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();
        $company->update([
            'is_public' => 1
        ]);

        $request->session()->flash('success', 'Company Approved');
        return back();
    }

    public function rejectCompany(Request $request, $companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();
        $company->update([
            'is_public' => 0,
            'feature' => 0
        ]);

        $request->session()->flash('success', 'Company Rejected');
        return back();
    }

    public function editCompany($companySlug)
    {
        $data['company'] = Company::whereSlug($companySlug)->first();

        return view('dashboard.admin.editCompany',$data);
    }

    public function updateCompany(Request $request, $companySlug)
    {
          $rules = [
            'name' => 'required | string',
            'website' => 'required | url',
            'slug' => 'required | unique:companies',
            'email' => 'required | email',
            'phone' => 'required',
            'city' => 'string',
            'state' => 'string',
            'zip' => 'numeric',
            'description' => 'required | string | max:500'
        ];
        $this->validate($request, $rules);

        $company = Company::whereSlug($companySlug)->first();


        if(! $company->update($request->except('_token'))){
            $request->session()->flash('error', 'Cannot update company at the moment!');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Company profile updated.');
        return redirect()->route('admin.companies');
    }

    public function reviews($orderValue = 'desc')
    {
        $data['reviews'] = Review::orderBy('created_at', $orderValue)->paginate(25);

        return view('dashboard.admin.reviews', $data);
    }

    public function orderReviews(Request $request)
    {
        return $this->reviews($request->order);
    }

    public function approveReview(Request $request, $reviewSlug)
    {
        $review = Review::whereSlug($reviewSlug)->first();
        $review->update([
            'is_public' => 1,
            'is_verified' => 1
        ]);
        $this->sendReviewApprovalEmail($review->email);

        $request->session()->flash('success', 'Review Approved');
        return back();
    }

    protected function sendReviewApprovalEmail($email)
    {
        Mail::to($email)->send(new ApproveReviewMailable());
    }

    public function rejectReview(Request $request, $reviewSlug)
    {
        $review = Review::whereSlug($reviewSlug)->first();
        $review->update([
            'is_public' => 0,
            'feature' => 0
        ]);

        $request->session()->flash('success', 'Review Rejected');
        return back();
    }

    public function editReview($reviewSlug)
    {
        $data['review'] = Review::whereSlug($reviewSlug)->first();
        $data['company'] =  $data['review']->company;
        return view('dashboard.admin.editReview',$data);
    }

    public function updateReview(Request $request, $reviewSlug)
     {
        $review = Review::whereSlug($reviewSlug)->first();

        $rules = [
            "title" => 'required | string | max:150',
            "review" => 'required | string | max:1000',
            "full_name" => 'required | string',
        ];
        $this->validate($request, $rules);
        $data = $request->except('_token');

        $review->update($data);

        $request->session()->flash('success', 'successful');
        return redirect()->back();
    }

    public function showReview($companySlug, $reviewSlug)
    {
        $data['company'] = Company::whereSlug($companySlug)->first();
        $data['review'] = Review::whereSlug($reviewSlug)->whereCompanyId($data['company']->id)->first();
        return view('review.show', $data);
    }

    public function loginLogs()
    {
        $data['loginlogs'] = LoginLog::orderBy('created_at', 'desc')->paginate(15);
        return view('dashboard.admin.loginLogs', $data);
    }

    // public function clickLogs()
    // {
    //     $data['loginlogs'] = LoginLog::paginate(25);
    //     return view('dashboard.admin.loginLogs', $data);
    // }

    public function updateDomain(Request $request, Domain $domain)
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
