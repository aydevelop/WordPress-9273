<?php get_header(); ?>

<div class="content-area">
    <main>
        <div class="container">
            <div class="row">
                <?php
                    if(have_posts()){
                        while(have_posts()){
                            the_post();
                            ?>
                                <article class="col-12">
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
    </main>
</div>

<?php get_footer(); ?>