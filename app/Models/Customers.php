<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customers extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $appends=['total'];
    protected $fillable=
        [
            'customer_group_id',
            'phone_number',
            'name',
            'address',
            'city',
            "photo"
        ];
    protected $hidden=['password'];


    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
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

    public function getTotalAttribute()
    {
        return (float)$this->share_gifts  + (float)$this->purchase_gifts ;
    }

}//end class
