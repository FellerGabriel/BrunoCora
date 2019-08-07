<?php
add_action( 'init', function(){

/****************************************************************************************
******************************* BANNERS ************************************************
*****************************************************************************************/
$banners = array(
    'name' => _x('Banners', 'post type general name'),
    'singular_name' => _x('Banner', 'post type singular name'),
    'add_new' => _x('Adicionar novo', 'banner'),
    'add_new_item' => __('Novo banner'),
    'edit_item' => __('Editar banner'),
    'new_item' => __('Nova banner'),
    'all_items' => __('Todos os banners'),
    'view_item' => __('Visualizar banner'),
    'search_items' => __('Procurar banners'),
    'not_found' =>  __('Não há banners cadastrados'),
    'not_found_in_trash' => __('Nenhum banner encontrado'),
    'parent_item_colon' => '',
    'menu_name' => 'Banners'
);

$argsBanners = array(
    'labels' => $banners,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-format-gallery',
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title')
);
register_post_type( 'banners', $argsBanners);

});