<?php
extract(shortcode_atts(array(
    'test_primary_color' => 'test-primary-color1',

    'testimonial_item2' => '',
), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'seomun-carousel' );
$html_id = cmsHtmlID('ct-testimonial-carousel');
extract(seomun_get_param_carousel($atts));
$testimonials = (array) vc_param_group_parse_atts($testimonial_item2);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );?>
<div class="grapper-testimonial <?php echo esc_attr( $test_primary_color );?>">
    <?php  if(!empty($testimonials)) : ?>
        <div id="<?php echo esc_attr($html_id);?>" class="ct-testimonial-layout2 owl-carousel" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
            <?php foreach ($testimonials as $key => $value) {
                $title = isset($value['title2']) ? $value['title2'] : '';
                $content = isset($value['content2']) ? $value['content2'] : '';
                $position = isset($value['position2']) ? $value['position2'] : '';
                $image = isset($value['image2']) ? $value['image2'] : '';
                $img_size = isset($value['img_size']) ? $value['img_size'] : '200x200';
                $img = wpb_getImageBySize( array(
                    'attach_id'  => $image,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="ct-testimonial-item">
                    <?php if(!empty($image)) : ?>
                        <div class="testimonial-featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($content)) : ?>
                        <div class="testimonial-content">
                            <?php echo wp_kses_post( $content ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($title)) : ?>
                        <h4 class="testimonial-title">
                            <?php echo esc_attr($title); ?>,
                            <?php if(!empty($position)) : ?>
                                <span class="testimonial-position">
                                    <?php echo esc_attr($position); ?>
                                </span>
                            <?php endif;?>
                        </h4>
                    <?php endif;?>
                </div>
            <?php } ?>
        </div>
    <?php endif;?>
</div>