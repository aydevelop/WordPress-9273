<?php 

// Template Name: Home Page

?>

<?php get_header(); ?>

<div class="content-area">
    <main>
        <section class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-9 m-auto">
                        <div class="flexslider">
                            <ul class="slides">

                            <?php
                                for($i=1; $i<=3; $i++){
                                    $slider_pages[$i] = get_theme_mod('set_slider_page' . $i);
                                    $slider_button_text[$i] = get_theme_mod('set_slider_button_text' . $i);
                                    $slider_button_url[$i] = get_theme_mod('set_slider_button_url' . $i);
                                }

                                $args = array(
                                    'post_type' => 'page',
                                    'posts_per_page' => 3,
                                    'post__in' => $slider_page
                                );

                                $q = 0;
                                $slider_loop = new WP_Query($args);
                                if($slider_loop->have_posts()){
                                    while($slider_loop->have_posts()){
                                            $slider_loop->the_post();
                                            $q++;
                                        ?>
                                        
                                            <li>
                                                <a href="<?php echo $slider_button_url[$q]  ?>">
                                                    <img src="<?php echo get_template_directory_uri() . "/img/ezgif.com-gif-maker.png"; ?>" />
                                                </a>
                                                <div class="container">
                                                    <div class="subtitle text-center">
                                                        <?php the_title(); ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php  
                                    }
                                }

                                wp_reset_postdata();
                            ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <?php 
            $popular_limit = get_theme_mod('set_popular_max_num', 4);
            $arrivals_limit = get_theme_mod('set_arrivals_max_num', 4);

        ?>

        <section class="popular-products">
           <div class="container">
                <div class="section-title">
                    <h2><?php esc_html_e("Popular Products","fancy_theme") ?></h2>
                </div>
                <?php 
                   echo do_shortcode('[products limit="'.$popular_limit.'" columns="4" orderby="popularity"]');
                ?>
           </div>
        </section>

        <section class="popular-products">
           <div class="container">
                <div class="section-title">
                    <h2><?php esc_html_e("New Arrivals","fancy_theme") ?></h2>
                </div>
                <?php 
                   echo do_shortcode('[products limit="'.$arrivals_limit.'" columns="4" orderby="date"]');
                ?>
           </div>
        </section>

        <?php 
            $showdeal = get_theme_mod('set_deal_show', 0);
            $deal = get_theme_mod('set_deal');
            $currency = get_woocommerce_currency_symbol();
            $regular = get_post_meta($deal, '_regular_price', true);
            $sale = get_post_meta($deal, '_sale_price', true);
           

            if($showdeal == 1 && (!empty($deal))){
                $discount_precentage = absint( 100 - ($sale/$regular)*100 );
        ?>

            <div class="deal-of-the-week">
                <div class="container">
                <div class="section-title">
                    <h2><?php esc_html_e("Deal of the Week", "fancy_theme") ?></h2>
                </div>
                    
                        <div class="row d-flex align-items-center">
                                <div class="deal-img col-md-6 col-12 ml-auto text-center">
                                    <?php echo get_the_post_thumbnail($deal, 
                                    'large', array('class'=>'img-fluid')); ?>
                                </div>
                                <div class="deal-desc col-md-4 col-12 mr-auto text-center">
                                    <div class="discount">
                                        <?php echo $discount_precentage . '% OFF'; ?>
                                    </div>
                                    <h3>
                                        <a href="<?php echo get_permalink($deal); ?>"><?php echo get_the_title($deal); ?></a>
                                    </h3>
                                    <p>
                                        <?php echo get_the_excerpt($deal); ?>
                                    </p>
                                </div>
                        </div>         
                    
                </div>
            </div>

            <?php } ?>

        <section class="lab-blog">
            <div class="container">
                <div class="section-title">
                    <h2><?php esc_html_e("News From Our Blog", "fancy_theme") ?></h2>
                </div>
                <div class="row mt-3">
                    <?php

                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 2
                        );

                        $blog_posts = new WP_Query( $args );

                        if($blog_posts->have_posts()){
                            while($blog_posts->have_posts()){
                                $blog_posts->the_post();
                                ?>
                                    <article class="col-12 col-md-6">
                                        <?php 
                                            if(has_post_thumbnail()){
                                                the_post_thumbnail(
                                                    'fancy-blog',
                                                    array('class'=>'img-fluid')
                                                );
                                            }
                                        ?>
                                        <h3>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>  
                                        <div><?php the_excerpt(); ?></div>
                                    </article>
                                <?php 
                            }
                        }else{
                            ?>
                                <p>Nothing to display</p>
                            <?php  
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>