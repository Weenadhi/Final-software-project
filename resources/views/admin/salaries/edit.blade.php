@extends('app')

@section('content')
    <h3 class="page-title">Edit Salary</h3>

    {!! Form::model($employeeAttendance, ['method' => 'PUT', 'route' => ['salaries.update', $employeeAttendance->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('first_name', "Name", ['class' => 'control-label']) !!}
                    {!! Form::label('first_name', $employeeAttendance->employee->first_name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('first_name'))
                        <p class="help-block">
                            {{ $errors->first('first_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('attendance', "Attendance", ['class' => 'control-label']) !!}
                    {!! Form::text('attendance', $employeeAttendance->attendance, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_name'))
                        <p class="help-block">
                            {{ $errors->first('last_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ot_hours', "OT hours", ['class' => 'control-label']) !!}
                    {!! Form::text('ot_hours', $employeeAttendance->ot_hours, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('allowances', "Allowances", ['class' => 'control-label']) !!}
                    {!! Form::text('allowances', $employeeAttendance->allowances, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="row">
            <div class="col-xs-12 form-group">
                    {!! Form::label('deductions', "Deductions", ['class' => 'control-label']) !!}
                    {!! Form::text('deductions', $employeeAttendance->deductions, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="row">
            <div class="col-xs-12 form-group">
                    {!! Form::label('advances', "Advances", ['class' => 'control-label']) !!}
                    {!! Form::text('advances', $employeeAttendance->advances, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                </div>
            </div>
            {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            </div>

        </div>
    </div>


@stop

