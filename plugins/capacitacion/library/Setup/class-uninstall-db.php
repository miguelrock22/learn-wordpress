<?php

namespace Capacitacion\Library\Setup;

defined( 'ABSPATH' ) or die();

if( !class_exists('uninstallDb') ){
    class uninstallDb
    {
        public static $instace;

        public static function getInstace(){
            if( !self::$instace ){
                self::$instace = new self;
            }
            return self::$instace;
        }

        public static function dropSchema(){
            global $wpdb;
            
            $table = $wpdb->prefix . 'test';
            $charset = $wpdb->get_charset_collate();
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "DROP TABLE IF EXISTS $table;";

            $wpdb->query($sql);
        }
    }
}