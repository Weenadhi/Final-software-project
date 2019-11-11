<?php

namespace App\Http\Controllers;
use App\User_detail;
use App\Employee_financial;
use App\Employee_ot;
use App\Employee_official;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
use App\Event;

use App\Services\SuperAdminServices;

class Super_Admin_Controller extends Controller
{
    public function __construct()
    {
        
        $this->middleware('super_admin');
        $this->middleware('auth');
    }

    public function ShowSadminHome(){

        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'super_admin')
            ->get();

            //$events=Event::all();
            $events=DB::table("events")->where("user_role", "super_admin")->get();
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
        return view('sadmin.home',compact(['calendar','events','propic','data']));

    }

    public function showRegistrationForm()
    {
        $id=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id)->get();
        $data = DB::table('employee_designations')->get();
        $deps = DB::table('employee_department')->get();
        $cbranchs = DB::table('employee_branch')->get();
        $sals = DB::table('salary_groups')->get();
        $ots = DB::table('ot_data')->get();
        $babranchs = DB::table('bank_branchs')->get();
        $banks = DB::table('banks')->get();
        return view('admin.register',compact(['sals','data','propic','deps','cbranchs','ots','babranchs','banks']));
        
    }

    public function MyProfile(){
        $id=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id)->get();
        $data4 = DB::table("user_details")->where("id", $id)->get();
        $data5 = DB::table("employee_officials")->where("id", $id)->get();
        $data6 = DB::table("employee_financials")->where("id", $id)->get();
        return view('sadmin.sadmin-myprofile',compact(['data4','data5','data6','propic']));  

    }

    public function EditProPic(){
        $id=Auth::user()->id;
        $data = DB::table("user_details")->where("id", $id)->get();
        $propic=DB::table("user_details")->where("id", $id)->get();
        return view('sadmin.sadmin-profile-pic',compact('data','propic'));

    }

    public function Update_Avatar(Request $request){

        $id=Auth::user()->id;
        $requestToUpdateAvatar=new SuperAdminServices();
        $requestToUpdateAvatar->UpdateSadminAvatar($request,$id);
        

        $data = DB::table("user_details")->where("id", $id)->get();
        
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        return view('sadmin.sadmin-profile-pic',compact('data','propic'));

    }

    public function AdminProfiles($id){
        //$data1 = DB::table("users")->where("id", $id)->get();
        
       
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $data1 = DB::table("user_details")->where("id", $id)->get();
        $data2 = DB::table("employee_officials")->where("id", $id)->get();
        $data3 = DB::table("employee_financials")->where("id", $id)->get();
        return view('admin.admin_profile',compact(['data1','data2','data3','propic']));

        

    }

    public function AdminRecords(){


        $id=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id)->get();
        

        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'admin')
            ->get();
      

        return view('admin.admin_records',compact(['data','propic']));
    }

    public function showEditBasicForm($id){
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $basics=User_detail::find($id);
        return view('admin.admin_basic_edit',compact(['basics','propic']));

    }

    public function updatesBasics(Request $request,$id){
        
       
        $requestAdminBasicUpdates=new SuperAdminServices();
        $requestAdminBasicUpdates->AdminBasicUpdates($request,$id);
        
        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $data1 = DB::table("user_details")->where("id", $id)->get();
        $data2 = DB::table("employee_officials")->where("id", $id)->get();
        $data3 = DB::table("employee_financials")->where("id", $id)->get();
        
        return view('admin.admin_profile',compact(['data1','data2','data3','propic']));
        
    }

    public function showEditFinanceForm($id){


        $finance=Employee_financial::find($id);
        $banks=DB::table('banks')->get();
        $babranchs=DB::table('bank_branchs')->get();

        $current_ot=Employee_ot::find($id);
        $ots = DB::table('ot_data')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        $sals = DB::table('salary_groups')->get();

        return view('admin.admin_finance_edit',compact(['sals','finance','propic','banks','babranchs','current_ot','ots']));

    }

    
    public function updatesFinance(Request $request,$id){
        

        $requestAdminFinanceUpdates=new SuperAdminServices();
        $requestAdminFinanceUpdates->AdminFinanceUpdates($request,$id);

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $data1 = DB::table("user_details")->where("id", $id)->get();
        $data2 = DB::table("employee_officials")->where("id", $id)->get();
        $data3 = DB::table("employee_financials")->where("id", $id)->get();
        return view('admin.admin_profile',compact(['data1','data2','data3','propic']));
        
    }

    public function showEditOfficeForm($id){


        $office=Employee_official::find($id);
        $data = DB::table('employee_designations')->get();
        $deps = DB::table('employee_department')->get();
        $cbranchs = DB::table('employee_branch')->get();

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();

        return view('admin.admin_office_edit',compact(['office','data','propic','deps','cbranchs']));


    }

    
    public function updatesOffice(Request $request,$id){
        
        $requestAdminOfficeUpdates=new SuperAdminServices();
        $requestAdminOfficeUpdates->AdminOfficeUpdates($request,$id);
        

        $id1=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id1)->get();
        $data1 = DB::table("user_details")->where("id", $id)->get();
        $data2 = DB::table("employee_officials")->where("id", $id)->get();
        $data3 = DB::table("employee_financials")->where("id", $id)->get();
        return view('admin.admin_profile',compact(['data1','data2','data3','propic']));
        
    }

    /*public function CanLogAdmin(Request $request,$id){

        $requsetChangeAcessability=new SuperAdminServices();
        $requsetChangeAcessability->Accesability($id);
        
         return redirect('/admin-records');
 
     }

    public function DeleteAdmin($id){

        $requsetDelete = new SuperAdminServices();
        $requsetDelete->DeleteAdmin($id);

        return redirect('/admin-records');
    
    }*/

    public function Show_User_Upgrade(){

        $data = DB::table('role_users')
            ->join('users','role_users.user_id' , '=', 'users.id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.name', 'user')
            ->get();

        $id=Auth::user()->id;
        $propic=DB::table("user_details")->where("id", $id)->get();
        return view('sadmin.user_to_admin',compact(['propic','data']));   

    }

    public function User_Upgrade(Request $request){

        
        $upgradeUser=new SuperAdminServices();
        $upgradeUser->Upgrade_Post($request->empl_id);
        
        return back();

    }

    public function CanLogAdmin(Request $request){

        $requsetChangeAcessability=new SuperAdminServices();
        $requsetChangeAcessability->Accesability($request->empl_id);
        
        return back();
 
     }

    public function DeleteAdmin(Request $request){

        $requsetDelete = new SuperAdminServices();
        $requsetDelete->DeleteAdmin($request->empl_id);

        return back();

    }
}
