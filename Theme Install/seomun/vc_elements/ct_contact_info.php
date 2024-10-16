<?php
vc_map(array(
    'name' => 'Contact Info',
    'base' => 'ct_contact_info',
    'class' => 'ct-icon-element',
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_contact_info',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'std'        => 'ct_contact_info.php',
            'admin_label' => true,
            'group' => esc_html__('Template', 'seomun'),
        ),
        //Title Box
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Sub Title Box', 'seomun'),
            'param_name' => 'sub_title',
            'description' => 'Enter title.',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info--layout2.php',
                )
            ),
            'group' => esc_html__('Box Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title Box', 'seomun'),
            'param_name' => 'title_box',
            'description' => 'Enter title.',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info--layout2.php',
                )
            ),
            'group' => esc_html__('Box Title', 'seomun'),
        ),

        //Title
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'seomun'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'group' => esc_html__('Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'seomun'),
            'param_name' => 'title2',
            'description' => 'Enter title.',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info--layout2.php',
                )
            ),
            'group' => esc_html__('Title', 'seomun'),
        ),
        
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'seomun'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Size', 'seomun'),
            'param_name' => 'font_size',
            'description' => 'Enter number.',
            'group' => esc_html__('Title', 'seomun'),
        ),
        //Description
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Content', 'seomun'),
            'param_name' => 'des_contact',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info.php',
                )
            ),
            'group' => esc_html__('Content', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'seomun'),
            'param_name' => 'des_color',
            'value' => '',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info.php',
                )
            ),
            'group' => esc_html__('Content', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Size', 'seomun'),
            'param_name' => 'des_font_size',
            'description' => 'Enter number.',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info.php',
                )
            ),
            'group' => esc_html__('Content', 'seomun'),
        ),
        //Row Info 1
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Contact List', 'seomun' ),
            'param_name' => 'ctf_items',
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'seomun' ),
                    'param_name' => 'ctf_content',
                    'admin_label' => true,
                    'value' => '',
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Type', 'seomun'),
                    'param_name' => 'ctf_type',
                    'value'      => array(
                        'Text'   => 'text',
                        'Phone'   => 'phone',
                        'Email'   => 'email',
                        'Address'   => 'address',
                    ),
                ),
            ),
        ), 
        //Row Info 2
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Contact List 2', 'seomun' ),
            'param_name' => 'ctf_items2',
            'value' => '',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info--layout2.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'seomun' ),
                    'param_name' => 'ctf_content2',
                    'admin_label' => true,
                    'value' => '',
                ),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Type', 'seomun'),
                    'param_name' => 'ctf_type2',
                    'value'      => array(
                        'Text'   => 'text',
                        'Phone'   => 'phone',
                        'Email'   => 'email',
                        'Address'   => 'address',
                    ),
                ),
            ),
        ),

        //Setting
        array(
            "type" => "textfield",
            "heading" => esc_html__("Font Size", 'seomun'),
            "param_name" => "font_size",
            "description" => "Enter, ...px or em",
            'group' => esc_html__('Setting', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'seomun'),
            'param_name' => 'color',
            'value' => '',
            'group' => esc_html__('Setting', 'seomun'),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Color', 'seomun'),
            'param_name' => 'icon_color',
            'value' => '',
            'group' => esc_html__('Setting', 'seomun'),
        ),

        /* Extra */
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background Color', 'seomun'),
            'param_name' => 'bg_color',
            'value' => '',
            'group' => esc_html__('Setting', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text color hover', 'seomun'),
            'param_name' => 'color_hover',
            'value' => '',
            'group' => esc_html__('Setting', 'seomun'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Padding Box", 'seomun'),
            "param_name" => "padding_box",
            "description" => "Enter padding, ...px",
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info.php',
                )
            ),
            'group' => esc_html__('Setting', 'seomun'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Border Radius", 'seomun'),
            "param_name" => "border_box_radius",
            "description" => "Enter, ...px",
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info.php',
                )
            ),
            'group' => esc_html__('Setting', 'seomun'),
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'seomun' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'seomun' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Extra', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Element Parallax', 'seomun'),
            'param_name' => 'el_parallax',
            'value' => array(
                'No' => 'false',
                'Yes' => 'true',
            ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_contact_info.php',
                )
            ),
            'group' => esc_html__('Extra', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Parallax Speed', 'seomun' ),
            'param_name' => 'el_parallax_speed',
            'value' => '',
            'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'seomun' ),
            'group' => esc_html__('Extra', 'seomun'),
            'dependency' => array(
                'element'=>'el_parallax',
                'value'=>array(
                    'true',
                )
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'seomun' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'seomun' ),
            'group'      => esc_html__('Extra', 'seomun'),
        ),
    )
));

class WPBakeryShortCode_ct_contact_info extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('cms-contact-info');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>