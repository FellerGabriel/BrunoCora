<?php get_header();?>
<?php
$URL_BASE = get_bloginfo('template_directory');
$idPg = get_option( 'page_for_posts' );
$url =  home_url() . '/blog/';

$busca = get_query_var('busca');
$pagina = get_query_var('pg');
if (empty($pagina)) {
    $pagina = 1;
}
?>

<?php
$categoria = (get_query_var('categoria') && get_query_var('categoria') != '') ? get_query_var('categoria') : '';
$publicidade = get_field('publicidade_blog', $idPg);
$selo_blog = get_field('selo_30_dias_blog', $idPg);

$busca = (isset($_GET['busca']) && $_GET['busca'] != '') ? $_GET['busca'] : '';
?>
    <div class="page-posts">
        <div class='search_blog'>
            <div class="container blog_search_content">
                <h1>Blog de consultoria fitness <br/> <span>do bruno corá</span></h1>
                <form action="" id="search_buttom" onsubmit="return false;" class="search_post">
                    <input class="search" name="busca" type="text" placeholder="digite aqui o que você procura">
                    <div class="container_buttom_search">                        
                        <a href="javascript:;" class="buttom_pesquisa" onclick="document.getElementById('search_buttom').submit();"><i class="fas fa-search"></i> Pesquisar</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="container container_blog">            
            <div class="blog_content">
                <div class="blog_posts">
                    <div class='categoria-mobile-container' id="categorias-mobile">
                        <a href="#categorias-mobile" class="categorias-mobile">Categorias</a>
                    </div>
                    <div class="itens">
                        <?php

                        $postsPg = get_option('posts_per_page');

                        $args = [
                            'post_type' => 'post',  
                            's' => $busca,              
                            'posts_per_page' => $postsPg,
                            'category_name' => $categoria,
                            'paged' => $pagina,                
                            'orderby' => 'date',
                            'order' => 'DESC',                                    
                        ];

                        if (!empty($busca)) {        
                            $argsPosts['s'] = $busca;
                            $argsPosts['posts_per_page'] = -1;
                        }

                        $posts = get_posts($args);

                        if(count($posts) >= 1){
                        ?>
                            <ul class="post-masonary-content">
                                <?php
                                foreach ($posts as $post) {
                                    $post = get_post( $post->post_id );
                                    $category_detail=get_the_category($post->ID);//$post->ID
                                    $img = getImage($post->ID, 'thumb_blog');
                                    $link = home_url() . '/blog/' . $post->post_name;
                                    $date = $post->post_date;
                                    $data = date('d', strtotime($date)) . ' de ' . $meses[date('m', strtotime($date))].' de '.date('Y', strtotime($date));
                                ?>
                                    <li class="single_post">
                                        <a href="<?php echo $link;?>">
                                            <img src="<?php echo $img;?>" alt="" />
                                            <div class="cont">
                                                <span class="categoria_tema">Categoria</span>
                                                <p><?= $category_detail[1]->name ?></p>
                                                <span class="post-title"><?php echo $post->post_title;?></span>
                                                <p class="post_list_date"><?php echo $data;?></p>
                                                <p class="resumo_post"><?php echo $post->post_excerpt;?></p>
                                                <div class="ler_mais_container">
                                                    <div class="border"></div>
                                                    <span class="ler_mais">Ler Mais</span>
                                                    <div class="border"></div>
                                                </div>
                                                <div class="social_share_list"><?php echo do_shortcode('[Sassy_Social_Share url="'. $link .'"]') ?></div>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <?php               
                                $baseUrlPg = home_url();                 
                                $prevUrlPg = $baseUrlPg.'/blog/pg/'.($pagina - 1);
                                $nextUrlPg = $baseUrlPg.'/blog/pg/'.($pagina + 1);
                                $maxPages = 10;
                                $argsAllPro = $args;
                                $argsAllPro['posts_per_page'] = -1;
                                $allPro = get_posts($argsAllPro);
                                $lastPg = ceil(count($allPro) / $postsPg);
                            ?>
                            <div class="base_paginacao paginacao_blog">
                                <ol>
                                    <?php if ($pagina > 1): ?>
                                    <li class="seta_pg prev">
                                        <a class="tra" href="<?php echo $prevUrlPg;?>">
                                                <i class="seta_left fa fa-chevron-left"></i>
                                            </a>
                                        </li>   
                                        <?php endif ?>
                                        
                                    <div class="blc_pgs">

                                        <?php for ($i= max(1, $pagina - $maxPages); $i <= min($pagina + $maxPages, $lastPg); $i++) {?>
                                            <?php
                                            if(!empty($busca)){
                                                $lkPg = $baseUrlPg.'/blog/pg/'.$i.'/?busca='.$busca;
                                            }else{
                                                $lkPg = $baseUrlPg.'/blog/pg/'.$i;
                                            }                                
                                                $lkPgStatus = "";
                                                if ($pagina == $i){
                                                    $lkPgStatus = "ativo";
                                                }
                                            ?>

                                            <li class="tra lk_pg <?php echo $lkPgStatus;?>">
                                                <a class="tra" href="<?php echo $lkPg;?>">
                                                    <?php echo $i;?>    
                                                </a>
                                            </li>
                                        <?php }?>
                                    </div>
                                    
                                    <?php if ($pagina < $lastPg): ?>
                                    <li class="seta_pg next">
                                        <a class="tra" href="<?php echo $nextUrlPg;?>">                                                
                                                <i class="seta_right fa fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    <?php endif ?>
                                </ol>
                            </div>                          
                        <?php
                        }else{
                            echo '<p class="empty">Nenhuma post encontrado...</p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="blog_sidebar">
                    <i class="fa fa-times close_categoria"></i>
                <span class="close_categoria"></span> 
                    <div class="blog_categorias">
                    <?php
                        $categories = get_terms( array(
                            'taxonomy' => 'category',
                            'hide_empty' => flase,
                        ) );
                        ?>
                        <div class="categorias">
                            <h2>categorias</h2>
                            <div class="container_categorias">
                                <?php                        
                                    foreach ($categories as $category): ?>
                                        <a href="<?= $url .'categoria/'. $category->slug ?>">
                                            <span>
                                            <?= $category->name ?>
                                            </span>
                                            <span>
                                            <?= $category->count ?>
                                            </span>
                                        </a>  
                                        <div class="category-separator"></div>                           
                                <?php endforeach; ?>
                            </div>
                        </div>                    
                    </div>
                    <div class="publicidade_img">                        
                        <img src="<?= $publicidade ?>" alt="" class="banner_sidebar_blog">
                    </div>
                    <div class="selo_blog">
                        <img src="<?= $selo_blog ?>" alt="" class="selo_30dias">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    jQuery('form.search_post').on('submit', function($){
        var busca = $(this).find('input[name="busca"]').val();
        var url = '<?php echo home_url() . '/blog/';?>';
        if(busca && busca != ''){
            url = url + '?busca=' + busca;
        }
        window.location.href = url;
    });
    </script>

<?php get_footer();?>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
if(jQuery(window).width() > 1200){
    jQuery('.post-masonary-content').masonry({
        itemSelector: '.single_post',
        columnWidth: 390
    });
}
</script>


