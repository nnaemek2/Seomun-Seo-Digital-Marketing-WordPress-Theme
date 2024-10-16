<?php
extract(shortcode_atts(array(
    'sub_title' => '',
    'title_box' => '',
    
    'title' => '',
    'title2' => '',
    'title_color' => '',
    'font_size' => '',

    'color_hover' => '',
    'color' => '',
    'icon_color' => '',

    'ctf_items'  => '',
    'ctf_items2'  => '',

    'animation'  => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$ctf_item = array();
$ctf_item = (array) vc_param_group_parse_atts($ctf_items);

$ctf_item2 = array();
$ctf_item2 = (array) vc_param_group_parse_atts($ctf_items2);



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
<div id="<?php echo esc_attr($atts['html_id']);?>" class="ct-contact-info layout2 <?php echo esc_attr( $animation_classes );?>">
    <div class="ct-inline-css"  data-css="<?php if( !empty($color_hover)) : ?>
            #<?php echo esc_attr($atts['html_id']);?>.ct-contact-info .ct-contact-info-content a:hover, 
            #<?php echo esc_attr($atts['html_id']);?>.ct-contact-info .ct-contact-info-content a:hover i {
               color: <?php echo esc_attr($color_hover); ?>!important;
            }
    <?php endif; ?>">
        
    </div>
    <?php if(!empty($sub_title)) : ?>
        <h3 class="ct-sub-title">
            <?php echo wp_kses_post( $sub_title ); ?>
        </h3>
    <?php endif;?>
    <?php if(!empty($title_box)) : ?>
        <h2 class="ct-box-title">
            <?php echo wp_kses_post( $title_box ); ?>
        </h2>
    <?php endif;?>


    <div class="ct-contact-info-inner">
        <?php if(!empty($title)) : ?>
            <h3 class="ct-contact-title" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                <i class="fa fa-map"></i>
                <?php echo wp_kses_post( $title ); ?>
            </h3>
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
			                	<i <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fac fac-phone"></i>			                	
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
			                	<i  <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fac fac-map-marker"></i>
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
    <div class="ct-contact-info-inner">
        <?php if(!empty($title2)) : ?>
            <h3 class="ct-contact-title" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                <i class="fa fa-map"></i>
                <?php echo wp_kses_post( $title2 ); ?>
            </h3>
        <?php endif;?>

        <?php foreach ($ctf_item2 as $key => $value) {
            $ctf_content2 = isset($value['ctf_content2']) ? $value['ctf_content2'] : '';
            $ctf_type2 = isset($value['ctf_type2']) ? $value['ctf_type2'] : '';
            ?>
            <div class="ct-contact-info-item type-<?php echo esc_attr($ctf_type); ?>" >
                <div class="ct-contact-info-content">
                    <?php switch ( $ctf_type2 )
                    {
                        case 'phone': ?>
                            <a href="tel:<?php echo esc_attr( $ctf_content ); ?>" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                                <i <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fac fac-phone"></i>                               
                                <?php echo wp_kses_post( $ctf_content2  ); ?>
                            </a>
                            <?php break;

                        case 'email': ?>
                            <a href="mailto:<?php echo esc_attr( $ctf_content ); ?>" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                                <i  <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fa fa-envelope"></i>
                                <?php echo wp_kses_post( $ctf_content2  ); ?>
                            </a>
                            <?php break;

                        case 'address': ?>
                            <a href="http://maps.google.com/?q=<?php echo esc_attr( $ctf_content2 ); ?>" target="_blank" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                                <i  <?php if(!empty($icon_color)): ?> style="color: <?php echo esc_attr( $icon_color )?>"<?php endif;?> class="fac fac-map-marker"></i>
                                <?php echo wp_kses_post( $ctf_content2  ); ?>
                            </a>
                            <?php break;

                        default:
                            echo wp_kses_post( $ctf_content2  );
                            break;
                    } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>