@extends('layouts.edit_events')

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

@section('contents')

<div class="container">
    <div class="">
        <div class="row">
           <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading" style="background: #2edda4; color: white;">
                Update Events
                </div>
                <div class="panel-body">
                <form method="POST" action="{{action('Calender\EventController@update',$id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="UPDATE" />
                 

                        <div class="form-group">
                            <label>Select User Role</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                    
                                  <i class="fa fa-user"></i>
                                </div>
                            <select class="form-control" value="{{$events->user_role}}" name="user_role">
                             
                              
                              @foreach($roles as $role)
                                    
                              @if( $role->name == $events->user_role )
                              <option value="{{ $role->name }}" selected="selected"> {{ $role->name }}</option>
                              @else
                              <option value="{{ $role->name }}"> {{ $role->name }}</option>
                              @endif

                              @endforeach

                            </select>
                          </div>

                        <div class="form-group">
                            <label>Enter the title</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                      
                                    <i class="fa fa-header"></i>
                                  </div>
                              <input type="text" class="form-control" id="title" name="title" value="{{$events->title}}" placeholder="Enter the title">
                            </div>
                          </div>
          
                          <div class="form-group">
                              <label>Enter the Color</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                        
                                      <i class="fa fa-paint-brush"></i>
                                    </div>
                                  <input type="text" class="form-control my-colorpicker1" value="{{$events->color}}" id="color" name="color" placeholder="Enter the Color">
                                <!--<input type="color" class="form-control" id="color" name="color" placeholder="Enter the Color">-->
                              </div>
                            </div>
          
                            <div class="form-group">
                                <label>Enter start Date:</label>
                
                                <div class="input-group">
                                    
                                  <div class="input-group-addon">
                                      
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" value="{{$events->start_date}}" id="reservation" class="date" name="start_date" placeholder="Enter start Date">
                                </div>
                                <!-- /.input group -->
                              </div>
          
                              <div class="form-group">
                                  <label>Enter End Date:</label>
                  
                                  <div class="input-group">
                                      
                                    <div class="input-group-addon">
                                        
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation2" value="{{$events->end_date}}" class="date" name="end_date" placeholder="Enter End Date">
                                  </div>
                                  <!-- /.input group -->
                                </div>
                        
                        <div class="form-group row">
                          <div class="col-sm-10">
                              {{method_field('PUT')}}
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </div>
                      </form>
                </div>
                </div> 
            </div> 
        </div>
    </div>
</div>

@endsection

