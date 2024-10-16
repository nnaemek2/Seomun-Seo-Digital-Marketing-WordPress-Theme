<?php
extract(shortcode_atts(array(
    'title' => '',
    'title_color' => '',
    'price' => '',
    'pricing_time' => '',
    'description' => '',
    'text_button' => '',
    'link_button' => '',
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
    'chose_active'=> 'cms-pri-item-normal',
    'animation' => '',
), $atts));
$icon_image_url = '';
if (!empty($icon_image)) {
    $attachment_image = wp_get_attachment_image_src($icon_image, 'full');
    $icon_image_url = $attachment_image[0];
}
$icon_name = "icon_" . $icon_list;
$icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
$link = vc_build_link($link_button);
$a_href = '';
$a_target = '_self';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
} 
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$description = (array) vc_param_group_parse_atts($description);
?>

<div class="ct-pricing-wrapper <?php echo esc_attr( $animation_classes ); ?>">
    <div class="ct-pricing-inner">
        <div class="ct-pricing-header">
            <?php if(!empty($title)) : ?>
                <h3 class="ct-pricing-title ct-subtitle" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>"><?php echo esc_attr($title);?></h3> 
            <?php endif;?>
            <?php if(!empty($icon_image_url) && $icon_type == 'image' ) { ?>
                <div class="ct-pricing-icon">
                    <img class="icon-main" src="<?php echo esc_url( $icon_image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
                </div>
            <?php } else { ?>
                <?php if($icon_class):?>
                    <div class="ct-pricing-icon">
                        <i class="<?php echo esc_attr($icon_class); ?>"></i>
                    </div>
                <?php endif;?>
            <?php } ?>
            <div class="ct-pricing-meta">
                <span class="ct-pricing-price">
                    <?php echo esc_attr($price);?>  
                </span>
                <span class="ct-pricing-time" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                    <?php echo esc_attr('/ '.$pricing_time);?>  
                </span>
            </div>
        </div>
        <div class="ct-pricing-body">
            <?php if(!empty($description)) : ?>
                <ul class="ct-pricing-content">
                    <?php foreach ($description as $key => $value) { 
                        $description_item = isset($value['description_item']) ? $value['description_item'] : '';
                        ?>
                        <li><?php echo esc_html($description_item); ?></li>
                    <?php } ?>
                </ul>
            <?php endif;?>
            <?php if(!empty($a_href)) : ?>
                <div class="ct-pricing-button <?php echo esc_attr( $chose_active );?>">
                    <a href="<?php echo esc_url($a_href);?>" target="<?php echo esc_attr( $a_target ); ?>">
                        <?php echo esc_html__('purchase now', 'seomun');?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>