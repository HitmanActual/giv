<?php

namespace App\Services;

use App\Models\Order;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;

class OrderService
{

    use ResponseTrait;

    public function index()
    {
        //don't forget to add auth for logged in user only

        $orders = Order::all();
        return $this->successResponse($orders, Response::HTTP_OK);

    }

    public function store($request)
    {

        $order = Order::create([

            'user_id' => $request->user_id,
            'order_number' => $request->order_number,
            'status' => $request->user_id,
            'payment_method' => $request->status,
            'grand_total' => $request->grand_total,
            'item_count' => $request->item_count,
            'is_paid' => $request->is_paid,
            'notes' => $request->notes,
            'recipient_fullname' => $request->recipient_fullname,
            'recipient_phone' => $request->recipient_phone,
            'recipient_state' => $request->recipient_state,
            'recipient_address' => $request->recipient_address,
            'long' => $request->long,
            'lat' => $request->lat
        ]);

        if($order){
            return $this->successResponse($order,Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('there is an err storing your data',423);
        }

    }


}
