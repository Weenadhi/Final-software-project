<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CalculatedSalResource;
use Response;
use DB;
use App\EmployeeAttendance;

class CalculatedSalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }

    public function index()
    {

       // return new CalculatedSalResource(EmployeeAttendance::find(auth()->guard('api')->user()->id));

       $empattendance = DB::table('employee_salaries')
       ->where('employee_id', '=', auth()->guard('api')->user()->id)
       ->get();

       return  $empattendance;
    }
}


/*Personal access client created successfully.
Client ID: 1
Client secret: tTJmJvUw0sWgyPzzbTKYFy0hcOOfrr97rrzqfD8m
Password grant client created successfully.
Client ID: 2
Client secret: tWqnYc6NiPGUTjPtxuw5Y0osodQ6ZPr9MRKl8u5o */
