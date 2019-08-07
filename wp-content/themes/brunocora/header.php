<?php  do_action('before_wphead_after_init');?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
	<title><?php echo wp_title();?></title>

    <!-- FONTE DO SITE -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans+Mono|Montserrat:400,700" rel="stylesheet"> -->
	<?php wp_head();?>	
</head>
<?php
$URL_BASE = get_bloginfo('template_directory');
?>
<section class="section_header">
    <div class="header">
    	<div class="bg_header"></div>
        <div class="container">
        	<div class="header-container">		        
		       	<div class="menu">
		        	<ul>
						<div class="logo">
							<a href="<?php echo home_url();?>"><img src="<?php echo $URL_BASE . '/images/logo.png';?>" alt="" /></a>
		        		</div>	        
		        		<li class="consultoria"><a href="#consultoria">Consultoria</a></li>
		        		<li><a href="<?php echo home_url() . "#resultados";?>">Resultados</a></li>
		        		<li><a href="#planos">Planos</a></li>
		        		<li><a href="#faq">Faq</a></li>
		        		<li><a href="http://bruno.localhost/blog">Blog</a></li>
						<li class="area_aluno"><a href="">Area do Aluno</a></li>
						<li class="comecar_agora"><a href="">Começar Agora</a></li>
		        	</ul>
		        </div>        		        
        	</div>
        </div>
    </div>
	<div class="header_mobile">
		<div class="bg_header"></div>
		<div class="menu_mobile">
			<i class="fa fa-times close_menu"></i>
			<ul>
				<li class="consultoria"><a href="#consultoria">Consultoria</a></li>
				<li><a href="#resultados">Resultados</a></li>
				<li><a href="#planos">Planos</a></li>
				<li><a href="#faq">Faq</a></li>
				<li><a href="http://bruno.localhost/blog">Blog</a></li>
				<li class="area_aluno"><a href="">Area do Aluno</a></li>
				<li class="comecar_agora"><a href="">Começar Agora</a></li>					
			</ul>
		</div>
		<div class="container">
        	<div class="header-container">
				<div class="logo">
					<a href="<?php echo home_url();?>"><img src="<?php echo $URL_BASE . '/images/logo.png';?>" alt="" /></a>
				</div>	      
				<i class="fas fa-bars icon_menu_mobile"></i>
			</div>		
		</div>
    </div>
</section>