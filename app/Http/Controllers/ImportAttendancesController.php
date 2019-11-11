<?php
namespace App\Http\Controllers;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Excel;

class ImportAttendancesController extends Controller
{
    public function index()
    {
        return view('admin.import_attendances.index');
    }

    public function import() 
    {
        Excel::import(new UsersImport, request()->file('file'));
        
        return redirect('/salaries')->with('success', 'All good!');
    }
    public function store(){
        $data=request()->validate([

            'file'=>['required','file'],
        ]);
          
    }
}
