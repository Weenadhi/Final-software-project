
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
  
  
  
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">


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
  <center><h4 class='mains'>@yield('heading') List</h4></center>
  </section>
  <section class="content">
  <div class='whole '>
        
        
        <div class="pos-1">
        
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                

                <div class="card-body">
                    <table class="table-responsive"  id='unseen'>
                    <thead>
                    <tr>
                <th class="priority-1">Username</th>
                <th class="priority-2">E-mail</th>
                <th class="priority-3">Edit</th>
                <th class="priority-4">Accessability</th>
                <th class="priority-5">Delete</th>
                

                
                
            </tr>
                    </thead>
                    <tbody>
                    @section('eachraw')
					
                    @show
					</tbody>

                    </table>

                </div>
                </div>
				<br/><br/>
                @section('ngv')
                
                @show

                <!-- Modal -->
<div class="modal modal-danger fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title pull-center" id="myModalLabel">Delete Confirmation</h3>
      </div>
      <div class="modal-body">
          
          @section('delpath')
          
          @show
          
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <p>This Action will delete the record from the database, Permenantly</p>
          <input type="hidden" name="empl_id" id="empl_id" value="">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No,Close</button>
        <button type="submit" class="btn btn-warning">Yes! Delete</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!--BlockUnBlock-->
                <!-- Modal -->
                <div class="modal modal-warning fade in" id="accessability" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h3 class="modal-title pull-center" id="myModalLabelacc"></h3>
                        </div>
                        <div class="modal-body">
                            
                            <p id="acclvl"></p>

                            @section('accpath')
                            @show
                            
                            {{ csrf_field() }}
                            
                            
                            <input type="hidden" name="empl_id" id="empl_id" value="">
                            <input type="hidden" name="acc_status" id="acc_status" value="">
                            


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">No,Close</button>
                          <button type="submit" class="btn btn-primary" id="levels" name="xasc"></button>
                          
                              
                          @show
                          
                        
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  <!--END MODEL-->
                        
				</div>
            </div>
        </div>
    </div>
</div>
</div>
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

<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
  <script>
      $('#myModal').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) // Button that triggered the modal
        var getId = button.data("role") // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        
        var modal = $(this)
        
        modal.find('.modal-body #empl_id').val(getId)
        
      });

      $('#accessability').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) // Button that triggered the modal
        var getId = button.data("role")
        var getCurrentStatues = button.data("curst") 
        

        if(getCurrentStatues == 0){
          
          $("#levels").text("Block");
          $("#myModalLabelacc").text("Confirm For Access Denite");
          $("#acclvl").text("Do You Want to Block the access?");

          
        }else{
          $("#levels").text("Unlock");
          $("#myModalLabelacc").text("Confirm For Access Permission");
          $("#acclvl").text("Do You Want to Unblock the access?");
        }

         // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        
        var modal = $(this)
        
        modal.find('.modal-body #empl_id').val(getId)
        //modal.find('.modal-body #acc_status').val(getCurrentStatues)
        
      });


      </script>
  

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



<script>
$(document).ready( function () {
    $('#unseen').DataTable();
    
    responsive: true;
} );



</script>



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


	

  /* Large desktop */
@media (min-width: 1200px) {

  

 }

/* Portrait tablet to landscape and desktop */
@media (min-width: 768px) and (max-width: 979px) { 

  .priority-5{
			display:none;
		}

    .priority-1{
			display:none;
		}

 }

/* Landscape phone to portrait tablet */
@media (max-width: 767px) { 

  .priority-5{
			display:none;
		}
		.priority-1{
			display:none;
		}

 }

/* Landscape phones and down */
@media (max-width: 480px) { 


  .priority-5{
			display:none;
		}
		.priority-4{
			display:none;
    }
		.priority-1{
			display:none;
		}

 }
	
	

 

</style>
</html>