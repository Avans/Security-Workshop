var page = require('webpage').create();
page.open('http://localhost/nieuws/', 'post', 'gebruikersnaam=Admin&wachtwoord=sesame', function() {
    setTimeout(function(){
        phantom.exit();
    }, 1000);
});