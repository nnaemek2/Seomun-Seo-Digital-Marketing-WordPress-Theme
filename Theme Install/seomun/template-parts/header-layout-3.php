<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = seomun_get_opt( 'sticky_on', false );
$search_on = seomun_get_opt( 'search_on', false );
$cart_on = seomun_get_opt( 'cart_on', false );
$social_on = seomun_get_opt( 'social_on', false );
$hidden_sidebar_on = seomun_get_opt( 'hidden_sidebar_on', false );

$h_btn_text =seomun_get_opt( 'h_btn_text' );
$h_btn_link_type =seomun_get_opt( 'h_btn_link_type', 'page' );
$h_btn_link =seomun_get_opt( 'h_btn_link' );
$h_btn_link_custom =seomun_get_opt( 'h_btn_link_custom' );
$h_btn_target =seomun_get_opt( 'h_btn_target', '_self' );
if($h_btn_link_type == 'page') {
    $h_btn_url = get_permalink($h_btn_link);
} else {
    $h_btn_url = $h_btn_link_custom;
}
?>
<header id="masthead" class="header-main">
    <div id="header-wrap" class="header-layout3 header-transparent fixed-height <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>">
        <div id="header-main" class="header-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="header-navigation">
                        <nav class="main-navigation">
                            <div class="main-navigation-inner">
                                <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                                <?php seomun_header_mobile_search(); ?>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                            </div>
                        </nav>
                    </div>
                    <div class="site-menu-right">
                        <?php if(class_exists('Woocommerce') && $cart_on) : ?>
                            <div class="menu-right-item menu-cart">
                                <span class="h-btn-cart"><i class="fa fa-shopping-cart"></i></span>
                                <div class="widget_shopping_cart">
                                    <div class="widget_shopping_title">
                                        <?php echo esc_html__( 'Shopping Cart', 'seomun' ); ?> <span class="cart-couter-items">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'seomun' ), WC()->cart->cart_contents_count ); ?>)</span>
                                    </div>
                                    <div class="widget_shopping_cart_content">
                                        <?php woocommerce_mini_cart(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($search_on) : ?>
                            <span class="menu-right-item h-btn-search"><i class="fa fa-search"></i></span>
                        <?php endif; ?>

                        <?php if($hidden_sidebar_on) : ?>
                            <span class="menu-right-item h-btn-sidebar"><i class="fa fa-bars"></i></span>
                        <?php endif; ?>
                        <?php if(!empty($h_btn_text)) : ?>
                            <div class="menu-right-item header-button-group">
                                <?php if(!empty($h_btn_text)) : ?>
                                    <a class="btn btn-default" href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><span><?php echo esc_attr( $h_btn_text ); ?></span></a>
                                <?php endif; ?>                        
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="menu-mobile-overlay"></div>
                </div>
            </div>
            <div id="main-menu-mobile">
                <?php if (class_exists('Woocommerce') && $cart_on) : ?>
                    <div class="mobile-menu-cart">
                        <span class="h-btn-cart"><i class="fa fa-shopping-cart"></i></span>
                        <div class="widget_shopping_cart">
                            <div class="widget_shopping_title">
                                <?php echo esc_html__( 'Shopping Cart', 'seomun' ); ?> <span class="cart-couter-items">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'seomun' ), WC()->cart->cart_contents_count ); ?>)</span>
                            </div>
                            <div class="widget_shopping_cart_content">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>