<?php
extract(shortcode_atts(array(
    'title' => '',
    'title_color' => '',
    'title_font_size' => '',
    'title_line_height' => '',

    'description' => '',
    'description_color' => '',

    'icon_type' => 'icon',
    'icon_list' => 'fontawesome',
    'icon_fontawesome' => '',
    'icon_material_design' => '',
    'icon_flaticon' => '',
    'icon_etline' => '',
    'icon_image' => '',
    'icon_color' => '',
    'icon_font_size' => '',
    'item_link' => '',
    'fc_primary_color' => '', 
    'fc_margin_botton' => '', 
    'fc_padding' => '',
    'fc_col_sameheight' => '',

    'animation' => '',
), $atts));

$icon_image_url = '';
if (!empty($icon_image)) {
    $attachment_image = wp_get_attachment_image_src($icon_image, 'full');
    $icon_image_url = $attachment_image[0];
}
$icon_name = "icon_" . $icon_list;
$icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$link = vc_build_link($item_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
?>
<div class="ct-fancybox-layout4 <?php echo esc_attr( $fc_col_sameheight.' '.$fc_primary_color.' '.$animation_classes ); ?>">
	<div class="ct-fancybox-inner" style="padding: <?php echo esc_attr( $fc_padding );?>; margin-bottom: <?php echo esc_attr( $fc_margin_botton );?>">
		<?php if(!empty($icon_image_url) && $icon_type == 'image' ) { ?>
            <div class="ct-fancybox-icon icon-image">
                <img class="icon-main" src="<?php echo esc_url( $icon_image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
            </div>
        <?php } else { ?>
            <?php if($icon_class):?>
                <div class="ct-fancybox-icon icon-font">
                    <i class="<?php echo esc_attr($icon_class); ?>" style="<?php if(!empty($icon_color)) { echo 'color:'.esc_attr($icon_color).';'; } if(!empty($icon_font_size)) { echo 'font-size:'.esc_attr($icon_font_size).'px;'; } ?>"></i>
                </div>
            <?php endif;?>
        <?php } ?>

        <div class="ct-fancybox-content">
            <?php if(!empty($title)) : ?>
                <h3 class="ct-fancybox-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } if(!empty($title_font_size)) { echo 'font-size:'.esc_attr($title_font_size).'px;'; } if(!empty($title_line_height)) { echo 'line-height:'.esc_attr($title_line_height).'px;'; } ?>">
                    <?php echo wp_kses_post( $title ); ?>
                </h3>
            <?php endif;?>
            <?php if(!empty($description)) : ?>
                <div class="ct-fancybox-desc" style="<?php if(!empty($description_color)) { echo 'color:'.esc_attr($description_color).';'; } ?>">
                    <?php echo wp_kses_post( $description ); ?>
                </div>
            <?php endif;?>
            
            <?php if(!empty($a_href)) : ?>
                <div class="ct-fancybox-more">
                    <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
                        <?php echo esc_html__('Read More', 'seomun');?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
	</div>
</div>