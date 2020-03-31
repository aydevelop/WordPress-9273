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

                                $slider_loop = new WP_Query($args);
                                if($slider_loop->have_posts()){
                                    while($slider_loop->have_posts()){
                                            $slider_loop->the_post();
                                        ?>
                                            <li>
                                                <img src="https://cdn.shopify.com/s/files/1/0066/1769/4275/t/5/assets/ShopIMG-1-color-RGB-C-2019-Simple.png?v=9774215999303656515" />
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
        <hr>
        <section class="lab-blog">
            <div class="container">
                <div class="row">
                    <?php
                        if(have_posts()){
                            while(have_posts()){
                                the_post();
                                ?>
                                    <article>
                                        <h2><?php the_title(); ?></h2>  
                                        <div><?php the_content(); ?></div>
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