<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'gap'                  => '30',
    'post_ids'             => '',
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 2,
    'col_xs'               => 1,
    'layout'               => 'basic',
    'pagination_type'      => 'loadmore',
    'filter'               => 'true',
    'filter_default_title' => 'All',
    'filter_alignment'     => 'center',
    'filter_title_color'   => 'secondary',
    'ft_margin_bottom'     => '',

    
    'img_size'             => '800x692',
    'custom_column'        => 'false',
    'ct_list_column'        => '',
    'el_parallax'   => 'false',
    'el_parallax_speed'   => '1.5',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
$tax = array();
extract(cms_get_posts_of_grid('portfolio', $atts));
$filter_default_title = !empty($filter_default_title) ? $filter_default_title : 'All';

$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$grid_sizer = "col-xl-{$col_lg} col-lg-{$col_md} col-md-{$col_sm} col-sm-{$col_xs} col-{$col_xs}";

$gap_item = intval($gap / 2);

wp_enqueue_style(
    'inline-style',
    get_template_directory_uri() . '/assets/css/inline-style.css'
);
$el_parallax_class = '';
$parallax_speed = '';
if(isset($el_parallax) && $el_parallax == 'true') {
    wp_enqueue_script('seomun-parallax');
    $el_parallax_class = 'el-parallax';
    $parallax_speed = 'data-speed='.$el_parallax_speed.'';
}
$grid_class = '';
if ($layout == 'masonry') {
    wp_enqueue_script('isotope');
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('seomun-isotope', get_template_directory_uri() . '/assets/js/isotope.ct.js', array('jquery'), '1.0.0', true);
    $grid_class = 'ct-grid-inner ct-grid-masonry row';
    if($pagination_type == 'loadmore' || $pagination_type === 'pagination') {
        $html_id = str_replace('-', '_', $html_id);
        wp_enqueue_script('ct-loadmore-grid', get_template_directory_uri() . '/assets/js/ct-loadmore-grid.js', array('jquery'), 'all', true);
        wp_localize_script('ct-loadmore-grid', 'ct_load_more_' . $html_id, array(
            'startPage' => $paged,
            'maxPages'  => $max,
            'total'     => $total,
            'perpage'   => $limit,
            'nextLink'  => $next_link,
            'layout'    => $layout
        ));
    }
} else {
    $grid_class = 'ct-grid-inner row';
}
$html_id_el = '#'.$html_id;
$custom_css = "
        $html_id_el .ct-grid-inner {
            margin: 0 -{$gap_item}px;
        }
        $html_id_el .ct-grid-inner .grid-item, $html_id_el .ct-grid-inner .grid-sizer {
            padding: {$gap_item}px;
        }";
if(function_exists("ct_inline_css")){
    ct_inline_css($custom_css);
}

$ct_list_columns = array();
$ct_list_columns = (array) vc_param_group_parse_atts( $ct_list_column );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-grid-portfolio-layout2 <?php echo esc_attr($el_parallax_class); ?>" <?php echo esc_attr($parallax_speed); ?>>

    <?php if ($filter == "true" and $layout == 'masonry'): ?>
        <div class="grid-filter-wrap filter-<?php echo esc_attr($filter_title_color); ?> align-<?php echo esc_attr($filter_alignment); ?>" <?php if(!empty($ft_margin_bottom)) : ?>style="margin-bottom: <?php echo esc_attr($ft_margin_bottom); ?>"<?php endif; ?>>
            <span class="filter-item active" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php $category_arr = explode('|', $category); ?>
                <?php $tax[] = $category_arr[1]; ?>
                <?php $term = get_term_by('slug',$category_arr[0], $category_arr[1]); ?>

                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?> animation-time" data-gutter="<?php echo esc_attr($gap_item); ?>">
        <?php if ($layout == 'masonry') : ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php endif; ?>
        <?php
        if (is_array($posts)):
            $sizes = explode(',',$img_size);
            $i = 0;
            foreach ($posts as $key => $post) {
                $default_size = end($sizes);
                if(!empty($sizes[$i])){
                    $default_size = $sizes[$i];
                }
                $img_id = get_post_thumbnail_id($post->ID);
                $img = wpb_getImageBySize( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $default_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class   = "grid-item col-xl-{$col_lg} col-lg-{$col_md} col-md-{$col_sm} col-sm-{$col_xs} col-{$col_xs}";
                if($custom_column == 'true' && !empty($ct_list_columns[$key])){
                    $key_custom_col_md = $ct_list_columns[$key]['custom_col_md'];
                    $key_custom_col_lg = $ct_list_columns[$key]['custom_col_lg'];
                    $custom_col_xs = 12 / $ct_list_columns[$key]['custom_col_xs'];
                    $custom_col_sm = 12 / $ct_list_columns[$key]['custom_col_sm'];
                    if($key_custom_col_md != '2col3') {
                        $custom_col_md = 12 / $key_custom_col_md;
                    } else {
                        $custom_col_md = '8';
                    }
                    if($key_custom_col_lg != '2col3') {
                        $custom_col_lg = 12 / $key_custom_col_lg;
                    } else {
                        $custom_col_lg = '8';
                    }
                    $item_class   = "grid-item col-xl-{$custom_col_lg} col-lg-{$custom_col_md} col-md-{$custom_col_sm} col-sm-{$custom_col_xs} col-{$custom_col_xs}";
                }
                $filter_class = cms_get_term_of_post_to_class($post->ID, array_unique($tax));
                $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
                $media_class = '';
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) {
                    $media_class = 'has-thumnail';
                } else {
                    $media_class = 'no-thumnail';
                }
                ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner">
                            <div class="item-featured">
                                 <a class="<?php echo esc_attr( $media_class ); ?>" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                 </a>
                            </div>
                            <div class="item-holder">
                                <div class="item-category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?>
                                </div>
                                <h3 class="item-title">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php $i++;
            }
        endif; ?>
    </div>

    <?php if ($layout == 'masonry' && $pagination_type == 'pagination') { ?>
        <div class="ct-grid-pagination">
            <?php seomun_posts_pagination(); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $layout == 'masonry' && $pagination_type == 'loadmore') { ?>
        <div class="ct-load-more text-center">
            <span class="btn btn-outline">
                <?php echo esc_html__('View More', 'seomun') ?>
            </span>
        </div>
    <?php } ?>

</div>