<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Seomun
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404">
                <div class="container">
                    <div class="row">
                        <div class="error-404-content col-12 text-center">
                            <h2><?php echo esc_html__( '404', 'seomun' ); ?></h2>
                            <h3><?php echo esc_html__( 'OOPS!', 'seomun' ); ?></h3>
                            <h4><?php echo esc_html__( 'Page Not Found', 'seomun' ); ?></h4>
                            <a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Back To Home', 'seomun'); ?></a>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
