<?php
    extract(shortcode_atts(array(
    'ct_list_fontsize' => '',                           
    'ct_list'         => '',               
    'style'            => 'left',
    'icon_list_color'  => '',
    'bg_icon_color' => '',
    'bg_icon_color_hv' => '',
), $atts));
$uqid = uniqid();

$ct_lists = array();
$ct_lists = (array) vc_param_group_parse_atts($ct_list);

$styles_list = array(
    'color' => $icon_list_color,
    'background' => $bg_icon_color,
);
$list_styles = '';
foreach ($styles_list as $key => $value) {
    if (!empty($value)) {
        $list_styles .= $key . ':' . $value . ';';
    }
}
?>
<div id="ct-list-<?php echo esc_attr($uqid);?>" class="ct-list-socials text-<?php echo esc_attr( $style ); ?>">
    <div class="ct-inline-css"  data-css="
        <?php if(!empty($bg_icon_color_hv)) : ?>
            #ct-list-<?php echo esc_attr($uqid);?> li a:hover {
                background: <?php echo esc_attr($bg_icon_color_hv); ?>;
            }
        <?php endif; ?>">
    </div>
    <ul>
        <?php foreach ($ct_lists as $key => $value) {
            $link = vc_build_link($value['icon_link']);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            ?>
        <?php $client_link = isset($value['client_link']) ? $value['client_link'] : '';?>
            <li class="item-social">
                <a <?php echo !empty($list_styles) ? 'style="' . esc_attr($list_styles) . '"' : '' ?> href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
                    <i class="<?php echo !empty($value['ct_list_item_icon'])? $value['ct_list_item_icon']:'fa fa-check' ?>" aria-hidden="true"></i>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>