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
   .js('resources/js/scripts.js', 'public/js')
   .js('resources/js/customers/index.js', 'public/js/customers')
   .js('resources/js/customers/assign-to-room-modal.js', 'public/js/customers')
   .sass('resources/sass/app.scss', 'public/css')
   .stylus('resources/styl/styles.styl', 'public/css')
   .stylus('resources/styl/drawer.styl', 'public/css')
   .disableNotifications();
