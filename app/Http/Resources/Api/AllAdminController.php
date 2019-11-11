<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AllAdminController extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'phoneNumber'=>$this->phoneNumber,
            
            
        ];
    }
}
