<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CalculatedSalResource extends JsonResource
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
            
            'employee_id'=>$this->employee_id,
            'ot_hours'=>$this->ot_hours,
            'ot'=>$this->ot,
            'month'=>$this->month,
            'attendance'=>$this->attendance,
            'allowances'=>$this->allowances,
            'deductions'=>$this->deductions,
            'advances'=>$this->advances,
            'epf'=>$this->epf,
            'etf'=>$this->etf,
            'month'=>$this->month,
            'total'=>$this->total,
            'approved'=>$this->approved,
            'year'=>$this->year,
            'paye'=>$this->paye,
            'etf'=>$this->etf,
            

           

        ];
    }
}
