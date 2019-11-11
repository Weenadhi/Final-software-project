@extends('layouts.home')

@section('title'," Admin")

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

@section('functions01',"Manage Admins")

@section('title',"User")

@section('heading',"User")

@section('eachraw')
                    @foreach($data as $emp)

					<tr>

					<td class="priority-1">{{$emp->username}}</td>
					<td class="priority-2">{{$emp->email}}</td>
                    
                    <td class="priority-3">
                    <form action="/user-profile/{{ $emp->user_id }}" method='get' >
                    
                    
                    
                    
                    <button type='submit' class="btn btn-primary">
                    <span class="glyphicon glyphicon-edit"></span>Edit Profile
                    </button>
                    </form>
                    </td>


                    
                  <!--  <td class="priority-4">
                    
                    
                   <form action="/canloguser/{{ $emp->user_id }}" method='post' >
                    
                    {{ csrf_field() }}
                    
                    
                    
                    <button type='submit' class="btn btn-warning ">
                    
                    
                    @if ($emp->status == '0')
                    <span class="glyphicon glyphicon-lock"></span> 
                    Block
                    @else
                    <span class="glyphicon glyphicon-eye-open"></span> 
                    Unblock
                    @endif
                    </button>
                    </form>

                    

                    </td> -->

                    <td class="priority-4">

                      <button type='button' class="btn btn-warning" data-curst="{{$emp->status}}" data-role="{{ $emp->user_id }}" data-toggle="modal" data-target="#accessability">
                    
                    
                        @if ($emp->status == '0')
                        <span class="glyphicon glyphicon-lock"></span> 
                        Block
                        @else
                        <span class="glyphicon glyphicon-eye-open"></span> 
                        Unblock
                        @endif
    
                        </button>
                        
    
                        </td>
                    

                    <!--<td class="priority-5">

                    <form action="/deleteuser/{{ $emp->user_id }}" method='post' >
                    
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    
                    
                    <button type='submit' class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span> Delete
                    </button>
                    </form>

                    

                    </td>-->

                    <td class="priority-5">
                        
                            <button type='button' class="btn btn-danger" data-role="{{ $emp->user_id }}" data-toggle="modal" data-target="#myModal">
                              <span class="glyphicon glyphicon-remove" ></span> Delete
                            </button>  
                            
                      </td>

                    
                    </tr>
					@endforeach
@endsection

@section('ngv')

        <a href="{{route('admin.empup')}}" class="btn btn-success">Upgrade Employee</a>
        <a href="{{route('user.registerform')}}" class="btn btn-success">Add New User</a>
        <a href="{{route('admin.home')}}" class="btn btn-primary">Back</a>

@endsection

@section('delpath')
<form action="/deleteuser" method="post">
@endsection



  @section('accpath')
<form action="/canloguser" method="post">
@endsection