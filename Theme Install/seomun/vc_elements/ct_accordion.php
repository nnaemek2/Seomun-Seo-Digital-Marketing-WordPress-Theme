<?php
vc_map(array(
    'name' => 'Accordion',
    'base' => 'ct_accordion',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Collapsible content panels', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_accordion',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'admin_label' => true,
            'std' => 'ct_accordion.php',
            'group' => esc_html__('Template', 'seomun'),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Accordion Items', 'seomun' ),
            'param_name' => 'ct_accordion',
            'description' => esc_html__( 'Enter values for accordion item', 'seomun' ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'seomun'),
                    'param_name' => 'ac_title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Content', 'seomun'),
                    'param_name' => 'ac_content',
                ),
            ),
            "group"      => esc_html__("Row Info", "seomun"),
        ),
        //Setting Title
        array(
            "type" => "textfield",
            "heading" => esc_html__("Font Size", 'seomun'),
            "param_name" => "font_size",
            "description" => "Enter, ...px or em",
            "group"      => esc_html__("Title Setting", "seomun"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color", 'seomun'),
            "param_name" => "text_color",
            "value" => "",
            "group"      => esc_html__("Title Setting", "seomun"),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Font Weight", 'seomun'),
            'param_name' => 'font_weight',
            'value' => array(
                'Light 300' => '300',
                'Normal' => '400',
                'Meidum' => '500',
                'SemiBold' => '600',
                'Bold' => '700',
                'Bold Extra' => '800',
            ),
            'std' => '400',
            "group"      => esc_html__("Title Setting", "seomun"),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Text Transform", 'seomun'),
            'param_name' => 'text_transform',
            'value' => array(
                'Normal' => 'none',
                'Uppercase' => 'uppercase',
                'Lowercase' => 'lowercase',
                'Capitalize' => 'capitalize',
                'Unset' => 'unset'
            ),
            "group"      => esc_html__("Title Setting", "seomun"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Letter Spacing', 'seomun' ),
            "param_name" => "letter_spacing",
            "value" => '',
            "description" => "Enter: ..px, ...em",
            "group"      => esc_html__("Title Setting", "seomun"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Title", 'seomun'),
            "param_name" => "bg_title",
            "value" => "",
            "group"      => esc_html__("Title Setting", "seomun"),
        ),
        //Cpontent
        array(
            "type" => "textfield",
            "heading" => esc_html__("Font Size", 'seomun'),
            "param_name" => "content_font_size",
            "description" => "Enter, ...px or em",
            "group"      => esc_html__("Content Setting", "seomun"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color", 'seomun'),
            "param_name" => "content_text_color",
            "value" => "",
            "group"      => esc_html__("Content Setting", "seomun"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Line height', 'seomun' ),
            "param_name" => "line_height",
            "value" => '',
            "description" => "Enter: ..px",
            "group"      => esc_html__("Content Setting", "seomun"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Content", 'seomun'),
            "param_name" => "bg_content",
            "value" => "",
            "group"      => esc_html__("Content Setting", "seomun"),
        ),
        /* Extra */
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Active section', 'seomun'),
            'param_name' => 'active_section',
            'description' => 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).',
            'group' => esc_html__('Extra', 'seomun')
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
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'seomun' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'seomun' ),
            'group'  => esc_html__('Extra', 'seomun')
        ),
    )
));

class WPBakeryShortCode_ct_accordion extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>