<?php

namespace App\Services;

use App\Models\Item;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;

class ItemService
{

    use ResponseTrait;

    public function index()
    {
        //don't forget to add auth for logged in user only

        $items = Item::all();
        return $this->successResponse($items, Response::HTTP_OK);

    }

    public function store($request)
    {

        $item = Item::create([

            'order_id' => $request->order_id,
            'quantity' => $request->quantity,
            'price' => $request->price,

        ]);

        if($item){
            return $this->successResponse($item,Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('there is an err storing your data',423);
        }

    }
}
