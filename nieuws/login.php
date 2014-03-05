<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>NIEUWS.nl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link id="callCss" rel="stylesheet" href="/themes/css/bootstrap.min.css" media="screen"/>
	<link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/themes/css/nieuws.css" media="screen"/>

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->

     <style>
     input {
         margin-bottom: 5px;
         width: 50% !important;
     }

     </style>
  </head>

<body>

<img src="/themes/images/nieuws.png" id="logo">
<section id="middle">
<div id="datum"><?php setlocale(LC_ALL, 'nl_NL'); echo strftime("%A %e %B %Y"); ?>. Het laatste nieuws het eerst op NIEUWS.nl</div>

  <form method="POST" action="index.php" class="form-signin">
      <input name="email" class="input-block-level" placeholder="E-mail adres">
      <input name="password" type="pasword" class="input-block-level" placeholder="Wachtwoord">

      <button type="submit" class="btn btn-primary">Inloggen</button>
  </form>
</section>

</body>
</html>
