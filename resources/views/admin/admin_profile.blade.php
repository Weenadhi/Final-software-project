@extends('layouts.newprofile')

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

@section('heading')
	@foreach($data1 as $emp)
	<h1>{{$emp->first_name}}'s  Profile</h1>
    @endforeach
@endsection

@section('form_part')
   <form class="well form-horizontal" action="{{route('admin.registers')}}" method="POST">
@endsection

@section('backs')
   <a href="{{route('admin.records')}}" class="btn btn-info">Back</a>
@endsection



@section('navg')
	<div class="col-md-8 text-md-right header-buttons">
		<a href="{{route('admin.records')}}" class="site-btn">BACK</a>
		<a href="#" class="site-btn">LOGOUT</a>
	</div>
@endsection

@section('basic')
			@foreach($data1 as $emp)
				<h2>{{$emp->first_name}} {{$emp->last_name}}</h2>
				
			</div>
			<div class="hero-info">
				<h2>General Information</h2>
				<ul>
					<li><span>SSN : </span>{{$emp->ssn}}</li>
					<li><span>Name : </span>{{$emp->first_name}} {{$emp->last_name}}</li>
					<li><span>Date of Birth : </span>{{$emp->dob}}</li>
					<li><span>Address : </span>{{$emp->address_line_1}},{{$emp->address_line_2}}</li>
					<li><span>Phone Number : </span>{{$emp->phoneNumber}}</li>
				</ul>
				<br/>
				<div>
				<form action="/admin-basic-edit/{{ $emp->id }}" method='get'>
				<button type='submit' class="btn btn-success btn-block"><span class="fa fa-edit"></span> Edit Basic Info </button>
				</form>
				</div>
				@endforeach
@endsection

@section('office')
				@foreach($data2 as $emp2)
				<h2>Official information</h2>
				<ul>
					<li><span>Current Branch : </span>{{$emp2->obranch}}</li>
					<li><span>Department : </span>{{$emp2->dept}}</li>
					<li><span>Designation : </span>{{$emp2->des}}</li>
					
				</ul>
				<br/>
				<div>
				<form action="/admin-office-edit/{{ $emp2->id }}" method='get'>
				<button type='submit' class="btn btn-success btn-block"><span class="fa fa-edit"></span> Edit Official Info </button>
				</form>
				</div>
				@endforeach
@endsection

@section('avtr')
                @foreach($data1 as $emp)
				<img src="/uploads/avatars/{{$emp->avatar}}" style="border-radius:50%;" alt="5" >
                @endforeach
 @endsection

 @section('fi')
			@foreach($data3 as $emp3)
			<h2>Financial Information</h2>
			<ul>
				<li><span>Salary Group : </span>{{$emp3->sal_grp}}</li>
            	<li><span>EPF Number : </span>{{$emp3->epf_no}}</li>
				<li><span>Bank             : </span>{{$emp3->bank}}</li>
				<li><span>Branch           : </span>{{$emp3->bbranch}}</li>
				<li><span>Account Number   : </span>{{$emp3->acc}}</li>
			</ul>
			<br/>
			<div>
			<form action="/admin-finance-edit/{{ $emp3->id }}" method='get'>
			<button type='submit' class="btn btn-success btn-block"><span class="fa fa-edit"></span> Edit Financial Info </button>
			</form>
			</div>
			@endforeach
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