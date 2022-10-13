<?php

namespace App\Services;

use App\Models\Attribute;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;

class AttributeService
{

    use ResponseTrait;

    public function index()
    {

        $attributes = Attribute::all();
        return $this->successResponse($attributes, Response::HTTP_OK);
    }

    public function store($request)
    {
        $attribute = Attribute::create([

            'name' => $request->name,


        ]);


        if($attribute){
            return $this->successResponse($attribute,Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('there is an err storing your data',423);
        }
    }
}
