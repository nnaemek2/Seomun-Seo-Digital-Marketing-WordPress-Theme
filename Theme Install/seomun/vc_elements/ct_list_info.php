<?php
vc_map(array(
    'name' => 'List Info',
    'base' => 'ct_list_info',
    'class'    => 'ct-icon-element',
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_list_info',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'admin_label' => true,
            'std' => 'ct_list_info.php',
            'group' => esc_html__('Template', 'seomun'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'seomun'),
            'param_name' => 'style',
            'value' => array(
                'Style 1' => 'list1',        
                'Style 2' => 'list2',        
            ),
        ),
         
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Lists', 'seomun' ),
            'param_name' => 'ct_list',
            'description' => esc_html__( 'Enter values for list item', 'seomun' ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('List item', 'seomun'),
                    'param_name' => 'ct_list_item',
                    'admin_label' => true,
                ), 
                array(
                    'type' => 'iconpicker',
                    'heading' =>esc_html__('Icons', 'seomun'),
                    'param_name' => 'ct_list_item_icon',
                    'settings' => array(
                        'emptyIcon'=>true,
                        'type'=>'fontawesome',
                        'iconPerPage'=>200
                    ),
                ), 
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Font Size', 'seomun'),
            'param_name' => 'ct_list_fontsize',
            'value' => '',
            'description' => 'Enter: ...px;'
        ),
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Line Height', 'seomun'),
            'param_name' => 'ct_list_lineheight',
            'value' => '',
            'description' => 'Enter: ...px;'
        ),
        array(
            'type' => 'colorpicker',
            'heading' =>esc_html__('Text Color', 'seomun'),
            'param_name' => 'ct_list_color',
            'value' => '',
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Font Weight", 'seomun'),
            'param_name' => 'font_weight',
            'value' => array(
                'SemiBold' => '600',
                'Normal' => '400',
                'Medium' => '500',
                'Bold' => '700',
                'Extra Borld' => '800',
            ),
            'std' => '300',
        ),
        array(
            'type' => 'colorpicker',
            'heading' =>esc_html__('Icon Color', 'seomun'),
            'param_name' => 'icon_list_color',
            'value' => '',
        ),
    )
));

class WPBakeryShortCode_ct_list_info extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>