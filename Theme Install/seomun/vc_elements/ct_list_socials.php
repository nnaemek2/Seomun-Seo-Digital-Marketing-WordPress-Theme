<?php
vc_map(array(
    'name' => 'Socials List',
    'base' => 'ct_list_socials',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'seomun'),
            'param_name' => 'style',
            'value' => array(
                'Left' => 'left',
                'Center' => 'center',        
                'Right' => 'right',        
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
                    'type' => 'iconpicker',
                    'heading' =>esc_html__('Icons', 'seomun'),
                    'param_name' => 'ct_list_item_icon',
                    'settings' => array(
                        'emptyIcon'=>true,
                        'type'=>'fontawesome',
                        'iconPerPage'=>200
                    ),
                ), 
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Icon Link', 'seomun'),
                    'param_name' => 'icon_link',
                    'value' => '',
                    'group' => esc_html__('Icon', 'seomun')
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
            'type' => 'colorpicker',
            'heading' =>esc_html__('Icon Color', 'seomun'),
            'param_name' => 'icon_list_color',
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' =>esc_html__('Background Color Icon', 'seomun'),
            'param_name' => 'bg_icon_color',
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' =>esc_html__('Background Color Hover', 'seomun'),
            'param_name' => 'bg_icon_color_hv',
            'value' => '',
        ),
    )
));

class WPBakeryShortCode_ct_list_socials extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>