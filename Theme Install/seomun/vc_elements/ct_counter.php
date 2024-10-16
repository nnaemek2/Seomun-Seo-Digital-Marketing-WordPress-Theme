<?php
vc_map(array(
    'name' => 'Counter',
    'base' => 'ct_counter',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Counter Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(

        /* Title */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'seomun'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'group' => esc_html__('Title', 'seomun'),
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'seomun'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'seomun'),
        ),

        /* Digit */
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Digit', 'seomun'),
            'param_name' => 'digit',
            'description' => 'Enter digit.',
            'group' => esc_html__('Digit', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'seomun'),
            'param_name' => 'digit_color',
            'value' => '',
            'group' => esc_html__('Digit', 'seomun'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Use Grouping', 'seomun'),
            'param_name' => 'grouping',
            'value' => array(
                'No' => '0',
                'Yes' => '1',
            ),
            'group' => esc_html__('Digit', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Separator', 'seomun'),
            'param_name' => 'separator',
            'group' => esc_html__('Digit', 'seomun'),
            'dependency' => array(
                'element'=>'grouping',
                'value'=>array(
                    '1',
                )
            ),
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
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                )
            ),
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
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Color', 'seomun'),
            'param_name' => 'icon_color',
            'value' => '',
            'group' => esc_html__('Icon', 'seomun'),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Icon Font Size', 'seomun'),
            'param_name' => 'icon_font_size',
            'group' => esc_html__('Icon', 'seomun'),
            'description' => 'Enter number.',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'seomun' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'seomun' ),
            'group'            => esc_html__('Extra', 'seomun')
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

class WPBakeryShortCode_ct_counter extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>