<?php

namespace App\Http\Controllers;

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
        // $data['reviews'] = Reviews::paginate(5);
        return view('dashboard.company.reviews', $data);
    }
}
