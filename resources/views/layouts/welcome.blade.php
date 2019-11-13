
<!DOCTYPE html>
<html lang="en">


<head>
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Key Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">


    <link rel="stylesheet" href="css/mystyle.css" type="text/css" media="all">

  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/homestyle.css">

</head>


<body>

<section class="main">
	<div class="layer">

		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="#"><span class="fa fa-sign-in"></span> Welcome to Payroll System</a></h1>
			</div>
			<div class="links">
				<ul class="links-unordered-list">

                    @section('headers')
                    @show


				</ul>
			</div>
		</div>
		<div class="content-w3ls">

            @section('body_part')
            @show

		</div>

    </div>
</section>


    </div>


    <div class="mt-5 pt-5 pb-5 footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                  <h2>This is Treinetic company</h2>
                  <p class="pr-5 text-white-50">Web payroll system</p>

                </div>
                <div class="col-lg-3 col-xs-12 links">


                </div>
                <div class="col-lg-4 col-xs-12 location">
                  <h4 class="mt-lg-0 mt-sm-4">Location</h4>
                  <p>No 1015 / A, Nagahamulla road, Pelawatte</p>
                  <p class="mb-0"><i class="fa fa-phone mr-3"></i>(+94) 0112075515</p>
                  <p><i class="fa fa-envelope-o mr-3"></i>info@hsdf.com</p>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col copyright">
                  <p class=""><small class="text-white-50">Second year software project</small></p>
                </div>
              </div>
            </div>
            </div>

</body>
<style>
th, td {
  padding: 4px;
  text-align: left;
}
</style>
</html>
