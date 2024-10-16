<?php
extract(shortcode_atts(array(
    'client_item' => '',
), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'seomun-carousel' );
$html_id = cmsHtmlID('ct-client-carousel');
extract(seomun_get_param_carousel($atts));
$clients = (array) vc_param_group_parse_atts($client_item);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );?>
<div class="grapper-client">
    <?php  if(!empty($clients)) : ?>
        <div id="<?php echo esc_attr($html_id);?>" class="ct-client-layout1 owl-carousel" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
            <?php foreach ($clients as $key => $value) {
                $image = isset($value['image']) ? $value['image'] : '';
                $img_size = isset($value['img_size']) ? $value['img_size'] : 'full';
                $img = wpb_getImageBySize( array(
                    'attach_id'  => $image,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="ct-client-item">
                    <div class="client-featured">
                        <?php if(!empty($image)) : ?>
                            <?php echo wp_kses_post($thumbnail); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php endif;?>
</div>