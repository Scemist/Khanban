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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .postCss('resources/css/board.css', 'public/css', [
        //
    ])
    .postCss('resources/css/projetos.css', 'public/css', [
        //
    ])
    .postCss('resources/css/projetos-form.css', 'public/css', [
        //
    ])
    .postCss('resources/css/index.css', 'public/css', [
        //
    ]);
