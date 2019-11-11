
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') Control Panel</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  
  
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">


    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>@yield('utypemin')</b>CP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><small><b>@yield('utype') </b>Control Panel</small></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        @section('avators')
        @show
        </div>
        <div class="pull-left info">
        
        @section('names')
        @show
        <i class="fa fa-circle text-success"></i> Online</a>
          
          
        </div>
        <br/><br/>
      </div>
      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Actions</li>
        <!-- Optionally, you can add icons to the links -->
        
        <li class="">
          @section('homes')
          @show
  
          <i class="fa fa-home"></i><span>Home</span></a></li>
        
        <li class="active">
        @section('records')
        @show

        <i class="fa fa-tasks"></i> <span>@yield('functions01')</span></a></li>
        <li class="">
        @section('myprofile')
        @show

        <i class="fa fa-user"></i> <span>My Profile</span></a></li>

        @section('calander_event')
            @show

        <li class=""><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        <i class="fa fa-sign-out"></i> <span>Sign-Out</span></a></li>
        
      </ul>

  
                                       
                                    

                                   

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="play content-wrapper">
  <section class="content-header">

                        <div class="text-right">
                        @section('backs')
                        @show
                        </div>

            <div class="text-center">
            <div class="page-header">
            <h1><b>Edit</b> <small><b>Finance Informations</b></small></h1>
            </div>
            </div>
            
  </section>
  <section class="content" >
  <div>
          
          <div>
                        
 
            @section('forms')                                          
            @show
            {{csrf_field()}}

      <div class='loc'>  
            <div class="table table-striped">
                <div>
                          <div class="row">
                          <div class="col-sm-6">
                                       
                                       <!--Basic info begin-->

                        
                                       <fieldset>
                      
                                       

                         <div class="form-group">
                            <label class="col-md-4 control-label">Is OT Pay Allowed</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-usd"></i></span>
                                  <select class="selectpicker form-control" name="ot" value="{{$current_ot->ot}}">
                                  @foreach($ots as $ott)
                                    
                                    @if( $ott->is_ot_allow == $current_ot->ot )
                                    <option value="{{ $ott->is_ot_allow }}" selected="selected"> {{ $ott->is_ot_allow }}</option>
                                    @else
                                    <option value="{{ $ott->is_ot_allow }}"> {{ $ott->is_ot_allow }}</option>
                                    @endif
      
                                     @endforeach
                                  </select>
                               </div>
                               @if ($errors->first('ot'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('ot') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         </div>

                         <div class="col-sm-6">

                         <div class="form-group">
                            <label class="col-md-4 control-label">Bank</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-home"></i></span>
                                  <select class="selectpicker form-control" name="bank" value="{{$finance->bank}}">
                                  @foreach($banks as $bank)
                                    
                                    @if( $bank->bank_name == $finance->bank )
                                    <option value="{{ $bank->bank_name }}" selected="selected"> {{ $bank->bank_name }}</option>
                                    @else
                                    <option value="{{ $bank->bank_name }}"> {{ $bank->bank_name }}</option>
                                    @endif
      
                                     @endforeach
                                    </select>
                               </div>
                               @if ($errors->first('bank'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('bank') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Bank Branch</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-home"></i></span>
                                  <select class="selectpicker form-control" name="bbranch" value="{{$finance->bbranch}}">
                                  @foreach($babranchs as $branch)
                                    
                                    @if( $branch->branch_name == $finance->bbranch )
                                    <option value="{{ $branch->branch_name }}" selected="selected"> {{ $branch->branch_name }}</option>
                                    @else
                                    <option value="{{ $branch->branch_name }}"> {{ $branch->branch_name }}</option>
                                    @endif
      
                                     @endforeach
                                  </select>
                               </div>
                               @if ($errors->first('bbranch'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('bbranch') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Account Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input id="acc" name="acc" placeholder="Account Number" class="form-control"  value="{{$finance->acc}}" type="text"></div>
                               @if ($errors->first('acc'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('acc') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>
                        
                         </fieldset>
                         </div>
                        <div class="text-center text-bottom">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                        </div>

                    
                    </div>
                </div>
            </div>
       </div>
   
    </form>    
</div>

  </section>
  </div>


  
  <footer class="main-footer">

<div class="pull-right hidden-xs">
  Company Name Here
</div>

<strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>


  <div class="control-sidebar-bg"></div>
</div>




</body>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<style>

</style>

</html>