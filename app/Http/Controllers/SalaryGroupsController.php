<?php

namespace App\Http\Controllers;

use App\SalaryGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSalaryGroupsRequest;
use App\Http\Requests\Admin\UpdateSalaryGroupsRequest;

class SalaryGroupsController extends Controller
{
    /**
     * Display a listing of SalaryGroup.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('show_deleted') == 1) {
            $salary_groups = SalaryGroup::onlyTrashed()->get();
        } else {
            $salary_groups = SalaryGroup::all();
        }
        return view('admin.salary_groups.index', compact('salary_groups'));
    }

    /**
     * Show the form for creating new SalaryGroup.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salary_groups.create');
    }

    /**
     * Store a newly created SalaryGroup in storage.
     *
     * @param  \App\Http\Requests\StoreSalaryGroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalaryGroupsRequest $request)
    {

        $salary_group = SalaryGroup::create($request->all());



        return redirect()->route('salary_groups.index');
    }


    /**
     * Show the form for editing SalaryGroup.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary_group = SalaryGroup::findOrFail($id);

        return view('admin.salary_groups.edit', compact('salary_group'));
    }

    /**
     * Update SalaryGroup in storage.
     *
     * @param  \App\Http\Requests\UpdateSalaryGroupsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalaryGroupsRequest $request, $id)
    {
        $salary_group = SalaryGroup::findOrFail($id);
        $salary_group->update($request->all());



        return redirect()->route('salary_groups.index');
    }


    /**
     * Display SalaryGroup.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = \App\Employee::where('salary_group_id', $id)->get();

        $salary_group = SalaryGroup::findOrFail($id);

        return view('admin.salary_groups.show', compact('salary_group', 'employees'));
    }


    /**
     * Remove SalaryGroup from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary_group = SalaryGroup::findOrFail($id);
        $salary_group->delete();

        return redirect()->route('salary_groups.index');
    }

    /**
     * Delete all selected SalaryGroup at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = SalaryGroup::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SalaryGroup from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $salary_group = SalaryGroup::onlyTrashed()->findOrFail($id);
        $salary_group->restore();

        return redirect()->route('salary_groups.index');
    }

    /**
     * Permanently delete SalaryGroup from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $salary_group = SalaryGroup::onlyTrashed()->findOrFail($id);
        $salary_group->forceDelete();

        return redirect()->route('salary_groups.index');
    }
}
