@extends('app')

@section('content')
    <h3 class="page-title">Salary Groups</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td field-key='name'>{{ $salary_group->name }}</td>
                        </tr>
                        <tr>
                            <th>Maximum Leave Days</th>
                            <td field-key='maximum_leave_days'>{{ $salary_group->maximum_leave_days }}</td>
                        </tr>
                        <tr>
                            <th>Ot Rate</th>
                            <td field-key='ot_rate'>{{ $salary_group->ot_rate }}</td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td field-key='salary'>{{ $salary_group->salary }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#employees" aria-controls="employees" role="tab" data-toggle="tab">Employees</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="employees">
<table class="table table-bordered table-striped {{ count($employees) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthday</th>
                        <th>Contact No</th>
                        <th>Employee No</th>
                        <th>EPF No</th>
                        <th>Salary Group</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($employees) > 0)
            @foreach ($employees as $employee)
                <tr data-entry-id="{{ $employee->id }}">
                    <td field-key='first_name'>{{ $employee->first_name }}</td>
                                <td field-key='last_name'>{{ $employee->last_name }}</td>
                                <td field-key='birthday'>{{ $employee->birthday }}</td>
                                <td field-key='contact__no'>{{ $employee->contact__no }}</td>
                                <td field-key='employee_no'>{{ $employee->employee_no }}</td>
                                <td field-key='epf_no'>{{ $employee->epf_no }}</td>
                                <td field-key='salary_group'>{{ $employee->salary_group->name ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['employees.restore', $employee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['employees.perma_del', $employee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                                @else
                                <td>
                                    <a href="{{ route('employees.show',[$employee->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    <a href="{{ route('employees.edit',[$employee->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['employees.destroy', $employee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('salary_groups.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


