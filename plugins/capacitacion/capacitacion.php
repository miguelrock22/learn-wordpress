<?php
/**
 * Plugin Name:       Capacitación
 * Description:       Handle the basics with this Capacitacion.
 * Version:           0.0.1
 * Requires at least: 5.0
 * Requires PHP:      7.2
 * Author:            Miguel Montoya
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       capacitacion
 */

namespace Capacitacion;

if( !class_exists('Capacitacion') ){
    class Capacitacion
    {
        public static function init(){
            self::load_classes();
            self::install_hook();
            self::uninstall_hook();
        }

        public static function load_classes(){
            $path = __DIR__ . '/library';
            $root_classes = glob($path.'/class.*.php');
            $subdirectory_classes = glob($path.'/**/class-*.php');
            $all_classes = array_merge($root_classes, $subdirectory_classes);

            foreach( $all_classes as $file){
                require_once $file;
            }
        }

        public static function install_hook(){
            register_activation_hook( __FILE__, array( \Capacitacion\Library\Setup\InstallDb::class, 'setupSchema'));
        }
        
        public static function uninstall_hook(){
            register_deactivation_hook( __FILE__, array( \Capacitacion\Library\Setup\uninstallDb::class, 'dropSchema'));
        }
    }

    Capacitacion::init();
}