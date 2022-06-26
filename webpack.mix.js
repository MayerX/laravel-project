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
        require('tailwindcss'),
    ]);
mix.extract(['alpine']);
mix.copy('node_modules/jquery/dist/jquery.js', 'public/vendor/jquery/jquery.js');
mix.copy('node_modules/jquery.nicescroll/dist/jquery.nicescroll.js', 'public/vendor/jquery/jquery.niceScroll.js');
mix.copy('node_modules/echarts/dist/echarts.min.js', 'public/vendor/echarts/echarts.min.js');
// mix.copy('node_modules/echarts/dist/echarts.js', 'public/vendor/echarts/echarts.js');
// mix.copy('node_modules/jquery-ui/ui/i18n/datepicker-zh-CN.js', 'public/vendor/i18n/datepicker-zh-CN.js')
// mix.extract(['tw-elements']);
