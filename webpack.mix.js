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

mix.setPublicPath('./wp-content/themes/no-air/public')
    .copyDirectory('wp-content/themes/no-air/resources/fonts', 'wp-content/themes/no-air/public/fonts')
    .copyDirectory('wp-content/themes/no-air/resources/img', 'wp-content/themes/no-air/public/img')
    .js('wp-content/themes/no-air/resources/js/script.js', 'wp-content/themes/no-air/public/js')
    .sass('wp-content/themes/no-air/resources/sass/style.scss', 'wp-content/themes/no-air/public/css')
    .options({
        processCssUrls: false
    })
    /*.browserSync({
        proxy: 'no-air',
        notify: false
    })*/
    .version();