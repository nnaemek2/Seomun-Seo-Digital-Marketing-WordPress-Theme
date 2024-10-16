<?php
vc_map(
	array(
		'name' => esc_html__('Progress Bar', 'seomun'),
	    'base' => 'ct_progressbar',
	    'icon' => 'cs_icon_for_vc',
	    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
	    'params' => array(
	    	array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_progressbar',
                'heading' => esc_html__('Shortcode Template', 'seomun'),
                'admin_label' => true,
                'std' => 'ct_progressbar.php',
                'group' => esc_html__('Template', 'seomun'),
            ),
	        array(
	            'type' => 'param_group',
	            'heading' => esc_html__( 'Progress Bar Lists', 'seomun' ),
	            'param_name' => 'ct_progressbar_list',
	            'value' => '',
	            'params' => array(
	                array(
			            'type' => 'textfield',
			            'heading' => esc_html__('Item Title','seomun'),
			            'param_name' => 'item_title',
			            'value' => '',
			            'group' => esc_html__('Progress Bar Settings', 'seomun'),
			            'admin_label' => true,
			        ),
					array(
						'type' => 'textfield',
						'class' => '',
						'value' => '',
						'heading' => esc_html__( 'Value', 'seomun' ),
						'param_name' => 'value',
						'description' => 'Enter number only 1 to 100',
						'group' => esc_html__('Progress Bar Settings', 'seomun'),
						'admin_label' => true,
					),
	            ),
	        ),
	        array(
	            "type" => "colorpicker",
	            "heading" => esc_html__("Text Color", 'seomun'),
	            "param_name" => "text_color",
	            "value" => "",
	            'group' => esc_html__('Progress Bar Settings', 'seomun'),
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Font Size", 'seomun'),
	            "param_name" => "font_size",
	            "description" => "Enter ..px, Default 14px",
	            'group' => esc_html__('Progress Bar Settings', 'seomun'),
	        ),
	        array(    
	            'type' => 'dropdown',
	            'heading' => esc_html__("Font Weight", 'seomun'),
	            'param_name' => 'font_weight',
	            "description" => "Apply for title",
	            'value' => array(
	            	'Normal'   => '400',
	            	'Medium'   => '500',
	                'SemiBold' => '600',
	                'Bold'     => '700',
	                'ExtraBold'=> '800',
	            ),
	            'std' => '300',
	            'group' => esc_html__('Progress Bar Settings', 'seomun'),
	        ),
	        array(
	            "type" => "colorpicker",
	            "heading" => esc_html__("Value Color", 'seomun'),
	            "param_name" => "value_color",
	            "value" => "",
	            'group' => esc_html__('Progress Bar Settings', 'seomun'),
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Value Font Size", 'seomun'),
	            "param_name" => "value_font_size",
	            "description" => "Enter ..px, Default 14px",
	            'group' => esc_html__('Progress Bar Settings', 'seomun'),
	        ),
	        array(
	            "type" => "colorpicker",
	            "heading" => esc_html__("Background Content Progress Bar", 'seomun'),
	            "param_name" => "bg_inner_color",
	            'group' => esc_html__('Progress Bar Settings', 'seomun'),
	        ),
	        array(
	            "type" => "colorpicker",
	            "heading" => esc_html__("Background Progress Bar", 'seomun'),
	            "param_name" => "bg_color",
	            'group' => esc_html__('Progress Bar Settings', 'seomun'),
	        ),

            array(
	            'type' => 'textfield',
	            'heading' => esc_html__('Extra Class','seomun'),
	            'param_name' => 'el_class',
	            'value' => '',
	            'group' => esc_html__('Template', 'seomun')
	        ),
	    )
	)
);
class WPBakeryShortCode_ct_progressbar extends CmsShortCode{
	protected function content($atts, $content = null){
	    /* JS */
        wp_enqueue_script('waypoints');
	    wp_enqueue_script('progressbar', get_template_directory_uri() . '/assets/js/progressbar.min.js', array( 'jquery' ), '0.7.1', true);
	    wp_enqueue_script('ct-progressbar', get_template_directory_uri() . '/assets/js/progressbar.ct.js', array( 'jquery' ), 'all', true);
		return parent::content($atts, $content);
	}
}

?>