<?php
extract(shortcode_atts(array(
    'id'        => '',
    'animation' => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

if(class_exists('WPCF7')) { ?>
    <div class="ct-contact-form layout2 <?php echo esc_attr( $animation_classes )?>">
        <div class="ct-contact-form-inner">
            <?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $id ).'"]'); ?>
        </div>
    </div>
<?php } ?>

