<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;




    protected $appends=['is_favorite','price_tax'];

    public function getPriceTaxAttribute()
    {
        $tax = Tax::where('id',$this->tax_id)->first();

        if (Tax::where('id',$this->tax_id)->count() && $this->tax_method == 1){
            $taxValue = ($tax->rate / 100) * $this->price;
            return $taxValue + $this->price;
        }else{
            return $this->price;
        }//end if

        return $this->price;

    }//end fun

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
