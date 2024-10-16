<?php
    if(class_exists('WPCF7')) {
        $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

        $contact_forms = array();
        if ( $cf7 ) {
            foreach ( $cf7 as $cform ) {
                $contact_forms[ $cform->post_title ] = $cform->ID;
            }
        } else {
            $contact_forms[ esc_html__( 'No contact forms found', 'seomun' ) ] = 0;
        }

        vc_map(array(
            'name' => 'Contact Form',
            'base' => 'ct_contact_form',
            'class'    => 'ct-icon-element',
            'description' => esc_html__( 'Contact Form 7', 'seomun' ),
            'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
            'params' => array(
                 /* Template */
                array(
                    'type' => 'cms_template_img',
                    'param_name' => 'cms_template',
                    'shortcode' => 'ct_contact_form',
                    'heading' => esc_html__('Shortcode Template', 'seomun'),
                    'admin_label' => true,
                    'group' => esc_html__('Template', 'seomun'),
                    'std' => 'ct_contact_form.php'
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Select Contact Form', 'seomun' ),
                    'param_name' => 'id',
                    'value' => $contact_forms,
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => __( 'Choose previously created contact form from the drop down list.', 'seomun' ),
                ),

                /* Extra */
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

        class WPBakeryShortCode_ct_contact_form extends CmsShortCode
        {

            protected function content($atts, $content = null)
            {
                return parent::content($atts, $content);
            }
        }
    }
?>
