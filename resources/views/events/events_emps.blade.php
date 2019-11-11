@extends('layouts.event_emp')

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

@section('functions01',"Manage Users")

@section('calander_event')
<a href="/events">
@endsection

@section('cont')
@foreach ($data as $event)

        <tr>
          <td>{{ $event->username}}</td>
          <td>{{ $event->email}}</td>
      
        

        
@endforeach
@endsection



