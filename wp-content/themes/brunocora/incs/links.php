<?php
add_action('wp_enqueue_scripts', function () {
    
/**************************** CSS PADRÃO ***************************/

wp_enqueue_style('style', get_stylesheet_directory_uri().'/css/style.css', array(), null, false);
wp_enqueue_style('responsivo', get_stylesheet_directory_uri().'/css/responsivo.css', array(), null, false);
wp_enqueue_style('css_reset', get_stylesheet_directory_uri().'/css/reset.css', array(), null, false);
wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', '', '1.8.1' );
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );


/************************** JAVASCRIPT PADRÃO ************************/

wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), NULL, false );
wp_enqueue_script( 'main' );
wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', 'jquery', '1.8.1' );
wp_register_script( 'instagramfeed', get_template_directory_uri() . '/js/jquery.instagramFeed.js', array( 'jquery' ), NULL, false );
wp_enqueue_script( 'instagramfeed' );


});