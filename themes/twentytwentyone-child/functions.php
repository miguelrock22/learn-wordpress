<?php
add_action( 'wp_enqueue_scripts', 'twentytwentyone_child_enqueue_styles' );

function twentytwentyone_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

add_action('init', 'twentytwentyone_child_login');

function twentytwentyone_child_login() {
    $login = home_url('login');
    $redirect = basename($_SERVER['REQUEST_URI']);

    if( $redirect == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == "GET"){
        wp_redirect($login);
        exit;
    }
}

add_action('wp_login_failed', 'login_failed');

function login_failed(){
    $login = home_url('login');
    wp_redirect($login . '?login-failed');
    exit;
}

add_shortcode( 'capacitacion', 'twentytwentyone_child_capacitacion');

function twentytwentyone_child_capacitacion($params, $content){
    var_dump($content);
    var_dump($params);
    return 'Ejemplo';
}