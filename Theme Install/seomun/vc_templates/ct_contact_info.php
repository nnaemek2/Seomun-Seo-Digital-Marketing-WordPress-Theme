<?php
extract(shortcode_atts(array(
    'title' => '',
    'title_color' => '',
    'font_size' => '',

    'des_contact'  => '',
    'des_color'    => '',
    'des_font_size'=> '',

    'color_hover' => '',
    'font_size' => '',
    'color' => '',
    'icon_color' => '',

    'ctf_items'  => '',
    'animation'  => '',
    'el_class'  => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$ctf_item = array();
$ctf_item = (array) vc_param_group_parse_atts($ctf_items);


$styles_title = array(
    'color'  	 => $title_color,
    'font-size'  => $font_size,
);
$title_styles = '';
foreach ($styles_title as $key => $value) {
    if (!empty($value)) {
        $title_styles .= $key . ':' . $value . ';';
    }
}

$styles_des = array(
    'color'  	 => $des_color,
    'font-size'  => $des_font_size,
);
$des_styles = '';
foreach ($styles_des as $key => $value) {
    if (!empty($value)) {
        $des_styles .= $key . ':' . $value . ';';
    }
}

?>

<div id="<?php echo esc_attr($atts['html_id']);?>" class="ct-contact-info layout1 <?php echo esc_attr( $el_class.' '.$animation_classes )?>">
    <div class="ct-contact-info-inner">
        <?php if(!empty($title)) : ?>
            <h3 class="ct-contact-title" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                <?php echo wp_kses_post( $title ); ?>
            </h3>
        <?php endif;?>

        <?php if(!empty($des_contact)) : ?>
            <div class="ct-description" <?php echo !empty($des_styles) ? 'style="' . esc_attr($des_styles) . '"' : '' ?>>
                <?php echo wp_kses_post( $des_contact ); ?>
            </div>
        <?php endif;?>

	    <?php foreach ($ctf_item as $key => $value) {
	    	$ctf_content = isset($value['ctf_content']) ? $value['ctf_content'] : '';
	    	$ctf_type = isset($value['ctf_type']) ? $value['ctf_type'] : '';
	    	?>
	    	<div class="ct-contact-info-item type-<?php echo esc_attr($ctf_type); ?>" >
			    <div class="ct-contact-info-content">
			    	<?php switch ( $ctf_type )
			        {
			            case 'phone': ?>
			                <a href="tel:<?php echo esc_attr( $ctf_content ); ?>" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
			                	<i <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fa fa-phone"></i>			                	
			                	<?php echo wp_kses_post( $ctf_content  ); ?>
			                </a>
			                <?php break;

			            case 'email': ?>
			                <a href="mailto:<?php echo esc_attr( $ctf_content ); ?>" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
								<i  <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fa fa-envelope"></i>
			                	<?php echo wp_kses_post( $ctf_content  ); ?>
			                </a>
			                <?php break;

			            case 'address': ?>
			                <a href="http://maps.google.com/?q=<?php echo esc_attr( $ctf_content ); ?>" target="_blank" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
			                	<i  <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fa fa-map-o"></i>
			                	<?php echo wp_kses_post( $ctf_content  ); ?>
			                </a>
			                <?php break;

			            default:
			                echo wp_kses_post( $ctf_content  );
			                break;
			        } ?>
			    </div>
			</div>
	    <?php } ?>
	</div>
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($color_hover)) : ?>
                #<?php echo esc_attr($atts['html_id']);?>.ct-contact-info .ct-contact-info-content a:hover, 
                #<?php echo esc_attr($atts['html_id']);?>.ct-contact-info .ct-contact-info-content a:hover i {
                   color: <?php echo esc_attr($color_hover); ?>!important;
                }
        <?php endif; ?>">
    </div>
</div>