<?php
/*
Plugin Name: Image Content Show Hover
Plugin URI: http://danielriera.net/plugins-wp/image-hover-content
Description: Show content at hover image.
Author: Daniel Riera
Version: 1.0.1
Author URI: http://danielriera.net
Text Domain: image-hover-content
*/
function IMGSTYHOV_imgaddStylePlugin() {
	wp_register_style( 'IMGSTYHOV__estilos', plugins_url('css/estilo.css', __FILE__ ));
	wp_enqueue_style( 'IMGSTYHOV__estilos' );	
}

function IMGSTYHOV_imgimage($atributosIMG, $contenidoIMGHover) {
extract(shortcode_atts(array('style' => 'width:auto;','link' => '#','image' => '', 'corners'=>"no", 'text' => ''), $atributosIMG));
	if($link!="#") {
		$irA = 'href="'.$link.'"';	
	}else { $irA = ""; }
	if($corners=="yes") {
		$esquinas_style = "esquinas";	
	}else { $esquinas_style = "";}
$salida = '<div class="marco '.$esquinas_style.'" style="'.$style.'">
	<a '.$irA.'>
		<img src="'.$image.'" />
		<div class="textoSecundario">'.$text.'</div>
		<div class="explicacion">
		'.$contenidoIMGHover.'
		</div>
	</a>
</div>';
return $salida;
}
add_shortcode('image_hover', 'IMGSTYHOV_imgimage');
add_action( 'wp_enqueue_scripts','IMGSTYHOV_imgaddStylePlugin');