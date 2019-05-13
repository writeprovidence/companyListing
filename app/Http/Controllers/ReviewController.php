<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data = [];
        // $data['reviews'] = Reviews::orderBy('created_at', 'desc)->paginate(5);
        return view('dashboard.company.reviews', $data);
    }

    public function addReview($companySlug)
    {
        $data['company'] = Company::whereSlug($companySlug)->first();

        return view('dashboard.review.add', $data);
    }

    public function upvote($companyId)
    {
        return Review::whereCompanyId($companyId)->increment('likes');
    }
    public function downvote($companyId)
    {
        return Review::whereCompanyId($companyId)->increment('dislikes');
    }
}
