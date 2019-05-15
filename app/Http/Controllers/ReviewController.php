<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Company;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyReviewMailable;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','addReview', 'filterReview']]);
        $this->middleware('verified',['except' => ['index','addReview', 'filterReview']]);
        // $this->middleware('checkReview', ['only' => ['addReview']]);
    }

    public function index(Request $request)
    {
        $data['reviews'] = Review::orderBy('created_at', 'desc')->paginate(10);
        if($data['reviews']->count() == 0){
            $request->session()->flash('info', 'No reviews!');
            return redirect()->back();
        }
        return view('review.index', $data);
    }

    public function myReviews(Request $request)
    {
        // Auth::user()->company
        $data['reviews'] = Review::orderBy('created_at', 'desc')->paginate(5);

        if($data['reviews']->count() == 0){
            $request->session()->flash('info', 'No reviews!');
            return redirect()->back();
        }
        return view('dashboard.review.index', $data);
    }

    public function addReview($companySlug)
    {
        $data['company'] = Company::whereSlug($companySlug)->first();

        return view('review.add', $data);
    }

    public function show($companySlug, $reviewSlug)
    {
        $data['company'] = Company::whereSlug($companySlug)->first();
        $data['review'] = Review::whereSlug($reviewSlug)->whereCompanyId($data['company']->id)->first();
        return view('review.show', $data);
    }

    public function upvote($companyId)
    {
        return Review::whereCompanyId($companyId)->increment('likes');
    }
    public function downvote($companyId)
    {
        return Review::whereCompanyId($companyId)->increment('dislikes');
    }

    public function store(Request $request, $companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();

        $rules = [
            "title" => 'required | string | max:150',
            "review" => 'required | string | max:1000',
            "full_name" => 'required | string',
        ];
        $this->validate($request, $rules);

        $data = $this->buildUpData($request, $company->id);

        if(! $review = Review::create($data)){
            $request->session()->flash('error', 'unsuccessful');
            return redirect('/');//->back();
        }

        $this->sendReviewVerificationEmail($review->id);

        $review->update([
            'slug' => 'review-'.$review->id
        ]);

        $request->session()->flash('success', 'successful');
        return redirect()->back();

    }

    protected function buildUpData($requestObject, $companyId){
        $data = $requestObject->except('_token');
        $data['company_id'] = $companyId;
        $data['logged_user_id'] = Auth::id();
        $data['review_ip'] = request()->ip();
        return $data;
    }

    protected function sendReviewVerificationEmail($reviewId)
    {
        if(Auth::user())
        {
            Mail::to(Auth::user()->email)->send(new VerifyReviewMailable($reviewId));
        }
    }


    public function verifyReview(Request $request, $reviewId)
    {
        $data['verification_time'] = Carbon::now();
        $data['verification_ip'] = request()->ip();
        $data['is_verified'] = 1;

        $review = Review::whereId($reviewId)->first();

        $review->update($data);

        $request->session()->flash('success', 'Review Confirmed!');
        return redirect()->route('dashboard');
    }

    public function filterReview(Request $request, $companySlug)
    {
        $data['company'] = Company::whereSlug($companySlug)->first();
        $data['reviews'] = Review::whereCompanyId($data['company']->id)->paginate(5);

        if($data['reviews']->count() == 0){
            $request->session()->flash('info', 'No reviews for company');
            return redirect()->back();
        }
        return view('review.index', $data);
    }
}
