const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
	.postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/board.css', 'public/css')
    .postCss('resources/css/criar.css', 'public/css')
    .postCss('resources/css/home.css', 'public/css')
    .postCss('resources/css/index.css', 'public/css')
    .postCss('resources/css/lista.css', 'public/css')
    .postCss('resources/css/login.css', 'public/css')
    .postCss('resources/css/projeto.css', 'public/css')
    .postCss('resources/css/root.css', 'public/css')
    .postCss('resources/fonts/opensans.css', 'public/fonts')
    .js('resources/js/board.js', 'public/js')
    .js('resources/js/skeleton.js', 'public/js');

// mix.combine('public/css', 'resources/css/all-files.css');
mix.combine([
	'public/css/root.css',
	'public/css/home.css',
	'public/css/login.css'
], 'public/css/all.home.css');

// mix.minify('public/js/skeleton.js');
// mix.minify('public/css/all.home.css');