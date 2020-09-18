const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/maps.js', 'public/js')
	.js('resources/js/gestionarPropiedades.js', 'public/js')
	.js('resources/js/materialize-stepper.js', 'public/js')
	.sass('resources/sass/materialize-stepper.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/toastr.scss', 'public/css');

mix.browserSync('http://zafiro.test/');
