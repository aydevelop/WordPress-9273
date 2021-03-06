        <hr>
        <footer>
            <section class="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php dynamic_sidebar('fancy-sidebar-3'); ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="copyright-text col-12 col-md-6">
                            <p>
                                <?php echo get_theme_mod('set_copyright') ?>
                            </p>
                        </div>
                        <nav class="footer-menu col-12 col-md-6 text-left text-md-right">
                            <?php 
                                wp_nav_menu(
                                    ['theme_location' => 'fancy_footer_menu']
                                );
                            ?>
                        </nav>
                    </div>
                </div>
            </section>
        </footer>
    </div>
    <?php wp_footer(); ?>                            
</body>
</html>