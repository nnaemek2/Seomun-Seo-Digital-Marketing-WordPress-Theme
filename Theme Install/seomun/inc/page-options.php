<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  seomun_Post_Metabox $metabox
 */

/**
 * Get list menu.
 * @return array
 */
function seomun_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'seomun')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

function seomun_page_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'seomun' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => seomun_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'seomun' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_audio' ) ) {
		$metabox->set_args( 'cms_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'seomun' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_link' ) ) {
		$metabox->set_args( 'cms_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'seomun' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_quote' ) ) {
		$metabox->set_args( 'cms_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'seomun' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_video' ) ) {
		$metabox->set_args( 'cms_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'seomun' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_gallery' ) ) {
		$metabox->set_args( 'cms_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'seomun' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config post blog meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'General', 'seomun' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'seomun' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'seomun' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'seomun'),
	                'right' => esc_html__('Right', 'seomun'),
	                'none'  => esc_html__('Disabled', 'seomun')
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
			array(
	            'id'       => 'custom_sub_title',
	            'type'     => 'text',
	            'title'    => esc_html__('Sub Title', 'seomun'),
	            'default'  => ''
	        ),
			array(
	            'id'       => 'single_content_max_width',
	            'type'     => 'text',
	            'title'    => esc_html__('Content Max Width', 'seomun'),
	            'validate' => 'numeric',
	            'desc'     => 'Enter number',
	            'msg'      => 'Please enter number',
	            'default'  => ''
	        ),
		)
	) );


    /* Extra Post Type */
	if ( ! $metabox->isset_args( 'portfolio' ) ) {
		$metabox->set_args( 'portfolio', array(
			'opt_name'            => 'portfolio_option',
			'display_name'        => esc_html__( 'Portfolio Settings', 'seomun' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}
	
	if ( ! $metabox->isset_args( 'product' ) ) {
		$metabox->set_args( 'product', array(
			'opt_name'            => 'product_option',
			'display_name'        => esc_html__( 'Timan Product Settings', 'seomun' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config Portfolio meta options
	 *
	 */
	$metabox->add_section( 'portfolio', array(
		'title'  => esc_html__( 'General', 'seomun' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
            array(
                'id'    => 'portfolio_gallery',
                'type'  => 'gallery',
                'title' => esc_html__( 'Add/Edit Gallery', 'seomun' ),
            ),
	        array(
				'id'           => 'custom_title',
				'type'         => 'text',
				'title'        => esc_html__( 'Custom Title', 'seomun' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_sub_title',
				'type'  => 'text',
				'title' => esc_html__( 'Sub Title 1', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_sub_title2',
				'type'  => 'text',
				'title' => esc_html__( 'Sub Title 2', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_excerpt',
				'type'  => 'textarea',
				'title' => esc_html__( 'Excerpt', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_client',
				'type'  => 'text',
				'title' => esc_html__( 'Client', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_link',
				'type'  => 'text',
				'title' => esc_html__( 'Link', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_date',
				'type'  => 'text',
				'title' => esc_html__( 'Date', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_btn_text',
				'type'  => 'text',
				'title' => esc_html__( 'Button Text', 'seomun' ),
			),
			array(
				'id'    => 'portfolio_btn_link',
				'type'  => 'text',
				'title' => esc_html__( 'Button Link', 'seomun' ),
			),
			array(
	            'id'       => 'portfolio_btn_target',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Button Target', 'seomun'),
	            'options'  => array(
	                '_self'  => esc_html__('Same Windown', 'seomun'),
	                '_blank' => esc_html__('New Windown', 'seomun'),
	            ),
	            'default'  => '_self'
	        ),
		)
	) );


	$metabox->add_section( 'product', array(
		'title'  => esc_html__( 'General', 'seomun' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'custom_sub_title',
	            'type'     => 'text',
	            'title'    => esc_html__('Page Title - Description', 'seomun'),
	            'default'  => ''
	        ),
	        array(
	            'id'       => 'ptitle_font_size',
	            'type'     => 'text',
	            'title'    => esc_html__('Page Title - Font Size', 'seomun'),
	            'validate' => 'numeric',
	            'desc'     => 'Enter number (Default 70px)',
	            'msg'      => 'Please enter number',
	            'default'  => ''
	        ),
	        array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'title'    => esc_html__('Page Title - Background', 'seomun'),
	            'subtitle' => esc_html__('Page title background color.', 'seomun'),
	            'output'   => array('body #pagetitle'),
	            'background-color' => false
	        ),
		)
	) );

	/**
	 * Config page meta options
	 *
	 */

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'seomun' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'seomun' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'seomun' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'seomun' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'seomun' ),
				'options'      => array(
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
					'3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
				),
				'default'      => seomun_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'seomun' ),
		'icon'   => 'el-icon-map-marker',
		'fields' => array(
			array(
	            'id'       => 'ptitle_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Displayed', 'seomun'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'seomun'),
	                'show'  => esc_html__('Show', 'seomun'),
	                'hidden'  => esc_html__('Hidden', 'seomun'),
	            ),
	            'default'  => 'themeoption'
	        ),
	        array(
				'id'           => 'custom_title',
				'type'         => 'text',
				'title'        => esc_html__( 'Title', 'seomun' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'seomun' ),
			),
			array(
	            'id'      =>'custom_sub_title',
	            'type'    => 'text',
	            'title'   => esc_html__('Sub Title', 'seomun'),
	            'default' => '',
	        ),
			array(
	            'id'       => 'ptitle_font_size',
	            'type'     => 'text',
	            'title'    => esc_html__('Font Size', 'seomun'),
	            'validate' => 'numeric',
	            'desc'     => 'Enter number (Default 70px)',
	            'msg'      => 'Please enter number',
	            'default'  => ''
	        ),
	        array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'title'    => esc_html__('Background', 'seomun'),
	            'subtitle' => esc_html__('Page title background color.', 'seomun'),
	            'output'   => array('body #pagetitle'),
	            'background-color' => false
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'seomun' ),
		'desc'   => esc_html__( 'Settings for content area.', 'seomun' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'seomun' ),
				'subtitle' => esc_html__( 'Content background color.', 'seomun' ),
				'output'   => array( 'background-color' => '#content, .site-layout-default .site-footer:before' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '#content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'seomun' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'seomun' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'seomun' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'seomun' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'seomun' ),
					'right' => esc_html__( 'Right', 'seomun' ),
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Footer', 'seomun' ),
		'desc'   => esc_html__( 'Settings for footer area.', 'seomun' ),
		'icon'   => 'el el-website',
		'fields' => array(
            array(
                'id'       => 'custom_footer',
                'type'     => 'switch',
                'title'    => esc_html__('Custom Footer', 'seomun'),
                'default'  => false,
                'indent' => true
            ),
            array(
                'id'       => 'footer_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Layout', 'seomun'),
                'subtitle' => esc_html__('Select a layout for upper footer area.', 'seomun'),
                'options'  => array(
                    '0' => get_template_directory_uri() . '/assets/images/footer-layout/f0.jpg',
                    '1' => get_template_directory_uri() . '/assets/images/footer-layout/f1.jpg',
                    '2' => get_template_directory_uri() . '/assets/images/footer-layout/f2.jpg',
                ),
                'default'  => seomun_get_option_of_theme_options('footer_layout'),
                'required' => array( 0 => 'custom_footer', 1 => '=', 2 => '1' ),
                'force_output' => true
            ),
            array(
                'id'       => 'footer_bg',
                'type'     => 'background',
                'title'    => esc_html__('Background', 'seomun'),
                'subtitle' => esc_html__('Footer background.', 'seomun'),
                'output'   => array('.site-footer.bg-image'),
                'background-color'   => true,
                'required' => array( 0 => 'custom_footer', 1 => '=', 2 => '1' ),
                'default'  => '',
                'force_output' => true,
            ),

            array(
                'id'       => 'footer_bg_ovl',
                'type'     => 'color_rgba',
                'title'    => esc_html__('Background Overlay', 'seomun'),
                'subtitle' => esc_html__('Footer background color Overlay', 'seomun'),
                'required' => array( 0 => 'custom_footer', 1 => '=', 2 => '1' ),
                'force_output' => true,
                'output' => array('background-color' => 'body .site-footer::before'),
            ),
	        array(
	            'id'    => 'footer_top_color',
	            'type'  => 'color',
	            'title' => esc_html__('Text Color', 'seomun'),
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	            'output'   => array('body .site-footer .top-footer'),
	        ),
	        array(
	            'id'      => 'footer_top_link_color',
	            'type'    => 'link_color',
	            'title'   => esc_html__('Links Color', 'seomun'),
	            'regular' => true,
	            'hover'   => false,
	            'active'  => false,
	            'visited' => false,
	            'output'  => array('body .site-footer .top-footer a'),
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'    => 'line_bottom_color',
	            'type'  => 'color_rgba',
	            'title' => esc_html__('Line Color', 'seomun'),
	            'output' => array('background-color' => '.site-footer .border-bottom-footer'),
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'title' => esc_html__('Widget Title', 'seomun'),
	            'type'  => 'section',
	            'id' => 'footer_wg_title',
	            'indent' => true,
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'    => 'footer_top_heading_color',
	            'type'  => 'color',
	            'title' => esc_html__('Title Color', 'seomun'),
	            'output'  => array('body .site-footer .footer-widget-title'),
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'       => 'footer_top_heading_fs',
	            'type'     => 'text',
	            'title'    => esc_html__('Font Size', 'seomun'),
	            'validate' => 'numeric',
	            'desc'     => 'Enter number',
	            'msg'      => 'Please enter number',
	            'default'  => '',
	            'output'  => array('body .site-footer .footer-widget-title'),
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'title' => esc_html__('CopyRight', 'seomun'),
	            'type'  => 'section',
	            'id' => 'footer_copyright',
	            'indent' => true,
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'    => 'footer_bottom_color',
	            'type'  => 'color',
	            'title' => esc_html__('Text Color', 'seomun'),
	            'output'  => array('body .bottom-footer, .bottom-footer .copyright-content a'),
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'       => 'footer_bottom_bg_color',
	            'type'     => 'color_rgba',
	            'title'    => esc_html__('Background Color', 'seomun'),
	            'subtitle' => esc_html__('Select background Color for Footer.', 'seomun'),
	            'output' => array('background-color' => '#colophon.site-footer .bottom-footer'),
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	    )
	) );

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'cms_pf_video', array(
		'title'  => esc_html__( 'Video', 'seomun' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'seomun' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'seomun' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'seomun' ),
				'desc'  => esc_html__( 'Upload video file', 'seomun' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'seomun' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'seomun' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'seomun' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'seomun' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'seomun' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'seomun' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'seomun' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'seomun' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'seomun' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'seomun' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_link', array(
		'title'  => esc_html__( 'Link', 'seomun' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'seomun' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'seomun' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'seomun' )
			)
		)
	) );

}


add_action( 'cms_post_metabox_register', 'seomun_page_options_register' );

function seomun_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( seomun_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}