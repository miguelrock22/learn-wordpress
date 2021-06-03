<?php

namespace Capacitacion\Library\Setup;

defined( 'ABSPATH' ) or die();

if( !class_exists('InstallDb') ){
    class InstallDb
    {
        public static $instace;

        public static function getInstace(){
            if( !self::$instace ){
                self::$instace = new self;
            }
            return self::$instace;
        }

        public static function setupSchema(){
            global $wpdb;
            
            $table = $wpdb->prefix . 'test';
            $charset = $wpdb->get_charset_collate();
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $table (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                text text NOT NULL,
                PRIMARY KEY  (id)
            ) $charset_collate;";

            $wpdb->query($sql);
        }
    }
}