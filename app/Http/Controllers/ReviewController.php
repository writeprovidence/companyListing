<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Company;
use App\Models\Review;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyReviewMailable;
use App\Mail\AdminReviewAlertMailable;

class ReviewController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('auth', ['except' => ['index','addReview', 'filterReview', 'show', 'store', 'verifyReview', 'myReviews']]);
        $this->middleware('verified',['except' => ['index','addReview', 'filterReview', 'show', 'store', 'verifyReview', 'myReviews']]);
        $this->middleware('checkReview', ['only' => ['addReview']]);
        $this->middleware('userOnly', ['only' => ['addReview', 'store']]);
    }

    public function index( $value = 'desc', $whereArray = [['is_verified', '=',  1]])
    {
        $data['reviews'] = Review::where($whereArray)->whereIsPublic(1)->orderBy('created_at', $value)->paginate(10);
        if($data['reviews']->count() == 0){
            $this->request->session()->flash('info', 'No reviews yet!');
            if(! Auth::user()){
                return redirect()->route('index');
            }
            return redirect()->route('dashboard');
        }
        return view('review.index', $data);
    }

    public function myReviews(Request $request)
    {
        $data['five_star_reviews'] = Review::whereIsVerified(1)->whereIsPublic(1)->whereCompanyId(Auth::user()->company->id)->whereScore(5)->count();
        $data['four_star_reviews'] = Review::whereIsVerified(1)->whereIsPublic(1)->whereCompanyId(Auth::user()->company->id)->whereScore(4)->count();
        $data['three_star_reviews'] = Review::whereIsVerified(1)->whereIsPublic(1)->whereCompanyId(Auth::user()->company->id)->whereScore(3)->count();
        $data['two_star_reviews'] = Review::whereIsVerified(1)->whereIsPublic(1)->whereCompanyId(Auth::user()->company->id)->whereScore(2)->count();
        $data['one_star_reviews'] = Review::whereIsVerified(1)->whereIsPublic(1)->whereCompanyId(Auth::user()->company->id)->whereScore(1)->count();
        $data['reviews'] = Review::whereIsVerified(1)->whereIsPublic(1)->whereCompanyId(Auth::user()->company->id)->orderBy('created_at', 'desc')->paginate(5);

        if(! Auth::user()->hasCompany()){
            $request->session()->flash('info', 'You do not have any company yet!');
            return redirect()->back();
        }

        if($data['reviews']->count() == 0){
            $request->session()->flash('info', 'You do not have any reviews yet!');
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
        $data['review'] = Review::whereSlug($reviewSlug)->whereCompanyId($data['company']->id)->whereIsVerified(1)->whereIsPublic(1)->first();
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
            "title" => 'required | string | min:2 | max:150',
            "review" => 'required | string | max:1000',
            "full_name" => 'required | string',
            "email" => 'required | email',
            'service' => 'string',
        ];
        $this->validate($request, $rules);

        $data = $this->buildUpData($request, $company->id);

        if(! $review = Review::create($data)){
            $request->session()->flash('error', 'Your review has been unsuccessful!');
            return redirect()->back()->withInputs();
        }

        $review->update([
            'slug' => 'review-'.$review->id
        ]);

        $this->updateCompanyRating($company->id);
        $this->sendReviewVerificationEmail($request->email, $review->id);
        $this->sendAdminReviewAlertEmail($review);

        $request->session()->flash('success', 'You review has been succesful!');
        return redirect()->back();

    }

    protected function buildUpData($requestObject, $companyId){
        $data = $requestObject->except('_token');
        $data['company_id'] = $companyId;
        $data['logged_user_id'] = Auth::id();
        $data['review_ip'] = request()->ip();
        return $data;
    }

    protected function sendReviewVerificationEmail($email, $reviewId)
    {
        Mail::to($email)->send(new VerifyReviewMailable($reviewId));
    }

    protected function sendAdminReviewAlertEmail($review)
    {
        $adminUsers = User::whereRole('admin')->get();
        foreach($adminUsers as $user){
            Mail::to($user->email)->send(new AdminReviewAlertMailable($review));
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
        return redirect()->route('index');
    }

    public function filterReview($companySlug, $orderValue = 'desc')
    {
        $data['company'] = Company::whereSlug($companySlug)->first();
        $data['reviews'] = Review::whereCompanyId($data['company']->id)->whereIsVerified(1)
                            ->whereIsPublic(1)->orderBy('created_at', $orderValue)
                            ->paginate(5);


        if($data['reviews']->count() == 0){
            $this->request->session()->flash('info', 'No reviews for Company yet!');
            return redirect()->back();
        }
        return view('review.index', $data);
    }

    public function storeResponse(Request $request, $reviewSlug)
    {
        $validator = Validator::make($request->except('_token'), [
            'review_response' => 'string | max:500 | required'
        ]);

        if ($validator->fails())
        {
            $request->session()->flash('error', 'Response cannot be empty or more than 500 characters!');
            return redirect()->back();
        }

        $review = Review::whereSlug($reviewSlug)->first();

        $review->update([
            'response' => $request->review_response,
            'response_user_id' => Auth::id(),
            'response_timestamp' => Carbon::now(),
            'response_ip' => request()->ip(),
        ]);

        $request->session()->flash('success', 'Response posted sucessfully');
        return back();
    }

    public function orderBy()
    {
        if(! $this->checkIfFilterByStar($this->request)){
           return $this->index($this->request->order);
        }

        $dataH = collect(explode(',', $this->request->stars))->map(function($star){
            return (array) explode(',', "score,{$star}");
        });

        $dataH = \Illuminate\Support\Collection::unwrap($dataH);

        switch(count($dataH)){
            case 6:
                $data['reviews'] = Review::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                    ->orWhere($dataH[2][0], $dataH[2][1])->orWhere($dataH[3][0], $dataH[3][1])
                                    ->orWhere($dataH[4][0], $dataH[4][1])->orWhere($dataH[5][0], $dataH[5][1])->paginate(25);
                break;
            case 5:
                $data['reviews'] = Review::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                        ->orWhere($dataH[2][0], $dataH[2][1])->orWhere($dataH[3][0], $dataH[3][1])
                                        ->orWhere($dataH[4][0], $dataH[4][1])->paginate(25);
            break;
            case 4:
            $data['reviews'] = Review::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                ->orWhere($dataH[2][0], $dataH[2][1])->orWhere($dataH[3][0], $dataH[3][1])->paginate(25);
            break;
            case 3:
             $data['reviews'] = Review::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                ->orWhere($dataH[2][0], $dataH[2][1])->paginate(25);
            break;
            case 2:
            $data['reviews'] = Review::where($dataH[0][0], $dataH[0][1])->orWhere($dataH[1][0], $dataH[1][1])
                                ->paginate(25);
            break;
            case 1:
            $data['reviews'] = Review::where($dataH[0][0], $dataH[0][1])
                                ->paginate(25);
            break;
            default:
            $data['reviews'] = Review::orderBy('created_at', 'desc')
                                ->paginate(25);
            break;
        }

        return view('review.index', $data);
    }

     public function checkIfFilterByStar(Request $request){
        return $request->has('stars');
    }

    public function orderFilterReviewBy($companySlug)
    {
        return $this->filterReview($companySlug, $this->request->order);
    }

    public function updateCompanyRating($companyId){
        $company = Company::whereId($companyId)->first();
        $company->update([
            'rating' => $company->recalculateRating()
        ]);
    }
}
