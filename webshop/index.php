<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lekkende Kranen Emporium</title>
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

<div id="welcomeLine" class="row">
</div>

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
    <ul id="topMenu" class="nav pull-right">

    </ul>
  </div>
</div>
</div>
</div>

<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">

	<div class="span12">

	<h3> Kranen </h3>
	<hr class="soft"/>
	<p>
        Heeft u ook last van een lekkende kraan? Koop dan nu een kraan van Leaky's! Gegarandeerd geen lekken!
	</p>
	<hr class="soft"/>

<br class="clr"/>
<div class="tab-content">
    <div class="tab-pane  active" id="blockView">
    	<ul class="thumbnails">
<?php

/**
 * Maak verbinding met de database
 */
$connection = mysql_connect('localhost', 'webshop', 'pass')
    or die('Kan geen verbinding maken met MySQL');

$db = mysql_select_db('webshop', $connection)
  or die('Kan de database niet selecteren');


$result = mysql_query("SELECT * FROM producten")
  or die('Query error: ' . mysql_error());

while ($row = mysql_fetch_array($result)) {
?>

			<li class="span3">
			  <div class="thumbnail">
				<a href="product_detail.php?id=<?php echo $row['id'] ?>"><img src="/themes/images/products/<?php echo $row['afbeelding']; ?>" alt=""/></a>
				<div class="caption">
				  <h5><?php echo $row['naam']?></h5>
				  <p>
					<?php echo $row['beschrijving'] ?>
				  </p>
				   <h4 style="text-align:center"><a class="btn btn-primary" href="product_detail.php?id=<?php echo $row['id'] ?>">&euro;<?php echo $row['prijs'] ?></a></h4>
				</div>
			  </div>
			</li>

<?php
}

mysql_close($connection);
?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
</body>
</html>
