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
   .js('resources/js/myckeditor5.js', 'public/js')
   .js('resources/js/multiselectdropdowninit.js', 'public/js')
   .js('resources/js/validations/post.js', 'public/js/validations')
   .js('resources/js/validations/error-messages/show-post-title-error-message.js', 'public/js/validations/error-messages')
   .js('resources/js/validations/error-messages/show-post-categories-error-message.js', 'public/js/validations/error-messages')
   .js('resources/js/validations/error-messages/show-post-content-error-message.js', 'public/js/validations/error-messages')
   .js('resources/js/validations/post-category.js', 'public/js/validations')
   .js('resources/js/validations/error-messages/show-postcategory-name-error-message.js', 'public/js/validations/error-messages')
   .copyDirectory('node_modules/froala-editor', 'public/froala-editor')

   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/common.scss', 'public/css')
   .sourceMaps();
