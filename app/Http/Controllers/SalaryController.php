<?php

namespace App\Http\Controllers;
use App\Employee;
use App\EmployeeAttendance;
use App\EmployeeFund;
use App\Http\Requests\Admin\UpdateEmployeesRequest;
use App\Http\Requests\Admin\UpdateSalariesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use PDF;

class SalaryController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $salaries = EmployeeAttendance::all();
        return view('admin.salaries.index', compact('salaries'));
    }

    /**
     * Display Employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {

        $employeeAttendance = EmployeeAttendance::findOrFail($id);
        $approved="approved";
        \Log::info($employeeAttendance->$approved);
        $employeeAttendance->$approved = '1';
        \Log::info($employeeAttendance->$approved);
        $employeeAttendance->save();
        $salaries = EmployeeAttendance::all();
        return view('admin.salaries.index', compact('salaries'));
    }

    public function edit($id){
        $employeeAttendance = EmployeeAttendance::findOrFail($id);
        return view('admin.salaries.edit', compact('employeeAttendance'));
    }

    /**
     * Update Employee in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalariesRequest $request, $id)
    {

        $employeeSalary = EmployeeAttendance::findOrFail($id);
        $data = $request->all();

        $employee = $employeeSalary->employee;

        $epf = EmployeeFund::where('fund_name', 'epf')->first();
        $etf = EmployeeFund::where('fund_name', 'etf')->first();

        $epfPercentage = ($epf->employee_percentage)*0.01*($employee->salary_group->salary);
        $etfPercentage = ($etf->employee_percentage)*0.01*($employee->salary_group->salary);
        \Log::info($data['ot_hours']);
        \Log::info($employee->salary_group->ot_rate);
        $ot =  ($employee->salary_group->ot_rate) *$data['ot_hours'];
        $total = ($employee->salary_group->salary) - $epfPercentage - $etfPercentage + $ot;

        $data['ot'] = $ot;
        $data['total'] = $total;

        $employeeSalary->update($data);
        return redirect()->route('salaries.index');
    }

    public function getSalaries(Request $request)
    {
        $year = $request['year'];
        $month = $request['month'];
        $salaries = EmployeeAttendance::where('month', '=', $month)->where('year', '=', $year)->get();
        return view('admin.salaries.index', compact('salaries'));
    }

    public function generateSalarySheet($id)
    {
        $employeeSalary = EmployeeAttendance::findOrFail($id);
        $employee = Employee::where('employee_no', $employeeSalary->employee_id)->first();

        //dd($employeeSalary->ot);
        $data = [
            'title' => 'Salary Sheet',
            'month' => $employeeSalary->month,
            'year' => $employeeSalary->year,
            'attendance' => $employeeSalary->attendance,
            'othours' => $employeeSalary->ot_hours,
            'ot' => number_format((float)$employeeSalary->ot, 2, '.', ''),
            'allowances' => number_format((float)$employeeSalary->allowances, 2, '.', ''),
            'deductions' => number_format((float)$employeeSalary->deductions, 2, '.', ''),
            'advances' => number_format((float)$employeeSalary->advances, 2, '.', ''),
            'epf' => number_format((float)$employeeSalary->epf, 2, '.', ''),
            'etf' => number_format((float)$employeeSalary->etf, 2, '.', ''),
            'paye' => number_format((float)$employeeSalary->paye, 2, '.', ''),
            'total' => number_format((float)$employeeSalary->total, 2, '.', ''),
            'firstname' => $employee->first_name,
            'lastname' => $employee->last_name,
            'empno' => $employeeSalary->employee_id,
            'basic' => number_format((float)$employee->salary_group->salary, 2, '.', ''),
        ];
        $pdf = PDF::loadView('salarySheet', $data);

        return $pdf->download('salarysheet.pdf');

    }
}
