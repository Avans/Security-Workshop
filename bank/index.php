<!DOCTYPE html>
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

	<div class="span4 signin-container">

        <form class="form-signin">
            <h3 class="form-signin-heading">Inloggen Mijn Poespas</h3>
            <input type="text" class="input-block-level" placeholder="Gebruikersnaam">
            <input type="text" class="input-block-level" placeholder="Wachtwoord">
        <button class="btn btn-primary" type="submit">Inloggen</button>
     </form>
    </div>




<?php

/**
 * Maak verbinding met de database
 */
$connection = mysql_connect('localhost', 'webshop', 'pass')
    or die('Kan geen verbinding maken met MySQL');

$db = mysql_select_db('webshop_sql1', $connection)
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
