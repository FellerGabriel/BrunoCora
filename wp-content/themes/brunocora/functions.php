<?php
// TAMANHOS DE IMAGEM PERSONALIZADOS
include __DIR__ . "/incs/thumbs.php";

// CONFIGURAÇÕES PARA O PAINEL
include __DIR__ . "/incs/config.php";

include __DIR__ . "/incs/post_views.php";

// LINKS DE CSS, JS E ETC...
include __DIR__ . "/incs/links.php";

// OPÇÕES DO PLUGIN ACF
include __DIR__ . "/incs/options.php";

// URL CUSTOMIZADAS E CRIADAS MANUALMENTE
include __DIR__ . "/incs/rotas.php";

// AJAX
include __DIR__ . "/incs/ajax.php";



// array de meses
$meses = [
    '01' => 'janeiro',
    '02' => 'fevereiro',
    '03' => 'março',
    '04' => 'abril',
    '05' => 'maio',
    '06' => 'junho',
    '07' => 'julho',
    '08' => 'agosto',
    '09' => 'setembro',
    '10' => 'outubro',
    '11' => 'novembro',
    '12' => 'dezembro',
];

add_theme_support( 'post-thumbnails' );

// google maps api key
function my_acf_google_map_api($api){
    $api['key'] = 'AIzaSyCry5ZMS1GBqX9IE802TiVN3pKdeUQw96c';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// função para pegar imagem ou colocar placeholder caso não exista
function getImage($id, $thumb){
    $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), $thumb);
    if(!$img){
        global $_wp_additional_image_sizes;
        if(isset($_wp_additional_image_sizes[$thumb])){
            $img[0] = DIRECTORY_URI . '/images/placeholders/'. $_wp_additional_image_sizes[$thumb]['width'] .'x'. $_wp_additional_image_sizes[$thumb]['height'] .'.jpg';
        }
    }
    return $img[0];
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

if ( !function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification() {
        return false;
    }
}



