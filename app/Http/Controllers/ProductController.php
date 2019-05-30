<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $data['products'] = Product::whereCompanyId(Auth::user()->company->id)->first();
        return view('dashboard.products.edit', $data);
    }

    public function add()
    {
        return view('dashboard.products.add', $data);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['product'] = Product::whereCompanyId(Auth::user()->company->id)->first();

        if($request->has('product_1_name')){
            $data['name'] = $request->product_1_name;
            $data['summary'] = $request->product_1_summary;
            $this->updateCompanyProduct(1,$data);
        }

        if($request->has('product_2_name')){
            $data['name'] = $request->product_2_name;
            $data['summary'] = $request->product_2_summary;
            $this->updateCompanyProduct(2,$data);
        }
        if($request->has('product_3_name')){
            $data['name'] = $request->product_3_name;
            $data['summary'] = $request->product_3_summary;
            $this->updateCompanyProduct(3,$data);
        }
        if($request->has('product_4_name')){
            $data['name'] = $request->product_4_name;
            $data['summary'] = $request->product_4_summary;
            $this->updateCompanyProduct(4,$data);
        }

        if($request->has('product_5_name')){
            $data['name'] = $request->product_5_name;
            $data['summary'] = $request->product_5_summary;
            $this->updateCompanyProduct(5,$data);
        }



        $request->session()->flash('success', 'Added Product to company!');
        return redirect()->route('dashboard');

    }
}
