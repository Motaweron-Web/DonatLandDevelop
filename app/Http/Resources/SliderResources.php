<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResources extends JsonResource
{

    public function toArray($request)
    {
        return [
            'image' => get_file($this->image),
        ];
    }
}
