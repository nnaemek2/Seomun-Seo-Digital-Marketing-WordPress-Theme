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
    'letter_spacing' => '',
    'text_transform' => '',

    'sub_title1' => '',
    'sub_title_color1' => 'primary-color1',
    'line_color'    => '',

    'sub_title2' => '',
    'sub_font_size2' => '',
    'sub_line_height2' => '',
    'sub_title_color2' => '',

    'description' => '',
    'des_color' => '',
    'des_fontsize' => '',

    'margin_top' => '',
    'margin_right' => '',
    'margin_bottom' => '',
    'margin_left' => '',
    'text_color' => '',
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
    'letter-spacing'   => $letter_spacing,
    'text-transform'   => $text_transform,
    'font-weight'   => $font_weight,
);
$title_styles = '';
foreach ($styles_title as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $title_styles .= $key . ':' . $value . ';';
    }
}

$styles_sub2 = array(
    'font-size'   => $sub_font_size2.'px',
    'line-height'   => $sub_line_height2.'px',
    'text-transform'=> $sub_text_transform2,
    'color'      => $sub_title_color2,
);
$sub2_styles = '';
foreach ($styles_sub2 as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $sub2_styles .= $key . ':' . $value . ';';
    }
}

$styles_des = array(
    'color'   => $des_color,
    'font-size'   => $des_fontsize.'px',
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
<div id="<?php echo esc_attr($atts['html_id']);?>" class="ct-headingmulti <?php echo esc_attr( $align_lg.' '.$align_md.' '.$align_sm.' '.$align_xs.' '.$animation_classes ); ?>">
    
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
        <?php if( !empty($sub_title_color1)) : ?>
            #<?php echo esc_attr($atts['html_id']);?>.ct-headingmulti .ct-line-color {
               background-color: <?php echo esc_attr($sub_title_color1); ?>!important;
            }
        <?php endif; ?>
        ">
    </div>

    <?php if(!empty($sub_title1)) : ?>
        <div class="ct-sub-title1 <?php echo esc_attr( $sub_title_color1 );?>">
            <span class="ct-line-color"></span><?php echo wp_kses_post( $sub_title1 ); ?>
        </div>
    <?php endif; ?>

    <?php if(!empty($sub_title2)) : ?>
        <div class="ct-sub-title2" <?php echo !empty($sub2_styles) ? 'style="' . esc_attr($sub2_styles) . ' '. $inline_style .'"' : '' ?>>
            <?php echo wp_kses_post( $sub_title2 ); ?>
        </div>
    <?php endif; ?>

    <<?php echo esc_attr( $tag ); ?> class="ct-heading-tag" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . ' '. $inline_style .'"' : '' ?>>
        <?php if($text_source == 'custom-text' && !empty($text)) { ?>
                <?php echo wp_kses_post( $text ); ?>
        <?php } else {
            echo get_the_title();
        } ?>
    </<?php echo esc_attr( $tag ); ?>>
    
    <?php if(!empty($description)) : ?>
        <div class="ct-heading-desc" <?php echo !empty($des_styles) ? 'style="' . esc_attr($des_styles) . '"' : '' ?>>
            <?php echo wp_kses_post( $description ); ?>
        </div>
    <?php endif; ?>
</div>