<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'name',
        'rating',

    ];

    public function photos(){
        return $this->morphMany('App\Models\Photo','imageable');
    }


}
