const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .copyDirectory('public/admin/css','public/css')
    .copyDirectory('public/admin/js','public/js')
    .copyDirectory('public/admin/images','public/images')
    .copyDirectory('public/admin/fonts','public/fonts');
