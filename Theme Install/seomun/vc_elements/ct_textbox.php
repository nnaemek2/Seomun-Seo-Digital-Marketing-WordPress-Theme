<?php
vc_map(array(
    "name" => 'TextBox',
    "base" => "ct_textbox",
    'class'    => 'ct-icon-element',
    "category" => esc_html__('CaseThemes Shortcodes', 'seomun'),
    "params" => array(
        /* Content */
        array(
            "type" => "textarea",
            "heading" => esc_html__("Text Box", 'seomun'),
            "param_name" => "text_box",
            "description" => "Enter description.",
            "group" => esc_html__("TextBox Setting", 'seomun'),
            "type" => "textarea",
            "heading" => esc_html__("Text Box", 'seomun'),
            "param_name" => "text_box",
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        /* Setting */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Text Align", 'seomun'),
            'param_name' => 'textbox_align',
            'value' => array(
                'Left' => 'ct-text-left', 
                'Center' => 'ct-text-center',
                'Right' => 'ct-text-right',
                'Left Mobile Center' => 'ct-text-left text-mobile',
                'Right Mobile Center' => 'ct-text-right text-mobile',
            ),
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Box Color", 'seomun'),
            "param_name" => "text_box_color",
            "value" => "",
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Font Size", 'seomun'),
            "param_name" => "font_size",
            'value' => '',
            "description" => "Enter: ...px, Default 14px",
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Font Style", 'seomun'),
            'param_name' => 'font_style',
            'value' => array(
                'Normal' => 'normal', 
                'Italic' => 'italic',
            ),
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Font Weight", 'seomun'),
            'param_name' => 'font_weight',
            'value' => array(
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
            ),
            "group" => esc_html__("TextBox Setting", 'seomun'),
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
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Line Height", 'seomun'),
            "param_name" => "line_height",
            "description" => "Enter ..px",
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Margin Bottom", 'seomun'),
            "param_name" => "textbox_mg_button",
            'value' => '',
            "description" => "Enter: ...px, Default 20px",
            "group" => esc_html__("TextBox Setting", 'seomun'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Custom Google Fonts", 'seomun'),
            'param_name' => 'custom_fonts',
            'value' => array(
                'No' => 'false',       
                'Yes' => 'true',       
            ),
            "group" => esc_html__("Custome Fonts", 'seomun'),
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
            "dependency" => array(
                "element"=>"custom_fonts",
                "value"=>array(
                    "true",
                )
            ),
            "group" => esc_html__("Custome Fonts", 'seomun'),
        ),
    )
));

class WPBakeryShortCode_ct_textbox extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>