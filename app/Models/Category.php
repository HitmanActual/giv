<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'parent_id',
        'order',
        'name',
        'slug',
        'description',


    ];

    public function photos(){
        return $this->morphMany('App\Models\Photo','imageable');
    }

}
