<?php
vc_map(array(
    'name' => 'Heading Multi',
    'base' => 'ct_headingmulti',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Heading Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_headingmulti',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'admin_label' => true,
            'group' => esc_html__('Template', 'seomun'),
            'std' => 'ct_headingmulti.php'
        ),
        
        /* Sub Title 1*/
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Sub Title 1', 'seomun' ),
            'param_name' => 'sub_title1',
            'value' => '',
            'group'      => esc_html__('Sub_Title1', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font Size', 'seomun' ),
            'param_name' => 'sub_font_size1',
            'value' => '',
            'description' => 'Enter number.',
            'group'      => esc_html__('Sub_Title1', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Color', 'seomun'),
            'param_name' => 'sub_title_color1',
            "value" => array(
                'Default' => 'default',
                'Primary Color1' => 'primary-color1',
                'Primary Color2' => 'primary-color2',
                'Secondary Color'=> 'secondary-color',
                'White Color'=> 'white-color',
            ),
            'group'      => esc_html__('Sub_Title1', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line Height', 'seomun' ),
            'param_name' => 'sub_line_height1',
            'value' => '',
            'description' => 'Enter number.',
            'group'      => esc_html__('Sub_Title1', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Transform', 'seomun'),
            'param_name' => 'sub_text_transform1',
            'value' => array(
                'None' => 'none',
                'Inherit' => 'inherit',
                'Uppercase' => 'uppercase',
                'Capitalize' => 'capitalize',
                'Lowercase' => 'lowercase',
            ),
            'std' => 'none',
            'group'      => esc_html__('Sub_Title1', 'seomun'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Line Color", 'seomun'),
            "param_name" => "line_color",
            "value" => "",
            'group'      => esc_html__('Sub_Title1', 'seomun'),
        ),
        /* Sub Title 2*/
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Sub Title 2', 'seomun' ),
            'param_name' => 'sub_title2',
            'value' => '',
            'group'      => esc_html__('Sub_Title2', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font Size', 'seomun' ),
            'param_name' => 'sub_font_size2',
            'value' => '',
            'description' => 'Enter number.',
            'group'      => esc_html__('Sub_Title2', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'seomun'),
            'param_name' => 'sub_title_color2',
            'value' => '',
            'group'      => esc_html__('Sub_Title2', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line Height', 'seomun' ),
            'param_name' => 'sub_line_height2',
            'value' => '',
            'description' => 'Enter number.',
            'group'      => esc_html__('Sub_Title2', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Transform', 'seomun'),
            'param_name' => 'sub_text_transform2',
            'value' => array(
                'None' => 'none',
                'Inherit' => 'inherit',
                'Uppercase' => 'uppercase',
                'Capitalize' => 'capitalize',
                'Lowercase' => 'lowercase',
            ),
            'std' => 'none',
            'group'      => esc_html__('Sub_Title2', 'seomun'),
        ),
        //Title Main
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Source', 'seomun'),
            'param_name' => 'text_source',
            'value' => array(
                'Custom Text' => 'custom-text',
                'Post or Page Title' => 'post-page-title',
            ),
            'admin_label' => true,
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Text', 'seomun' ),
            'param_name' => 'text',
            'value' => '',
            'admin_label' => true,
            'dependency' => array(
                'element'=>'text_source',
                'value'=>array(
                    'custom-text',
                )
            ),
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Element tag', 'seomun'),
            'param_name' => 'tag',
            'value' => array(
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
                'p' => 'p',
                'div' => 'div',
            ),
            'std' => 'h3',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align large', 'seomun'),
            'param_name' => 'align_lg',
            'value' => array(
                'left' => 'align-left',
                'right' => 'align-right',
                'center' => 'align-center',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align medium', 'seomun'),
            'param_name' => 'align_md',
            'value' => array(
                'left' => 'align-left-md',
                'right' => 'align-right-md',
                'center' => 'align-center-md',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align small', 'seomun'),
            'param_name' => 'align_sm',
            'value' => array(
                'left' => 'align-left-sm',
                'right' => 'align-right-sm',
                'center' => 'align-center-sm',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text align mini', 'seomun'),
            'param_name' => 'align_xs',
            'value' => array(
                'left' => 'align-left-xs',
                'right' => 'align-right-xs',
                'center' => 'align-center-xs',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin top', 'seomun'),
            'param_name' => 'margin_top',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin right', 'seomun'),
            'param_name' => 'margin_right',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin bottom', 'seomun'),
            'param_name' => 'margin_bottom',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin left', 'seomun'),
            'param_name' => 'margin_left',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size large', 'seomun' ),
            'param_name' => 'font_size',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size medium', 'seomun' ),
            'param_name' => 'font_size_md',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size small', 'seomun' ),
            'param_name' => 'font_size_sm',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size mini', 'seomun' ),
            'param_name' => 'font_size_xs',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height large', 'seomun' ),
            'param_name' => 'line_height',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height medium', 'seomun' ),
            'param_name' => 'line_height_md',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height small', 'seomun' ),
            'param_name' => 'line_height_sm',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Line height mini', 'seomun' ),
            'param_name' => 'line_height_xs',
            'value' => '',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Transform', 'seomun'),
            'param_name' => 'text_transform',
            'value' => array(
                'None' => 'none',
                'Inherit' => 'inherit',
                'Uppercase' => 'uppercase',
                'Capitalize' => 'capitalize',
                'Lowercase' => 'lowercase',
            ),
            'std' => 'none',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weight', 'seomun'),
            'param_name' => 'font_weight',
            'value' => array(
                'Default' => '',
                'Normal' => '400',
                'Medium' => '500',
                'SemiBold' => '600',
                'Bold' => '700',
                'ExtraBold' => '800',
            ),
            'std' => 'none',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Letter Spacing', 'seomun' ),
            'param_name' => 'letter_spacing',
            'value' => '',
            'description' => 'Enter ..px, ..em',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'seomun'),
            'param_name' => 'text_color',
            'value' => '',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Custom Google Fonts', 'seomun'),
            'param_name' => 'custom_fonts',
            'value' => array(
                'No' => 'false',
                'Yes' => 'true',
            ),
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'google_fonts',
            'param_name' => 'google_fonts',
            'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__( 'Select font family.', 'seomun' ),
                    'font_style_description' => esc_html__( 'Select font styling.', 'seomun' ),
                ),
            ),
            'dependency' => array(
                'element'=>'custom_fonts',
                'value'=>array(
                    'true',
                )
            ),
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Link for title', 'seomun' ),
            'param_name' => 'title_link',
            'value' => '',
            'group' => esc_html__('Main Title', 'seomun'),
        ),
        
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Description', 'seomun' ),
            'param_name' => 'description',
            'value' => '',
            'group'      => esc_html__('Description', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'seomun'),
            'param_name' => 'des_color',
            'value' => '',
            'group'      => esc_html__('Description', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font Size', 'seomun' ),
            'param_name' => 'des_fontsize',
            'value' => '',
            'description' => 'Enter ..px, ..em',
            'group'      => esc_html__('Description', 'seomun'),
        ),
        /* Extra */
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'seomun' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'seomun' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Extra', 'seomun'),
        ),
    )
));

class WPBakeryShortCode_ct_headingmulti extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-headingmulti');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>