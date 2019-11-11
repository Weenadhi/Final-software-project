@extends('layouts.event_lists')

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
@foreach ($events as $event)

        <tr>
          <td>{{ $event->id}}</td>
          <td>{{ $event->user_role}}</td>
          <td>{{ $event->title}}</td>
          <td>{{ $event->color}}</td>
          <td>{{ $event->start_date}}</td>
          <td>{{ $event->end_date}}</td>
        
        
    <td><a href="/edit_emps/{{ $event->user_role }}"  class="btn btn-primary" >
    <i class="glyphicon glyphicon-edit"></i>Show Participants</a></td>

    
    
    
    <td><a href="/edit_events/{{ $event->id }}" class="btn btn-success" >
    <i class="glyphicon glyphicon-edit"></i>Update</a></td>

    <td>

    
         <button type="button" class="btn btn-danger" data-role="{{ $event->id }}" data-toggle="modal" data-target="#deleteEvent">
            <i class="glyphicon glyphicon-trash"></i>Delete
         </button>

         
    </form>
</td>
    </tr>
        
@endforeach
@endsection



