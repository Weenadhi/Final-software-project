@extends('layouts.edit_my_profile_pic')

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

@section('prop_imgs')   
    @foreach($data as $emp)
    <img src="/uploads/avatars/{{$emp->avatar}}" id="wizardPicturePreview" style="border-radius:50%;border: 4px solid #4E5051;" alt="5" >
    @endforeach
 @endsection

 @section('forms')   
    <form enctype="multipart/form-data" action="{{route('sadmin-myprofile_edit')}}" method="post">
 @endsection

 @section('backbtn')   
 <a class="pull-right btn  btn-danger " href="{{route('sadmin-myprofile')}}">Back</a>
 @endsection
