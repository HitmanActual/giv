<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable = [

        'user_id',
        'order_number',
        'status',
        'payment_method',
        'grand_total',
        'item_count',
        'is_paid',
        'notes',
        'recipient_fullname',
        'recipient_phone',
        'recipient_state',
        'recipient_address',
        'long',
        'lat'

    ];
}
