<?php
// APENAS SE O PLUGIN ACF OPTIONS ESTIVER ATIVO

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'title' => 'Bruno Corá',
        'slug'  => 'bruno_cora',
    ));
}