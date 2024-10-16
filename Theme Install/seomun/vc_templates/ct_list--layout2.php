<?php
extract(shortcode_atts(array(                  
    'ct_list_fontsize' => '',                  
    'ct_list_lineheight' => '',                  
    'ct_list_color'   => '',                  
    
    'lists2'         => '',                  
    'font_weight'      => '',               
    'style'            => 'list1',
    'icon_list_color'  => '',             
), $atts));

$lists2 = array();
$lists2 = (array) vc_param_group_parse_atts($lists2);

$styles_list = array(
    'color'          => $ct_list_color,
    'font-size'      => $ct_list_fontsize,
    'font-weight'    => $font_weight,
);
$list_styles = '';
foreach ($styles_list as $key => $value) {
    if (!empty($value)) {
        $list_styles .= $key . ':' . $value . ';';
    }
}

?>
<div class="ct-lists style-<?php echo esc_attr( $style ); ?>">
    <ul <?php echo !empty($list_styles) ? 'style="' . esc_attr($list_styles) . '"' : '' ?>>
        <?php foreach ($lists2 as $key => $value) {?>
            <li>
                <i <?php if(!empty( $icon_list_color )):?> style="color: <?php echo esc_attr( $icon_list_color )?>"<?php endif;?> class="<?php echo !empty($value['ct_item_icon'])? $value['ct_item_icon']:'fa fa-check' ?>" aria-hidden="true"></i>
                <?php echo esc_html($value['content2']); ?>
            </li>
        <?php } ?>
    </ul>
</div>