<?php
extract(shortcode_atts(array(                     
    'text_box' => '',              
    'text_box_color' => '',
    'font_size' =>'14px',
    'font_weight' => '400',
    'textbox_align' => 'text-left',
    'textbox_mg_button' =>'20px',
    'line_height' => '',
    
    'font_style'  =>'normal',   
    'custom_fonts' => 'false',
    'google_fonts' => '',
    'text_transform' => '',    
), $atts));
$uqid = uniqid();

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
    'color'   => $text_box_color,
    'font-weight'   => $font_weight,
    'font-style'  => $font_style,
    'font-size' => $font_size,
    'line-height' => $line_height,
    'text-transform' => $text_transform,
);
$title_styles = '';
foreach ($styles_title as $key => $value) {
    if (!empty($value)) {
        $title_styles .= $key . ':' . $value . ';';
    }
}

?>

<div id="ct-textbox-<?php echo esc_attr($uqid);?>" class="ct-textbox-default <?php echo esc_attr($textbox_align);?>" style="margin-bottom: <?php echo esc_attr($textbox_mg_button);?>">
    <?php if($text_box) : ?>
        <div class="ct-textbox-content" <?php echo !empty($title_styles || $inline_style) ? 'style="' . esc_attr($title_styles) . ' '. $inline_style .'"' : '' ?>>
            <?php echo wp_kses_post( $text_box ); ?>
        </div>
    <?php endif; ?>
</div>