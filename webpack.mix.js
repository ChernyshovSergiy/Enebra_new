let mix = require('laravel-mix');
let webpack = require('webpack');

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

mix
    // .setPublicPath('public/build')
    .setPublicPath('public')
    // .setResourceRoot('/build/')
    .setResourceRoot('/')
    .js('resources/assets/js/app.js', 'js')
    // .scripts(['resources/assets/admin/**/*.js'], 'js/admin.js')
    .styles([
        'resources/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'resources/assets/admin/bower_components/font-awesome/css/font-awesome.min.css',
        'resources/assets/admin/bower_components/Ionicons/css/ionicons.min.css',
        'resources/assets/admin/dist/css/AdminLTE.min.css',
        'resources/assets/admin/dist/css/skins/_all-skins.min.css',
        'resources/assets/admin/bower_components/morris.js/morris.css',
        'resources/assets/admin/bower_components/jvectormap/jquery-jvectormap.css',
        // 'resources/assets/admin/bower_components/jvectormap/lib/vector-map/jqvmap.min.css',
        'resources/assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'resources/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css',
        'resources/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ], 'public/css/admin.css')
    // .styles(['resources/assets/admin/**/*.css'], 'public/build/css/admin.css')
    .scripts([
        'resources/assets/admin/bower_components/jquery/dist/jquery.min.js',
        'resources/assets/admin/bower_components/jquery-ui/jquery-ui.min.js',
        'resources/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'resources/assets/admin/bower_components/raphael/raphael.min.js',
        'resources/assets/admin/bower_components/morris.js/morris.min.js',
        'resources/assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'resources/assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'resources/assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        // 'resources/assets/admin/bower_components/jvectormap/lib/vector-map/jquery.vmap.js',
        // 'resources/assets/admin/bower_components/jvectormap/lib/vector-map/jquery.vmap.min.js',
        // 'resources/assets/admin/bower_components/jvectormap/lib/vector-map/jquery.vmap.sampledata.js',
        // 'resources/assets/admin/bower_components/jvectormap/lib/vector-map/country/jquery.vmap.world.js',
        'resources/assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js',
        'resources/assets/admin/bower_components/moment/min/moment.min.js',
        'resources/assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'resources/assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'resources/assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'resources/assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'resources/assets/admin/bower_components/fastclick/lib/fastclick.js',
        'resources/assets/admin/dist/js/adminlte.min.js',
        'resources/assets/admin/dist/js/pages/dashboard.js',
        'resources/assets/admin/dist/js/demo.js'
    ], 'public/js/admin.js')
    .sass('resources/assets/sass/app.scss', 'public/css');

    mix.copy('resources/assets/admin/bower_components/bootstrap/fonts', 'public/fonts');
    mix.copy('resources/assets/admin/bower_components/font-awesome/fonts', 'public/fonts');
    mix.copy('resources/assets/admin/bower_components/Ionicons/fonts', 'public/fonts');
    mix.copy('resources/assets/admin/dist/img', 'public/img');
    // mix.copy('resources/assets/admin/plugins/iCheck/minimal/blue.png', 'public/css');
    mix.sourceMaps();
    mix.version();
    // .version();

mix.webpackConfig({
    plugins: [
        new webpack.IgnorePlugin(/^codemirror$/)
    ]
});
