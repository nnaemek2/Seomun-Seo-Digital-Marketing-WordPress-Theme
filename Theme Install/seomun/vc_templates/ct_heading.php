<?php
extract(shortcode_atts(array(
    'text_source' => 'custom-text',
    'text' => '',
    'tag' => 'h3',
    'align_lg' => 'align-left',
    'align_md' => 'align-left-md',
    'align_sm' => 'align-left-sm',
    'align_xs' => 'align-left-xs',
    'divider' => 'none',

    'font_size' => '',
    'font_size_md' => '',
    'font_size_sm' => '',
    'font_size_xs' => '',

    'line_height' => '',
    'line_height_md' => '',
    'line_height_sm' => '',
    'line_height_xs' => '',

    'font_weight' => '',
    'text_transform' => '',
    'margin_top' => '',
    'margin_right' => '',
    'margin_bottom' => '',
    'margin_left' => '',
    'text_color' => '',

    //Sub Title
    'sub_title'          => '',
    'sub_font_size'      => '',
    'sub_line_height'    => '',
    'sub_color'          => '',
    'sub_text_transform' => '',
    'sub_margin_bottom'  => '',
    'sub_font_weight'    => '',

    //Des
    'description' => '',
    'des_color' => '',
    'des_font_size' => '',
    'des_margin_bottom' => '',
    'des_line_height' => '',

    'show_icon' => 'yes',

    'custom_fonts' => 'false',
    'google_fonts' => '',

    'animation' => '',

), $atts));

$inline_style = '';
if($custom_fonts == 'true') {
    // Build the data array
    $googleFontsParam = new Vc_Google_Fonts();
    $fieldSettings = array();
    $text_font_data = strlen( $google_fonts ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $google_fonts ) : '';

    // Build the inline style
    if(isset($text_font_data['values']['font_family'])) {
        $fontFamily = explode( ':', $text_font_data['values']['font_family'] );
        $styles[] = 'font-family:' . $fontFamily[0];
    }
    if(isset($text_font_data['values']['font_style'])) {
        $fontStyles = explode( ':', $text_font_data['values']['font_style'] );
        $styles[] = 'font-weight:' . $fontStyles[1];
        $styles[] = 'font-style:' . $fontStyles[2];
    }
    if(isset($text_font_data['values']['font_family']) || isset($text_font_data['values']['font_style'])) {
        foreach( $styles as $attribute ){
            $inline_style .= $attribute.'; ';
        }
    }
    // Enqueue the right font
    $settings = get_option( 'wpb_js_google_fonts_subsets' );
    if ( is_array( $settings ) && ! empty( $settings ) ) {
        $subsets = '&subset=' . implode( ',', $settings );
    } else {
        $subsets = '';
    }
    // We also need to enqueue font from googleapis
    if ( isset( $text_font_data['values']['font_family'] ) ) {
        wp_enqueue_style(
            'vc_google_fonts_' . vc_build_safe_css_class( $text_font_data['values']['font_family'] ),
            '//fonts.googleapis.com/css?family=' . $text_font_data['values']['font_family'] . $subsets
        );
    }
} else {
    $inline_style = '';
}

$styles_title = array(
    'margin-top'    => $margin_top.'px',
    'margin-right'  => $margin_right.'px',
    'margin-bottom' => $margin_bottom.'px',
    'margin-left'   => $margin_left.'px',
    'color'   => $text_color,
    'font-size'   => $font_size.'px',
    'line-height'   => $line_height.'px',
    'text-transform'   => $text_transform,
    'font-weight'   => $font_weight,
);
$title_styles = '';
foreach ($styles_title as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $title_styles .= $key . ':' . $value . ';';
    }
}

$styles_sub = array(
    'color'          => $sub_color,
    'font-size'      => $sub_font_size.'px',
    'line-height'    => $sub_line_height.'px',
    'text-transform' => $sub_text_transform,
    'margin-bottom'  => $sub_margin_bottom.'px',
    'font-weight'    => $sub_font_weight,
);
$sub_styles = '';
foreach ($styles_sub as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $sub_styles .= $key . ':' . $value . ';';
    }
}
$styles_des = array(
    'color'       => $des_color,
    'margin-bottom' => $des_margin_bottom.'px',
    'font-size'   => $des_font_size.'px',
    'line-height' => $des_line_height.'px',
);
$des_styles = '';
foreach ($styles_des as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $des_styles .= $key . ':' . $value . ';';
    }
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="ct-heading layout1 <?php echo esc_attr( $align_lg.' '.$align_md.' '.$align_sm.' '.$align_xs.' '.$animation_classes ); ?>">
    <div class="ct-inline-css"  data-css="
        <?php if(!empty($font_size_md) || !empty($line_height_md)) : ?>
            @media (min-width: 991px) and (max-width: 1199px) {
                #<?php echo esc_attr($atts['html_id']);?> .ct-heading-tag {
                    <?php if(!empty($font_size_md)) : ?>
                        font-size: <?php echo esc_attr($font_size_md).'px'; ?> !important;
                    <?php endif; ?>
                    <?php if(!empty($line_height_md)) : ?>
                        line-height: <?php echo esc_attr($line_height_md).'px'; ?> !important;
                    <?php endif; ?>
                }
            }
        <?php endif; ?>
        <?php if(!empty($font_size_sm) || !empty($line_height_sm)) : ?>
            @media (min-width: 768px) and (max-width: 991px) {
                #<?php echo esc_attr($atts['html_id']);?> .ct-heading-tag {
                    <?php if(!empty($font_size_sm)) : ?>
                        font-size: <?php echo esc_attr($font_size_sm).'px'; ?> !important;
                    <?php endif; ?>
                    <?php if(!empty($line_height_sm)) : ?>
                        line-height: <?php echo esc_attr($line_height_sm).'px'; ?> !important;
                    <?php endif; ?>
                }
            }
        <?php endif; ?>
        <?php if(!empty($font_size_xs) || !empty($line_height_xs)) : ?>
            @media screen and (max-width: 767px) {
                #<?php echo esc_attr($atts['html_id']);?> .ct-heading-tag {
                    <?php if(!empty($font_size_xs)) : ?>
                        font-size: <?php echo esc_attr($font_size_xs).'px'; ?> !important;
                    <?php endif; ?>
                    <?php if(!empty($line_height_xs)) : ?>
                        line-height: <?php echo esc_attr($line_height_xs).'px'; ?> !important;
                    <?php endif; ?>
                }
            }
        <?php endif; ?>
        ">
    </div>
    <?php if(!empty($sub_title)) : ?>
        <h3 class="ct-sub-title" <?php echo !empty($sub_styles) ? 'style="' . esc_attr($sub_styles) . ' "' : '' ?>>
            <?php echo wp_kses_post( $sub_title ); ?>
        </h3>    
    <?php endif; ?>
    
    <<?php echo esc_attr( $tag ); ?> class="ct-heading-tag" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . ' '. $inline_style .'"' : '' ?>>
        <?php if($text_source == 'custom-text' && !empty($text)) { ?>
                <?php echo wp_kses_post( $text ); ?>
        <?php } else {
            echo get_the_title();
        } ?>
    </<?php echo esc_attr( $tag ); ?>>
    
    <?php if(!empty($description)) : ?>
        <div class="ct-text-below" <?php echo !empty($des_styles) ? 'style="' . esc_attr($des_styles) . '"' : '' ?>>
            <?php echo wp_kses_post( $description ); ?>
            </div>
    <?php endif; ?>
</div>