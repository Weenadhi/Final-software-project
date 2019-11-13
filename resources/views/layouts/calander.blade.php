
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') Control Panel</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
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

        <li class="">
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

        <li class="active">
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
  <div class="play content-wrapper">
      <section class="content-header">
      <center><h4 class='mains'>Event Management</h4></center>
      </section>

    <section class="content">
    <div class="container">

    <div class="">

        <br><br>
        <div class="row">
           <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading " style="background: #fff; color: #000;">



                    <div class="text-right">

                    <a href="/addevents" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#upgrade">Add Event</a>
                    <a href="/displayevents" class="btn btn-primary fa fa-edit">Edit Events</a>
                    <a href="/displayevents" class=" btn btn-danger fa fa-trash">Delete Events</a>
                  </div>
                </div>
                <div class="panel-body">
                    @section('cal')
                    @show

                </div>
                </div>
            </div>
        </div>
    </div>

</div>
    </section>


    <!--end calander-->


    <!-- Modal -->
<div class="modal fade in" id="upgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title pull-center" id="myModalLabel">Add an Event</h3>
        </div>
        <div class="modal-body">

            <form method="POST" action="{{action('Calender\EventController@store')}}">
                {{csrf_field()}}

                <div class="form-group">
                  <label>Select User Role</label>
                  <div class="input-group">
                    <div class="input-group-addon">

                        <i class="fa fa-user"></i>
                      </div>
                  <select class="form-control" name="user_role">
                    <option disabled="disabled" selected="selected">Select User Role</option>
                      @foreach ($roles as $role)
                    <option>{{ $role->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Enter the title</label>
                  <div class="input-group">
                      <div class="input-group-addon">

                          <i class="fa fa-header"></i>
                        </div>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title">
                  </div>
                </div>

                <div class="form-group">
                    <label>Select a Colour</label>
                    <div class="input-group">
                        <div class="input-group-addon">

                            <i class="fa fa-paint-brush"></i>
                          </div>
                        <input type="text" class="form-control my-colorpicker1" id="color" name="color" placeholder="Select a Colour">
                      <!--<input type="color" class="form-control" id="color" name="color" placeholder="Enter the Color">-->
                    </div>
                  </div>

                  <div class="form-group">
                      <label>Enter start Date:</label>

                      <div class="input-group">

                        <div class="input-group-addon">

                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation" class="date" name="start_date" placeholder="Enter start Date">
                      </div>
                      <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label>Enter End Date:</label>

                        <div class="input-group">

                          <div class="input-group-addon">

                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="reservation2" class="date" name="end_date" placeholder="Enter End Date">
                        </div>
                        <!-- /.input group -->
                      </div>




                      <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Add Event Data</button>
                        </div>


              </form>


      </div>
    </div>
  </div>

</div>
</div>


<footer class="main-footer">

<div class="pull-right hidden-xs">
      Web payroll System
    </div>

    <strong>Copyright &copy; 2019 <a href="#">Treinetic Company</a>.</strong> All rights reserved.
    </footer>

  <div class="control-sidebar-bg"></div>
</div>





<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>


<script type="text/javascript" src="../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>



<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <script>
      $('#upgrade').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var getId = button.data("role") // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        var modal = $(this)

        modal.find('.modal-body #empl_id').val(getId)

      });


      $('.my-colorpicker1').colorpicker();
      $('#reservation').datetimepicker();
      $('#reservation2').datetimepicker();

      </script>

      <style>
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
      </style>
</body>
</html>
