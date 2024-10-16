<?php
vc_map(array(
    'name' => 'Button',
    'base' => 'ct_button',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Button Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Text', 'seomun' ),
            'param_name' => 'button_text',
            'value' => '',
            'admin_label' => true,
            'group' => esc_html__('Button Settings', 'seomun')
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link', 'seomun'),
            'param_name' => 'button_link',
            'value' => '',
            'group' => esc_html__('Button Settings', 'seomun')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Style', 'seomun'),
            'param_name' => 'button_style',
            'value' => array(
                'Primary Color 1' => 'btn-default',
                'Pirmary Color 1 Hover Dark' => 'btn-default hover-dark',
                'Primary Color 2 Hover Dark' => 'btn-primary-color2 hover-dark',
                'Primary Color 3 Hover Dark' => 'btn-primary-color3 hover-dark',
                'Secondary' => 'btn-secondary',
                'Primary Color 1 Box Shadow 1' => 'btn-default box-shadow-1',
                'Primary Color 1 Box Shadow 2' => 'btn-default box-shadow-2',
            ),
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Size', 'seomun'),
            'param_name' => 'button_size',
            'value' => array(
                'Default' => 'size-default',
                'Large' => 'size-lg',
            ),
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Large', 'seomun'),
            'param_name' => 'align_lg',
            'value' => array(
                'Left' => 'align-left',
                'Center' => 'align-center',
                'Right' => 'align-right',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Medium', 'seomun'),
            'param_name' => 'align_md',
            'value' => array(
                'Left' => 'align-left-md',
                'Center' => 'align-center-md',
                'Right' => 'align-right-md',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Small', 'seomun'),
            'param_name' => 'align_sm',
            'value' => array(
                'Left' => 'align-left-sm',
                'Center' => 'align-center-sm',
                'Right' => 'align-right-sm',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Align Mini', 'seomun'),
            'param_name' => 'align_xs',
            'value' => array(
                'Left' => 'align-left-xs',
                'Center' => 'align-center-xs',
                'Right' => 'align-right-xs',
            ),
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        /* Padding */
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Top', 'seomun'),
            'param_name' => 'padding_top',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Right', 'seomun'),
            'param_name' => 'padding_right',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Bottom', 'seomun'),
            'param_name' => 'padding_bottom',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Padding Left', 'seomun'),
            'param_name' => 'padding_left',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        /* Border radius */
        /* Padding */
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Top', 'seomun'),
            'param_name' => 'br_top',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Right', 'seomun'),
            'param_name' => 'br_right',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Bottom', 'seomun'),
            'param_name' => 'br_bottom',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Border Radius Left', 'seomun'),
            'param_name' => 'br_left',
            'description' => 'Enter number.',
            'edit_field_class' => 'vc_col-sm-3 vc_column',
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'seomun' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'seomun' ) => 'fontawesome',
                esc_html__( 'Material Design', 'seomun' ) => 'material_design',
                esc_html__( 'ET Line', 'seomun' ) => 'etline',
                esc_html__( 'Themify', 'seomun' ) => 'themify',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'seomun' ),
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
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Themify', 'seomun' ),
            'param_name' => 'icon_themify',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'themify',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'themify',
            ),
            'description' => esc_html__( 'Select icon from library.', 'seomun' ),
            'group' => esc_html__('Icon', 'seomun'),
        ),      
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'seomun' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'seomun' ),
            'group'            => esc_html__('Button Settings', 'seomun')
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'seomun' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'seomun' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Button Settings', 'seomun'),
        ),
    )
));

class WPBakeryShortCode_ct_button extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>