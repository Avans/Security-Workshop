var page = require('webpage').create();
page.open('http://localhost/nieuws/', function() {
    setTimeout(function(){
        phantom.exit();
    }, 1000);
});