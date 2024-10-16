<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = seomun_get_opt( 'sticky_on', false );
$search_on = seomun_get_opt( 'search_on', false );
$cart_on = seomun_get_opt( 'cart_on', false );
$social_on = seomun_get_opt( 'social_on', false );
$hidden_sidebar_on = seomun_get_opt( 'hidden_sidebar_on', false );
$topbar_phone = seomun_get_opt( 'topbar_phone' );
$phone_result = preg_replace('#[+ () ]*#', '', $topbar_phone);
$topbar_email = seomun_get_opt( 'topbar_email' );
?>
<header id="masthead" class="header-main">
    <div id="header-wrap" class="header-layout2 fixed-height <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>">
        <div id="top-bar" class="topbar-header">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="box-topbar-info box-topbar-info-left">
                            <?php if(!empty($topbar_email)) : ?>
                                <a class="btn-topbar-email" href="mailto:<?php echo esc_attr( $topbar_email ); ?>"><i class="fa fa-envelope"></i><span><?php echo esc_attr( $topbar_email ); ?></span></a>
                            <?php endif; ?>
                            <?php if(!empty($topbar_phone)) : ?>
                                <a class="btn-topbar-mobile" href="tel:<?php echo esc_attr( $phone_result ); ?>"><i class="fa fa-phone"></i><span><?php echo esc_attr( $topbar_phone ); ?></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="box-topbar-info box-topbar-info-right">
                            <?php if(($social_on)) : ?>
                                <ul class="ct-socials">
                                    <?php get_template_part( 'template-parts/social' ); ?>
                                </ul>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-main" class="header-main">
            <div class="container">
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
                        <?php if($hidden_sidebar_on) : ?>
                            <span class="menu-right-item h-btn-sidebar"><i class="fa fa-bars"></i></span>
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