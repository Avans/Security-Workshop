<?php header('X-XSS-Protection: 0'); // Disable XSS protection in modern browsers to allow the exercises to work?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Poespas Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link id="callCss" rel="stylesheet" href="/themes/bank/bank.css" media="screen"/>
    <link id="callCss" rel="stylesheet" href="/themes/css/bootstrap.min.css" media="screen"/>
	<link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
  </head>

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->

<body>
<div id="header">
<div class="container">

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
    <a class="brand" href="/bank"><img src="/themes/images/poespas.png" title="De bank die u kunt vertrouwen"></a>
</div>
</div>
</div>

<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">


    <p>Welkom bij de Poespas Bank. De bank die u kunt vertrouwen.</p>
    <p>Vul alleen uw gegevens in als u zeker weet dat u zich op de echte Poespas site bevind. </p>

     <hr />

<div class="alert alert-info">
<?php
    echo $_GET['m'];
?>
</div>
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
