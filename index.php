<?php get_header(); ?>

<div class="content-area">
    <main>
        <section class="news">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <?php
                        if(have_posts()){
                            while(have_posts()){
                                the_post();
                                ?>
                                    <article <?php post_class(); ?>>
                                        <h2>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>  
                                        <div class="post-thumbnail text-center">
                                            <a href="<?php the_permalink(); ?>">
                                            <?php 
                                                if(has_post_thumbnail()){
                                                    the_post_thumbnail(
                                                        'fancy-blog',
                                                        array('class'=>'img-fluid')
                                                    );
                                                }
                                            ?>
                                            </a>
                                        </div>
                                        <div class="meta">
                                            <p>
                                                Published by 
                                                <?php the_author_posts_link(); ?>
                                                on
                                                <?php echo get_the_date(); ?>
                                                <?php  if(has_category()){ ?>
                                                    <br>
                                                    Categories: <span><?php the_category(' '); ?></span>
                                                <?php } ?>
                                                <?php if(has_tag()){ ?>
                                                    <br>
                                                    Tags: <span><?php the_tags('',', '); ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
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
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>