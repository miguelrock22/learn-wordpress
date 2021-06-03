<?php

namespace Capacitacion\Library\Admin;

defined( 'ABSPATH' ) or die();

if( !class_exists('CustomPage') ){
    class CustomPage
    {
        public static $instace;

        public function __construct(){
            add_action( 'admin_menu', array( $this, 'custom_page' ));
            //add_action( 'admin_menu', array( $this, 'custom_subpage' ));
            add_action( 'admin_enqueue_scripts', array( $this, "script_admin"));
            add_action( 'wp_ajax_capaction_ajaxcallback', array( $this, 'capaction_ajaxcallback') );
        }

        public static function getInstance(){
            if( !self::$instace ){
                self::$instace = new self;
            }
            return self::$instace;
        }

        /*public function custom_page(){
            add_menu_page(
                'Custom page',
                'Custom Page',
                'manage_options',
                'menu-page',
                function(){ echo "<h1>Hola mundo</h1>";},
                plugin_dir_url( dirname( __DIR__ ) ) . '/assets/images/virus.png',
                20
            );
        }*/

        public function custom_page(){
            add_menu_page(
                'Custom page',
                'Custom Page',
                'manage_options',
                plugin_dir_path( dirname( __DIR__ ) ) . 'templates/admin/custom-page.php',
                null,
                plugin_dir_url( dirname( __DIR__ ) ) . '/assets/images/virus.png',
                20
            );
        }

        /*public function custom_subpage(){
            add_submenu_page( 
                'menu-page',
                'Custom Subpage',
                'Custom Subpage', 
                'manage_options',
                'submenu-page',
                function(){ echo "<h1>Hello World</h1>";},
                1 
            );
        }*/

        public function script_admin(){
           wp_enqueue_script('admin-script',plugin_dir_url( dirname( __DIR__ ) ) . '/assets/js/admin-script.js', array('jquery'), filemtime(plugin_dir_path( dirname( __DIR__ ) ) . '/assets/js/admin-script.js'),true);
        }

        public function capaction_ajaxcallback()
        {
            echo $_POST['foo'];
            wp_die();
        }
    }

    CustomPage::getInstance();
}