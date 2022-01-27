<?php

if(!defined('REDIRECT_URL')){
	define( "REDIRECT_URL" , "https://jordiparadelo.com");
}

if(!function_exists('a_custom_redirect')){
	function a_custom_redirect(){
		header('Location:', REDIRECT_URL);
		die();
	}
}


if(!function_exists('a_theme_setup')){
	function a_theme_setup(){
		add_theme_support('post-thumbnails');
	}
	add_action('after_setup_theme' , 'a_theme_setup');
}

// ACF
if(class_exists('acf')){
	// ADD PAGES OF THEME SETTINGS
	// CUSTOM OPTIONS THEME SETTINGS
	if( function_exists('acc_add_options_page')){

		acf_add_options_page(array(
			'page_title' => "Theme Settings",
			'menu_title' => "Theme Settings",
			'menu_slug' => "theme-settings",
			'capability' => "edit_posts",
			'redirect' => true
		));

		acf_add_options_sub_page(array(
			'page_title' => "Theme General Settings",
			'menu_title' => "General",
			'parent_slug' => "theme-settings",
		));
	}
}

// ADD SVG TO WP
if(!function_exists('a_mime_types')){
	function a_mime_types($mimes){
		$mimes['svg'] = 'images/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes' , 'a_mime_types');
}

// REGISTER MENUES
if(!function_exists('a_custom_navigation_menus')){
	function a_custom_navigation_menus(){
		$loacations = array(
			'header_menu' => __("Header Menu" , 'wp-portfolio')
		);
		register_nav_menus( $loacations );
	}
	add_action( 'init' , 'a_custom_navigation_menus');
}

    