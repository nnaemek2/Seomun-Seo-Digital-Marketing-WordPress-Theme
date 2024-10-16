<?php
$args = array(
    'name' => 'Client Carousel',
    'base' => 'ct_client_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Client Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_client_carousel',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'admin_label' => true,
            'std'     => 'ct_client_carousel.php',
            'group' => esc_html__('Template', 'seomun'),
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Client Item', 'seomun' ),
            'value' => '',
            'param_name' => 'client_item',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'seomun' ),
                    'param_name' => 'image',
                    'admin_label' => true,
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'seomun' ),
                ),
            ),
        ),
        /* Extra */
    ));

$args = seomun_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_client_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>