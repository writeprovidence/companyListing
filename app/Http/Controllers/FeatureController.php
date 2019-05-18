<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Review;

class FeatureController extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function featureCompany($companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();
        $company->update([
            'feature' => 1
        ]);

        $this->request->session()->flash('success', 'Company is now featured on homepage!');
        return back();
    }

    public function unfeatureCompany($companySlug)
    {
        $company = Company::whereSlug($companySlug)->first();
        $company->update([
            'feature' => 0
        ]);

        $this->request->session()->flash('success', 'Company is no more featured on homepage!');
        return back();
    }

    public function featureReview($reviewSlug)
    {
        $review = Review::whereSlug($reviewSlug)->first();
        $review->update([
            'feature' => 1
        ]);

        $this->request->session()->flash('success', 'Review is now featured on homepage!');
        return back();
    }

    public function unfeatureReview($reviewSlug)
    {
        $review = Review::whereSlug($reviewSlug)->first();
        $review->update([
            'feature' => 0
        ]);

        $this->request->session()->flash('success', 'Review is no more featured on homepage!');
        return back();
    }
}
