<?php

namespace App\Services;

use App\Models\Value;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;

class ValueService
{

    use ResponseTrait;

    public function index(){

        $values = Value::all();
        return $this->successResponse($values, Response::HTTP_OK);
    }

    public function store($request)
    {
        $value = Value::create([

            'attribute_id' => $request->attribute_id,
            'name' => $request->name,
        ]);


        if($value){
            return $this->successResponse($value,Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('there is an err storing your data',423);
        }
    }
}
