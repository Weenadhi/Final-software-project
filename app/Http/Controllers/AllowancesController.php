<?php

namespace App\Http\Controllers;

use App\SalaryGroup;
use App\Allowance;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAllowanceRequest;
use App\Http\Requests\StoreAllowanceRequest;
use App\Http\Requests\UpdateAllowanceRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class AllowancesController extends Controller
{
    public function index()
    {

        $allowances = Allowance::all();

        return view('admin.allowances.index', compact('allowances'));
    }

    public function create()
    {

        $employees = Employee::all()->pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');
        $salary_groups = SalaryGroup::all();

        return view('admin.allowances.create', compact('employees','salary_groups'));
    }

    public function store(StoreAllowanceRequest $request)
    {  
      
        $type = $request->get('allowance_for');  
        $year = $request->get('year');
        $month = $request->get('month');
        $allowance_type = $request->get('allowance_type');
        $amount = $request->get('amount');        

        if ($type == 'individual_allowance'){              
            $empId = $request->get('employee_id'); 

            // Logging employee Id to App/Storage/Logs/Laravel/<date file>
            info("Employee Id is {$empId}");
            
            if (is_numeric(trim($empId))){
                $allowance = Allowance::create($request->all());
            }
            else{               
                return back()->withErrors('Please select Employee Id');
            }               

        }
        else if($type == 'Fixed'){
            //  get all employees' id
            $employees_id = DB::table('employees')->get();
              
            foreach ($employees_id as $emp) {

                DB::table('allowances')->insert(
                    ['year' => $year, 'month' => $month, 'allowance_type' => $allowance_type, 'amount' => $amount ,'created_at'=> date('Y-m-d H:i:s'), 'employee_id' => $emp->id ]
                );
            }
        }

        else if($type == 'group_allowance'){
            $salGroup = $request->get('salary_group'); 

            info("Salary Group  is {$salGroup}");

            if ($salGroup != "Please select"){
                 //  Get selected Salary group id
                 $salary_group_id = DB::table('salary_groups')->where('name', $salGroup)->value('id');
                 
                //  get employees' id of selected salary group
                $employees_id = DB::table('employees')->where('salary_group_id', $salary_group_id)->get();
              
                foreach ($employees_id as $emp) {
                    DB::table('allowances')->insert(
                        ['year' => $year, 'month' => $month, 'allowance_type' => $allowance_type, 'amount' => $amount ,'created_at'=> date('Y-m-d H:i:s') , 'employee_id' => $emp->id ]
                    );  
                }
            }
            else{
                return back()->withErrors('Please select a Salary Group');
            }
           
        }
        return redirect()->route('allowances.index');
 
    }

    public function edit(Allowance $allowance)
    {

        $employees = Employee::all()->pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allowance->load('employee');

        return view('admin.allowances.edit', compact('employees', 'allowance'));
    }

    public function update(UpdateAllowanceRequest $request, Allowance $allowance)
    {
        $allowance->update($request->all());

        return redirect()->route('allowances.index');
    }

    public function show(Allowance $allowance)
    {

        $allowance->load('employee');

        return view('admin.allowances.show', compact('allowance'));
    }

    public function destroy(Allowance $allowance)
    {

        $allowance->delete();

        return back();
    }

    public function massDestroy(MassDestroyAllowanceRequest $request)
    {
        Allowance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
