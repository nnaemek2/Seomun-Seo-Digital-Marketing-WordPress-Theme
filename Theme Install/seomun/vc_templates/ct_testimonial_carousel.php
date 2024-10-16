<?php
extract(shortcode_atts(array(
    'title1' => '',
    'title2' => '',
    'title3' => '',
    'test_primary_color' => 'test-primary-color1',

    'testimonial_item' => '',
), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'seomun-carousel' );
$html_id = cmsHtmlID('ct-testimonial-carousel');
extract(seomun_get_param_carousel($atts));
$testimonials = (array) vc_param_group_parse_atts($testimonial_item);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );?>
<div class="grapper-testimonial <?php echo esc_attr( $test_primary_color );?>">
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
    </div>
    <?php  if(!empty($testimonials)) : ?>
        <div id="<?php echo esc_attr($html_id);?>" class="ct-testimonial-layout1 owl-carousel" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
            <?php foreach ($testimonials as $key => $value) {
                $title = isset($value['title']) ? $value['title'] : '';
                $test_star = isset($value['test_star']) ? $value['test_star'] : '';
                $content1 = isset($value['content1']) ? $value['content1'] : '';
                $content = isset($value['content']) ? $value['content'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $img_size = isset($value['img_size']) ? $value['img_size'] : '200x200';
                $img = wpb_getImageBySize( array(
                    'attach_id'  => $image,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="ct-testimonial-item">
                    <div class="ct-icon">
                        <i class="fa fa-quote-left"></i>
                    </div>
                    <div class="grid-item-inner">
                        <?php if(!empty($image)) : ?>
                            <div class="testimonial-featured">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($test_star)) : ?>
                            <span class="testimonial-star <?php echo esc_attr( $test_star ); ?>"></span>
                        <?php endif; ?>
                        <?php if(!empty($content1)) : ?>
                            <div class="testimonial-description1">
                                <?php echo wp_kses_post( $content1 ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($content)) : ?>
                            <div class="testimonial-description2">
                                <?php echo wp_kses_post( $content ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($title)) : ?>
                            <h4 class="testimonial-title">
                                <?php echo esc_attr($title); ?>
                            </h4>
                        <?php endif;?>
                        <?php if(!empty($position)) : ?>
                            <div class="testimonial-position">
                                <?php echo esc_attr($position); ?>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php endif;?>
</div>