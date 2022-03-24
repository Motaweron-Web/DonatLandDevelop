<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name'=>get_file(''.$this->image)
        ];

    }//end fun
}//end class
