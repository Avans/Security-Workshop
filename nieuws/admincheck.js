var page = require('webpage').create();
page.open('http://localhost/nieuws/login.php', 'post', 'gebruikersnaam=Admin&wachtwoord=sesame', function() {
    setTimeout(function(){
        phantom.exit();
    }, 3000);
});
