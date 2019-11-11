@extends('layouts.home')

@section('title',"Super-Admin")

@section('utypemin',"SA")

@section('utype',"S-Admin")

@section('avators')
@foreach($propic as $emp)
<img src="/uploads/avatars/{{$emp->avatar}}" class="img-circle" alt="User Image">
@endforeach
@endsection

@section('names')
<p>{{ Auth::user()->username }}</p>
<a href="{{ route('sadmin-myprofile') }}">
@endsection

@section('homes')
<a href="{{ route('sadmin.home') }}">
@endsection

@section('records')
<a href="{{ route('admin.records') }}">
@endsection

@section('myprofile')
<a href="{{ route('sadmin-myprofile') }}">
@endsection

@section('functions01',"Manage Admins")

@section('title',"Admin")

@section('title',"Admin")

@section('heading',"Admin")

@section('eachraw')
                    @foreach($data as $emp)

					<tr>

					<td class="priority-1">{{$emp->username}}</td>
					<td class="priority-2">{{$emp->email}}</td>
                    
                    <td class="priority-3">
                    <form action="/admin-profile/{{ $emp->user_id }}" method='get' >
                    
                    
                    
                    
                    <button type='submit' class="btn btn-primary">
                    <span class="glyphicon glyphicon-edit"></span>Edit Profile
                    </button>
                    </form>
                    </td>

                    <td class="priority-4">
                    
                    
                    <!--<form action="/canlogadmin/{{ $emp->user_id }}" method='post' >
                    
                    {{ csrf_field() }}
                    
                    
                    <button type='submit' class="btn btn-warning">
                    
                    
                    @if ($emp->status == '0')
                    <span class="glyphicon glyphicon-lock"></span> 
                    Block
                    @else
                    <span class="glyphicon glyphicon-eye-open"></span> 
                    Unblock
                    @endif
                    </button>
                    </form>
                -->

                    <button type='button' class="btn btn-warning" data-curst="{{$emp->status}}" data-role="{{ $emp->user_id }}" data-toggle="modal" data-target="#accessability">
                    
                    
                    @if ($emp->status == '0')
                    <span class="glyphicon glyphicon-lock"></span> 
                    Block
                    @else
                    <span class="glyphicon glyphicon-eye-open"></span> 
                    Unblock
                    @endif

                    </button>
                    

                    </td>

                    <!--<td class="priority-5">
                    
                    
                    <form action="/deleteadmin/{{ $emp->user_id }}" method='post' >
                    
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    
                    
                    <button type='submit' class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove" class="delete"></span> Delete
                    </button>
                    
                    </form>

                    <button type="button" data-role="{{ $emp->user_id }}" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Launch demo modal
                          </button>

                    </td>-->

                    <td class="priority-5">
                        
                          <button type='button' class="btn btn-danger" data-role="{{ $emp->user_id }}" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-remove" ></span> Delete
                          </button>  
                          
                    </td>

                    
                    </tr>

                    
                        
                    
                    @endforeach
                    
@endsection

@section('ngv')

        <a href="{{route('sadmin.userup')}}" class="btn btn-success">Upgrade Users</a>
        <a href="{{route('admin.registerform')}}" class="btn btn-success">Add New Admin</a>
        <a href="{{route('sadmin.home')}}" class="btn btn-primary">Back</a>


@endsection

@section('delpath')
<form action="/deleteadmin" method="post">
@endsection

@section('accpath')
<form action="/canlogadmin" method="post">
@endsection

@section('sidebarmenu')
<li>
                <a href="{{ route('salary_groups.index') }}">
                    <i class="fa fa-group"></i>
                    <span>Salary Groups</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('employees.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Employees</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('import_attendances.index') }}">
                    <i class="fa fa-calendar"></i>
                    <span>Generate Salary</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('employee_funds.index') }}">
                    <i class="fa fa-money"></i>
                    <span>Employee-funds</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('salaries.index') }}">
                    <i class="fa fa-money"></i>
                    <span>Salaries</span>
                </a>
            </li>
            

                <li class="{{ request()->is('admin/allowances') || request()->is('admin/allowances/*') ? 'active' : '' }}">
                    <a href="{{ route("allowances.index") }}">
                        <i class="fa fas fa-cogs">

                        </i>
                        <span>Allowances</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/deductions') || request()->is('admin/deductions/*') ? 'active' : '' }}">
                    <a href="{{ route("deductions.index") }}">
                        <i class="fa fa-cogs">

                        </i>
                        <span>Deductions</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/advances') || request()->is('admin/advances/*') ? 'active' : '' }}">
                    <a href="{{ route("advances.index") }}">
                        <i class="fa fa-cogs">

                        </i>
                        <span>Advances</span>
                    </a>
                </li>
@endsection
    


