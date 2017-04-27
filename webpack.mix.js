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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
//
mix.js('resources/themes/default/assets/js/app.js', 'public/themes/default/assets/js')
  // .copy('node_modules/font-awesome/fonts', 'resources/themes/default/assets/sass/fonts')
  .copy('node_modules/simplemde/dist/simplemde.min.css', 'resources/themes/default/assets/sass/simplemde.css')
  .sass('resources/themes/default/assets/sass/app.scss', 'public/themes/default/assets/css');
