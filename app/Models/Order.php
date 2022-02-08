<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';

    protected $guarded=[];

    public function details(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function branch(){
        return $this->belongsTo(Branches::class,'branch_id');
    }
    public function customer(){
        return $this->belongsTo(Customers::class,'customer_id');
    }
}
