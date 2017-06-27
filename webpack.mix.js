const { mix } = require('laravel-mix');

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

var publicPath = 'public/themes/default/assets';
var resourcePath = 'resources/themes/default/assets';

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
//
mix.js(resourcePath + '/js/app.js', publicPath + '/js')
  // .copy('node_modules/font-awesome/fonts', resourcePath + '/sass/fonts')
  .copy('node_modules/simplemde/dist/simplemde.min.css', resourcePath + '/sass/simplemde.css')
  .copy('node_modules/eonasdan-bootstrap-datetimepicker/src/sass/_bootstrap-datetimepicker.scss', resourcePath + '/sass/datepicker.scss')
  .sass(resourcePath + '/sass/app.scss', publicPath + '/css');
