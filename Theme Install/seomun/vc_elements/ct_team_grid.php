<?php
vc_map(
    array(
        'name'     => esc_html__('Team Grid', 'seomun'),
        'base'     => 'ct_team_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Team Displayed', 'seomun' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
        'params'   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_team_grid',
                'heading' => esc_html__('Shortcode Template', 'seomun'),
                'admin_label' => true,
                'std' => 'ct_team_grid.php',
                'group' => esc_html__('Template', 'seomun'),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Content', 'seomun' ),
                'param_name' => 'content_list',
                'description' => esc_html__( 'Enter values for team item', 'seomun' ),
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Image', 'seomun' ),
                        'param_name' => 'image',
                        'value' => '',
                        'description' => esc_html__( 'Select image from media library.', 'seomun' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Image size', 'seomun' ),
                        'param_name' => 'img_size',
                        'value' => '',
                        'description' => esc_html__( "Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).", 'seomun' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' =>esc_html__('Title', 'seomun'),
                        'param_name' => 'title',
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' =>esc_html__('Position', 'seomun'),
                        'param_name' => 'position',
                        'admin_label' => false,
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' =>esc_html__('Content', 'seomun'),
                        'param_name' => 'content_team',
                        'admin_label' => true,
                        'description' => esc_html__( 'Only show on Layout1', 'seomun' ),
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__( 'Social', 'seomun' ),
                        'param_name' => 'social',
                        'description' => esc_html__( 'Enter values for team social', 'seomun' ),
                        'value' => '',
                        'params' => array(
                            array(
                                'type' => 'iconpicker',
                                'heading' => esc_html__( 'Icon', 'seomun' ),
                                'param_name' => 'icon',
                                'value' => '',
                                'settings' => array(
                                    'emptyIcon' => true,
                                    'type' => 'fontawesome',
                                    'iconsPerPage' => 200,
                                ),
                                'description' => esc_html__( 'Select icon from library.', 'seomun' ),
                                'admin_label' => true,
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' =>esc_html__('Link', 'seomun'),
                                'param_name' => 'social_link',
                                'admin_label' => false,
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', 'seomun'),
                'param_name' => 'title_color',
                'value' => '',
                'group' => esc_html__('Source Settings', 'seomun'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Position Color', 'seomun'),
                'param_name' => 'position_color',
                'value' => '',
                'group' => esc_html__('Source Settings', 'seomun'),
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XS Devices', 'seomun'),
                'param_name'       => 'col_xs',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns SM Devices', 'seomun'),
                'param_name'       => 'col_sm',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 2,
                'group'            => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns MD Devices', 'seomun'),
                'param_name'       => 'col_md',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 3,
                'group'            => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns LG Devices', 'seomun'),
                'param_name'       => 'col_lg',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Item Gap', 'seomun'),
                'param_name'       => 'item_gap_team',
                "value" => array(
                    'Default 30px' => 'default',
                    '0px'          => 'team-padding',
                ),
                'group'            => esc_html__('Grid Settings', 'seomun')
            ),
        )
    )
);

class WPBakeryShortCode_ct_team_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-grid-team');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>