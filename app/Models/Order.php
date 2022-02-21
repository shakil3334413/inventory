<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'qty',
        'sub_total',
        'vat',
        'total',
        'pay',
        'due',
        'payby',
        'order_date',
        'order_month',
        'order_year',
    ];
}
