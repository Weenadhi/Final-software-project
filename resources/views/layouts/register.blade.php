
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
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">


    <a href="#" class="logo">
      
      <span class="logo-mini"><b>@yield('utypemin')</b>CP</span>
      <span class="logo-lg"><small><b>@yield('utype') </b>Control Panel</small></span>

    </a>

    
    <nav class="navbar navbar-static-top" role="navigation">

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

  <div>
      <div class="text-center">
         <div class="page-header">
            <h1><b>@yield('headers')</b> <small><b>Register here</b></small></h1>
         </div>
      </div>
   </div>

   </section>
  <section class="content" >

  <div >
   <div class="all">
      

   @section('form_part')
   @show
   {{csrf_field()}}
       
       <div class="all table table-striped">
          <div>
             <div class="row">
                <!--Official Information begin-->
             <div class="col-sm-6">
                
                      <fieldset>
                        
               <div class="text-center">
                  <div class="page-header">
                  <h4><b>Official Informations</b><small>(Mandatory)</small></h4>
                  </div>
               </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">SSN</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span><input id="ssn" name="ssn" placeholder="Social Security Number" class="form-control"  value="" type="text"></div>
                               @if ($errors->first('ssn'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('ssn') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="email" name="email" placeholder="E-mail" class="form-control"  value="" type="text"></div>
                               @if ($errors->first('email'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="username" name="username" placeholder="Username" class="form-control"  value="" type="text"></div>
                               @if ($errors->first('username'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Company Branch</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                  <select class="selectpicker form-control" name="obranch">
                                    <option disabled="disabled" selected="selected">Select Company Branch</option>
                                    @foreach($cbranchs as $cbranch)
                                    <option>{{$cbranch->company_branch}}</option>
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
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                  <select class="selectpicker form-control" name="dept">
                                    <option disabled="disabled" selected="selected">Select the Department</option>
                                    @foreach($deps as $dep)
                                    <option>{{$dep->department}}</option>
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
                                  <select class="selectpicker form-control" name="des">
                                    <option disabled="disabled" selected="selected">Select the Designation</option>
                                    @foreach($data as $desig)
                                    <option>{{$desig->designation}}</option>
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
                   
                    </div>
                     <!--Official Information end-->

                     <div class="col-sm-6">

                    <!--Financial Information begin -->
                    
                     <fieldset>

                     <div class="text-center">
                        <div class="page-header">
                        <h4><b>Financial Informations</b><small>(Mandatory)</small></h4>
                        </div>
                     </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">EPF Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input id="epf_no" name="epf_no" placeholder="EPF No:" class="form-control"  value="" type="text"></div>
                               @if ($errors->first('epf_no'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('epf_no') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                           <label class="col-md-4 control-label">Salary Group</label>
                           <div class="col-md-8 inputGroupContainer">
                              <div class="input-group">
                                 <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-home"></i></span>
                                 <select class="selectpicker form-control" name="sal_grp">
                                   <option disabled="disabled" selected="selected">Select the Salary Group</option>
                                   @foreach($sals as $sal)
                                   <option>{{$sal->id}}</option>
                                   @endforeach
                                 </select>
                              </div>
                              
                           </div>
                        </div>
                           
                         

                         <div class="form-group">
                            <label class="col-md-4 control-label">Is OT Pay Allowed</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-usd"></i></span>
                                  <select class="selectpicker form-control" name="ot">
                                    <option disabled="disabled" selected="selected">Is OT Pay Allowed</option>
                                    @foreach($ots as $ot)
                                    <option>{{$ot->is_ot_allow}}</option>
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

                         <div class="form-group">
                            <label class="col-md-4 control-label">Bank</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-home"></i></span>
                                  <select class="selectpicker form-control" name="bank">
                                    <option disabled="disabled" selected="selected">Select the Bank</option>
                                    @foreach($banks as $bank)
                                    <option>{{$bank->bank_name}}</option>
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
                                  <select class="selectpicker form-control" name="bbranch">
                                    <option disabled="disabled" selected="selected">Select the Branch</option>
                                    @foreach($babranchs as $babranch)
                                    <option>{{$babranch->branch_name}}</option>
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
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input id="acc" name="acc" placeholder="Account Number" class="form-control"  value="" type="text"></div>
                               @if ($errors->first('acc'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('acc') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>
                        
                         </fieldset>
                        
                        </div>

                    
                    </div>
                   <!--fina ennd-->
                    
                    <div class="row">
                    <div class="col-sm-6">
                                       
                     <!--Basic info begin-->

                        
                      <fieldset>
                     
                      <div class="text-center">
                        <div class="page-header">
                        <h4><b>Basic Informations</b><small>(optional)</small></h4>
                        </div>
                      </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="first_name" name="first_name" placeholder="First Name" class="form-control"  value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="last_name" name="last_name" placeholder="Last Name" class="form-control"  value="" type="text"></div>
                            </div>
                         </div>
                         
                         <div class="form-group">
                            <label class="col-md-4 control-label">Date Of Birth</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="dob" name="dob" placeholder="Date Of Birth" class="form-control"  value="" type="date"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Address Line 1</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="address_line_1" name="address_line_1" placeholder="Address Line 1" class="form-control"  value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Address Line 2</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="address_line_2" name="address_line_2" placeholder="Address Line 2" class="form-control"  value="" type="text"></div>
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                                  <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                                  <select class="selectpicker form-control" name="gender">
                                     <option disabled="disabled" selected="selected">Select Gender</option>
                                     <option>Male</option>
                                     <option>Female</option>
                                     <option>Other</option>
                                  </select>
                               </div>
                            </div>
                         </div>
                         
                         
                         <div class="form-group">
                            <label class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control"  value="" type="text"></div>
                            </div>
                         </div>
                      </fieldset>
                   

                </div>

                <!--Basic info end-->
                
                <!--financial info end-->

                   <div class="col-sm-6">
                    <!--Security Information begin-->
                   
                      <fieldset>
<center>
<div class="page-header">
<h4><b>Security Informations</b><small>(Mandatory)</small></h4>
</div>
</center>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="password" name="password" placeholder="Password" class="form-control"  value="" type="password"></div>
                               @if ($errors->first('password'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Confirm-Password</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="password_confirmation" name="password_confirmation" placeholder="Confirm-Password" class="form-control"  value="" type="password"></div>
                               @if ($errors->first('password_confirmation'))
                                <span class="invalid-feedback glyphicon glyphicon-warning-sign" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>

                         </div>
                        <div class="text-center text-bottom">
                        
                        <button type="submit" class="btn btn-success">Register</button>

                        </div>

                         </fieldset>
                         
                      <!--Security Information end-->
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



</html>