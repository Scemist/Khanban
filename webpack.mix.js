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

mix

	/*-------------------------------------------------------------------------
	| Constrói os arquivos de estilo da aplicação.
	|------------------------------------------------------------------------*/

	.postCss('resources/css/index.css', 'public/css')
	.postCss('resources/css/board.css', 'public/css')
	.postCss('resources/css/projeto-form.css', 'public/css')
	.postCss('resources/fonts/opensans.css', 'public/fonts')

	/*-------------------------------------------------------------------------
	| Junta o CSS root com o CSS do template.
	|------------------------------------------------------------------------*/

	.styles([
		'resources/css/root.css',
		'resources/css/project-template.css'
	], 'public/css/project-all.css', true)

	.styles([
		'resources/css/root.css',
		'resources/css/index-template.css'
	], 'public/css/index-all.css', true)

	/*-------------------------------------------------------------------------
	| Login é a unica página que não tem template. Portanto precisa do root.
	|------------------------------------------------------------------------*/

	.styles([
		'resources/css/root.css',
		'resources/css/login.css',
	], 'public/css/login.css', true)

	/*-------------------------------------------------------------------------
	| Junta e minifica todos os modulos JS do kanban.
	|------------------------------------------------------------------------*/

	.scripts([
		'resources/js/board/set.js',
		'resources/js/board/kanban-module.js',
		'resources/js/board/modal-module.js',
		'resources/js/board/above-menu-module.js',
		'resources/js/board/ajax-module.js',
		'resources/js/board/init.js'
	], 'public/js/board.js', true);