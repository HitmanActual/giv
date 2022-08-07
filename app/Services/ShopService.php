<?php

namespace App\Services;

use App\Models\Shop;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;


class ShopService
{

    use ResponseTrait;
    public function index(){
        $shops = Shop::all();
        return $this->successResponse($shops,Response::HTTP_OK);
    }

    public function store($request){
        $shop = Shop::create([
            'user_id'=>auth()->user()->id,
            'description'=>$request->desceiption,
            'name'=>$request->name,
            'rating'=>$request->rating,
        ]);

        if($shop){
            return $this->successResponse($shop,Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('there is an err storing your data',423);
        }
    }
}
