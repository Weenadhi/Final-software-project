@extends('app')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    New Allowance
                </div>
                <div class="panel-body">
                    <form action="{{ route("allowances.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf                  
                        <div class="form-group">
                            <label for="allowance_for">Allowance Type*</label>
                            <select name="allowance_for" id="allowance_for" class="form-control" onchange="showHideEntry()" required>                               
                                <option value="Fixed">Fixed allowance</option>  
                                <option value="group_allowance">Group allowance</option> 
                                <option value="individual_allowance">Individual allowance</option>                           
                            </select>                            
                        </div>

                        <div id="showHideSalary" class="form-group {{ $errors->has('salary_group') ? 'has-error' : '' }}" style="display: none">
                            <label for="salary">Salary Group*</label>                           
                            <select name="salary_group" id="salary" class="form-control">
                            <option value="Please select">Please select </option>
                                @foreach($salary_groups as $id => $salary_group)
                                    <option value="{{ $salary_group->name }}"  {{ isset($allowance) ? 'selected' : '' }}>{{ $salary_group->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('salary_group'))
                                <p class="help-block">
                                    {{ $errors->first('salary_group') }}
                                </p>
                            @endif
                        </div>      
                        
                        <div id="showHideEmployeeNo" class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}" style="display: none">
                            <label for="employee">Employee No*</label>
                            <select name="employee_id" id="employee" class="form-control">                                
                                @foreach($employees as $id => $employee)
                                    <option value="{{ $id }}" {{ (isset($allowance) && $allowance->employee ? $allowance->employee->id : old('employee_id')) == $id ? 'selected' : '' }}>{{ $employee }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('employee_id'))
                                <p class="help-block">
                                    {{ $errors->first('employee_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                            <label for="year">Year</label>
                            <select id="year" name="year" class="form-control">
                                <option value="" disabled {{ old('year', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Allowance::YEAR_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('year', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('year'))
                                <p class="help-block">
                                    {{ $errors->first('year') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('month') ? 'has-error' : '' }}">
                            <label for="month">Month*</label>
                            <select id="month" name="month" class="form-control" required>
                                <option value="" disabled {{ old('month', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Allowance::MONTH_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('month', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('month'))
                                <p class="help-block">
                                    {{ $errors->first('month') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('allowance_type') ? 'has-error' : '' }}">
                            <label for="allowance_type">Allowance type*</label>
                            <input type="varchar" id="allowance_type" name="allowance_type" class="form-control" value="{{ old('allowance_type', isset($allowance) ? $allowance->allowance_type : '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <p class="help-block">
                                    {{ $errors->first('allowance_type') }}
                                </p>
                            @endif

                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label for="amount">Amount*</label>
                            <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($allowance) ? $allowance->amount : '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <p class="help-block">
                                    {{ $errors->first('amount') }}
                                </p>
                            @endif

                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="Save">
                        </div>
                    </form>
                    <script>
                        function showHideEntry() {
                            var sal_group = document.getElementById("allowance_for").value;
                            var salary_entries = document.getElementById("showHideSalary");
                            var employee_entries = document.getElementById("showHideEmployeeNo");                      

                            if (sal_group == "Fixed"){
                                salary_entries.style.display = "None";
                                employee_entries.style.display = "None";
                            }
                            else if(sal_group == "group_allowance"){
                                salary_entries.style.display = "inline";
                                employee_entries.style.display = "None";
                            }
                            else if(sal_group == "individual_allowance"){
                                salary_entries.style.display = "None";
                                employee_entries.style.display = "inline";                 
                            }
                            else{
                                alert(dop);
                            }
                            
                        }
                    </script>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection