<?php
/**
 * Functions and definitions
 *
 * @package Seomun
 */

if (!function_exists('seomun_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function seomun_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain('seomun', get_template_directory() . '/languages');

        // Custom Header
        add_theme_support("custom-header");

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'seomun'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('seomun_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('post-formats', array(
            'gallery',
            'video',
        ));

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        /* Change default image thumbnail sizes in wordpress */
        update_option('thumbnail_size_w', 300);
        update_option('thumbnail_size_h', 300);
        update_option('thumbnail_crop', 1);
        update_option('medium_size_w', 413);
        update_option('medium_size_h', 455);
        update_option('medium_crop', 1);
        update_option('large_size_w', 900);
        update_option('large_size_h', 588);
        update_option('large_crop', 1);

        add_image_size( 'seomun-thumbnail', 200, 160, true );
        add_image_size( 'seomun-medium', 680, 456, true );
        add_image_size( 'seomun-gallery', 480, 430, true );
        add_image_size( 'archive-post', 800, 420, true );
        add_image_size( 'gallery-portfolio', 700, 700, true );
        add_image_size( 'gallery-portfolio-popup', 800, 600, true );

    }
endif;
add_action('after_setup_theme', 'seomun_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seomun_content_width()
{
    $GLOBALS['content_width'] = apply_filters('seomun_content_width', 640);
}

add_action('after_setup_theme', 'seomun_content_width', 0);

/**
 * Register widget area.
 */
function seomun_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'seomun'),
        'id'            => 'sidebar-blog',
        'description'   => esc_html__('Add widgets here.', 'seomun'),
        'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ));

    if(class_exists('Woocommerce')){
        register_sidebar(array(
            'name'          => esc_html__('Shop Sidebar', 'seomun'),
            'id'            => 'sidebar-shop',
            'description'   => esc_html__('Add widgets here.', 'seomun'),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></div></section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2><div class="widget-content-inner">',
        ));
    }

    $hidden_sidebar_on = seomun_get_opt( 'hidden_sidebar_on', false );
    if($hidden_sidebar_on) {
        register_sidebar(array(
            'name'          => esc_html__('Hidden Sidebar', 'seomun'),
            'id'            => 'sidebar-hidden',
            'description'   => esc_html__('Add widgets here.', 'seomun'),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }

    if (class_exists('ReduxFramework')) {
        register_sidebar(array(
            'name'          => esc_html__('Page Sidebar', 'seomun'),
            'id'            => 'sidebar-page',
            'description'   => esc_html__('Add widgets here.', 'seomun'),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ));
        
        $footer_top_column = seomun_get_opt( 'footer_top_column', '4' );
        for($i = 1 ; $i <= $footer_top_column ; $i++){
            register_sidebar(array(
                'name' => sprintf(esc_html__('Footer Top %s', 'seomun'), $i),
                'id'            => 'sidebar-footer-' . $i,
                'description'   => esc_html__('Add widgets here.', 'seomun'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="footer-widget-title">',
                'after_title'   => '</h2>',
            ));
        }
    }
}

add_action('widgets_init', 'seomun_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function seomun_scripts()
{
    $theme = wp_get_theme(get_template());

    wp_enqueue_style('seomun-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0');
    wp_enqueue_style('seomun-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0');
    wp_enqueue_style('seomun-font-awesome1', get_template_directory_uri() . '/assets/css/font-awesome5.min.css', array(), '4.7.0');
    wp_enqueue_style('seomun-font-awesome2', get_template_directory_uri() . '/assets/css/font-awesome5-shims.min.css', array(), '4.7.0');
    wp_enqueue_style('seomun-font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0');
    wp_enqueue_style('seomun-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style('seomun-themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), '1.0.0');
    wp_enqueue_style('seomun-font-etline-icon', get_template_directory_uri() . '/assets/css/et-line.css', array(), '1.0.0');
    wp_enqueue_style('seomun-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0');
    wp_enqueue_style('seomun-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme->get('Version'));
    wp_enqueue_style('seomun-menu', get_template_directory_uri() . '/assets/css/menu.css', array(), $theme->get('Version'));
    wp_enqueue_style('seomun-style', get_stylesheet_uri());
    wp_enqueue_style('seomun-google-fonts', seomun_fonts_url());
    wp_enqueue_script('seomun-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('seomun-nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array( 'jquery' ), 'all', true);
    wp_enqueue_script('seomun-enscroll', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), 'all', true);
    wp_enqueue_script('seomun-match-height', get_template_directory_uri() . '/assets/js/match-height-min.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script('seomun-sidebar-fixed', get_template_directory_uri() . '/assets/js/sidebar-scroll-fixed.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('seomun-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme->get('Version'), true);
    wp_register_script('seomun-carousel', get_template_directory_uri() . '/assets/js/ct-carousel.js', array('jquery'), $theme->get('Version'), true);
    wp_register_script('seomun-counter-lib', get_template_directory_uri() . '/assets/js/counter.min.js', array('jquery'), $theme->get('Version'), true);
    wp_register_script('seomun-counter', get_template_directory_uri() . '/assets/js/ct-counter.js', array('jquery'), $theme->get('Version'), true);
    $smoothscroll = seomun_get_opt( 'smoothscroll', false );
    if(isset($smoothscroll) && $smoothscroll) {
        wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), 'all', true);
    }
    wp_localize_script('seomun-main','main_data',array('ajax_url'=>admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'seomun_scripts');

/* add editor styles */
function seomun_add_editor_styles()
{
    add_editor_style('editor-style.css');
}

add_action('admin_init', 'seomun_add_editor_styles');

/* add admin styles */
function seomun_admin_style()
{
    $theme = wp_get_theme(get_template());
    wp_enqueue_style('seomun-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
    wp_enqueue_style('font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style('themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), '1.0.0');
    wp_enqueue_style('font-etline-icon', get_template_directory_uri() . '/assets/css/et-line.css', array(), '1.0.0');
}

add_action('admin_enqueue_scripts', 'seomun_admin_style');

/**
 * Helper functions for this theme.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Theme options
 */
require_once get_template_directory() . '/inc/theme-options.php';

/**
 * Page options
 */
require_once get_template_directory() . '/inc/page-options.php';

/**
 * CSS Generator.
 */
if (!class_exists('CSS_Generator')) {
    require_once get_template_directory() . '/inc/classes/class-css-generator.php';
}

/**
 * Breadcrumb.
 */
require_once get_template_directory() . '/inc/classes/class-breadcrumb.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/* Load list require plugins */
require_once( get_template_directory() . '/inc/require-plugins.php' );

/* Load lib Font */
require_once get_template_directory() . '/inc/libs/fontawesome.php';
require_once get_template_directory() . '/inc/libs/materialdesign.php';
require_once get_template_directory() . '/inc/libs/flaticon.php';
require_once get_template_directory() . '/inc/libs/etline.php';
require_once get_template_directory() . '/inc/libs/themify.php';

/**
 * Custom params & remove VC Elements.
 */

function seomun_vc_after_init()
{

    vc_remove_element("vc_button");
    vc_remove_element("vc_button2");
    vc_remove_element("vc_cta_button");
    vc_remove_element("vc_cta_button2");
    vc_remove_element("vc_cta");
    vc_remove_element("vc_cta");
    vc_remove_element("vc_tabs");
    vc_remove_element("vc_tour");
    vc_remove_element("vc_accordion");
    require_once ( get_template_directory() . '/vc_elements/ct_custom_vc_pagram.php' );

}

add_action('vc_after_init', 'seomun_vc_after_init');

/**
 * Add new elements for VC
 */
function seomun_vc_elements()
{

    if (class_exists('CmsShortCode')) {

        cms_require_folder('vc_elements', get_template_directory());
    }
}

add_action('vc_before_init', 'seomun_vc_elements');

/**
 * Additional widgets for the theme
 */
require_once get_template_directory() . '/widgets/widget-recent-posts.php';
require_once get_template_directory() . '/widgets/widget-getintouch.php';
require_once get_template_directory() . '/widgets/widget-social.php';
if(class_exists('Newsletter')) {
    require_once get_template_directory() . '/widgets/widget-newsletter.php';
}
require_once get_template_directory() . '/widgets/class.widget-extends.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/extends.php';


/**
 * Add custom class in Row Visual Composer
 */
function seomun_vc_shortcode_css_class( $classes, $settings_base, $atts )
{
    $classes_arr = explode( ' ', $classes );

    if ( 'vc_row' == $settings_base ) {
        if ( $atts['ct_row_class'] ) {
            $classes_arr[] = $atts['ct_row_class'];
        }
        if ( $atts['bg_image_position'] ) {
            $classes_arr[] = $atts['bg_image_position'];
        }
    }

    if ( 'vc_column' == $settings_base ) {
        if ( $atts['ct_column_class'] ) {
            $classes_arr[] = $atts['ct_column_class'];
        }
    }

    if ( 'vc_column' == $settings_base ) {
        if ( $atts['ct_column_offset'] ) {
            $classes_arr[] = $atts['ct_column_offset'];
        }
    }

    if ( 'vc_column' == $settings_base ) {
        if ( $atts['ct_column_bd_bottom'] ) {
            $classes_arr[] = $atts['ct_column_bd_bottom'];
        }
    }

    if ( isset($atts['animation_column']) && $atts['animation_column'] ) {
        wp_enqueue_script( 'waypoints' );
        wp_enqueue_script( 'vc_waypoints' );
        wp_enqueue_style( 'vc_animate-css' );
        $classes_arr[] = 'wpb_animate_when_almost_visible '.' wpb_'.$atts['animation_column'].' '.$atts['animation_column'];
    }

    if ( 'vc_column_inner' == $settings_base ) {
        if ( $atts['ct_column_inner_class'] ) {
            $classes_arr[] = $atts['ct_column_inner_class'];
        }
    }

    if ( 'vc_single_image' == $settings_base ) {
        if ( $atts['ct_image_align'] ) {
            $classes_arr[] = $atts['ct_image_align'];
        }
        if ( $atts['ct_image_align_md'] ) {
            $classes_arr[] = $atts['ct_image_align_md'];
        }
    }

    if ( 'vc_column_text' == $settings_base ) {
        if ( $atts['text_align'] ) {
            $classes_arr[] = $atts['text_align'];
        }
    }

    return implode( ' ', $classes_arr );
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'seomun_vc_shortcode_css_class', 10, 3 );
}


if ( ! function_exists( 'seomun_fonts_url' ) ) :
    /**
     * Register Google fonts.
     *
     * Create your own seomun_fonts_url() function to override in a child theme.
     *
     * @since league 1.1
     *
     * @return string Google fonts URL for the theme.
     */
    function seomun_fonts_url()
    {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        if ( 'off' !== _x( 'on', 'Rubik font: on or off', 'seomun' ) )
        {
            $fonts[] = 'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i';
        }

        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'seomun' ) )
        {
            $fonts[] = 'Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;
/**
 * User Social custom fields.
 */
add_action( 'show_user_profile', 'seomun_user_fields' );
add_action( 'edit_user_profile', 'seomun_user_fields' );
function seomun_user_fields($user){

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
    $user_skype = get_user_meta($user->ID, 'user_skype', true);
    $user_google = get_user_meta($user->ID, 'user_google', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
    $user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
    $user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
    $user_rss = get_user_meta($user->ID, 'user_rss', true);
    $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_yelp = get_user_meta($user->ID, 'user_yelp', true);

    ?>
    <h3><?php esc_html_e('Social', 'seomun'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'seomun'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'seomun'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'seomun'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'seomun'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_google"><?php esc_html_e('Google', 'seomun'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'seomun'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'seomun'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'seomun'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_rss"><?php esc_html_e('Rss', 'seomun'); ?></label></th>
            <td>
                <input id="user_rss" name="user_rss" type="text" value="<?php echo esc_attr(isset($user_rss) ? $user_rss : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'seomun'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'seomun'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'seomun'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}


/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

/* Favicon */
function seomun_site_favicon(){
    
    $favicon = seomun_get_opt( 'favicon' );
    
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}
add_action('wp_head', 'seomun_site_favicon');

/* Create Demo Data */
add_filter('ct_ie_export_mode', 'seomun_enable_export_mode');
function seomun_enable_export_mode()
{
    return false;
}

/**
 * Menu Item Active on Archive
 */
function seomun_additional_active_item_classes( $classes = array(), $menu_item = false ) {
    if(class_exists('Woocommerce')){
        $shop_page_ID = get_option( 'woocommerce_shop_page_id' );
        if ( $menu_item->object_id === $shop_page_ID && is_post_type_archive( 'product' ) ) {
            $classes[] = 'current-menu-item';
        }
        return $classes;
    }
}
if(class_exists('Woocommerce')){
    add_filter( 'nav_menu_css_class', 'seomun_additional_active_item_classes', 10, 2 );
}