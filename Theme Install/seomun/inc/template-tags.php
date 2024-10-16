<?php
/**
 * Custom template tags for this theme.
 *
 * @package Seomun
 */

/**
 * Header layout
 **/
function seomun_page_loading()
{
    $page_loading = seomun_get_opt( 'show_page_loading', false );
    $loading_type = seomun_get_opt( 'loading_type', 'style1');
    if($page_loading) { ?>
        <div id="ct-loadding" class="ct-loader <?php echo esc_attr($loading_type); ?>">
            <?php switch ( $loading_type )
            {
                case 'style2': ?>
                    <div class="ct-spinner2"></div>
                    <?php break;

                case 'style3': ?>
                    <div class="ct-spinner3">
                      <div class="double-bounce1"></div>
                      <div class="double-bounce2"></div>
                    </div>
                    <?php break;

                case 'style4': ?>
                    <div class="ct-spinner4">
                      <div class="rect1"></div>
                      <div class="rect2"></div>
                      <div class="rect3"></div>
                      <div class="rect4"></div>
                      <div class="rect5"></div>
                    </div>
                    <?php break;

                case 'style5': ?>
                    <div class="ct-spinner5">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
                    <?php break;

                case 'style6': ?>
                    <div class="ct-cube-grid">
                      <div class="ct-cube ct-cube1"></div>
                      <div class="ct-cube ct-cube2"></div>
                      <div class="ct-cube ct-cube3"></div>
                      <div class="ct-cube ct-cube4"></div>
                      <div class="ct-cube ct-cube5"></div>
                      <div class="ct-cube ct-cube6"></div>
                      <div class="ct-cube ct-cube7"></div>
                      <div class="ct-cube ct-cube8"></div>
                      <div class="ct-cube ct-cube9"></div>
                    </div>
                    <?php break;

                case 'style7': ?>
                    <div class="ct-folding-cube">
                      <div class="ct-cube1 ct-cube"></div>
                      <div class="ct-cube2 ct-cube"></div>
                      <div class="ct-cube4 ct-cube"></div>
                      <div class="ct-cube3 ct-cube"></div>
                    </div>
                    <?php break;

                case 'style8': ?>
                    <div class="ct-loading-stairs">
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-ball"></div>
                    </div>
                    <?php break;

                default: ?>
                    <div class="loading-spin">
                        <div class="spinner">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                        <div class="spinner color-2" style="">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                    </div>
                    <?php break;
            } ?>
        </div>
    <?php }
}

/**
 * Header layout
 **/
function seomun_header_layout()
{
    $header_layout = seomun_get_opt( 'header_layout', '1' );
    $custom_header = seomun_get_page_opt( 'custom_header', '0' );

    if ( is_page() && $custom_header == '1' )
    {
        $page_header_layout = seomun_get_page_opt('header_layout');
        $header_layout = $page_header_layout;
        if($header_layout == '0') {
            return;
        }
    }

    get_template_part( 'template-parts/header-layout', $header_layout );
}

/**
 * Page title layout
 **/
function seomun_footer()
{
    $footer_layout = seomun_get_opt( 'footer_layout', '1' );
    $custom_footer = seomun_get_page_opt('custom_footer', 'false');
    $footer_layout_page = seomun_get_page_opt('footer_layout');
    if($custom_footer) {
        $footer_layout = $footer_layout_page;
    }
    get_template_part( 'template-parts/footer-layout', $footer_layout );
}

/**
 * Set primary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function seomun_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-8 col-lg-8 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-8 col-lg-8 col-md-12 col-sm-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"'; 
    }
}

/**
 * Set secondary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function seomun_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12 col-sm-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function seomun_breadcrumb()
{
    if ( ! class_exists( 'CMS_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new CMS_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="ct-breadcrumb">%s</ul>', wp_kses_post($output));
    }
}


function seomun_entry_link_pages()
{
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
}


if ( ! function_exists( 'seomun_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function seomun_entry_excerpt( $length = 55 )
    {
        $cms_the_excerpt = get_the_excerpt();
        if(!empty($cms_the_excerpt)) {
            echo esc_html($cms_the_excerpt);
        } else {
            echo wp_kses_post(seomun_get_the_excerpt( $length ));
        }
    }
endif;

/**
 * Prints post edit link when applicable
 */
function seomun_entry_edit_link()
{
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                esc_attr__( 'Edit', 'seomun' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<div class="entry-edit-link"><i class="fa fa-edit"></i>',
        '</div>'
    );
}


/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function seomun_posts_pagination( $query = null )
{
    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = get_query_var( 'paged' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = get_query_var( 'page' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = '<i class="fa fa-angle-double-left"></i>';
    $html_next = '<i class="fa fa-angle-double-right"></i>';
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    ) );

    $template = '
    <nav class="navigation posts-pagination">
        <div class="posts-page-links">%2$s</div>
    </nav>';

    if ( $links )
    {
        printf(
            wp_kses_post($template),
            esc_attr__( 'Navigation', 'seomun' ),
            wp_kses_post($links)
        );
    }
}

/**
 * Prints archive meta on blog
 */
if ( ! function_exists( 'seomun_archive_meta' ) ) :
    function seomun_archive_meta() {
        $archive_author_on = seomun_get_opt( 'archive_author_on', false );
        $archive_categories_on = seomun_get_opt( 'archive_categories_on', false );
        $archive_comments_on = seomun_get_opt( 'archive_comments_on', true );
        $archive_date_on = seomun_get_opt( 'archive_date_on', true );
        $archive_tags_on = seomun_get_opt( 'archive_tags_on', true );
        if($archive_author_on || $archive_comments_on || $archive_categories_on || $archive_date_on) : ?>
            <ul class="entry-meta">
                <?php if($archive_date_on) : ?>
                    <li><span><?php echo get_the_date(); ?></span></li>
                <?php endif; ?>
                <?php if($archive_comments_on) : ?>
                    <li>
                        <i class="fa fa-comments"></i>
                        <a href="<?php the_permalink(); ?>"><?php echo comments_number(esc_attr__('No Comments', 'seomun'),esc_attr__('1 Comment', 'seomun'),esc_attr__('% Comments', 'seomun')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if($archive_author_on) : ?>
                    <li class="item-author">
                        <i class="fa fa-user"></i>
                        <?php echo esc_html__( 'By', 'seomun' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($archive_categories_on) : ?>
                    <li class="item-category"><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
                <?php endif; ?>
            </ul>
    <?php endif; }
endif;
/**
 * Prints post meta on blog Shortcode
 */
if ( ! function_exists( 'seomun_archive_meta2' ) ) :
    function seomun_archive_meta2() {?>
        <ul class="entry-meta">
            <li>
                <a href="<?php the_permalink(); ?>">
                    <i class="fa fa-comments"></i>
                    <?php echo comments_number(esc_attr__('No Comments', 'seomun'),esc_attr__('1 Comment', 'seomun'),esc_attr__('% Comments', 'seomun')); ?>
                </a>
            </li>
            <li class="item-author">
                <i class="fa fa-user"></i>
                <?php echo esc_html__( 'By', 'seomun' ) ?>
                <?php the_author_posts_link(); ?>
            </li>
        </ul>
<?php } endif;

//Apply for ct blog layout3
if ( ! function_exists( 'seomun_archive_meta3' ) ) :
    function seomun_archive_meta3() {?>
        <ul class="entry-meta">
            <li class="item-comment">
                <a href="<?php the_permalink(); ?>">
                    <i class="fa fa-comments"></i>
                    <?php echo comments_number(esc_attr__('No Comments', 'seomun'),esc_attr__('1 Comment', 'seomun'),esc_attr__('% Comments', 'seomun')); ?>
                </a>
            </li>
            <li class="item-share">
                <div class="item-label">
                    <i class="fac fa-share"></i>
                    <label class="label"><?php echo esc_html__('5 Share', 'seomun'); ?></label>
                </div>
                <?php echo seomun_socials_share_default2();?>
            </li>
        </ul>
<?php } endif;
/**
 * Prints post meta on blog
 */
if ( ! function_exists( 'seomun_post_meta' ) ) :
    function seomun_post_meta() {
        $post_author_on = seomun_get_opt( 'post_author_on', false );
        $post_categories_on = seomun_get_opt( 'post_categories_on', false );
        $post_comments_on = seomun_get_opt( 'post_comments_on', true );
        $post_date_on = seomun_get_opt( 'post_date_on', true );
        if($post_author_on || $post_categories_on || $post_comments_on || $post_date_on) : ?>
            <ul class="entry-meta">
                <?php if($post_date_on) : ?>
                    <li>
                        <span>
                            <i class="fa fa-calendar"></i>
                            <?php echo get_the_date(); ?>
                        </span>
                    </li>
                <?php endif; ?>
                <?php if($post_author_on) : ?>
                    <li class="item-author">
                        <i class="fa fa-user"></i>
                        <?php echo esc_html__( 'by', 'seomun' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($post_comments_on) : ?>
                    <li><i class="fac fa-comment"></i>
                        <a href="<?php the_permalink(); ?>"><?php echo comments_number(esc_attr__('No Comments', 'seomun'),esc_attr__('1 Comment', 'seomun'),esc_attr__('% Comments', 'seomun')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if($post_categories_on) : ?>
                    <li class="item-category">
                        <i class="fa fa-list"></i>
                        <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                    </li>
                <?php endif; ?>
                <?php if(is_sticky()) { ?>
                    <li><?php echo esc_html__('Sticky', 'seomun'); ?></li>
                <?php } ?>
            </ul>
    <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'seomun_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function seomun_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Releted Tags', 'seomun').'</label>', ' ' );
        if ( $tags_list )
        {
            echo '<div class="entry-tags">';
            printf('%2$s', '', $tags_list);
            echo '</div>';
        }
    }
endif;

/**
 * List socials share for post.
 */
function seomun_socials_share_default() { ?>
    <div class="entry-social">
        <label class="label"><?php echo esc_html__('Social Share', 'seomun'); ?></label>
        <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'seomun'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'seomun'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="g-social" title="<?php echo esc_attr__('Google Plus', 'seomun'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'seomun'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
        <a class="email-social" title="<?php echo esc_attr__('Email', 'seomun'); ?>" href="mailto:contact@example.com?subject=<?php the_title(); ?>&body=Check out this site <?php the_permalink(); ?>"><i class="zmdi zmdi-email"></i></a>
    </div>
    <?php
}

function seomun_socials_share_default2() { ?>
    <div class="entry-social">
        <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'seomun'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'seomun'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="g-social" title="<?php echo esc_attr__('Google Plus', 'seomun'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'seomun'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
        <a class="email-social" title="<?php echo esc_attr__('Email', 'seomun'); ?>" href="mailto:contact@example.com?subject=<?php the_title(); ?>&body=Check out this site <?php the_permalink(); ?>"><i class="zmdi zmdi-email"></i></a>
    </div>
    <?php
}

function seomun_socials_share_portfolio() { ?>
    <div class="entry-social">
        <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'seomun'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'seomun'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="g-social" title="<?php echo esc_attr__('Google Plus', 'seomun'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'seomun'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
        <a class="email-social" title="<?php echo esc_attr__('Email', 'seomun'); ?>" href="mailto:contact@example.com?subject=<?php the_title(); ?>&body=Check out this site <?php the_permalink(); ?>"><i class="zmdi zmdi-email"></i></a>
    </div>
    <?php
}
/**
 * Footer Top
 */
function seomun_footer_top() {
    $footer_top_column = seomun_get_opt( 'footer_top_column' );
    $_class = "";

    switch ($footer_top_column){
        case '2':
            $_class = 'col-xl-6 col-lg-6 col-md-6 col-sm-12';
            break;
        case '3':
            $_class = 'col-xl-4 col-lg-4 col-md-4 col-sm-12';
            break;
        case '4':
            $_class = 'col-xl-3 col-lg-3 col-md-6 col-sm-12';
            break;
    }

    for($i = 1 ; $i <= $footer_top_column ; $i++){
        if ( is_active_sidebar( 'sidebar-footer-' . $i ) ){
            echo '<div class="ct-footer-item ' . esc_html($_class) . '">'; ?>
                <?php dynamic_sidebar( 'sidebar-footer-' . $i );
            echo "</div>";
        }
    }
}

/**
 * Footer Gallery
 */
function seomun_footer_gallery() {
    if (is_rtl()) {
        $carousel_rtl = 'true';
    } else {
        $carousel_rtl = 'false';
    }
    $footer_gallery = seomun_get_opt( 'footer_gallery', 'no' );
    $footer_gallery_images = seomun_get_opt( 'footer_gallery_images' );
    $footer_gallery_list = explode(',', $footer_gallery_images);
    if(!empty($footer_gallery_images)) {
        wp_enqueue_script( 'owl-carousel' );
        wp_enqueue_script( 'seomun-carousel' ); ?>
        <div class="ct-carousel owl-carousel images-light-box-carousel" data-item-xs="4" data-item-sm="6" data-item-md="8" data-item-lg="10" data-margin="0" data-loop="true" data-autoplay="true" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="<?php echo esc_attr( $carousel_rtl ); ?>">
            <?php foreach ($footer_gallery_list as $img_id):
                ?>
                <div class="ct-carousel-item">
                    <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><img src="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'seomun-gallery'));?>" alt="<?php echo esc_attr(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) ?>"></a>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    <?php }
}

/**
* Display navigation to next/previous post when applicable.
*/
function seomun_post_nav_default() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="post-previous-next style-default">
            <div class="nav-links row clearfix">
                <div class="nav-link-prev col-md-6 col-sm-12">
                    <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                    <?php $url_prev = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'seomun-medium', false); ?>
                    <div class="nav-item-inner">
                        <span><?php echo esc_html_e('Previous Post', 'seomun') ?></span>
                        <?php if(!empty($url_prev)) : ?>
                            <div class="nav-item-image">
                                <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"></a>
                            </div>
                        <?php endif; ?>
                        <h3 class="title-link"><a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a></h3>
                    </div>
                    <?php } ?>
                </div>
                <div class="nav-link-next col-md-6 col-sm-12">
                    <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                    <?php $url_next = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'seomun-medium', false); ?>
                    <div class="nav-item-inner">
                        <span><?php echo esc_html_e('Next Post', 'seomun') ?></span>
                        <?php if(!empty($url_next)) : ?>
                            <div class="nav-item-image">
                                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"></a>
                            </div>
                        <?php endif; ?>
                        <h3 class="title-link"><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a></h3>
                    </div>
                    <?php } ?>
                </div>
            </div><!-- .nav-links -->
            <div class="nav-show-all">
                <a href="<?php echo esc_url(home_url('/post')); ?>">
                    <span class="nav-link-group nav-link-group-span1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>

                    <span class="nav-link-group nav-link-group-span2">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <span class="nav-link-group nav-link-group-span3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
            </div>
        </div>
    <?php }
}

function seomun_post_nav_portfolio() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="nav-links">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="nav-link-prev">
                    <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?>
                            <span><?php echo esc_html_e('Live Preview', 'seomun') ;?></span>
                    </a>
                </div>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="nav-link-next">
                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?>
                        <span><?php echo esc_html_e('Live Next', 'seomun') ?></span>
                    </a>
                </div>
            <?php } ?>
        </div><!-- .nav-links -->
    <?php }
}

/**
 * Related Post
 */
function seomun_related_post()
{
    global $post;
    $current_id = $post->ID;
    $posttags = get_the_category($post->ID);
    if (empty($posttags)) return;

    $tags = array();

    foreach ($posttags as $tag) {

        $tags[] = $tag->term_id;
    }
    $post_number = '3';
    $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
    $post_related_post = seomun_get_opt( 'post_related_post', false );
    if ($post_related_post && count($query_similar->posts) > 1) {
        ?>
        <div class="ct-related-post-wrap">
            <div class="container">
                <div class="ct-related-post">
                    <h3 class="section-title"><?php echo esc_html__('Similar Blog Posts', 'seomun'); ?></h3>
                    <div class="ct-related-post-inner row">
                        <?php foreach ($query_similar->posts as $post):
                            $thumbnail_url = '';
                            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'seomun-medium', false);
                            endif;
                            if ($post->ID !== $current_id) : ?>
                                <div class="grid-item col-xl-4 col-lg-4 col-md-4">
                                    <div class="grid-item-inner">
                                        <?php if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                                            <div class="item-featured">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="<?php the_title_attribute(); ?>" /></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="item-holder">
                                            <h3 class="item-title">
                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                            </h3>
                                            <div class="item-content">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words = 15, $more = null ); ?>
                                            </div>
                                            <?php echo seomun_archive_meta2($post->ID);?>
                                            <div class="item-readmore">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><?php echo esc_html__( 'Read more', 'seomun' ) ?><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    wp_reset_postdata();
}

/**
 * Header Search Mobile
 */
function seomun_header_mobile_search()
{
    $search_field_placeholder = seomun_get_opt( 'search_field_placeholder' );
    ?>
    <div class="header-mobile-search">
        <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
            <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_attr_e('Search Keywords...', 'seomun'); } ?>" name="s" class="search-field" />
            <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
<?php }

/**
 * Header Search Popup
 */
function seomun_popup_search()
{ 
    $search_on = seomun_get_opt( 'search_on', false );
    $search_field_placeholder = seomun_get_opt( 'search_field_placeholder' );
    if($search_on) : ?>
        <div class="ct-modal ct-search-popup">
            <div class="ct-close"></div>
            <div class="ct-modal-content">
                <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_attr_e('Search Keywords...', 'seomun'); } ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                </form>
                <div class="esc-search"><?php echo esc_html__( 'Press ESC key to close search', 'seomun' ) ?></div>
            </div>
        </div>
    <?php endif; ?>
<?php }

/**
 * Header Hidden Sidebar
 */
function seomun_hidden_sidebar()
{ 
    $hidden_sidebar_on = seomun_get_opt( 'hidden_sidebar_on', false );
    if($hidden_sidebar_on && is_active_sidebar( 'sidebar-hidden' )) : ?>
        <div class="ct-hidden-sidebar">
            <div class="ct-close"></div>
            <div class="ct-hidden-sidebar-inner">
                <?php dynamic_sidebar('sidebar-hidden'); ?>
            </div>
        </div>
    <?php endif; ?>
<?php }
/**
 * Page title layout
 **/
function seomun_page_title_layout()
{
    get_template_part( 'template-parts/page-title', '' );
}

/**
 * Social Top Bar
 */
function seomun_topbar_social_icon() {
    $social_facebook_url = seomun_get_opt( 'social_facebook_url' );
    $social_twitter_url = seomun_get_opt( 'social_twitter_url' );
    $social_inkedin_url = seomun_get_opt( 'social_inkedin_url' );
    $social_instagram_url = seomun_get_opt( 'social_instagram_url' );
    $social_google_url = seomun_get_opt( 'social_google_url' );
    $social_skype_url = seomun_get_opt( 'social_skype_url' );
    $social_pinterest_url = seomun_get_opt( 'social_pinterest_url' );
    $social_vimeo_url = seomun_get_opt( 'social_vimeo_url' );
    $social_youtube_url = seomun_get_opt( 'social_youtube_url' );
    $social_yelp_url = seomun_get_opt( 'social_yelp_url' );
    $social_tumblr_url = seomun_get_opt( 'social_tumblr_url' );
    $social_tripadvisor_url = seomun_get_opt( 'social_tripadvisor_url' );

    if(!empty($social_facebook_url)) :
        echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fa fa-facebook"></i></a>';
    endif;
    if(!empty($social_twitter_url)) :
        echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fa fa-twitter"></i></a>';
    endif;
    if(!empty($social_inkedin_url)) :
        echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    endif;
    if(!empty($social_instagram_url)) :
        echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fa fa-instagram"></i></a>';
    endif;
    if(!empty($social_google_url)) :
        echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    endif;
    if(!empty($social_skype_url)) :
        echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fa fa-skype"></i></a>';
    endif;
    if(!empty($social_pinterest_url)) :
        echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    endif;
    if(!empty($social_vimeo_url)) :
        echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fa fa-vimeo"></i></a>';
    endif;
    if(!empty($social_youtube_url)) :
        echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fa fa-youtube"></i></a>';
    endif;
    if(!empty($social_yelp_url)) :
        echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fa fa-yelp"></i></a>';
    endif;
    if(!empty($social_tumblr_url)) :
        echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fa fa-tumblr"></i></a>';
    endif;
    if(!empty($social_tripadvisor_url)) :
        echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fa fa-tripadvisor"></i></a>';
    endif;
}

/**
 * Social Top Bar
 */
function seomun_page_social_icon() {
    $social_facebook_url = seomun_get_page_opt( 'social_facebook_url' );
    $social_twitter_url = seomun_get_page_opt( 'social_twitter_url' );
    $social_inkedin_url = seomun_get_page_opt( 'social_inkedin_url' );
    $social_instagram_url = seomun_get_page_opt( 'social_instagram_url' );
    $social_google_url = seomun_get_page_opt( 'social_google_url' );
    $social_skype_url = seomun_get_page_opt( 'social_skype_url' );
    $social_pinterest_url = seomun_get_page_opt( 'social_pinterest_url' );
    $social_vimeo_url = seomun_get_page_opt( 'social_vimeo_url' );
    $social_youtube_url = seomun_get_page_opt( 'social_youtube_url' );
    $social_yelp_url = seomun_get_page_opt( 'social_yelp_url' );
    $social_tumblr_url = seomun_get_page_opt( 'social_tumblr_url' );
    $social_tripadvisor_url = seomun_get_page_opt( 'social_tripadvisor_url' );

    if(!empty($social_facebook_url)) :
        echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fa fa-facebook"></i></a>';
    endif;
    if(!empty($social_twitter_url)) :
        echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fa fa-twitter"></i></a>';
    endif;
    if(!empty($social_inkedin_url)) :
        echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    endif;
    if(!empty($social_instagram_url)) :
        echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fa fa-instagram"></i></a>';
    endif;
    if(!empty($social_google_url)) :
        echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    endif;
    if(!empty($social_skype_url)) :
        echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fa fa-skype"></i></a>';
    endif;
    if(!empty($social_pinterest_url)) :
        echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    endif;
    if(!empty($social_vimeo_url)) :
        echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fa fa-vimeo"></i></a>';
    endif;
    if(!empty($social_youtube_url)) :
        echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fa fa-youtube"></i></a>';
    endif;
    if(!empty($social_yelp_url)) :
        echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fa fa-yelp"></i></a>';
    endif;
    if(!empty($social_tumblr_url)) :
        echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fa fa-tumblr"></i></a>';
    endif;
    if(!empty($social_tripadvisor_url)) :
        echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fa fa-tripadvisor"></i></a>';
    endif;
}
/* Author Social */
function seomun_get_user_social() {

    $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
    $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
    $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
    $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
    $user_google = get_user_meta(get_the_author_meta( 'ID' ), 'user_google', true);
    $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
    $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
    $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
    $user_rss = get_user_meta(get_the_author_meta( 'ID' ), 'user_rss', true);
    $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
    $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
    $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

    ?>
    <ul class="user-social">
        <?php if(!empty($user_facebook)) { ?>
            <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="fa fa-facebook"></i></a></li>
       <?php } ?>
        <?php if(!empty($user_twitter)) { ?>
            <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="fa fa-twitter"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_linkedin)) { ?>
            <li><a href="<?php echo esc_url($user_linkedin); ?>"><i class="fa fa-linkedin"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_rss)) { ?>
            <li><a href="<?php echo esc_url($user_rss); ?>"><i class="fa fa-rss"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_instagram)) { ?>
            <li><a href="<?php echo esc_url($user_instagram); ?>"><i class="fa fa-instagram"></i></a></li> 
        <?php } ?>
        <?php if(!empty($user_google)) { ?>
            <li><a href="<?php echo esc_url($user_google); ?>"><i class="fa fa-google-plus"></i></a></li>  
        <?php } ?>
        <?php if(!empty($user_skype)) { ?> 
            <li><a href="<?php echo esc_url($user_skype); ?>"><i class="fa fa-skype"></i></a></li>   
        <?php } ?>
        <?php if(!empty($user_pinterest)) { ?>
            <li><a href="<?php echo esc_url($user_pinterest); ?>"><i class="fa fa-pinterest"></i></a></li>  
        <?php } ?>
        <?php if(!empty($user_vimeo)) { ?> 
            <li><a href="<?php echo esc_url($user_vimeo); ?>"><i class="fa fa-vimeo"></i></a></li>  
        <?php } ?>
        <?php if(!empty($user_youtube)) { ?>
            <li><a href="<?php echo esc_url($user_youtube); ?>"><i class="fa fa-youtube"></i></a></li> 
        <?php } ?> 
        <?php if(!empty($user_yelp)) { ?> 
            <li><a href="<?php echo esc_url($user_yelp); ?>"><i class="fa fa-yelp"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_tumblr)) { ?>
            <li><a href="<?php echo esc_url($user_tumblr); ?>"><i class="fa fa-tumblr"></i></a></li>  
        <?php } ?>

    </ul> <?php  
}

/**
 * Call To Action
 **/
function seomun_call_to_action()
{
    $cta = seomun_get_opt( 'cta', 'hide' );
    $cta_page = seomun_get_page_opt( 'cta_page', 'themeoption' );
    if(!empty($cta_page) && $cta_page != 'themeoption') {
        $cta = $cta_page;
    }
    $cta_image = seomun_get_opt( 'cta_image' );
    $cta_subtitle = seomun_get_opt( 'cta_subtitle' );
    $cta_title = seomun_get_opt( 'cta_title' );
    if ($cta == 'show') {
        if(!empty($cta_title) || !empty($cta_subtitle)) : ?>
            <div class="ct-cta bg-image" style="background-image: url(<?php echo esc_url($cta_image['url']); ?>);">
                <div class="ct-cta-inner">
                    <i class="flaticon-24-hours"></i>
                    <span><?php echo esc_attr($cta_subtitle); ?></span>
                    <h3><?php echo esc_attr($cta_title); ?></h3>
                </div>
            </div>
        <?php endif;
    }
}