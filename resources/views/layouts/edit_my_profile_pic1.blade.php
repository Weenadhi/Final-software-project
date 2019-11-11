<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    


    <title>Change Profile Picture</title>
</head>
<body>
<div class="container">
  <center><h1>Update Profile Picture</h1></center>
  <div class="row">
    <div class="col-sm-6" >
    <br><br><br>
    @section('prop_imgs')
    @show

    </div>
    <div class="col-sm-6" >
    <br>
    @section('forms')
    @show
        @csrf
        <br><br>
        <center><h2>Choose an image</h2></center>
        <br><br>
        <div class="box">
					<input type="file" name="avatar" id="avatar" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					</div>
        <br>
       <div class="row">
       <div class="col-sm-6" >
        <input type="submit" value="Apply" class="pull-right btn  btn-primary btn-block">
        </div>
        <div class="col-sm-3" >
        @section('backbtn')
        @show
        </div>
        </div>
        </form>
    </div>
  </div>
</div>
</body>
<style>
#avatar {
  display: inline-block;
  width: 100%;
  padding: 120px 0 0 0;
  height: 100px;
  overflow: hidden;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  background: url('uploads/basic/uploadicon.png') center center no-repeat;
  border-radius: 20px;
  background-size: 100px 100px;
}

h1 {
	margin: 1em 0 0.5em 0;
	color: #343434;
	font-weight: normal;
	font-family: 'Ultra', sans-serif;   
	font-size: 36px;
	line-height: 42px;
	text-transform: uppercase;
	text-shadow: 0 2px white, 0 3px #777;
}
.demo-2 .main h2 {
	margin: 1em 0 0.5em 0;
	font-weight: normal;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	font-size: 28px;
	line-height: 40px;
	background: #355681;
	background: rgba(53,86,129, 0.8);
	border: 1px solid #fff;
	padding: 5px 15px;
	color: white;
	border-radius: 0 10px 0 10px;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
	font-family: 'Muli', sans-serif;
}
</style>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  

</html>