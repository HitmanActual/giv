<?php

namespace App\Services;

use App\Models\Product;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductService
{
    use ResponseTrait;

    public function index(){
        $products = Product::all();
        return $this->successResponse($products, Response::HTTP_OK);
    }

    public function store($request){
        $product = Product::create([

            'shop_id'=>$request->shop_id,
            'type'=>$request->type,
            'name'=>$request->name,
            'sku'=>$request->sku,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'weight'=>$request->weight,
            'quantity'=>$request->quantity,
            'is_featured'=>$request->is_featured,

        ]);
    }

}
