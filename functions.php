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

    $textdomain = "fancy_theme";
    load_theme_textdomain( $textdomain, get_stylesheet_directory() . "/languages/" );
    load_theme_textdomain( $textdomain, get_template_directory() . "/languages/" );

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
    add_theme_support( 'title-tag' );


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

add_action("widgets_init", "fancy_sidebars");
function fancy_sidebars(){
    register_sidebar(array(
        'name' => 'Fancy Main Sidebar',
        'id' => 'fancy-sidebar-1',
        'description' => 'Drag and drop your widgets here',
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Fancy Shop Sidebar',
        'id' => 'fancy-sidebar-2',
        'description' => 'Drag and drop your widgets here',
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Fancy Footer Sidebar',
        'id' => 'fancy-sidebar-3',
        'description' => 'Drag and drop your widgets here',
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}


add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 2;
	}
}