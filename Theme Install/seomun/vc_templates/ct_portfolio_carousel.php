<?php
$atts_extra = shortcode_atts(array(
    'title1'               => '',
    'title2'               => '',
    'title3'               => '',
    'port_description'     => '',

    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'post_ids'             => '',
    'img_size'             => '600x424',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(cms_get_posts_of_grid('portfolio', $atts));
extract(seomun_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'seomun-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>
<div class="grapper-portfolio">
    <div class="ct-group-title">
        <?php if($title1):?>
            <h4 class="ct-port-title-1">
                <span class="ct-line-color"></span><?php echo wp_kses_post( $title1 );?>
            </h4>
        <?php endif;?>
        <?php if($title2):?>
            <h3 class="ct-port-title-2">
                <?php echo wp_kses_post( $title2 );?>
            </h3>
        <?php endif;?>
        <?php if($title3):?>
            <h2 class="ct-port-title-3">
                <?php echo wp_kses_post( $title3 );?>
            </h2>
        <?php endif;?>
        <?php if($port_description):?>
            <div class="ct-description">
                <?php echo wp_kses_post( $port_description );?>
            </div>
        <?php endif;?>

    </div>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-carousel ct-portfolio-carousel owl-carousel" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
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
                            <div class="item-holder">
                                <div class="item-category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ', ' ); ?>
                                </div>
                                <h3 class="item-title">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                </h3>
                            </div>
                        <?php } ?>
                    </div>
                <?php }
            endif; 
        ?>
    </div>
</div>