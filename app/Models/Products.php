<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    protected $appends=['is_favorite'];

    public function getIsFavoriteAttribute()
    {
        if (auth()->check()){
            $favorite = Favorite::where('product_id',$this->id)->where('customer_id',auth()->user()->id);
            if ($favorite->count()){
                return true;
            }
        }
        return false;
    }//end fun

    public function favorite()
    {
        return $this->hasMany(Favorite::class,'product_id')->where('customer_id',auth()->user()->id);
    }

    public function offer()
    {
        return $this->hasMany(ProductOffer::class,'offer_id');
    }

}//end class
