<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $data['reviews'] = Review::whereIsVerified(1)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('index', $data);
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
