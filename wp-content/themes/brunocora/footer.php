<footer>
    <?php 
        $URL_BASE = get_bloginfo('template_directory');
    ?>
    <div class="container footer_container">
        <div class="info_contato">
            <a href="<?php echo home_url();?>"><img src="<?php echo $URL_BASE . '/images/logo_footer.png';?>" alt="" /></a>
            <p>Ainda restam dúvidas? Fale com a equipe de suporte no Whatsapp</p>
            <a href="tel:85 98605-6860">+55 85 98605-6860</a>
            <form action="">
                <input class="email_footer" type="text" name="email" placeholder="Seu E-mail">
                <input class="submit_footer" type="submit" value="Me Inscrever">
            </form>
        </div>
        <div class="blog_footer">
            <?php 
            $args = array(
                'numberposts' => 3
              );
               
              $latest_posts = get_posts( $args );
            ?>
            <h3 class="titulo_footer">Blog</h3>
            <ul>            
                <?php foreach($latest_posts as $post):?>
                <a href="<?= $post->guid; ?>">
                    <li class="post_footer">
                        <?php
                            $imgpost =  getImage($post->ID, 'thumb_blog');
                            $titlepost = $post->post_title;
                        ?>                     
                        <img class="imgpost_footer" src="<?= $imgpost ?>" alt="">
                        <h3 class="titlepost_footer"><?= $titlepost ?></h3>
                    </li>
                </a>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="instagram_footer">
            <div class="base_instagram">
                <?php
                $userId = '624273318';
                $accessToken = '624273318.cf02f29.b918db72fe714f0797cf510a5ca5e9e9';
                $get = file_get_contents(
                    'https://api.instagram.com/v1/users/'. $userId .'/media/recent/?access_token='. $accessToken . '&count=9'
                );
                $instaPhotos = json_decode($get);

                $instaFotos = array();
                foreach ($instaPhotos->data as $data){
                    $link = $data->link;
                    $img = $data->images->standard_resolution->url;
                    $instaFotos[] = array('link' => $link, 'img' => $img);
                }
                ?>
                <div class="titulo_footer">
                    <div class="container">
                        <h3>instagram</h3>		
                    </div>		
                </div>
                <ul class="fotos_instagram">
                    <?php foreach ($instaFotos as $foto) {?>                    
                        <li>
                            <a href="<?php echo $foto['link'];?>" target="_blank">
                                <img src="<?php echo $foto['img'];?>">
                            </a>
                        </li>
                    <?php }?>   
                </ul>	
            </div>
            <a class="ver_mais_insta" href="">Ver mais fotos</a>
        </div>

    </div>
    <div class="copyright">
        <p>@2019 copyright .all right reserved by crocodilo’s   i   termOS E CONDIÇÕES</p>
    </div>
</footer>
<?php wp_footer();?>
<div class="floater_video">
    <div class="overlay" onclick="fechaVideo();"></div>
    <div class="cont"></div>
</div>
