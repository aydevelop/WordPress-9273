<?php 

add_action('wp_enqueue_scripts', 'fancy_scripts');
function fancy_scripts(){
    wp_enqueue_style('fancy-style', get_stylesheet_uri(), array(), filemtime(get_template_directory().'/style.css'), 'all');
    
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true);

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i&display=swap');
    wp_enqueue_style('google-fonts-2', 'https://fonts.googleapis.com/css2?family=Seaweed+Script&display=swap');

    wp_enqueue_script('flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array('jquery'), '', true);
    wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '', 'all');
    wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array(), '', true);
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
    add_theme_support('custom-logo', array(
        'height' => 85,
        'width'  => 160,
        'flex_height' => true,
        'flex_width' => true
    ));

    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }

    add_image_size('fancy-slider', 1920, 400, array('center', 'center'));
    add_image_size('fancy-blog', 900, 300, array('center', 'center'));
}

function register_navwalker(){
    require_once get_template_directory() . '/php/class-wp-bootstrap-navwalker.php';
    require_once get_template_directory() . '/php/customizer.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
    <span class="items">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>

    <?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

add_action("woocommerce_after_shop_loop_item_title","the_excerpt",1);