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

mix.js('resources/views/admin/template/assets/js/AdminLTE.js', 'public/admin/js/admin.js')
    .sass('resources/views/admin/template/assets/scss/AdminLTE.scss', 'public/admin/css/admin.css')
    .sass('resources/views/admin/template/assets/scss/AdminLTE-pages.scss', 'public/admin/css/admin_login.css')
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/admin/js/jquery.min.js')
    .copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/admin/js/bootstrap.bundle.min.js');
