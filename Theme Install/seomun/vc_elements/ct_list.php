<?php
vc_map(array(
    'name' => 'List',
    'base' => 'ct_list',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Lists Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_list',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'admin_label' => true,
            'std' => 'ct_list.php',
            'group' => esc_html__('Template', 'seomun'),
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'seomun' ),
            'value' => '',
            'param_name' => 'lists',
            'description' => esc_html__( 'Set content for each item.', 'seomun' ),
            'group' => esc_html__('Item List', 'seomun'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_list.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'seomun'),
                    'param_name' => 'content',
                    'description' => 'Enter content.',
                ),
            ),
        ),
        /* Extra */
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Text Font Size', 'seomun'),
            'param_name' => 'font_size',
            'value' => '',
            'description' => 'Enter: ...px;',
            'group' => esc_html__('Item List', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' =>esc_html__('Text Color', 'seomun'),
            'param_name' => 'text_color',
            'value' => '',
            'group' => esc_html__('Item List', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' =>esc_html__('Icon Color', 'seomun'),
            'param_name' => 'icon_color',
            'value' => '',
            'group' => esc_html__('Item List', 'seomun'),
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
    )
));

class WPBakeryShortCode_ct_list extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-list');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>