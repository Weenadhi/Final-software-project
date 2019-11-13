@extends('layouts.profile')

@section('title',"Admin")

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

@section('calander_event')
<li class="">
<a href="/events">
<i class="fa fa-calendar"></i> <span>Event management</span></a></li>
@endsection

@section('functions01',"Manage Users")

@section('heading')
<center><h4 class='mains'>{{ Auth::user()->username }}'s Profile</h4></center>
@endsection

@section('header')

    <a href="{{route('admin.home')}}" class="site-btn">BACK</a>
    <a href="{{route('logout')}}" class="site-btn">LOGOUT</a>

@endsection

@section('general_info')
    @foreach($data4 as $emp)
    <div class="hero-text">
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

    @endforeach
@endsection


@section('office_info')
        @foreach($data5 as $emp2)
            <h2>Official information</h2>
            <ul>
                <li><span>Current Branch : </span>{{$emp2->obranch}}</li>
                <li><span>Department : </span>{{$emp2->dept}}</li>
                <li><span>Designation : </span>{{$emp2->des}}</li>

            </ul>
            <br/>

        @endforeach
@endsection

@section('changes')
        @foreach($data4 as $emp)
        <img src="/uploads/avatars/{{$emp->avatar}}" style="border-radius:50%;" alt="5" >
        <br><br>
        <div>
        <form action="{{route('admin-editmyprofile')}}" method='get'>
        <button type='submit' class="btn btn-sm btn-success "><span class="fa fa-edit"></span> Edit Profile image </button>
        </form>
        </div>
        @endforeach
@endsection

@section('finance_info')
@foreach($data6 as $emp3)
        <h2>Financial Information</h2>
        <ul>
           
            <li><span>Bank             : </span>{{$emp3->bank}}</li>
            <li><span>Branch           : </span>{{$emp3->bbranch}}</li>
            <li><span>Account Number   : </span>{{$emp3->acc}}</li>
        </ul>
        <br/>

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
