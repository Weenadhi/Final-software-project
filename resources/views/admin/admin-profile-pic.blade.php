@extends('layouts.edit_my_profile_pic')

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


@section('prop_imgs')   
    @foreach($data as $emp)
    <img src="/uploads/avatars/{{$emp->avatar}}" id="wizardPicturePreview" style="border-radius:50%;border: 4px solid #4E5051;" alt="5" >
    @endforeach
 @endsection

 @section('forms')   
    <form enctype="multipart/form-data" action="{{route('admin-editmy_profile')}}" method="post">
 @endsection

 @section('backbtn')   
 <a class="pull-right btn  btn-danger " href="{{route('admin-myprofile')}}">Back</a>
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