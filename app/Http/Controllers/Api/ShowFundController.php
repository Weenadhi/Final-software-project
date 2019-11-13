<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmployeeFund;
use App\Http\Resources\Api\FundCollection;
class ShowFundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }

    public function index(EmployeeFund $employeefund):FundCollection
    {

        return new FundCollection(EmployeeFund::all());

    }
}
