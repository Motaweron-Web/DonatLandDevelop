<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';
    protected $guarded = [];

    protected $appends = ['formated_date'];

    public function getFormatedDateAttribute(){
        return date('Y-m-d h:i:s',$this->date);
    }

}
