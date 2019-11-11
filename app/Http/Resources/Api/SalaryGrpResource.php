<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaryGrpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
    
        return [

            'name'=>$this->name,
            'maximum_leave_days'=>$this->maximum_leave_days,
            'ot_rate'=>$this->ot_rate,
            'salary'=>$this->salary,
            
        ];
    }
}
