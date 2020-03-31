<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="page" class="site">
        <header>
            <section class="search">
                <div class="container">
                    <?php get_search_form(); ?>
                </div>
            </section>
            <section class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="brand col-md-3 col-12 col-lg-2 text-center text-md-left">
            
                            <?php if(has_custom_logo()){ ?>
                                <a href="<?php echo home_url('/')?>">
                                    <?php the_custom_logo(); ?>
                                </a>
                            <?php }else{ ?>
                                <p class="site-title">
                                    <?php bloginfo('title'); ?>
                                </p>
                                <span>
                                    <?php bloginfo('description'); ?>
                                </span>
                            <?php } ?>
                        </div>
                        <div class="second-column col-md-9 col-12 col-lg-10">
                            <div class="row">
                                <div class="account col-12">
                                    <div class="cart text-right">
                                        <div class="navbar-expand">
                                            <div class="navbar-nav float-left ml-2 text-dark">
                                                <?php if(is_user_logged_in()){ ?>
                                                    <li>
                                                        <a href="<?php  echo  esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="nav-link">My Account</a>
                                                    </li> 
                                                    <li>
                                                        <a href="<?php  echo  esc_url(wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id')))); ?>" class="nav-link">Logout</a>
                                                    </li>
                                                <?php }else{ ?>
                                                    <a href="<?php  echo  esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="nav-link">Login/Register</a>
                                                <?php } ?>
                                            </div> 
                                        </div>
                                        <div class="cart text-right">
                                            <a href="<?php echo wc_get_cart_url(); ?>"><span class="cart-icon"></span>
                                            <span class="items">
                                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                                            </span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
                                            
                                            <button class="ml-auto navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                        
                                                <?php
                                                wp_nav_menu( array(
                                                    'theme_location'    => 'fancy_main_menu',
                                                    'depth'             => 2,
                                                    'container'         => 'div',
                                                    'container_class'   => 'collapse navbar-collapse',
                                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                                    'menu_class'        => 'nav navbar-nav',
                                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                                    'walker'            => new WP_Bootstrap_Navwalker(),
                                                ) );
                                                ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>


