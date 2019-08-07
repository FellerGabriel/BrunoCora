<?php
$URL_BASE = get_bloginfo('template_directory');
?>
<section class="pg404">
	<?php get_header();?>
	<div class="bg_404"></div>
	<div class="container_404">
		<img class="img_404" src="<?php echo $URL_BASE . '/images/404-nao.png';?>">
		<form action="">
			<input type="e-mail" class="input_email" placeholder="O que você está procurando? Vamos tentar encontrar!">
			<input type="submit" class="input_submit" value="pesquisar">
		</form>
		<span>Desculpe!</span>
		<p>A página que você tentou acessar não existe ou aconteceu algum erro.</p>
		<a href="<?php echo home_url();?>"><i class="fas fa-home"></i>Ir para home</a>
	</div>
	</div>
</section>
