<?php
extract(shortcode_atts(array(
    'lists' => '',
    'font_size' => '',
    'text_color' => '',
    'icon_color' => '',

    'animation' => '',
), $atts));


$lists = (array) vc_param_group_parse_atts($lists);
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>
<ul id="<?php echo esc_attr($atts['html_id']);?>" class="ct-list">
    <div class="ct-inline-css"  data-css="<?php if( !empty($icon_color)) : ?>
            #<?php echo esc_attr($atts['html_id']);?>.ct-list .ct-list-item:before {
               background-color: <?php echo esc_attr($icon_color); ?>!important;
            }
    <?php endif; ?>">
        
    </div>
    <?php foreach ($lists as $key => $value) { 
        $content = isset($value['content']) ? $value['content'] : '';
        $key_number = $key + 1;
        ?>
        <li class="ct-list-item <?php echo esc_attr($animation_classes); ?>">
            <?php echo wp_kses_post( $content ); ?>
        </li>
    <?php } ?>
</ul>