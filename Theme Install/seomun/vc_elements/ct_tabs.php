<?php
vc_map(array(
    'name' => 'Tabs',
    'base' => 'ct_tabs',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Tabbed content', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "ct_tabs",
            "heading" => esc_html__("Shortcode Template", 'seomun'),
            "admin_label" => true,
            'std' => 'ct_tabs.php',
            "group" => esc_html__("Template", 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Tab Active Section', 'seomun'),
            'param_name' => 'tab_active_section',
            'description' => 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).',
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Tabs', 'seomun' ),
            'param_name' => 'ct_tabs',
            'description' => esc_html__( 'Enter values for tab item', 'seomun' ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Tab Title', 'seomun'),
                    'param_name' => 'tab_title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' =>esc_html__('Tab Icons', 'seomun'),
                    'param_name' => 'tab_title_icon',
                    'settings' => array(
                        'emptyIcon'=>false,
                        'type'=>'fontawesome',
                        'iconPerPage'=>200
                    ),
                ), 
                array(
                    'type' => 'attach_image',
                    "heading" => esc_html__("Content Image", 'seomun'),
                    "param_name" => "content_image",
                    'description' => esc_html__( 'Select image from media library.', 'seomun' ),
                    "value" => "",
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('First Title', 'seomun'),
                    'param_name' => 'first_title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'seomun'),
                    'param_name' => 'second_title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Sub Title', 'seomun'),
                    'param_name' => 'sub_title',
                ),
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Content', 'seomun'),
                    'param_name' => 'tab_content',
                ),
            ),
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

class WPBakeryShortCode_ct_tabs extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>