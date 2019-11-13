<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\CalenderResource;
use App\Http\Resources\Api\CalenderResourceCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use DB;
use App\User;
class CalenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

    }

    public function index(Event $event):CalenderResourceCollection

    {



        /*$data2 = DB::table('role_users')
        ->join('users','role_users.user_id' , '=', 'users.id')
        ->join('roles', 'role_users.role_id', '=', 'roles.id')
        ->where('users.id', auth()->guard('api')->user()->id)
        ->get();



        $user = User::where('id',auth()->guard('api')->user()->id)->with('role')->first();*/



        //$data = DB::table('events')->where('user_role',$data2->name);

        //$data = DB::table('events')->where('user_role','employee')->get();
        //$data = Event::
        //$flight = Event::where('user_role','employee')->first();
       // return $data;


        //return new CalenderResource(Event::where('user_role','employee'));
        return new CalenderResourceCollection(Event::all());



    }
}
