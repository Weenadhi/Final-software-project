

@extends('layouts.register')

@section('title',"Super-Admin")

@section('utypemin',"SA")

@section('utype',"S-Admin")

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

@section('headers',"Admin")

@section('form_part')
   <form class="well form-horizontal" action="{{route('sadmin.registers')}}" method="POST">
@endsection

@section('backs')
   <a href="{{route('login')}}" class="btn btn-info">Back</a>
@endsection