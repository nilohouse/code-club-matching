var elixir = require('laravel-elixir');
var bowerDir = 'vendor/bower_components/';
var codeClubDir = bowerDir + 'code-club/dist/';

elixir(function(mix) {
    mix
    .copy(codeClubDir + 'images/favicons/favicon.ico', 'public/favicon.ico')
    //.copy(codeClubDir + 'images/favicons/logo-br.svg', 'public/logo-br.svg')
    .copy(codeClubDir + 'stylesheets/code-club.css', 'public/css/code-club.css')
    .copy(codeClubDir + 'images/icons/social-facebook.svg', 'public/images/icons/social-facebook.svg')
    .copy(codeClubDir + 'images/icons/social-youtube.svg', 'public/images/icons/social-youtube.svg')
    .copy(codeClubDir + 'images/icons/social-twitter.svg', 'public/images/icons/social-twitter.svg')
    .copy(codeClubDir + 'images/icons/social-google.svg', 'public/images/icons/social-google.svg')
    .less('app.less');
});
