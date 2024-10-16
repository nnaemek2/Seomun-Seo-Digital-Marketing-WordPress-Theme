<?php
vc_map(array(
    'name' => 'Button Duplicator',
    'base' => 'ct_button_duplicator',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Button Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Text 1', 'seomun' ),
            'param_name' => 'button_text',
            'value' => '',
            'admin_label' => true,
            'group' => esc_html__('Button Settings', 'seomun')
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link 1', 'seomun'),
            'param_name' => 'button_link',
            'value' => '',
            'group' => esc_html__('Button Settings', 'seomun')
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Text 2', 'seomun' ),
            'param_name' => 'button_text2',
            'value' => '',
            'admin_label' => true,
            'group' => esc_html__('Button Settings', 'seomun')
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link 2', 'seomun'),
            'param_name' => 'button_link2',
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

class WPBakeryShortCode_ct_button_duplicator extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>