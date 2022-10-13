<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'value_id',
        'price',
        'sale_price',
        'weight',
        'quantity',
        'status',
    ];


}
