var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.less('adminutes.less')
       .less(['skins/_all-skins.less'], 'public/css/skins/_all-skins.css')
       .coffee('adminutes.coffee');

    mix.copy('resources/assets/vendor/AdminLTE/dist/js/app.js', 'public/js/adminlte.js');
    mix.copy('resources/assets/vendor/AdminLTE/dist/js/app.min.js', 'public/js/adminlte.min.js');

    mix.copy('resources/assets/vendor/AdminLTE/bootstrap', 'public/vendor/bootstrap');
    mix.copy(['resources/assets/vendor/AdminLTE/plugins', '!resources/assets/vendor/AdminLTE/plugins/{datatables,datatables}'], 
        'public/vendor');

    mix.copy('resources/assets/vendor/sweetalert/dist', 'public/vendor/sweetalert');
    mix.copy('resources/assets/vendor/PACE', 'public/vendor/pace');

    mix.copy('resources/assets/vendor/ladda/dist', 'public/vendor/ladda');

    mix.copy('resources/assets/vendor/moment/min', 'public/vendor/moment/min');
    mix.copy('resources/assets/vendor/moment/locale', 'public/vendor/moment/locale');

    mix.copy('resources/assets/vendor/moment-timezone/builds', 'public/vendor/moment-timezone');

    mix.copy('resources/assets/vendor/font-awesome/css', 'public/vendor/font-awesome/css');
    mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/vendor/font-awesome/fonts');

    mix.copy('resources/assets/vendor/Ionicons/css', 'public/vendor/Ionicons/css');
    mix.copy('resources/assets/vendor/Ionicons/fonts', 'public/vendor/Ionicons/fonts');

    mix.copy('resources/assets/vendor/remarkable-bootstrap-notify/dist', 'public/vendor/remarkable-bootstrap-notify');
    
    mix.copy('resources/assets/vendor/jquery-validation/dist', 'public/vendor/jquery-validation');

    mix.copy(['resources/assets/vendor/datatables.net/js', 'resources/assets/vendor/datatables.net-bs/js'], 'public/vendor/datatables/js');
    mix.copy(['resources/assets/vendor/datatables.net/css', 'resources/assets/vendor/datatables.net-bs/css'], 'public/vendor/datatables/css');

    mix.copy('resources/assets/vendor/datatables-colvis/js', 'public/vendor/datatables/extensions/colvis/js');
    mix.copy('resources/assets/vendor/datatables-colvis/css', 'public/vendor/datatables/extensions/colvis/css');

    mix.copy('resources/assets/vendor/datatables-autofill-bootstrap/js', 'public/vendor/datatables/extensions/autofill-bootstrap/js');
    mix.copy('resources/assets/vendor/datatables-autofill-bootstrap/css', 'public/vendor/datatables/extensions/autofill-bootstrap/css');

    mix.copy(['resources/assets/vendor/datatables.net-buttons/js', 'resources/assets/vendor/datatables.net-buttons-bs/js'], 'public/vendor/datatables/extensions/buttons/js');
    mix.copy('resources/assets/vendor/datatables.net-buttons-bs/css', 'public/vendor/datatables/extensions/buttons/css');

    mix.copy(['resources/assets/vendor/datatables.net-colreorder/js', 'resources/assets/vendor/datatables.net-colreorder-bs/js'], 'public/vendor/datatables/extensions/colreorder/js');
    mix.copy('resources/assets/vendor/datatables.net-colreorder-bs/css', 'public/vendor/datatables/extensions/colreorder/css');

    mix.copy(['resources/assets/vendor/datatables.net-fixedcolumns/js', 'resources/assets/vendor/datatables.net-fixedcolumns-bs/js'], 'public/vendor/datatables/extensions/fixedcolumns/js');
    mix.copy('resources/assets/vendor/datatables.net-fixedcolumns-bs/css', 'public/vendor/datatables/extensions/fixedcolumns/css');

    mix.copy(['resources/assets/vendor/datatables.net-fixedheader/js', 'resources/assets/vendor/datatables.net-fixedheader-bs/js'], 'public/vendor/datatables/extensions/fixedheader/js');
    mix.copy('resources/assets/vendor/datatables.net-fixedheader-bs/css', 'public/vendor/datatables/extensions/fixedheader/css');

    mix.copy(['resources/assets/vendor/datatables.net-keytable/js', 'resources/assets/vendor/datatables.net-keytable-bs/js'], 'public/vendor/datatables/extensions/keytable/js');
    mix.copy('resources/assets/vendor/datatables.net-keytable-bs/css', 'public/vendor/datatables/extensions/keytable/css');

    mix.copy(['resources/assets/vendor/datatables.net-responsive/js', 'resources/assets/vendor/datatables.net-responsive-bs/js'], 'public/vendor/datatables/extensions/responsive/js');
    mix.copy('resources/assets/vendor/datatables.net-responsive-bs/css', 'public/vendor/datatables/extensions/responsive/css');

    mix.copy(['resources/assets/vendor/datatables.net-rowreorder/js', 'resources/assets/vendor/datatables.net-rowreorder-bs/js'], 'public/vendor/datatables/extensions/rowreorder/js');
    mix.copy('resources/assets/vendor/datatables.net-rowreorder-bs/css', 'public/vendor/datatables/extensions/rowreorder/css');

    mix.copy(['resources/assets/vendor/datatables.net-scroller/js', 'resources/assets/vendor/datatables.net-scroller-bs/js'], 'public/vendor/datatables/extensions/scroller/js');
    mix.copy('resources/assets/vendor/datatables.net-scroller-bs/css', 'public/vendor/datatables/extensions/scroller/css');

    mix.copy(['resources/assets/vendor/datatables.net-select/js', 'resources/assets/vendor/datatables.net-select-bs/js'], 'public/vendor/datatables/extensions/select/js');
    mix.copy('resources/assets/vendor/datatables.net-select-bs/css', 'public/vendor/datatables/extensions/select/css');
});