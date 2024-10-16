<?php
/**
 * Template part for displaying default footer layout
 */
$rf_class = '';
if (class_exists('ReduxFramework')) {
    $rf_class = 'rf-active';
} else {
    $rf_class = 'rf-no-active';
}

$footer_top_logo = seomun_get_opt( 'footer_top_logo', array( 'url' => '', 'id' => '' ) );
$footer_top_logo_url = $footer_top_logo['url'];

$footer_content = seomun_get_opt( 'footer_content' );
$f_social_of = seomun_get_opt( 'f_social_of', true );
?>
<footer id="colophon" class="site-footer footer-layout2 bg-image">
    <div class="bottom-footer">
        <div class="container">
            <div class="footer-logo">
                <?php if ($footer_top_logo_url) {
                    printf(
                        '<a class="logo-footer" href="%1$s" title="%2$s" rel="home"><img src="%3$s"/></a>',
                        esc_url( home_url( '/' ) ),
                        esc_attr( get_bloginfo( 'name' ) ),
                        esc_url( $footer_top_logo_url ),
                        esc_html__("Logo Footer",'seomun')
                    );
                } ?>    
            </div>
            <div class="footer-content">
                <?php
                if ($footer_content) {
                    echo wp_kses_post($footer_content);
                } else {
                    echo wp_kses_post('&copy; '.esc_attr(date("Y")).'. All rights reserved.');
                } ?>
            </div>
            <?php if($f_social_of):?>
                <div class="footer-socials">
                    <ul class="cms-social">
                        <?php get_template_part('template-parts/social-footer');?>        
                    </ul>
                </div>
            <?php endif;?>
        </div>
    </div>
</footer>