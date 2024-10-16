<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'post_ids'             => '',
    'img_size'             => '600x424',
    'el_class'             => '',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(cms_get_posts_of_grid('post', $atts));
extract(seomun_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'seomun-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-carousel ct-blog-carousel-layout1 owl-carousel <?php echo esc_attr($el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

    <?php
    if (is_array($posts)):
        foreach ($posts as $key => $post) {
            the_post(); 
            $img_id = get_post_thumbnail_id($post->ID);
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-carousel-item">
                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) { ?>
                    <div class="item-featured">
                        <a  href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                <?php } ?>
                <div class="item-body">
                    <span class="item-category"><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></span>
                    <h3 class="item-title" style="<?php if(!empty($item_title_color)) { echo 'color:'.esc_attr($item_title_color).';'; } ?>">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h3>
                    <?php echo seomun_archive_meta2($post->ID);?>
                </div>
            </div>
        <?php }
    endif; ?>
    
</div>