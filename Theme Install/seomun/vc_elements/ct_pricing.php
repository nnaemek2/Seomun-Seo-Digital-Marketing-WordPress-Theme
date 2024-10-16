<?php
vc_map(array(
    'name' => 'Pricing',
    'base' => 'ct_pricing',
    'class' => 'ct-icon-element',
    'description' => esc_html__( 'Pricing Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_pricing',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'group' => esc_html__('Template', 'seomun'),
        ), 

        /* Layout Classic */
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Title', 'seomun' ),
            'param_name' => 'title',
            'value' => '',
            'group' => esc_html__('Source Settings', 'seomun'),
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title Color', 'seomun'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Source Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Price', 'seomun' ),
            'param_name' => 'price',
            'value' => '',
            'group' => esc_html__('Source Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Time', 'seomun' ),
            'param_name' => 'pricing_time',
            'value' => '',
            'group' => esc_html__('Source Settings', 'seomun'),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Description', 'seomun' ),
            'param_name' => 'description',
            'value' => '',
            'group' => esc_html__('Source Settings', 'seomun'),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Item", 'seomun'),
                    "param_name" => "description_item",
                    'admin_label' => true,
                ),
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => __ ( 'Link Button', 'seomun' ),
            'param_name' => 'link_button',
            'value' => '',
            'group' => esc_html__('Source Settings', 'seomun'),
        ),
        /* Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Type', 'seomun'),
            'param_name' => 'icon_type',
            'value' => array(
                'Icon' => 'icon',
                'Image' => 'image',
            ),
            'group' => esc_html__('Icon', 'seomun'),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Icon Image', 'seomun' ),
            'param_name' => 'icon_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'seomun' ),
            'dependency' => array(
                'element'=>'icon_type',
                'value'=>array(
                    'image',
                )
            ),
            'group' => esc_html__('Icon', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'seomun' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'seomun' ) => 'fontawesome',
                esc_html__( 'Material Design', 'seomun' ) => 'material_design',
                esc_html__( 'Flaticon', 'seomun' ) => 'flaticon',
                esc_html__( 'ET Line', 'seomun' ) => 'etline',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'seomun' ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'group' => esc_html__('Icon', 'seomun'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Material', 'seomun' ),
            'param_name' => 'icon_material_design',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'material-design',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'material_design',
            ),
            'description' => esc_html__( 'Select icon from library.', 'seomun' ),
            'group' => esc_html__('Icon', 'seomun'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon FontAwesome', 'seomun' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'seomun' ),
            'group' => esc_html__('Icon', 'seomun'),
        ),  
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Flaticon', 'seomun' ),
            'param_name' => 'icon_flaticon',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'flaticon',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'flaticon',
            ),
            'description' => esc_html__( 'Select icon from library.', 'seomun' ),
            'group' => esc_html__('Icon', 'seomun'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon ET Line', 'seomun' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'etline',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'seomun' ),
            'group' => esc_html__('Icon', 'seomun'),
        ),

        /* Extra */
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Chose Active", 'seomun'),
            'param_name' => 'chose_active',
            'value' => array(
                'Item Show Normal' => 'ct-pri-item-normal',
                'Item Show Active' => 'ct-pri-item-active',
            ),
            'group'    => esc_html__('Extra', 'seomun')
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

class WPBakeryShortCode_ct_pricing extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>