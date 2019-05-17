<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data['products'] = Product::whereCompanyId(Auth::user()->company->id)->paginate(6);
        return view('dashboard.products.add', $data);
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | string ',
            'description' => 'required | string'
        ]);

        $data = $request->except('_token');
        $data['company_id'] = Auth::user()->company->id;

        Product::create($data);

        $request->session()->flash('success', 'Added Product to company!');
        return redirect()->route('dashboard');

    }
}
