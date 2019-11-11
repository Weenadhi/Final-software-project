<?php

namespace App\Http\Controllers;

use App\EmployeeFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmployeeFundsRequest;
use App\Http\Requests\Admin\UpdateEmployeeFundsRequest;

class EmployeeFundsController extends Controller
{
    /**
     * Display a listing of EmployeeFund.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('show_deleted') == 1) {
            $employee_funds = EmployeeFund::onlyTrashed()->get();
        } else {
            $employee_funds = EmployeeFund::all();
        }

        return view('admin.employee_funds.index', compact('employee_funds'));
    }

    /**
     * Show the form for creating new EmployeeFund.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee_funds.create');
    }

    /**
     * Store a newly created EmployeeFund in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeFundsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeFundsRequest $request)
    {
        $employee_fund = EmployeeFund::create($request->all());
        return redirect()->route('employee_funds.index');
    }


    /**
     * Show the form for editing EmployeeFund.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee_fund = EmployeeFund::findOrFail($id);

        return view('admin.employee_funds.edit', compact('employee_fund'));
    }

    /**
     * Update EmployeeFund in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeFundsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeFundsRequest $request, $id)
    {
        $employee_fund = EmployeeFund::findOrFail($id);
        $employee_fund->update($request->all());
        return redirect()->route('employee_funds.index');
    }


    /**
     * Display EmployeeFund.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee_fund = EmployeeFund::findOrFail($id);

        return view('admin.employee_funds.show', compact('employee_fund'));
    }


    /**
     * Remove EmployeeFund from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee_fund = EmployeeFund::findOrFail($id);
        $employee_fund->delete();

        return redirect()->route('employee_funds.index');
    }

    /**
     * Delete all selected EmployeeFund at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = EmployeeFund::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore EmployeeFund from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $employee_fund = EmployeeFund::onlyTrashed()->findOrFail($id);
        $employee_fund->restore();

        return redirect()->route('employee_funds.index');
    }

    /**
     * Permanently delete EmployeeFund from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $employee_fund = EmployeeFund::onlyTrashed()->findOrFail($id);
        $employee_fund->forceDelete();

        return redirect()->route('employee_funds.index');
    }
}
