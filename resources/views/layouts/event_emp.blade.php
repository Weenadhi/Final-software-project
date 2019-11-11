
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
        
        <li class="active">
          @section('homes')
          @show
  
          <i class="fa fa-home"></i><span>Home</span></a></li>
        
        
        <li class="">
        @section('records')
        @show

        <i class="fa fa-tasks"></i> <span>@yield('functions01')</span></a></li>
        <li class="">
        @section('myprofile')
        @show

        <i class="fa fa-user"></i> <span>My Profile</span></a></li>

        <li class="">
            @section('calander_event')
            @show
    
            <i class="fa fa-calendar"></i> <span>Event management</span></a></li>

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
  <div class="content-wrapper">
    
      <section class="content">

            <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Event Participants</h3>
            
        
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    
                            </tr>
                            
                            @section('cont')
                            @show

                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                  </div>

</section>
</div>
</div>



        
          

<footer class="main-footer">

    <div class="pull-right hidden-xs">
      Company Name Here
    </div>
    
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

  <div class="control-sidebar-bg"></div>
</div>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script>

      

      
</script>


</body>
</html>