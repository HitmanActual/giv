<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Product;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductService
{
    use ResponseTrait;

    public function index(){

        $products = Product::with(['photos','shop'])->get();
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


        foreach ($request->photos as $photo) {

            $fileName = $photo->getClientOriginalExtension();

            $newName = md5(microtime()) . time() . '.' . $fileName;
            $photo->storeAs('/public/photos/shop', $newName);


            Photo::create([
                'imageable_id' => $product->id,
                'imageable_type' => 'App\Models\Product',
                'filename' => 'photos/' . $newName,
            ]);
        }


        if($product){
            return $this->successResponse($product,Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('there is an err storing your data',423);
        }
    }

    public function show($id){
        $product = Product::with(['shop','photos'])->where('id','=',$id)->get();
        return $this->successResponse($product, Response::HTTP_OK);
    }


}
