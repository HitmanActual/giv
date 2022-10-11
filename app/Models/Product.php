<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shop_id',
        'type',
        'name',
        'sku',
        'slug',
        'description',
        'price',
        'sale_price',
        'weight',
        'quantity',
        'status',
        'rating',
        'is_featured'
    ];

    public function photos(){
        return $this->morphMany('App\Models\Photo','imageable');
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }



}
