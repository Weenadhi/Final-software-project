@inject('request', 'Illuminate\Http\Request')
@extends('app')

@section('content')
    <h3 class="page-title">Monthly Salaries</h3>

    <div class="container  col-xs-4">


    <div class="panel panel-default">
    <div class="panel-heading">
            Generate Salaries
    </div>

    <div class="panel-body">
    <form action="{{route('salaries.getSalaries')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group col-xs-12">
            <label for="exampleFormControlSelect1">Year</label>
            <select class="form-control" id="exampleFormControlSelect1" name="year">
                <option>1995</option>
                <option>1996</option>
                <option>1997</option>
                <option>1998</option>
                <option>1999</option>
                <option>2000</option>
                <option>2001</option>
                <option>2002</option>
                <option>2003</option>
                <option>2004</option>
                <option>2005</option>
                <option>2006</option>
                <option>2007</option>
                <option>2008</option>
                <option>2009</option>
                <option>2010</option>
                <option>2011</option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
                <option>2028</option>
                <option>2029</option>
                <option>2030</option>
            </select>
        </div>
    <div class="form-group col-xs-12">
    <label for="exampleFormControlSelect2">Month</label>
    <select class="form-control" id="exampleFormControlSelect2" name="month">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
    </select>
  </div>
  <div class="form-group col-xs-12">
    <input class="btn btn-primary" type="submit" value="Submit" style="margin-top: 10px">
  </div>
</form>
    </div>

</div>
</div>

<div class="container  col-xs-4">

    <div class="panel panel-default">
        <div class="panel-heading">
            Import Attendance
        </div>

        <div class="panel-body">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
            Upload Validation Error<br><br>
            <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
        @endif


            <div class="container">

                <form action="/import_attendances/import" enctype="multipart/form-data"  method="post">
                    @csrf

                    <input type="file" name="file"  style="margin-top: 10px" >

                    <input class="btn btn-primary" type ="submit" value = "Genarate Salary" style="margin-top: 10px">

                </form>

            </div>

        </div>

    </div>
</div>

<div class="container  col-xs-12">
<div class="panel panel-default">
        <div class="panel-heading">
            Salaries List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($salaries) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Attended Dates</th>
                        <th>OT Hours</th>
                        <th>PAYE</th>
                        <th>Allowances</th>
                        <th>Deduction</th>
                        <th>Advance</th>
                        <th>Salary</th>
                        <th>Approved</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @if (count($salaries) > 0)
                        @foreach ($salaries as $salary)
                            <tr data-entry-id="{{ $salary->id }}">

                                <td>{{ $salary->employee->id }}</td>
                                <td>{{ $salary->employee->first_name }}</td>
                                <td >{{ $salary->attendance }}</td>
                                <td >{{ $salary->ot_hours }}</td>
                                <td >{{ $salary->paye}}</td>
                                <td >{{ $salary->allowances}}</td>
                                <td >{{ $salary->deductions}}</td>
                                <td >{{ $salary->advances}}</td>

                                <td >{{ $salary->total }}</td>
                                <td >{{ $salary->approved }}</td>

                                <td>
                                    @if(!$salary->approved)
                                    @if (Auth::user()->role[0]->name === "admin")
                                        <a href="{{ route('salaries.approve',[$salary->id]) }}" class="btn btn-xs btn-primary">Approve</a>
                                    @endif

                                    <a href="{{ route('salaries.edit',[$salary->id]) }}" class="btn btn-xs btn-primary">Edit</a>
                                    @if (Auth::user()->role[0]->name === "user")
                                    <a href="{{ route('salaries.salarysheet',[$salary->id]) }}" class="btn btn-xs btn-primary disabled">Salary Sheet</a>
                                    @endif
                                    @else

                                    <a href="{{ route('salaries.approve',[$salary->id]) }}" class="btn btn-xs btn-primary disabled">Approve</a>
                                    <a href="{{ route('salaries.edit',[$salary->id]) }}" class="btn btn-xs btn-primary disabled">Edit</a>

                                    <a href="{{ route('salaries.salarysheet',[$salary->id]) }}" class="btn btn-xs btn-primary">Salary Sheet</a>

                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">No enries in the table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop

@section('javascript')
    <script>
        @can('employee_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('employees.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
