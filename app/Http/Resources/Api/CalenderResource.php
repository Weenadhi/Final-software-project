<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CalenderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id'=>$this->id,
            'title'=>$this->title,
            'color'=>$this->color,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            
           
           
            //$table->string('avatar')->default('default.jpg');
           

        ];
    }
}
