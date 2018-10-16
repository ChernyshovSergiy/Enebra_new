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
    .setPublicPath('public')
    .setResourceRoot('/');

mix.styles([
    'resources/assets/admin/bootstrap/css/bootstrap.min.css',
    'resources/assets/admin/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/assets/admin/ionicons/2.0.1/css/ionicons.min.css',
    'resources/assets/admin/plugins/iCheck/minimal/_all.css',
    'resources/assets/admin/plugins/datepicker/datepicker3.css',
    'resources/assets/admin/plugins/select2/select2.min.css',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.css',
    'resources/assets/admin/dist/css/AdminLTE.min.css',
    'resources/assets/admin/dist/css/skins/_all-skins.min.css'
], 'public/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/assets/admin/bootstrap/js/bootstrap.min.js',
    'resources/assets/admin/plugins/select2/select2.full.min.js',
    'resources/assets/admin/plugins/datepicker/bootstrap-datepicker.js',
    'resources/assets/admin/plugins/datatables/jquery.dataTables.min.js',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.min.js',
    'resources/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/assets/admin/plugins/fastclick/fastclick.js',
    'resources/assets/admin/plugins/iCheck/icheck.min.js',
    'resources/assets/admin/dist/js/app.min.js',
    'resources/assets/admin/dist/js/demo.js',
    'resources/assets/admin/dist/js/scripts.js'
], 'public/js/admin.js');

mix.copy('resources/assets/admin/bootstrap/fonts', 'public/fonts');
mix.copy('resources/assets/admin/dist/fonts', 'public/fonts');
mix.copy('resources/assets/admin/dist/img', 'public/img');
mix.copy('resources/assets/admin/plugins/iCheck/minimal/blue.png', 'public/css');

mix.styles([
    'resources/assets/frontend/css/bootstrap.css',
    'resources/assets/frontend/css/jquery.kwicks.css',
    'resources/assets/frontend/css/hover-min.css',
    'resources/assets/frontend/css/owl.carousel.css',
    'resources/assets/frontend/css/toastr.min.css',
    'resources/assets/frontend/css/style.css',
    'node_modules/vegas/dist/vegas.css'
],'public/css/frontend.css');

// mix.styles([
//     'resources/assets/front/css/bootstrap.min.css',
//     'resources/assets/front/css/font-awesome.min.css',
//     'resources/assets/front/css/animate.min.css',
//     'resources/assets/front/css/owl.carousel.css',
//     'resources/assets/front/css/owl.theme.css',
//     'resources/assets/front/css/owl.transitions.css',
//     'resources/assets/front/css/style.css',
//     'resources/assets/front/css/responsive.css'
// ],'public/css/front.css');

mix.scripts([
    'resources/assets/frontend/js/jquery-ui.js',
    'resources/assets/frontend/js/jquery.backstretch.js',
    'resources/assets/frontend/js/parallax.min.js',
    'resources/assets/frontend/js/jquery.kwicks.min.js',
    'resources/assets/frontend/js/bootstrap.min.js',
    'resources/assets/frontend/js/owl.carousel.min.js',
    'resources/assets/frontend/js/tinymce.min.js',
    'resources/assets/frontend/js/toastr.min.js',
    'resources/assets/frontend/js/script.js',
    'resources/assets/frontend/js/functions.js',
    'resources/assets/frontend/js/scripts.js',
    'resources/assets/frontend/js/shared.js',
    'resources/assets/frontend/js/signup.js',
    'node_modules/vegas/dist/vegas.js'
], 'public/js/frontend.js');


// mix.scripts([
//     'resources/assets/front/js/jquery-1.11.3.min.js',
//     'resources/assets/front/js/bootstrap.min.js',
//     'resources/assets/front/js/owl.carousel.min.js',
//     'resources/assets/front/js/jquery.stickit.min.js',
//     'resources/assets/front/js/menu.js',
//     'resources/assets/front/js/scripts.js'
// ], 'public/js/front.js');

mix.copy('resources/assets/frontend/fonts', 'public/fonts');
mix.copy('resources/assets/front/fonts', 'public/fonts');
mix.copy('resources/assets/frontend/img', 'public/img');
mix.copy('resources/assets/front/images', 'public/images');
mix.copy('resources/assets/frontend/favicon.ico', 'public/favicon.ico');
mix.copy('resources/assets/frontend/robots.txt', 'public/robots.txt');
mix.copy('node_modules/vegas/dist/overlays', 'public/overlays');
// mix.copy('resources/assets/frontend/js/functions.js', 'public/js/functions.js');

mix.sourceMaps();
mix.version();

mix.webpackConfig({
    plugins: [
        new webpack.IgnorePlugin(/^codemirror$/)
    ]
});
