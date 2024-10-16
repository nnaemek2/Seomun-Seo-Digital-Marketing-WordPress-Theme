<?php
$term_list = cms_get_grid_term_list('portfolio');
vc_map(
    array(
        'name'     => esc_html__('Portfolio Grid Maronry', 'seomun'),
        'base'     => 'ct_portfolio_masonry',
        'class'    => 'ct-icon-element',
        'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
        'params'   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_portfolio_masonry',
                'heading' => esc_html__('Shortcode Template', 'seomun'),
                'admin_label' => true,
                'std' => 'ct_portfolio_masonry.php',
                'group' => esc_html__('Template', 'seomun'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Holder', 'seomun'),
                'param_name' => 'show_holder',
                'value'      => array(
                    'Show'   => 'show-holder',
                    'Hidden' => 'hidden-holder',
                ),
                'group' => esc_html__('Template', 'seomun'),
            ),
            array(
                'type'       => 'checkbox',
                'heading'    => esc_html__('Custom Source', 'seomun'),
                'param_name' => 'custom_source',
                'value'      => '1',
                'description'        => 'Check here if you want custom source',
                'group'      => esc_html__('Source Settings', 'seomun')
            ),
            array(
                'type'       => 'autocomplete',
                'heading'    => esc_html__('Select Categories', 'seomun'),
                'param_name' => 'source',
                'description' => esc_html__('Leave blank to select all category', 'seomun'),
                'settings'   => array(
                    'multiple' => true,
                    'values'   => $term_list['auto_complete'],
                ),
                'dependency' => array(
                    'element'=>'custom_source',
                    'value'=>array(
                        'true',
                    )
                ),
                'group'      => esc_html__('Source Settings', 'seomun'),
            ),
            array(
                'type'       => 'autocomplete',
                'class'      => '',
                'heading'    => esc_html__('Select Post Name', 'seomun'),
                'param_name' => 'post_ids',
                'description' => esc_html__('Leave blank to show all post', 'seomun'),
                'settings'   => array(
                    'multiple' => true,
                    'values'   => cms_get_type_posts_data('portfolio')
                ),
                'dependency' => array(
                    'element'=>'custom_source',
                    'value'=>array(
                        'true',
                    )
                ),
                'group'      => esc_html__('Source Settings', 'seomun'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Order by', 'seomun'),
                'param_name' => 'orderby',
                'value'      => array(
                    'Date'   => 'date',
                    'ID'     => 'ID',
                    'Author' => 'author',
                    'Title'  => 'title',
                    'Random' => 'rand',
                ),
                'std'        => 'date',
                'group'      => esc_html__('Source Settings', 'seomun')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Sort order', 'seomun'),
                'param_name' => 'order',
                'value'      => array(
                    'Ascending'  => 'ASC',
                    'Descending' => 'DESC',
                ),
                'std'        => 'DESC',
                'group'      => esc_html__('Source Settings', 'seomun')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Total items', 'seomun'),
                'param_name' => 'limit',
                'value'      => '6',
                'group'      => esc_html__('Source Settings', 'seomun'),
                'description' => esc_html__('Set max limit for items in grid. Enter number only', 'seomun'),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image size', 'seomun' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => esc_html__( "Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). Enter multiple sizes (Example: 100x100,200x200,300x300)).", "seomun" ),
                'group'      => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Layout Type', 'seomun'),
                'param_name' => 'layout',
                'value'      => array(
                    'Basic'   => 'basic',
                    'Masonry' => 'masonry',
                ),
                'group'      => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter on Masonry', 'seomun'),
                'param_name' => 'filter',
                'value'      => array(
                    'Enable'  => 'true',
                    'Disable' => 'false'
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Pagination Type', 'seomun'),
                'param_name' => 'pagination_type',
                'value'      => array(
                    'Loadmore' => 'loadmore',
                    'Pagination'  => 'pagination',
                    'Disable' => 'false',
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Default Title', 'seomun'),
                'param_name' => 'filter_default_title',
                'value'      => 'All',
                'group'      => esc_html__('Filter', 'seomun'),
                'description' => esc_html__('Enter default title for filter option display, empty: All', 'seomun'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Title Color Active', 'seomun'),
                'param_name' => 'filter_title_color',
                'value'      => array(
                    'Secondary'   => 'secondary',
                    'Primary'   => 'primary',
                    'General'   => 'general',
                ),
                'group'      => esc_html__('Filter', 'seomun'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Alignment', 'seomun'),
                'param_name' => 'filter_alignment',
                'value'      => array(
                    'Center'   => 'center',
                    'Left'   => 'left',
                    'Right'   => 'right',
                ),
                'description' => esc_html__('Select filter alignment.', 'seomun'),
                'group'      => esc_html__('Filter', 'seomun'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),

            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Item Gap', 'seomun'),
                'param_name' => 'gap',
                'value'      => '30',
                'group'      => esc_html__('Grid Settings', 'seomun'),
                'description' => esc_html__('Select gap between grid elements. Enter number only', 'seomun'),
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
                'heading'          => esc_html__('Custom Column Item', 'seomun'),
                'param_name'       => 'custom_column',
                'value'      => array(
                    'False'   => 'false',
                    'True' => 'true',
                ),
                'std'              => false,
                'group'            => esc_html__('Grid Settings', 'seomun'),
            ),
            array(
            'type' => 'param_group',
                'heading' => esc_html__( 'List Item', 'seomun' ),
                'param_name' => 'ct_list_column',
                'description' => esc_html__( 'Column for each item', 'seomun' ),
                'value' => '',
                'params' => array(
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns XS Devices', 'seomun'),
                        'param_name'       => 'custom_col_xs',
                        'edit_field_class' => 'vc_col-sm-3 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 1,
                        'group'            => esc_html__('Grid Settings', 'seomun'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns SM Devices', 'seomun'),
                        'param_name'       => 'custom_col_sm',
                        'edit_field_class' => 'vc_col-sm-3 vc_column',
                        'value'            => array(1, 2, 3, 4, 6, 12),
                        'std'              => 2,
                        'group'            => esc_html__('Grid Settings', 'seomun'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns MD Devices', 'seomun'),
                        'param_name'       => 'custom_col_md',
                        'edit_field_class' => 'vc_col-sm-3 vc_column',
                        'value'      => array(
                            '1'   => '1',
                            '2'   => '2',
                            '3'   => '3',
                            '4'   => '4',
                            '6'   => '6',
                            '12'   => '12',
                            '2/3'   => '2col3',
                        ),
                        'std'              => 3,
                        'group'            => esc_html__('Grid Settings', 'seomun'),
                        'admin_label' => true,
                    ),
                    array(
                        'type'             => 'dropdown',
                        'heading'          => esc_html__('Columns LG Devices', 'seomun'),
                        'param_name'       => 'custom_col_lg',
                        'edit_field_class' => 'vc_col-sm-3 vc_column',
                        'value'      => array(
                            '1'   => '1',
                            '2'   => '2',
                            '3'   => '3',
                            '4'   => '4',
                            '6'   => '6',
                            '12'   => '12',
                            '2/3'   => '2col3',
                        ),
                        'std'              => 4,
                        'group'            => esc_html__('Grid Settings', 'seomun'),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Custom class name', 'seomun' ),
                        'param_name' => 'el_item_class',
                    ),
                ),
                'dependency' => array(
                    'element' => 'custom_column',
                    'value'   => 'true'
                ),
                'group'            => esc_html__('Grid Settings', 'seomun'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'seomun' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'seomun' ),
                'group'            => esc_html__('Grid Settings', 'seomun')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Element Parallax', 'seomun'),
                'param_name' => 'el_parallax',
                'value' => array(
                    'No' => 'false',
                    'Yes' => 'true',
                ),
                'group' => esc_html__('Grid Settings', 'seomun'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Parallax Speed', 'seomun' ),
                'param_name' => 'el_parallax_speed',
                'value' => '',
                'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'seomun' ),
                'group' => esc_html__('Grid Settings', 'seomun'),
                'dependency' => array(
                    'element'=>'el_parallax',
                    'value'=>array(
                        'true',
                    )
                ),
            ),
        )
    )
);

class WPBakeryShortCode_ct_portfolio_masonry extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-portfolio-maronry');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>