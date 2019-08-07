<?php

add_action( 'init', function(){
    add_rewrite_tag('%categoria%', '([0-9a-zA-Z\-]*)');
    add_rewrite_tag('%busca%', '([^/]+)');
    add_rewrite_tag('%pg%', '([0-9\-]*)');

    // blog
    add_rewrite_rule('^blog/categoria/([0-9a-zA-Z\-]*)/?','index.php?post_type=post&categoria=$matches[1]', 'top');
    add_rewrite_rule('^blog/busca/([^/]+)/?','index.php?post_type=post&busca=$matches[1]', 'top');
    add_rewrite_rule('^blog/pg/([0-9]*)/?','index.php?post_type=post&pg=$matches[1]', 'top');
    add_rewrite_rule('^blog/([0-9a-zA-Z\-]*)/?', 'index.php?post_type=post&name=$matches[1]', 'top');

    flush_rewrite_rules();
});