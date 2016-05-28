var elixir = require('laravel-elixir');
var bowerDir = 'vendor/bower_components/';
var codeClubDir = bowerDir + 'code-club/dist/';

elixir(function(mix) {
    mix
    .copy(codeClubDir + 'images/favicons/favicon.ico', 'public/favicon.ico')
    .copy(codeClubDir + 'images/favicons/icon.png', 'public/icon.png')
    .copy(codeClubDir + 'stylesheets/code-club.min.css', 'public/css/code-club.min.css')
    .less('app.less');
});
