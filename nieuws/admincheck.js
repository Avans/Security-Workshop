var page = require('webpage').create();
page.open('http://localhost/nieuws/', 'post', 'email=admin@nieuws.nl&password=sesame', function() {
    setTimeout(function(){
        phantom.exit();
    }, 1000);
});