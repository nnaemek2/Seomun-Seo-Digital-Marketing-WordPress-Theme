<?php
$args = array(
    'name' => 'Testimonial Carousel',
    'base' => 'ct_testimonial_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Testimonial Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_testimonial_carousel',
            'heading' => esc_html__('Shortcode Template', 'seomun'),
            'admin_label' => true,
            'std'     => 'ct_testimonial_carousel.php',
            'group' => esc_html__('Template', 'seomun'),
        ),

        //Titles
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Title 1', 'seomun' ),
            'param_name' => 'title1',
            'value' => '',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel.php',
                )
            ),
            'group'  => esc_html__('Titles', 'seomun')
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Title 2', 'seomun' ),
            'param_name' => 'title2',
            'value' => '',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel.php',
                )
            ),
            'group'  => esc_html__('Titles', 'seomun')
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Title 3', 'seomun' ),
            'param_name' => 'title3',
            'value' => '',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel.php',
                )
            ),
            'group'  => esc_html__('Titles', 'seomun')
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'seomun' ),
            'value' => '',
            'param_name' => 'testimonial_item',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel.php',
                )
            ),
            'params' => array(
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

                ),
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Content 1', 'seomun'),
                    'param_name' => 'content1',
                    'admin_label' => false,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content 2', 'seomun'),
                    'param_name' => 'content',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'seomun' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'seomun' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Reviews Stars', 'seomun'),
                    'param_name' => 'test_star',
                    'value' => array(
                        'no-star' => 'no-star',
                        'star1' => 'star1',
                        'star2' => 'star2',
                        'star3' => 'star3',
                        'star4' => 'star4',
                        'star5' => 'star5',
                    ),
                ),
            ),
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'seomun' ),
            'value' => '',
            'param_name' => 'testimonial_item2',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel--layout2.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'seomun' ),
                    'param_name' => 'image2',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'seomun' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'seomun'),
                    'param_name' => 'title2',
                    'admin_label' => true,
                ),

                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'seomun'),
                    'param_name' => 'position2',

                ),
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Content', 'seomun'),
                    'param_name' => 'content2',
                    'admin_label' => false,
                ),
            ),
        ),
        /* Extra */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Primary Color', 'seomun'),
            'param_name' => 'test_primary_color',
            'value' => array(
                'Primary Color 1' => 'test-primary-color1',
                'Primary Color 2' => 'test-primary-color2',
                'Primary Color 3' => 'test-primary-color3',
            ),
            'std' => 'test-primary-color1',
            'group' => esc_html__('Extra', 'seomun'),
        ),
    ));

$args = seomun_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_testimonial_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>