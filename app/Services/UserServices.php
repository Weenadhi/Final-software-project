<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Auth;
use DB;
use App\User;
use App\User_detail;
use App\Employee_financial;
use App\Employee_ot;
use App\Employee_official;
use Image;

class UserServices 
{
  
    use ValidatesRequests;

    public function DeleteEmp($id){
        
        DB::table("users")->where("id", $id)->delete();
        DB::table("role_users")->where("user_id", $id)->delete();
        DB::table("user_details")->where("id", $id)->delete();
        DB::table("employee_officials")->where("id", $id)->delete();
        DB::table("employee_financials")->where("id", $id)->delete();
        DB::table("employee_ots")->where("id", $id)->delete();

    }

    public function Accesability($id){
        
        $data = User::where('id', $id)->first();
         
 
         if($data->status == '0'){

                $data->status = '1'; 
        }else{

                $data->status = '0';
            }
 
        $data->save();

    }

    public function EmpBasicUpdates(Request $request,$id){

        $basic=User_detail::find($id);
        $basic->ssn=$request->ssn;
        $basic->first_name=$request->first_name;
        $basic->last_name=$request->last_name;
        $basic->dob=$request->dob;
        $basic->address_line_1=$request->address_line_1;
        $basic->address_line_2=$request->address_line_2;
        $basic->phoneNumber=$request->phoneNumber;

        $basic->save();

    }

    public function EmpFinanceUpdates(Request $request,$id){

        $finanace=Employee_financial::find($id);
        $ot=Employee_ot::find($id);
        $this->validate($request,[
            
           
            'ot' => 'required|max:255',
            'bank' => 'required|max:255',
            'bbranch' => 'required|max:255',
            'acc' => 'required|max:255',
        ],
        [
            
            'ot.required' => 'Is OT allowed',
            'bank.required' => 'Select the Bank',
            'bbranch.required' => 'Select the Bank Branch',
            'acc.required' => 'Enter the Account number',
        ]);


        
      
        $finanace->bank=$request->bank;
        $finanace->bbranch=$request->bbranch;
        $ot->ot=$request->ot;
        $finanace->acc=$request->acc;

        $finanace->save();
        $ot->save();

    }

    public function EmpOfficeUpdates(Request $request,$id){

        $office=Employee_official::find($id);
        
        $this->validate($request,[
            
            'obranch' => 'required|max:255',
            'dept' => 'required|max:255',
            'des' => 'required|max:255',
        ],
        [
            'obranch.required' => 'Select the company branch',
            'dept.required' => 'Select the Department',
            'des.required' => 'Select the Designation',
        ]);

        $office->obranch=$request->obranch;
        $office->dept=$request->dept;
        $office->des=$request->des;
        

        $office->save();

    }

    public function UpdateUserAvatar(Request $request,$id){

        if($request->hasFile('avatar')){

            
            $avatar=$request->file('avatar');
            $filename=time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));

            $propic1=User_detail::find($id);
            $propic1->avatar=$filename;
            $propic1->save();
            //$office->obranch=$request->obranch;

        }

    }

}
