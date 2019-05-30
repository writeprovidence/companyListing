<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'product_1_summary', 'product_2_summary', 'product_3_summary', 'product_4_summary', 'product_5_summary',
        'product_1_name', 'product_2_name', 'product_3_name', 'product_4_name', 'product_5_name',
        'company_id'
    ];

    public function hasProduct()
    {
        return $this->updated_at->ne($this->created_at) ? true : false;
    }
}









