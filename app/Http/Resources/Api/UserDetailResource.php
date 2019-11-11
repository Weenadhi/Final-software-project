<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [

            'id'=>$this->id,
            'ssn'=>$this->ssn,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'dob'=>$this->dob,
            'address_line_1'=>$this->address_line_1,
            'address_line_2'=>$this->address_line_2,
            'phoneNumber'=>$this->phoneNumber,
           
           
            //$table->string('avatar')->default('default.jpg');
           

        ];
    }
}
