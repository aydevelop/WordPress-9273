<?php 

add_action('wp_enqueue_scripts', 'fancy_scripts');
function fancy_scripts(){
    wp_enqueue_style('fancy-style', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
    
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true);
}

add_action( 'after_setup_theme', 'fancy_config', 0);
function fancy_config(){

    register_nav_menus( [
        'fancy_main_menu' => 'Top Menu',
        'fancy_footer_menu' => 'Footer Menu'
	]);

}