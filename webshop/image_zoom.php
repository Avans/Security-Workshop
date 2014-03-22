<?php
    header('X-XSS-Protection: 0'); // Disable XSS protection in modern browsers to allow the exercises to work
    session_start(); // Start a fake session
 ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lekkende Kranen Empirium</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link id="callCss" rel="stylesheet" href="/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="/themes/css/base.css" rel="stylesheet" media="screen"/>
	<link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="/themes/css/font-awesome.css" rel="stylesheet" type="text/css">

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->
  </head>

<body>
<div id="header">
<div class="container">


<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="/webshop"><img src="/themes/images/logo.png" alt="Leaky's Kranen Emporium"/></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
    </form>
  </div>
</div>
</div>
</div>

<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">

	<div class="span12">

        <img src="/themes/images/products/<?php echo $_GET['image'] ?>" style="width:50%; margin: 0 auto;"/>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
</body>
</html>
