@extends('layouts.register')

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

@section('functions01',"Manage Admins")

@section('title',"User")

@section('headers',"User")

@section('form_part')
   <form class="well form-horizontal" action="{{route('user.registers')}}" method="POST">
@endsection

@section('backs')
   <a href="{{route('user.records')}}" class="btn btn-info">Back</a>
@endsection