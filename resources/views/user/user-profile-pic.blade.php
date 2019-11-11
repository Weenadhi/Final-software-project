@extends('layouts.edit_my_profile_pic')

@section('title',"User")

@section('utypemin',"U")

@section('utype',"User")

@section('avators')
@foreach($propic as $emp)
<img src="/uploads/avatars/{{$emp->avatar}}" class="img-circle" alt="User Image">
@endforeach
@endsection

@section('names')
<p>{{ Auth::user()->username }}</p>
<a href="{{ route('user-myprofile') }}">
@endsection

@section('homes')
<a href="{{ route('user.home') }}">
@endsection

@section('records')
<a href="{{ route('employee.records') }}">
@endsection

@section('myprofile')
<a href="{{ route('user-myprofile') }}">
@endsection

@section('functions01',"Manage Employees")

@section('heading')
	@foreach($data as $emp)
	<h1>{{$emp->first_name}}'s  Profile</h1>
    @endforeach
@endsection

@section('prop_imgs')   
    @foreach($data as $emp)
    <img src="/uploads/avatars/{{$emp->avatar}}" id="wizardPicturePreview" style="border-radius:50%;border: 4px solid #4E5051;" alt="5" >
    @endforeach
 @endsection

 @section('forms')   
    <form enctype="multipart/form-data" action="{{route('user-editmy_profile')}}" method="post">
 @endsection

 @section('backbtn')   
 <a class="pull-right btn  btn-danger " href="{{route('user-myprofile')}}">Back</a>
 @endsection
