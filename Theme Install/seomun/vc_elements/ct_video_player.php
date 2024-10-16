<?php
vc_map(array(
    'name' => 'Video Player',
    'base' => 'ct_video_player',
    'class'    => 'ct-icon-element',
    'description' => 'Embed Youtube/Vimeo player',
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(

        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Video Url', 'seomun' ),
            'param_name' => 'video_link',
            'value' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0',
            'description' => 'Video url on Youtube, Vimeo'
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Video Image', 'seomun' ),
            'param_name' => 'video_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'seomun' ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Play Fixed Center', 'seomun'),
            'param_name' => 'play_fixed_center',
            'value' => array(
                'No' => 'play-no-fixed',
                'Yes' => 'play-fixed',
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Play Style', 'seomun'),
            'param_name' => 'play_style',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
            ),
        ),

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

class WPBakeryShortCode_ct_video_player extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>