<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SalaryGrpResource;
use Response;
use App\SalaryGroup;
use App\Employee_financial;

class SalaryGrpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        
    }

    public function index():SalaryGrpResource
    {

        $grpId=Employee_financial::find(auth()->guard('api')->user()->id);
        return new SalaryGrpResource(SalaryGroup::find($grpId->id));

    }
}
