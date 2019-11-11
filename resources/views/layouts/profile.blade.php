
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
  
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    
    <link rel="stylesheet" href="../css/owl.carousel.css"/>
    <link rel="stylesheet" href="../css/magnific-popup.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
  
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">


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

        <li class="">
        @section('records')
        @show

        <i class="fa fa-tasks"></i> <span>@yield('functions01')</span></a></li>
        <li class="active">
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

  <section class="content-header ">

    <center>
  @section('heading')             
 
  @show
    </center>
  </section>

  <section class="content">
  
  <div id="preloder">
		<div class="loader"></div>
	</div>
	
	
	<header class="header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					
				</div>
				<div class="col-md-8 text-md-right header-buttons">
                @section('header')
                @show
				</div>
			</div>
		</div>
	</header>

	<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-6">
							
                            @section('general_info')
                            @show
							</div>
                            <br><br>
                            <div class="hero-info">
                            @section('office_info')
                            @show
							</div>

						</div>
						<div class="col-lg-6">
							<figure class="hero-image">
                                @section('changes')
                                @show
							</figure>
							<br><br>
                            <div class="hero-info">
                            @section('finance_info')
                             @show
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	

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

<!--====== Javascripts & Jquery ======-->


<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>


<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/magnific-popup.min.js"></script>
	<script src="../js/circle-progress.min.js"></script>
	<script src="../js/main.js"></script>


<style>
.play{
  

}
h4 {
	margin: 1em 0 0.5em 0;
	color: #343434;
	font-weight: normal;
	font-family: 'Ultra', sans-serif;   
	font-size: 36px;
	line-height: 42px;
	text-transform: uppercase;
	text-shadow: 0 2px white, 0 3px #777;
}
.all{
    margin:0;
    padding:0; 
    width:1100px;
    
}

@media screen and (max-width: 767px) {
    .all {
    border-bottom: 1px solid #ddd;
  }
}

.pos-1{
    

}
</style>
</html>