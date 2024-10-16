<?php 
extract(shortcode_atts(array(
    'ct_progressbar_list' => '',
    'text_color'           => '',
    'font_size'            => '',
    'font_weight'          => '',
    'el_class'             => '',
    'bg_color'             => '',
    'bg_inner_color'       => '',

    //Value 
    'value_color'          => '',
    'value_font_size'      => '',

), $atts));
$html_id = cmsHtmlID('ct-progress');
$ct_progressbar = array();
$ct_progressbar = (array) vc_param_group_parse_atts($ct_progressbar_list);

$styles_title = array(
    'color'         => $text_color,
    'font-size'     => $font_size,
    'font-weight'   => $font_weight,
);
$title_styles = '';
foreach ($styles_title as $key => $value) {
    if (!empty($value)) {
        $title_styles .= $key . ':' . $value . ';';
    }
}

$styles_vl = array(
    'color'         => $value_color,
    'font-size'     => $value_font_size,
);
$vl_styles = '';
foreach ($styles_vl as $key => $value) {
    if (!empty($value)) {
        $vl_styles .= $key . ':' . $value . ';';
    }
}


if(!empty($ct_progressbar)) : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-progress-layout1 <?php echo esc_attr( $el_class); ?>">
        <?php foreach ($ct_progressbar as $key => $value) {
            $item_title = isset($value['item_title']) ? $value['item_title'] : '';
            $value = isset($value['value']) ? $value['value'] : '';?>
            <div class="ct-progress-item">
                <?php if($item_title):?>
                    <h3 class="ct-progress-title" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                        <?php echo apply_filters('the_title',$item_title);?>
                    </h3>
                <?php endif;?>
                <div class="ct-progress progress" <?php if(!empty( $bg_color )):?> style="background-color:<?php echo esc_attr( $bg_color ); ?>;" <?php endif;?>>
                    <div class="progress-bar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($value); ?>" <?php if(!empty( $bg_inner_color )):?> style="background-color:<?php echo esc_attr( $bg_inner_color ); ?>;" <?php endif;?>>
                        <span class="progressbar-update" <?php echo !empty($vl_styles) ? 'style="' . esc_attr($vl_styles) . '"' : '' ?>>
                            <?php echo esc_attr($value).'%';?>
                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php endif; ?>