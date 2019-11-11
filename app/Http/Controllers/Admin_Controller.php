<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\User_detail;
use App\Employee_financial;
use App\Employee_ot;
use App\Employee_official;
use App\User;
use App\SalaryGroup;
use DB;
use Auth;
use Image;

use App\Services\AdminServices;

class Admin_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function ShowAdminHome(){

        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'admin')
            ->get();

            //$events=Event::all();
            $events=DB::table("events")->where("user_role", "admin")->get();
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
        return view('admin.home',compact(['events','calendar','propic','data']));

    }

    public function showRegistrationForm()
    {
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $data = DB::table('employee_designations')->get();
        $deps = DB::table('employee_department')->get();
        $cbranchs = DB::table('employee_branch')->get();
        $ots = DB::table('ot_data')->get();
        $babranchs = DB::table('bank_branchs')->get();
        $sals = DB::table('salary_groups')->get();
        $banks = DB::table('banks')->get();
        return view('user.register',compact(['sals','data','propic','deps','cbranchs','ots','babranchs','banks']));
    }

    public function MyProfile(){
        $id=Auth::user()->id;
        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('admin.admin_myprofile',compact(['data4','data5','data6','propic']));  

    }

    public function EditProPic(){
        $id=Auth::user()->id;
        $data = DB::table("user_details")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('admin.admin-profile-pic',compact(['data','propic']));

    }

    public function Update_Avatar(Request $request){

        

            $id=Auth::user()->id;
            $requestToUpdateAvatar=new AdminServices();
            $requestToUpdateAvatar->UpdateAdminAvatar($request,$id);
           

            $data = DB::table("user_details")->where("id", $id)->get();

            $id1=Auth::user()->id;
            $propic=DB::table("user_details")->where("id", $id1)->get();


            return view('admin.admin-profile-pic',compact('data','propic'));

        

    }

    public function UserRecords(){

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'user')
            ->get();
      

        return view('user.user_records',compact(['data','propic']));
    }

    public function UserProfiles($id){
        
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();
        

        return view('user.user_profile',compact(['data4','data5','data6','propic']));

    }

    public function showEditBasicForm($id){

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $basics=User_detail::find($id);
        return view('user.user_basic_edit',compact('basics','propic'));

    }

    public function updatesBasics(Request $request,$id){
        
        
        $requestUserBasicUpdates=new AdminServices();
        $requestUserBasicUpdates->UserBasicUpdates($request,$id);
        
        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('user.user_profile',compact(['data4','data5','data6','propic']));
        
    }

    public function showEditFinanceForm($id){

        $finance=Employee_financial::find($id);
        $current_ot=Employee_ot::find($id);
        $current=SalaryGroup::find($id);
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $banks=DB::table('banks')->get();
        $babranchs=DB::table('bank_branchs')->get();
        $ots = DB::table('ot_data')->get();
        $sals = DB::table('salary_groups')->get();
        

        return view('user.user_finance_edit',compact(['current','sals','finance','propic','banks','babranchs','current_ot','ots']));

    }

    
    public function updatesFinance(Request $request,$id){
        
        $requestUserFinanceUpdates=new AdminServices();
        $requestUserFinanceUpdates->UserFinanceUpdates($request,$id);

        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('user.user_profile',compact(['data4','data5','data6','propic']));
        
    }

    public function showEditOfficeForm($id){

        $office=Employee_official::find($id);
        $data = DB::table('employee_designations')->get();
        $deps = DB::table('employee_department')->get();
        $cbranchs = DB::table('employee_branch')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('user.user_office_edit',compact(['office','data','propic','deps','cbranchs']));

    }

    
    public function updatesOffice(Request $request,$id){
        
        $requestUserOfficeUpdates=new AdminServices();
        $requestUserOfficeUpdates->UserOfficeUpdates($request,$id);

        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();


        return view('user.user_profile',compact(['data4','data5','data6','propic']));
        
    }

    public function Show_Emp_Upgrade(){

        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'employee')
            ->get();

        $id=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id)->get();
        return view('admin.emp_to_user',compact(['propic','data']));   

    }

    public function Emp_Upgrade(Request $request){

        
        $upgradeEmp=new AdminServices();
        $upgradeEmp->Upgrade_Post($request->empl_id);
        
        return back();

    }

    public function ShowCreateEvents(){

        $id=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id)->get();
        return view('events.event_page',compact(['propic']));   

    }

    /*public function CanLogUser(Request $request,$id){

        $requsetChangeAcessability=new AdminServices();
        $requsetChangeAcessability->Accesability($id);

         return redirect('/user-records');
 
     }


    public function DeleteUser($id){


        $requsetDelete = new AdminServices();
        $requsetDelete->DeleteUser($id);


        return redirect('/user-records');
    
    }*/

    public function CanLogUser(Request $request){


        $requsetChangeAcessability=new AdminServices();
        $requsetChangeAcessability->Accesability($request->empl_id);
        
        return back();
 
     }

    public function DeleteUser(Request $request){

        $requsetDelete = new AdminServices();
        $requsetDelete->DeleteUser($request->empl_id);

        return back();

    }
}
