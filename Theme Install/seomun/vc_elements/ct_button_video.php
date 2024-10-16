<?php
vc_map(array(
    'name' => 'Button Video',
    'base' => 'ct_button_video',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Button Video Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Button Text', 'seomun' ),
            'param_name' => 'button_text',
            'value' => '',
            'admin_label' => true,
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Button Link', 'seomun'),
            'param_name' => 'button_link',
            'value' => '',
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Video Link', 'seomun'),
            'param_name' => 'video_link',
            'value' => '',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Color', 'seomun'),
            'param_name' => 'button_vd_color',
            "value" => array(
                'Default' => 'default',
                'Primary Color1' => 'primary-color1',
                'Primary Color2' => 'primary-color2',
                'Secondary Color'=> 'secondary-color',
                'White Color'=> 'white-color',
            ),
            'group' => esc_html__('Extras', 'seomun'),
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'seomun' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'seomun' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Extras', 'seomun'),
        ),
    )
));

class WPBakeryShortCode_ct_button_video extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>