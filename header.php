<?php
  require_once('./api/v1/config.php');
  $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
  $curPageName = explode('.',$curPageName);
  $curPageName = $curPageName[0];

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Realestate</title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="icon" href="./images/logo.png">
  <link rel="stylesheet" href="./lib/semantic/dist/semantic.min.css">
 	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
   
  <link rel="stylesheet" href="assets/style.css"/>
  
  <link rel="stylesheet" href="./lib/sweetalerts/sweetalert.css">
  <script src="./js/jquery-3.5.1.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="./lib/semantic/dist/semantic.min.js"></script>
<script src="./lib/sweetalerts/sweetalert.min.js"></script>
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->
<script>
//const baseURL = 'http://localhost/realestate/controller';
 const baseURL = 'http://realestate.milatho.com/controller';
</script>
<script src="./js/app.jsx"></script>
<script src="./js/accounting.jsx"></script>
</head>

<body class="ui dimmable">


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="<?php $class = ($curPageName == 'index' || $curPageName == 'buysalerent' || $curPageName == 'property-details') ? ('active') : (''); echo $class;?>"><a href="index.php">Home</a></li>
                <li class="<?php $class = ($curPageName == 'about' || $curPageName == 'blogdetails') ? ('active') : (''); echo $class;?>"><a href="about.php">About</a></li>
                <li class="<?php $class = ($curPageName == 'agents') ? ('active') : (''); echo $class;?>"><a href="agents.php">Agents</a></li>         
                <li class="<?php $class = ($curPageName == 'blog' || $curPageName == 'blogdetail') ? ('active') : (''); echo $class;?>"><a href="blog.php">Blog</a></li>
                <li class="<?php $class = ($curPageName == 'contact') ? ('active') : (''); echo $class;?>"><a href="contact.php">Contact</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">

<div class="row">
<div class="col-lg-4">
<h4 style="font-family:impact !important;">
<a href="./" style="font-family:impact !important;display:inline !important;"><h1 class="display-4 text-success" style="text-decoration:underline;" ><i class="glyphicon glyphicon-home" style="border-radius:50%; border;1px solid black;"></i> AYALA</h1></a>
</h4>
</div>
<div class="col-lg-4">

</div>
<div class="col-lg-4">
<ul class="pull-right" style="display:inline !important;">
                <li><a class="btn btn-primary" href="buysalerent.php">Search Properties</a></li>
  </ul>
</div>
</div>

<!-- <a href="index.php">
<img src="images/logo.png" alt="Realestate">
</a> -->

              
</div>
<!-- #Header Starts -->
</div>