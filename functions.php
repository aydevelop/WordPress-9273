<?php 

add_action('wp_enqueue_scripts', 'fancy_scripts');
function fancy_scripts(){
    wp_enqueue_style('fancy-style', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
    
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true);

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i&display=swap');
}

add_action( 'after_setup_theme', 'fancy_config', 0);
function fancy_config(){

    register_nav_menus( [
        'fancy_main_menu' => 'Top Menu',
        'fancy_footer_menu' => 'Footer Menu'
    ]);

    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 255,
        'single_image_width' => 255,
        'product_grid' => array(
            'default_rows' => 10,
            'min_rows' => 5,
            'max_rows' => 10,
            'default_columns' => 1,
            'min_columns' => 1,
            'max_columns' => 1
        )
    ));

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }
}

function register_navwalker(){
	require_once get_template_directory() . '/php/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );