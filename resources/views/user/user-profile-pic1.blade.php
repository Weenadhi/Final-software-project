@extends('layouts.edit_my_profile_pic')
 @section('prop_imgs')   
    @foreach($data as $emp)
    <center><img src="/uploads/avatars/{{$emp->avatar}}" style="border-radius:50%;" alt="5" ></center>
    @endforeach
 @endsection

 @section('forms')   
    <form enctype="multipart/form-data" action="{{route('user-editmy_profile')}}" method="post">
 @endsection

 @section('backbtn')   
 <a class="pull-left btn  btn-danger btn-block" href="{{route('user-myprofile')}}">Back</a>
 @endsection

 