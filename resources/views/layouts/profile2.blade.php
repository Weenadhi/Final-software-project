<!DOCTYPE html>
<html lang="en">
<head>

    @section('title')
    
    @show

	<meta charset="UTF-8">
	<meta name="description" content="Civic - CV Resume">
	<meta name="keywords" content="resume, civic, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon   
	<link href="../img/favicon.ico" rel="shortcut icon"/>--> 

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/flaticon.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.css"/>
	<link rel="stylesheet" href="../css/magnific-popup.css"/>
	<link rel="stylesheet" href="../css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section start -->
	<header class="header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="site-logo">
						<h2><a href="#">Employee Information</a></h2>
						<p>Basic/Official/Financial</p>
					</div>
				</div>
                @section('navg')
				
                @show
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Hero section start -->
	<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-6">
							
                            <br><br><br>
                            <div class="hero-text">
                                @section('basic')
                                
                                @show
							</div>
                            <br><br>
                            <div class="hero-info">
                            @section('office')
                            
                            @show
							</div>

						</div>
						<div class="col-lg-6">
                            <center>
							<figure class="hero-image">
                                @section('avtr')
                                
                                @show
							</figure>
                            </center>
                            <div class="hero-info">
                            @section('fi')
                            
                                @show
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/magnific-popup.min.js"></script>
	<script src="../js/circle-progress.min.js"></script>
	<script src="../js/main.js"></script>
</body>
</html>