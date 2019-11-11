@extends('app')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.advance.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    
                                </tr>
                                <tr>
                                    <th>
                                        Employee Id
                                    </th>
                                    <td>
                                        {{ $advance->employee->employee_no ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Year
                                    </th>
                                    <td>
                                        {{ App\Advance::YEAR_SELECT[$advance->year] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Month
                                    </th>
                                    <td>
                                        {{ App\Advance::MONTH_SELECT[$advance->month] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Amount
                                    </th>
                                    <td>
                                        ${{ $advance->amount }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            Back to list
                        </a>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection