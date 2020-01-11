<?php
get_header();
$idPg = get_queried_object_id();
?>

<div class="container home">
    <!-- BANNERS HOME -->
    <div class="slides">
        <ul>
            <?php
            $banners = get_field('banner_home', $idPg);
            foreach ($banners as $banner) : ?>
                <?php
                $imagem = $banner['imagem'];
                $imagem_responsiva = $banner['imagem_responsiva'];
                $link = $banner['link'];
                $video_id = $banner['video_id'];
                $texto_botao =  $banner['texto_botao'];
                ?>
                <?php  if($link != '' && $link != '#') : ?>
                    <?php $target = ($abrir_em == 'nova') ? 'target="_blank"' : ''; ?>
                    <?php if(!empty($video_id)): ?>
                        <a href="javascript:;" onclick="abreVideo(<?= "'" . $video_id . "'" ?>)">
                    <?php else:?>
                        <a href="<?= $link ?>" <?= $target ?>>
                    <?php endif ?>
                <?php endif; ?>
                    <img class="imagem_desktop" src="<?= $imagem ?>" alt="">
                    <img class="imagem_mobile" src="<?= $imagem_responsiva['url'] ?>" alt="">
                <?php if($link != '' && $link != '#') : ?>
                    <div class="botao_quero"><p><?= $texto_botao ?></p></div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>            
        </ul>
    </div>  

    <!-- NEWSLETTER HOME -->
    <div class="newsletter">
        <div class="container">
            <form class="form_newsletter" action="">
                <div class="texto_newsletter">
                    <span><strong>GANHE 10%OFF <br/></strong>NO SEU PLANO</span>
                </div>
                <div class="fields_newsletter">
                    <input type="text" placeholder="SEU NOME">
                    <input type="email" placeholder="SEU MELHOR E-MAIL">
                    <input type="tel" placeholder="WHATSAPP/TELEFONE">
                    <input type="submit" class="submit_newsletter" value="QUERO DESCONTO">
                </div>
            </form>
        </div>
    </div>  
    
    <!-- ENTENDA COMO FUNCIONA A CONSULTORIA -->       
    <div class="entenda_consultoria entenda_desktop">          
        <h2 id="consultoria">ENTENDA COMO FUNCIONA A <strong class="consultoria">CONSULTORIA</strong></h2>
        <?php $entenada_consultoria = get_field('entenda_consultoria', $idPg); ?>
        <?php if(count($entenada_consultoria) >= 1) : ?>
        <div class="colsultoria">
            <?php foreach($entenada_consultoria as $consultoria) : ?>
            <img class="imagem_desktop" src="<?= $consultoria['banner'] ?> " alt="">
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="entenda_consultoria entenda_mobile">          
        <h2 id="consultoria">ENTENDA COMO FUNCIONA A <strong class="consultoria">CONSULTORIA</strong></h2>
        <?php $entenada_consultoria = get_field('entenda_consultoria', $idPg); ?>
        <?php if(count($entenada_consultoria) >= 1) : ?>
        <div class="colsultoria">
            <?php foreach($entenada_consultoria as $consultoria) : ?>
            <img class="imagem_mobile" src="<?= $consultoria['banner_responsivo'] ?> " alt="">
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <!--  BONUS -->
    <div class="bonus bonus_desktop">
        <?php $bonus_array = get_field('bonus', $idPg); ?>
        <?php if(count($bonus_array) >= 1) : ?>
            <?php foreach($bonus_array as $bonus): ?>
            <div class="bonus_each">
                <img src="<?= $bonus['imagem_bonus']?>" alt="">                
                <p class="bonus_descricao"><?= $bonus['texto_bonus']?></p>
            </div>
            <?php endforeach ?>                
        <?php endif; ?>
   </div>

   <div class="bonus bonus_mobile">
        <?php $bonus_array = get_field('bonus_mobile', $idPg); ?>
        <?php if(count($bonus_array) >= 1) : ?>
            <?php foreach($bonus_array as $bonus): ?>
            <div class="bonus_each">
                <img src="<?= $bonus['imagem_bonus_mobile']?>" alt="">                
                <div class="bonus_each_text">
                    <span class="titulo"><?= $bonus['titulo_bonus_mobile']?></span>
                    <span class="texto"><?= $bonus['texto_bonus_mobile']?></span>
                </div>
            </div>
            <?php endforeach ?>                
        <?php endif; ?>
   </div>
</div>

    <!-- 30 DIAS  -->
    <?php
    $trinta_dias_texto1 = get_field('texto_30_dias_principal', $idPg); 
    $trinta_dias_texto2 = get_field('texto_30_dias_secundario', $idPg); 
    $trinta_dias_img = get_field('imagem_30_dias', $idPg); 
    ?>
    <?php if(count($trinta_dias_texto1) >= 1) : ?>
        <div class="bg_30_dias">
            <div class="container">
                <div class="trinta_dias trinta_dias_desktop">
                    <div class="trinta_dias_bloco1">
                        <p><?= $trinta_dias_texto1 ?></p>
                        <p class="texto_30_secundario"><?= $trinta_dias_texto2 ?></p>
                        <a href="" class="comecar_agora">quero Começar Agora</a>
                    </div>
                    <div class="trinta_dias_bloco2">
                        <img src="<?= $trinta_dias_img ?> " alt="">               
                    </div>            
                </div>
                <div class="trinta_dias trinta_dias_mobile">
                    <div class="trinta_dias_bloco2">
                        <img src="<?= $trinta_dias_img ?> " alt="">               
                    </div>            
                    <div class="trinta_dias_bloco1">
                        <p><?= $trinta_dias_texto1 ?></p>
                        <p class="texto_30_secundario"><?= $trinta_dias_texto2 ?></p>
                        <a href="" class="comecar_agora">quero Começar Agora</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $depoimentos = get_field('depoimentos', $idPg); ?>
<?php if(count($depoimentos) >= 1) : ?>
<div class="depoimentos_bg">
    <div class="container">
        <h2 id="resultados">depoimentos que <strong>comprovam resultados</strong></h2>
        <div class="depoimentos">            
            <?php foreach($depoimentos as $depoimento) : ?>
            <div class="depoimento_single">
                <video controls>
                    <source src="<?= $depoimento['video']['url']?>" type="video/mp4">
                </video>
                <p class="titulo_depoimento"><?= $depoimento['titulo_depoimento'] ?></p>
                <p><?= $depoimento['depoimento'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="container">
    <div class="planos">
        <h2 id="planos">Escolha seu <strong>Plano de consultoria</strong></h2>
        <?php $planos = get_field('planos', $idPg); ?>
        <?php if(count($planos) >= 1) : ?>
            <div class="planos_itens">
                <?php foreach($planos as $plano) : ?>                    
                    <div class="img_planos">
                        <img src="<?=  $plano['imagem'] ?>" alt="">
                        <a href="" class="comprar_agora">COMPRAR AGORA</a>
                    </div>
                    
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $faqs = get_field('faq', $idPg); ?>
<?php if(count($faqs) >= 1) : ?>
    <div class="bg_faq">
        <div class="container">        
            <h2 id="faq"><strong>dúvidas</strong> frequentes</h2>    
            <ul class="faq">
                <?php foreach($faqs as $faq) : ?>                    
                    <li class="perguntas_container">
                        <div>
                            <p class="pergunta"><?= $faq['pergunta'];?></p>
                            <p class="resposta"><?= $faq['resposta'];?></p>
                        </div>                    
                        <i class="fa fa-chevron-up"></i>
                    </li>    
                <?php endforeach; ?>
            </ul>    
            <a class="comacar_faq" href="">Quero Começar Agora</a>
        </div>
    </div>
<?php endif; ?>

<?php get_footer();?>