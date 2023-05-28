<?php
/*
* Plugin Name: Categories Colors
* Description: Plug in para cambiar de color los titulo de las categorías
* Author: Jesús López Velázquez
* Website: https://jesuslv2412.com
* Version: 1.0
* Text Domain: Add Colors Categories
*/


define('WP_DEBUG', true);

if( !defined('ABSPATH')){
	echo 'What are you trying todo!!!!';
	exit();
}

class ColorsCategories{

	public function __construct(){

		// Add Colors Categorie
		add_action('wp_head', array($this, 'add_colors_categories'));

		// Cargar Css
		add_action('wp_enqueue_scripts', array($this, 'load_assets'));
		
	}

	public function add_colors_categories()
	{
		if(is_home() || is_front_page()) { 
			
		}else if( in_category('nacional')){
			add_filter('the_title', 'add_css', 10, 2);
			function add_css($title, $id) {
			   $title = '<span class="cat-nacional">'.$title.'</span>';
			    return $title;
			}

		}else if(in_category('entretenimiento')){
			add_filter('the_title', 'add_css', 10, 2);
			function add_css($title, $id) {
			   $title = '<span class="cat-entretenimiento">'.$title.'</span>';
			    return $title;
			}
		}else if(in_category('tecnologia')){
			add_filter('the_title', 'add_css', 10, 2);
			function add_css($title, $id) {
			   $title = '<span class="cat-tecnologia">'.$title.'</span>';
			    return $title;
			}
		}else if(in_category('mascotas')){
			add_filter('the_title', 'add_css', 10, 2);
			function add_css($title, $id) {
			   $title = '<span class="cat-mascotas">'.$title.'</span>';
			    return $title;
			}
		}else if(in_category('deportes')){
			add_filter('the_title', 'add_css', 10, 2);
			function add_css($title, $id) {
			   $title = '<span class="cat-deportes">'.$title.'</span>';
			    return $title;
			}
		}
	}

	public function load_assets(){
		wp_enqueue_style(
			'simple_contact_form',
			plugin_dir_url( __FILE__ ). 'css/colors-categories.css',
			array(),
			1,
			'all'
		);
	}


}

new ColorsCategories;