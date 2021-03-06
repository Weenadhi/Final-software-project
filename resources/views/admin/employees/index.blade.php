@inject('request', 'Illuminate\Http\Request')
@extends('app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.employees.title')</h3>
    <p>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">@lang('quickadmin.qa_add_new')</a>
        
    </p>

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('employees.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('employees.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($employees) > 0 ? 'datatable' : '' }} ('employee_delete') @if ( request('show_deleted') != 1 ) dt-select @endif">
                <thead>
                    <tr>
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif

                        <th>@lang('quickadmin.employees.fields.first-name')</th>
                        <th>@lang('quickadmin.employees.fields.last-name')</th>
                        <th>@lang('quickadmin.employees.fields.birthday')</th>
                        <th>@lang('quickadmin.employees.fields.contact-no')</th>
                        <th>@lang('quickadmin.employees.fields.employee-no')</th>
                        <th>@lang('quickadmin.employees.fields.epf-no')</th>
                        <th>@lang('quickadmin.employees.fields.salary-group')</th>
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
                                    @if ( request('show_deleted') != 1 )<td></td>@endif

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
@stop

@section('javascript') 
    <script>
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('employees.mass_destroy') }}'; @endif

    </script>
@endsection