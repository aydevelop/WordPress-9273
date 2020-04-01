<?php get_header(); ?>

<div class="content-area">
    <main>
        <section class="news">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <div class="text-center">
                        <h2>Page not found</h2>
                    </div>
                    <?php the_widget( 'WP_Widget_Recent_Posts'); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>