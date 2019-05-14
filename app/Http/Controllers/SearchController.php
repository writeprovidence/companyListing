<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class SearchController extends Controller
{
    public function search(Request $request )
    {
        $data['companies'] = Company::where('name', 'LIKE', "%{$request->search}%")->paginate(10);
        return view('search.all', $data);
    }
}
