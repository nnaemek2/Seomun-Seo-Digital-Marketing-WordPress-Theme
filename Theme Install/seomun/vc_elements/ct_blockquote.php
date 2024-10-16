<?php
vc_map(array(
    'name' => 'Blockquote',
    'base' => 'ct_blockquote',
    'class' => 'ct-icon-element',
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_blockquote',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'admin_label' => true,
            'std' => 'ct_blockquote.php',
            'group' => esc_html__('Template', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Author Name', 'seomun'),
            'param_name' => 'title',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Position', 'seomun'),
            'param_name' => 'position',
            'admin_label' => true,
        ),
        array(
            'type' => 'textarea',
            'heading' =>esc_html__('Content', 'seomun'),
            'param_name' => 'desc',
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

class WPBakeryShortCode_ct_blockquote extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>