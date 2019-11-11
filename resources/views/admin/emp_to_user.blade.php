@extends('layouts.upgrade')

@section('title'," Admin")

@section('utypemin',"A")

@section('utype',"Admin")

@section('avators')
@foreach($propic as $emp)
<img src="/uploads/avatars/{{$emp->avatar}}" class="img-circle" alt="User Image">
@endforeach
@endsection

@section('names')
<p>{{ Auth::user()->username }}</p>
<a href="{{ route('admin-myprofile') }}">
@endsection

@section('homes')
<a href="{{ route('admin.home') }}">
@endsection

@section('records')
<a href="{{ route('user.records') }}">
@endsection

@section('myprofile')
<a href="{{ route('admin-myprofile') }}">
@endsection

@section('functions01',"Manage Admins")

@section('title',"Admin")

@section('title',"Admin")

@section('heading',"Employee")

@section('eachraw')
                    @foreach($data as $emp)

					<tr>

					<td class="priority-1">{{$emp->username}}</td>
					<td class="priority-2">{{$emp->email}}</td>
                    
                    <td class="priority-3">
                        <button type='button' class="btn btn-success" data-role="{{ $emp->user_id }}" data-toggle="modal" data-target="#upgrade">
                            <span class="glyphicon glyphicon-certificate" ></span> Add as User
                          </button>  
                    </td>

 
                    </tr>

                    
                    @endforeach
                    
@endsection

@section('ngv')

        
        <a href="{{route('admin.home')}}" class="btn btn-primary">Back</a>


@endsection

@section('upgrade_path')
<form action="/emp_upgrade" method="post">
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



    


