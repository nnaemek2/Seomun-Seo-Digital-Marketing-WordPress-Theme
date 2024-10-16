<?php
vc_map(array(
    'name' => 'Fancy Box',
    'base' => 'ct_fancybox',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Fancy Box Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_fancybox',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'std' => 'ct_fancybox.php',
            'admin_label' => true,
            'group' => esc_html__('Template', 'seomun'),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Box Background Color', 'seomun'),
            'param_name' => 'box_bg_color',
            'value' => '',
            'group'      => esc_html__('Template', 'seomun'),
        ),

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
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link', 'seomun'),
            'param_name' => 'item_link',
            'value' => '',
            'group' => esc_html__('Title', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'seomun'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'seomun'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Size', 'seomun'),
            'param_name' => 'title_font_size',
            'description' => 'Enter number.',
            'group' => esc_html__('Title', 'seomun'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Line Height', 'seomun'),
            'param_name' => 'title_line_height',
            'description' => 'Enter number.',
            'group' => esc_html__('Title', 'seomun'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),

        /* Description */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'seomun'),
            'param_name' => 'description',
            'description' => 'Enter description.',
            'group' => esc_html__('Description', 'seomun'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'seomun'),
            'param_name' => 'description_color',
            'value' => '',
            'group' => esc_html__('Description', 'seomun'),
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
                esc_html__( 'Font Awesome 4', 'seomun' ) => 'fontawesome',
                esc_html__( 'Font Awesome 5', 'seomun' ) => 'fontawesome5',
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
            'heading' => esc_html__( 'Icon FontAwesome 4', 'seomun' ),
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
            'heading' => esc_html__( 'Icon FontAwesome 5', 'seomun' ),
            'param_name' => 'icon_fontawesome5',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'awesome5',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome5',
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
            'type' => 'dropdown',
            'heading' => esc_html__('Primary Color', 'seomun'),
            'param_name' => 'fc_primary_color',
            'value' => array(
                'Primary Color 1' => 'fc-primary-color1',
                'Primary Color 2' => 'fc-primary-color2',

            ),
            'group' => esc_html__('Extra', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin Bottom', 'seomun'),
            'param_name' => 'fc_margin_botton',
            'description' => 'Enter number..px.',
            'group' => esc_html__('Extra', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Box', 'seomun'),
            'param_name' => 'fc_padding',
            'description' => 'Enter number..px.',
            'group' => esc_html__('Extra', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Column Same Height', 'seomun'),
            'param_name' => 'fc_col_sameheight',
            'value' => array(
                'None' => '',
                'Same Height' => 'col-same-height',
            ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout4.php',
                )
            ),
            'group' => esc_html__('Extra', 'seomun'),
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

class WPBakeryShortCode_ct_fancybox extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>