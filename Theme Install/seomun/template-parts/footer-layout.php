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
$footer_copyright = seomun_get_opt( 'footer_copyright' );
?>
<footer id="colophon" class="site-footer footer-layout1 bg-image">
    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <?php if (class_exists('ReduxFramework')) { ?>
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <?php seomun_footer_top(); ?>
                    </div>
                    <div class="border-bottom-footer"></div>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="copyright-content">
                <?php
                if ($footer_copyright) {
                    echo wp_kses_post($footer_copyright);
                } else {
                    echo wp_kses_post(''.esc_attr(date("Y")).' &copy; All rights reserved by <a target="_blank" href="https://themeforest.net/user/case-themes">CaseThemes</a>');
                } ?>
            </div>
        </div>
    </div>
</footer>