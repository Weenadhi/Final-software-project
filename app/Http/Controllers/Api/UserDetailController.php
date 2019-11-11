<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserDetailResource;
use Response;

use App\User_detail;
use Image;
class UserDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
        
    }

    public function index():UserDetailResource
    {

        return new UserDetailResource(User_detail::find(auth()->guard('api')->user()->id));

    }

    public function getProfilePic(){

       $imgPath=User_detail::find(auth()->guard('api')->user()->id);

       $image = (string) Image::make(public_path('uploads/avatars/'.$imgPath->avatar))->encode('data-url');
    
       return Response::json($image);
       
       //return response()->download(public_path('uploads/avatars/'.$imgPath->avatar),'Emp_Profile_Image');

    }

    public function updateProfilePic(Request $requset){

        
            //$avatar=$requset->file('avatar');

            //$filename=time().'.'.$avatar->getClientOriginalExtension();

            if($requset->avatar){

            $avatar=$requset->avatar;

            
            $filename = time().'.' . explode('/', explode(':', substr($avatar, 0, strpos($avatar, ';')))[1])[1];

            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));

            $propic1=User_detail::find(auth()->guard('api')->user()->id);
            $propic1->avatar=$filename;
            $propic1->save();

            }

    }
}
