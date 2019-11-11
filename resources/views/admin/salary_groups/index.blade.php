@inject('request', 'Illuminate\Http\Request')
@extends('app')

@section('content')
    <h3 class="page-title">Salary groups</h3>
    <p> 
        <a href="{{ route('salary_groups.create') }}" class="btn btn-primary">Add new</a>
    </p>

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('salary_groups.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">All</a></li> |
            <li><a href="{{ route('salary_groups.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Trash</a></li>
        </ul>
    </p>


  

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($salary_groups) > 0 ? 'datatable' : '' }}  @if ( request('show_deleted') != 1 ) dt-select @endif">
                <thead>
                    <tr>
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif

                        <th>Name</th>
                        <th>Maximum-leave-days</th>
                        <th>Ot-rate</th>
                        <th> Basic Salary</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($salary_groups) > 0)
                        @foreach ($salary_groups as $salary_group)
                            <tr data-entry-id="{{ $salary_group->id }}">
                                    @if ( request('show_deleted') != 1 )<td></td>@endif

                                <td>{{ $salary_group->name }}</td>
                                <td>{{ $salary_group->maximum_leave_days }}</td>
                                <td>{{ $salary_group->ot_rate }}</td>
                                <td>{{ $salary_group->salary }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("Are you sure")."');",
                                        'route' => ['salary_groups.restore', $salary_group->id])) !!}
                                    {!! Form::submit(trans('Restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}

                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure")."');",
                                        'route' => ['salary_groups.perma_del', $salary_group->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                                @else
                                <td>
                                    <a href="{{ route('salary_groups.show',[$salary_group->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('salary_groups.edit',[$salary_group->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure")."');",
                                        'route' => ['salary_groups.destroy', $salary_group->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">No Salary groups created.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('salary_groups.mass_destroy') }}'; @endif

    </script>
@endsection