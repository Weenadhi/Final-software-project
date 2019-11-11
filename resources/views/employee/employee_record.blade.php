@extends('layouts.home')

@section('title'," User")

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

@section('title',"Employee")

@section('heading',"Employee")

@section('eachraw')
        @foreach($data as $emp)

        <tr>

        <td class="priority-1">{{$emp->username}}</td>
        <td class="priority-2">{{$emp->email}}</td>

        <td class="priority-3">
        <form action="/emp-profile/{{ $emp->user_id }}" method='get' >




        <button type='submit' class="btn btn-primary">
        <span class="glyphicon glyphicon-edit"></span>Edit Profile
        </button>
        </form>
        </td>

        <!--<td class="priority-4">
                    
                    
                    <form action="/canlogemp/{{ $emp->user_id }}" method='post' >
                    
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

                    

                    </td>-->

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


        <form action="/deleteemp/{{ $emp->user_id }}" method='post' >

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

                <a href="{{route('emp.registerform')}}" class="btn btn-success">Add New Employee</a>
                <a href="{{route('user.home')}}" class="btn btn-primary">Back</a>

@endsection

@section('delpath')
<form action="/deleteemp" method="post">
@endsection

@section('accpath')
<form action="/canlogemp" method="post">
@endsection