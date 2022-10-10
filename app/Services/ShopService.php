<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Shop;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class ShopService
{

    use ResponseTrait;
    public function index(){
        $shops = Shop::all();
        return $this->successResponse($shops,Response::HTTP_OK);
    }

    public function store($request){
        $shop = Shop::create([
            'user_id'=>Auth::id(),
            'description'=>$request->description,
            'name'=>$request->name,
            'rating'=>$request->rating,
        ]);


        foreach ($request->photos as $photo) {

            $fileName = $photo->getClientOriginalExtension();

            $newName = md5(microtime()) . time() . '.' . $fileName;
            $photo->storeAs('/public/photos/shop', $newName);


            Photo::create([
                'imageable_id' => $shop->id,
                'imageable_type' => 'App\Models\Shop',
                'filename' => 'photos/' . $newName,
            ]);
        }


        if($shop){
            return $this->successResponse($shop,Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('there is an err storing your data',423);
        }
    }
}
