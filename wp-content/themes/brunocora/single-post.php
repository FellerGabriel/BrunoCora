<?php get_header();?>

<?php
$URL_BASE = get_bloginfo('template_directory');
$idPg = get_option( 'page_for_posts' );
$url =  home_url() . '/blog/';
$imgDestaque = get_field('imagem_destaque', $post);
$categoria = (get_query_var('categoria') && get_query_var('categoria') != '') ? get_query_var('categoria') : '';
$publicidade = get_field('publicidade_blog', $idPg);
$selo_blog = get_field('selo_30_dias_blog', $idPg);
$img = getImage($post->ID, 'thumb_destaques_blog');
$autor = get_field('autor', $post);
$busca = get_query_var('busca');
$pagina = get_query_var('pg');
if (empty($pagina)) {
    $pagina = 1;
}
$busca = (isset($_GET['busca']) && $_GET['busca'] != '') ? $_GET['busca'] : '';
?>
    <div class="page-posts">
        <div class='search_blog'>
            <div class="container blog_search_content">
                <h2>Blog de consultoria fitness <br/> <span>do bruno corá</span></h2>
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
                <div class="single_post">
                    <div class="container">       
                        <div class="cont">
                            <div class="single_post_img">
                                <img src="<?php echo $imgDestaque;?>" alt="" class="featured" />
                            </div>            
                            <div class="title_post">
                                <h1><?php echo $post->post_title;?></h1>
                            </div>
                            <div class="breadcrumbs">
                                <div class="container">                
                                    <div class="published_data_post">
                                    <?php 
                                    if($autor != ""){
                                        echo '<i class="fa fa-user"></i> '.$autor." - "; 
                                    }
                                    $post_date = get_the_date('d-m-Y', $post->ID );
                                    $data = $post_date;
                                    $data = strtotime($data);
                                    $dia = date('d', $data);
                                    $mes = date('M', $data);
                                    $ano = date('Y', $data);
                                    $mes_extenso = array(
                                        'Jan' => 'Janeiro',
                                        'Feb' => 'Fevereiro',
                                        'Mar' => 'Março',
                                        'Apr' => 'Abril',
                                        'May' => 'Maio',
                                        'Jun' => 'Junho',
                                        'Jul' => 'Julho',
                                        'Aug' => 'Agosto',
                                        'Nov' => 'Novembro',
                                        'Sep' => 'Setembro',
                                        'Oct' => 'Outubro',
                                        'Dec' => 'Dezembro'
                                    );
                                    $data = $dia . ' de ' . $mes_extenso["$mes"] .' de '. $ano;
                                    echo $data;                                                            
                                    ?>
                                    </div>
                                </div>
                            </div>                            
                            <div class="content">
                                <?php echo nl2br(do_shortcode($post->post_content));?>
                            </div>        
                            <div class="social_share_list"><?php echo do_shortcode('[Sassy_Social_Share url="'. $link .'"]') ?></div>
                        </div>
                        
                    </div>
                </div>
                <div class="blog_sidebar">
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




