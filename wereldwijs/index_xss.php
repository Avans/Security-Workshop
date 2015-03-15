<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Wereldwijs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->

    <style>
    html, body {
        height: 100%;
    }
    .content {
        width: 70%;
        margin-top: 20px;
        text-align:center;
        background-image: url(/themes/images/world-map.png);
        background-repeat: no-repeat;
        background-position: 50% 80%;
        height: 100%;
    }
    .pagina {
      display: none;
    }
    </style>
  </head>

<body>

<div class="center-block content">
  <nav class="navbar navbar-default">
  <div class="navbar-header">
      <a class="navbar-brand" href="#">Wereldwijs (XSS)</a>
    </div>
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#frankrijk">Frankrijk</a></li>
        <li><a href="#nederland">Nederland</a></li>
        <li><a href="#duitsland">Duitsland</a></li>
      </ul>
    </div>
  </div>
</nav>

    <img src="/themes/images/world.png" style="width: 10%;">
    <p>Wereldwijs: Leer spelenderwijs over de politiek van de wereld</p>


    <div id="frankrijk" class="pagina"><h1>Frankrijk</h1>Frankrijk is een democratische republiek. De president van de Franse Republiek wordt sinds 2002 voor vijf jaar gekozen (voorheen was dat zeven jaar). De president heeft sinds de invoering van de Vijfde Republiek in 1958 veel macht vergeleken met andere westerse democratieen, omdat die regeringen kan benoemen en ontslaan, en de uitvoerende macht sterk staat tegenover de wetgevende macht. De president heeft geen vertrouwensvotum van het parlement nodig, want hij/zij wordt via landelijke verkiezingen direct gekozen en kan zonder zelf af te treden het parlement een maal voortijdig ontbinden en vervroegde parlementsverkiezingen uitschrijven.</div>

    <div id="nederland" class="pagina"><h1>Nederland</h1>
    Nederland is een constitutionele erfmonarchie en staatsrechtelijk gezien een parlementaire democratie. Belangrijke mijlpalen in de politieke geschiedenis waren de grondwetsherziening van 1848 onder leiding van de liberale staatsman Thorbecke, waarbij onder meer een einde werd gemaakt aan de persoonlijke regeermacht van de koning, de koninklijke onschendbaarheid en de ministeriele verantwoordelijkheid voor het regeringsbeleid werden ingevoerd en het parlement meer invloed kreeg; en 1919, toen het algemeen kiesrecht werd ingevoerd. De Nederlandse politiek werd lange tijd gekenmerkt door de verzuiling, de opdeling van de bevolking in verschillende maatschappelijke groepen. Tegelijkertijd is er een sterk streven naar het bereiken van consensus, vaak aangeduid als het poldermodel. In internationaal perspectief staat Nederland voorts bekend om zijn liberale beleid op het gebied van drugs, prostitutie, euthanasie en het homohuwelijk. De hoofdstad van Nederland is Amsterdam. Den Haag is echter al sinds de zestiende eeuw bijna onafgebroken de regeringszetel en de woonplaats van de vorst.</div>

    <div id="duitsland" class="pagina"><h1>Duitsland</h1>
    De Bondsrepubliek Duitsland is met haar grondwet van 23 mei 1949 een democratisch-parlementaire bondsstaat. De grondwet kan door een tweederdemeerderheid in Bondsdag en bondsraad gewijzigd worden. Enkele artikelen, waarin de basisprincipes van de grondwet zoals de federale structuur van de staat, de democratische, sociale en rechtsprincipes van de staat, en de onschendbaarheid van de menselijke waarde van het individu, zijn van iedere wijziging uitgesloten.</div>

    <script>
      // Als de de hash van de URL veranderd (wat achter de # staat)
      window.onhashchange = function() {
        // Hide alle pagina's
        $(".pagina").hide();

        // En laat de pagina met het juiste id juist weer zien
        // window.location.hash heeft bijvoorbeeld de waarde '#frankrijk', wat ook meteen een jQuery selector is
        $(window.location.hash).show();
      }
    </script>
    </div>

</body>
</html>
