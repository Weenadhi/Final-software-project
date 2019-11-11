<?php

namespace App\Http\Controllers;
use App\User;
use App\role;
use App\role_user;
use Auth;
use App\User_detail;
use App\Employee_financial;
use App\Employee_ot;
use App\Employee_official;
use DB;
use Image;
use App\Event;

use App\Services\UserServices;
use Illuminate\Http\Request;

class User_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }



    public function ShowUserHome(){

        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'user')
            ->get();

            //$events=Event::all();
            $events=DB::table("events")->where("user_role", "user")->get();
            $event=[];
            
            foreach($events as $row){
                //$enddate= $row->end_date." 24.00.00";
                $event[] = \Calendar::event(
                $row->title,
                false,
                new \dateTime($row->start_date),
                new \dateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
            }
            $calendar= \Calendar::addEvents($event); 

        $id=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id)->get();
        return view('user.home',compact(['calendar','events','propic','data']));
        

    }

    public function showEmpRecs()
    {
        return view('employee.employee_record');
    }

    public function showRegistrationForm()
    {
        

        $data = DB::table('employee_designations')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $deps = DB::table('employee_department')->get();
        $cbranchs = DB::table('employee_branch')->get();
        $ots = DB::table('ot_data')->get();
        $babranchs = DB::table('bank_branchs')->get();
        $sals = DB::table('salary_groups')->get();
        $banks = DB::table('banks')->get();
        return view('employee.register',compact(['sals','data','propic','deps','cbranchs','ots','babranchs','banks']));
        
    }

    public function MyProfile(){
        $id=Auth::user()->id;
        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('user.user-myprofile',compact(['data4','data5','data6','propic']));  

    }

    public function EditProPic(){

        $id=Auth::user()->id;
        $data = DB::table("user_details")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('user.user-profile-pic',compact(['data','propic']));

    }

    public function Update_Avatar(Request $request){

       

            $id=Auth::user()->id;

            $requestToUpdateAvatar=new UserServices();
            $requestToUpdateAvatar->UpdateUserAvatar($request,$id);

            $data = DB::table("user_details")->where("id", $id)->get();

            $id1=Auth::user()->id;
            $propic=DB::table("user_details")->where("id", $id1)->get();

            return view('user.user-profile-pic',compact(['data','propic']));

        

    }

    public function EmpRecords(){

        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'employee')
            ->get();
      
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('employee.employee_record',compact(['data','propic']));
    }

    public function EmpProfiles($id){
        //$data1 = DB::table("users")->where("id", $id)->get();
        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('employee.emp_profile',compact(['data4','data5','data6','propic']));

    }

    public function showEditBasicForm($id){
        $basics=User_detail::find($id);
        
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        return view('employee.emp_basic_edit',compact(['basics','propic']));

    }

    public function updatesBasics(Request $request,$id){
        
        $requestEmpBasicUpdates=new UserServices();
        $requestEmpBasicUpdates->EmpBasicUpdates($request,$id);

        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('employee.emp_profile',compact(['data4','data5','data6','propic']));
        
    }

    public function showEditFinanceForm($id){


        $finance=Employee_financial::find($id);
        $current_ot=Employee_ot::find($id);
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $banks=DB::table('banks')->get();
        $babranchs=DB::table('bank_branchs')->get();
        $ots = DB::table('ot_data')->get();

        $sals = DB::table('salary_groups')->get();
        

        return view('employee.emp_finance_edit',compact(['sals','finance','propic','banks','babranchs','current_ot','ots']));


    }

    
    public function updatesFinance(Request $request,$id){
        
        $requestEmpFinanceUpdates=new UserServices();
        $requestEmpFinanceUpdates->EmpFinanceUpdates($request,$id);

        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('employee.emp_profile',compact(['data4','data5','data6','propic']));
        
    }

    public function showEditOfficeForm($id){


        $office=Employee_official::find($id);
        $data = DB::table('employee_designations')->get();
        $deps = DB::table('employee_department')->get();
        $cbranchs = DB::table('employee_branch')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('employee.emp_office_edit',compact(['office','data','propic','deps','cbranchs']));

    }

    
    public function updatesOffice(Request $request,$id){
        
        $requestEmpOfficeUpdates=new UserServices();
        $requestEmpOfficeUpdates->EmpOfficeUpdates($request,$id);

        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('employee.emp_profile',compact(['data4','data5','data6','propic']));
        
    }

    /*public function CanLogEmp(Request $request,$id){

        $requsetChangeAcessability=new UserServices();
        $requsetChangeAcessability->Accesability($id);

         return redirect('/emp-records');
 
     }

    public function DeleteEmployee($id){

        $requsetDelete = new UserServices();
        $requsetDelete->DeleteEmp($id);

        return redirect('/emp-records');
    
    }*/

    public function CanLogEmp(Request $request){

        $requsetChangeAcessability=new UserServices();
        $requsetChangeAcessability->Accesability($request->empl_id);
        
        return back();
 
     }

    public function DeleteEmployee(Request $request){

        $requsetDelete = new UserServices();
        $requsetDelete->DeleteEmp($request->empl_id);

        return back();

    }
    

   
}
