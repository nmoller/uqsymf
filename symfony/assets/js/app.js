// assets/js/app.js


// ...rest of JavaScript code here
//  loads the jquery package from node_modules
var $ = require('jquery');

// import the function from greet.js (the .js extension is optional)
// ./ (or ../) means to look for a local file
// var greet = require('./greet');

$(document).ready(function() {
    $('#container').append('<h1> john </h1>');
});