<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'productsoffers';

    public function products(){
        return $this->belongsTo(Products::class,'product_id')->where('is_active',true);
    }
}
