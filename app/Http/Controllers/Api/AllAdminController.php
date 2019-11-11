<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AllAdminCollection;
use Response;
use DB;
use App\User_detail;
use Image;

class AllAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        
    }

    public function index()
    {

        $data = DB::table('role_users')
            ->join('user_details','role_users.user_id' , '=', 'user_details.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'admin')
            ->get();


        return Response::json([
            
            $data

        ]);
        
       

    }
}
