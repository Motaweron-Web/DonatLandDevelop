<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Representative extends Authenticatable implements JWTSubject
{
    protected $guarded = [];
    protected $table = 'representative';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function canncelled(){
        return $this->hasMany(RepresentativeCancelledOrders::class,'representative_id');
    }
    public function current_orders(){
        return $this->hasMany(Order::class,'driver_id')->whereIn('delivery_status',['append','new','accept']);
    }

}
