<?php
extract(shortcode_atts(array(                  
    'ct_list_fontsize' => '',                  
    'ct_list_lineheight' => '',                  
    'ct_list_color'   => '',                  
    
    'ct_list'         => '',                  
    'ct_list_item'    => '',
    'font_weight'      => '',               
    'style'            => 'list1',
    'icon_list_color'  => '',             
), $atts));

$ct_lists = array();
$ct_lists = (array) vc_param_group_parse_atts($ct_list);

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
<div class="ct-list-info style-<?php echo esc_attr( $style ); ?>">
    <ul>
        <?php foreach ($ct_lists as $key => $value) {?>
            <li <?php echo !empty($list_styles) ? 'style="' . esc_attr($list_styles) . '"' : '' ?>>
                <i <?php if(!empty( $icon_list_color )):?> style="color: <?php echo esc_attr( $icon_list_color )?>"<?php endif;?> class="<?php echo !empty($value['ct_list_item_icon'])? $value['ct_list_item_icon']:'fa fa-check' ?>" aria-hidden="true"></i>
                <?php echo esc_html($value['ct_list_item']); ?>
            </li>
        <?php } ?>
    </ul>
</div>