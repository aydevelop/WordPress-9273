<?php 

// Template Name: Home Page

?>

<?php get_header(); ?>

<div class="content-area">
    <main>
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