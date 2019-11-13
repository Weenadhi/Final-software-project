
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
            <h1><b>Edit</b> <small><b>Official Informations</b></small></h1>
            </div>
            </div>

  </section>
  <section class="content" >
  <div class="">

        <div>

        @section('forms')
        @show

        {{csrf_field()}}

      <div class='loc'>
            <div class="table table-striped">
                <div>

                    <div class="row">

                    <div class="col-sm-3">
                    </div>

                    <div class="col-sm-6">

                    <div class="form-group">
                            <label class="col-md-4 control-label">Company Branch</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-home"></i></span>
                                  <select class="selectpicker form-control" value='{{$office->obranch}}' name="obranch">
                                  @foreach($cbranchs as $branch)

                                    @if( $branch->company_branch == $office->obranch )
                                    <option value="{{ $branch->company_branch }}" selected="selected"> {{ $branch->company_branch }}</option>
                                    @else
                                    <option value="{{ $branch->company_branch }}"> {{ $branch->company_branch }}</option>
                                    @endif

                                    @endforeach
                                  </select>
                               </div>
                               @if ($errors->first('obranch'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('obranch') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Department</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-home"></i></span>
                                  <select class="selectpicker form-control" name="dept" value='{{$office->dept}}'>
                                  @foreach($deps as $dep)

                                    @if( $dep->department == $office->dept )
                                    <option value="{{ $dep->department }}" selected="selected"> {{ $dep->department }}</option>
                                    @else
                                    <option value="{{ $dep->department }}"> {{ $dep->department }}</option>
                                    @endif

                                    @endforeach
                                  </select>
                               </div>
                               @if ($errors->first('dept'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('dept') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Designation</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-briefcase"></i></span>
                                  <select class="selectpicker form-control" name="des" value="{{$office->des}}">
                                  @foreach($data as $desig)

                                    @if( $desig->designation == $office->des )
                                    <option value="{{ $desig->designation }}" selected="selected">{{$desig->designation}} </option>
                                    @else
                                    <option value="{{$desig->designation}}">{{$desig->designation}}</option>
                                    @endif

                                    @endforeach
                                  </select>
                               </div>
                               @if ($errors->first('des'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('des') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                    </fieldset>
                    <div class="col-sm-3">
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
      Web payroll System
    </div>

    <strong>Copyright &copy; 2019 <a href="#">Treinetic Company</a>.</strong> All rights reserved.
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
.all{
    margin:0;
    padding:0;
    width:1000px;

}
</style>

</html>
