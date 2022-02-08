<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'tax',
        'subtotal'
    ];

    public function product(){
        return $this->belongsTo(Products::class,'product_id');
    }
}
