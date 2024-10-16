<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $newsletter_forms = array(
        'default' => esc_html__( 'Default Form', 'seomun' )
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $newsletter_forms[ $key ] = sprintf( esc_html__( 'Form %s', 'seomun' ), $index );
            $index ++;
        }
    }
} else {
    $newsletter_forms = '';
}

$opt_name = seomun_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('CaseThemeCore') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'seomun'),
    'page_title'           => esc_html__('Theme Options', 'seomun'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('CaseThemeCore') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => class_exists('CaseThemeCore') ? casethemescore()->path('APP_DIR') . '/templates/redux/' : '',
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'seomun'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'seomun'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'seomun'),
            'default'  => false
        ),
        array(
            'id'       => 'loading_type',
            'type'     => 'select',
            'title'    => esc_html__('Loading Style', 'seomun'),
            'options'  => array(
                'style1'  => esc_html__('Style 1', 'seomun'),
                'style2'  => esc_html__('Style 2', 'seomun'),
                'style3'  => esc_html__('Style 3', 'seomun'),
                'style4'  => esc_html__('Style 4', 'seomun'),
                'style5'  => esc_html__('Style 5', 'seomun'),
                'style6'  => esc_html__('Style 6', 'seomun'),
                'style7'  => esc_html__('Style 7', 'seomun'),
                'style8'  => esc_html__('Style 8', 'seomun'),
            ),
            'default'  => 'style1',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'seomun'),
            'default'  => false
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__('Body Boxed Background', 'seomun'),
            'required' => array( 0 => 'layout_boxed', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'seomun'),
            'description' => 'no minimize , generate css over time...',
            'default'  => false
        ),
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'seomun'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/favicon.png'
            )
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'seomun'),
    'icon'   => 'el-icon-website',
    'fields' => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'seomun'),
            'subtitle' => esc_html__('Select a layout for header.', 'seomun'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'           => 'h_bg_color',
            'type'         => 'color',
            'title'        => esc_html__( 'Main Background Color', 'seomun' ),
        ),
        array(
            'id'       => 'search_on',
            'type'     => 'switch',
            'title'    => esc_html__('Search Icon', 'seomun'),
            'default'  => false
        ),
        array(
            'id'       => 'cart_on',
            'type'     => 'switch',
            'title'    => esc_html__('Cart Icon', 'seomun'),
            'default'  => false
        ),
        array(
            'id'       => 'social_on',
            'type'     => 'switch',
            'title'    => esc_html__('Social Icon', 'seomun'),
            'default'  => true
        ),
        array(
            'id'       => 'hidden_sidebar_on',
            'type'     => 'switch',
            'title'    => esc_html__('Hidden Sidebar Icon', 'seomun'),
            'default'  => true
        ),
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', 'seomun'),
            'subtitle' => esc_html__('Header will be sticked when applicable.', 'seomun'),
            'default'  => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Top Bar', 'seomun'),
    'icon'       => 'el el-resize-vertical',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'topbar_phone',
            'type'     => 'text',
            'title'    => esc_html__('Phone', 'seomun'),
            'desc'     => 'Enter phone.',
            'default'  => '+909 7976 86 7',
        ),
        array(
            'id'       => 'topbar_email',
            'type'     => 'text',
            'title'    => esc_html__('Email', 'seomun'),
            'desc'     => 'Enter email.',
            'default'  => 'envelope info@webmail.coma',
        ),
        array(
            'title' => esc_html__('Social Link', 'seomun'),
            'type'  => 'section',
            'id' => 'social_link',
            'indent' => true
        ),
        array(
            'id'      => 'top_bar_social',
            'type'    => 'sorter',
            'title' => esc_html__('Social', 'seomun'),
            'desc'    => 'Choose which social networks are displayed and edit where they link to.',
            'options' => array(
                'enabled'  => array(
                    'facebook'  => 'Facebook', 
                    'twitter'   => 'Twitter', 
                    'google'    => 'Google',
                ),
                'disabled' => array(
                    'tripadvisor'     => 'Tripadvisor',
                    'skype'     => 'Skype',
                    'instagram' => 'Instagram',
                    'youtube'   => 'Youtube', 
                    'vimeo'     => 'Vimeo', 
                    'tumblr'    => 'Tumblr',
                    'pinterest' => 'Pinterest',
                    'yelp'      => 'Yelp',
                    'linkedin'  => 'Linkedin',
                )
            ),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Logo', 'seomun'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo', 'seomun'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),

        array(
            'id'       => 'logo_yellow',
            'type'     => 'media',
            'title'    => esc_html__('Logo Yellow', 'seomun'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-yellow.png'
            )
        ),

        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'seomun'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height', 'seomun'),
            'subtitle' => esc_html__('Set maximum height for your logo, just in case the logo is too large.', 'seomun'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Navigation', 'seomun'),
    'icon'       => 'el el-lines',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'font_menu',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Google Font', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'font-size'  => false,
            'line-height'  => false,
            'color'  => false,
            'output'      => array('.primary-menu li a'),
            'units'       => 'px',
        ),
        array(
            'id'       => 'menu_font_size',
            'type'     => 'text',
            'title'    => esc_html__('Font Size', 'seomun'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_letter_spacing',
            'type'     => 'text',
            'title'    => esc_html__('Letter Spacing', 'seomun'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_text_transform',
            'type'     => 'select',
            'title'    => esc_html__('Text Transform', 'seomun'),
            'options'  => array(
                ''  => esc_html__('Capitalize', 'seomun'),
                'uppercase' => esc_html__('Uppercase', 'seomun'),
                'lowercase'  => esc_html__('Lowercase', 'seomun'),
                'initial'  => esc_html__('Initial', 'seomun'),
                'inherit'  => esc_html__('Inherit', 'seomun'),
                'none'  => esc_html__('None', 'seomun'),
            ),
            'default'  => ''
        ),
        array(
            'id'      => 'main_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color - First Level', 'seomun'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'id'      => 'main_menu_color_sub',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color - Sub Level', 'seomun'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'title' => esc_html__('Button Navigation', 'seomun'),
            'type'  => 'section',
            'id' => 'button_navigation',
            'indent' => true,
        ),
        array(
            'id' => 'h_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'seomun'),
            'default' => '',
        ),
        array(
            'id'       => 'h_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'seomun'),
            'options'  => array(
                'page'  => esc_html__('Page', 'seomun'),
                'custom'  => esc_html__('Custom', 'seomun')
            ),
            'default'  => 'page',
        ),
        array(
            'id'    => 'h_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'seomun' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'h_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'seomun'),
            'default' => '',
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'seomun'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'seomun'),
                '_blank'  => esc_html__('Blank', 'seomun')
            ),
            'default'  => '_self',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Search', 'seomun'),
    'icon'       => 'el el-search',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'search_background_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color Overlay', 'seomun'),
            'output' => array('background-color' => '.ct-modal.ct-search-popup'),
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'seomun'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id'       => 'ptitle_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Displayed', 'seomun'),
            'options'  => array(
                'show'  => esc_html__('Show', 'seomun'),
                'hidden'  => esc_html__('Hidden', 'seomun'),
            ),
            'default'  => 'show'
        ),
        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'seomun'),
            'subtitle' => esc_html__('Page title background color.', 'seomun'),
            'output'   => array('#pagetitle'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'pagetitle_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color Overlay', 'seomun'),
            'output' => array('background-color' => '#pagetitle.bg-overlay:before'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', 'seomun'),
            'subtitle' => esc_html__('Page title color.', 'seomun'),
            'output'   => array('#pagetitle h1.page-title, #pagetitle h6.page-subtitle'),
            'default'  => '',
            'transparent' => false,
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'seomun'),
            'options'  => array(
                'show'  => esc_html__('Show', 'seomun'),
                'hidden'  => esc_html__('Hidden', 'seomun'),
            ),
            'default'  => 'hidden',
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'seomun'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'seomun'),
            'subtitle' => esc_html__('Content background color.', 'seomun'),
            'output' => array('background-color' => '#content, .site-layout-default .site-footer:before')
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'seomun'),
            'desc'           => esc_html__('Default: Top-120px, Bottom-120px', 'seomun'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'seomun'),
            'default' => '',
            'desc'           => esc_html__('Default: Search Keywords...', 'seomun'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Archive', 'seomun'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'seomun'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'seomun'),
            'options'  => array(
                'left'  => esc_html__('Left', 'seomun'),
                'right' => esc_html__('Right', 'seomun'),
                'none'  => esc_html__('Disabled', 'seomun')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'seomun'),
            'subtitle' => esc_html__('Show author name on each post.', 'seomun'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'seomun'),
            'subtitle' => esc_html__('Show date posted on each post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'seomun'),
            'subtitle' => esc_html__('Show category names on each post.', 'seomun'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__('Comments', 'seomun'),
            'subtitle' => esc_html__('Show comments count on each post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_tags_on',
            'title'    => esc_html__('Tags', 'seomun'),
            'subtitle' => esc_html__('Show tags count on each post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'seomun'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'seomun'),
            'subtitle' => esc_html__('Select a sidebar position', 'seomun'),
            'options'  => array(
                'left'  => esc_html__('Left', 'seomun'),
                'right' => esc_html__('Right', 'seomun'),
                'none'  => esc_html__('Disabled', 'seomun')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_text_align',
            'type'     => 'button_set',
            'title'    => esc_html__('Text Align', 'seomun'),
            'options'  => array(
                'inherit'  => esc_html__('Inherit', 'seomun'),
                'justify'  => esc_html__('Justify', 'seomun'),
            ),
            'default'  => 'inherit'
        ),
        array(
            'id'       => 'post_feature_image_on',
            'title'    => esc_html__('Feature Image', 'seomun'),
            'subtitle' => esc_html__('Show feature image on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'seomun'),
            'subtitle' => esc_html__('Show author name on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'seomun'),
            'subtitle' => esc_html__('Show date on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'seomun'),
            'subtitle' => esc_html__('Show category names on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'seomun'),
            'subtitle' => esc_html__('Show tags count on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__('Comments', 'seomun'),
            'subtitle' => esc_html__('Show comments count on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'seomun'),
            'subtitle' => esc_html__('Show social share on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_comments_form_on',
            'title'    => esc_html__('Comments Form', 'seomun'),
            'subtitle' => esc_html__('Show comments form on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_related_post',
            'title'    => esc_html__('Related', 'seomun'),
            'subtitle' => esc_html__('Show related on single post.', 'seomun'),
            'type'     => 'switch',
            'default'  => false
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
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Portfolio', 'seomun'),
    'icon'       => 'el el-cog ',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'seomun'),
            'default' => '',
            'desc'     => 'Default: portfolio',
        ),
        array(
            'id'      => 'tax_portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Categories Slug', 'seomun'),
            'default' => '',
            'desc'     => 'Default: portfolio-category',
        ),
    )
));

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'seomun'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'footer_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'seomun'),
            'subtitle' => esc_html__('Select a layout for upper footer area.', 'seomun'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/footer-layout/f1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/footer-layout/f2.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'footer_top_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background Color', 'seomun'),
            'subtitle' => esc_html__('Footer top background color.', 'seomun'),
            'default'  => '',
            'output'   => array('.site-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Top', 'seomun'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'footer_top_column',
            'type'     => 'button_set',
            'title'    => esc_html__('Columns', 'seomun'),
            'options'  => array(
                '2'  => esc_html__('2 Column', 'seomun'),
                '3'  => esc_html__('3 Column', 'seomun'),
                '4'  => esc_html__('4 Column', 'seomun'),
            ),
            'default'  => '3',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_top_logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo Footer', 'seomun'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-footer.png'
            )
        ),
        array(
            'id'       => 'footer_top_paddings',
            'type'     => 'spacing',
            'title'    => esc_html__('Paddings', 'seomun'),
            'subtitle' => esc_html__('Footer top paddings.', 'seomun'),
            'mode'     => 'padding',
            'units'    => array('px'),
            'right'    => false,
            'left'     => false,
            'default'  => array(
                'padding-top'    => '',
                'padding-bottom' => ''
            ),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'    => 'footer_top_color',
            'type'  => 'color',
            'title' => esc_html__('Text Color', 'seomun'),
            'output'   => array('body .site-footer .top-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
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
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Back to Top Button', 'seomun'),
            'subtitle' => esc_html__('Show back to top button when scrolled down.', 'seomun'),
            'default'  => true,
        ),
        array(
            'title' => esc_html__('Widget Title', 'seomun'),
            'type'  => 'section',
            'id' => 'footer_wg_title',
            'indent' => true,
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'    => 'footer_top_heading_color',
            'type'  => 'color',
            'title' => esc_html__('Title Color', 'seomun'),
            'output'  => array('.site-footer .footer-widget-title'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
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
            'output'  => array('.site-footer .footer-widget-title'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Content', 'seomun'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'=>'footer_content',
            'type' => 'textarea',
            'title' => esc_html__('Content', 'seomun'),
            'validate' => 'html_custom',
            'subtitle' => esc_html__('Custom HTML Allowed: a, br, em, strong, span, p, div, h1->h6', 'seomun'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'class' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            )
        ),
        array(
            'id'       => 'f_footer_of',
            'type'     => 'switch',
            'title'    => esc_html__('Socials Icon', 'seomun'),
            'default'  => true
        ),
        array(
            'id'      => 'footer_social',
            'type'    => 'sorter',
            'title' => esc_html__('Social', 'seomun'),
            'desc'    => 'Choose which social networks are displayed and edit where they link to.',
            'options' => array(
                'enabled'  => array(
                    'instagram' => 'Instagram',
                    'tripadvisor'     => 'Tripadvisor',
                    'twitter'   => 'Twitter', 
                ),
                'disabled' => array(
                    'pinterest' => 'Pinterest',
                    'google'    => 'Google',
                    'linkedin'  => 'Linkedin',
                    'facebook'  => 'Facebook', 
                    'skype'     => 'Skype',
                    'youtube'   => 'Youtube', 
                    'vimeo'     => 'Vimeo', 
                    'tumblr'    => 'Tumblr',
                    'yelp'      => 'Yelp',
                )
            ),
            'required' => array( 0 => 'f_footer_of', 1 => '=', 2 => '1' ),
            'force_output' => true
        ),
    )
));
//Footer Bottom
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Bottom', 'seomun'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'=>'footer_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'seomun'),
            'validate' => 'html_custom',
            'subtitle' => esc_html__('Custom HTML Allowed: a, br, em, strong, span, p, div, h1->h6', 'seomun'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'class' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            )
        ),
        array(
            'id'       => 'footer_bottom_paddings',
            'type'     => 'spacing',
            'title'    => esc_html__('Paddings', 'seomun'),
            'subtitle' => esc_html__('Footer bottom paddings.', 'seomun'),
            'mode'     => 'padding',
            'units'    => array('px'),
            'right'    => false,
            'left'     => false,
            'default'  => array(
                'padding-top'    => '',
                'padding-bottom' => ''
            ),
            'output'   => array('.bottom-footer')
        ),
        array(
            'id'    => 'footer_bottom_color',
            'type'  => 'color',
            'title' => esc_html__('Text Color', 'seomun'),
            'output'  => array('body .bottom-footer, .bottom-footer .copyright-content a'),
        ),
        array(
            'id'       => 'footer_bottom_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'seomun'),
            'subtitle' => esc_html__('Select background Color for Footer.', 'seomun'),
            'output' => array('background-color' => '#colophon.site-footer .bottom-footer'),
        ),
    )
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'seomun'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'title' => esc_html__('Primary Color', 'seomun'),
            'type'  => 'section',
            'id' => 'sec_primary_color1',
            'indent' => true,
        ),
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color 1', 'seomun'),
            'transparent' => false,
            'default'     => '#ef3b58'
        ),
        array(
            'id'          => 'primary_color2',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color 2', 'seomun'),
            'transparent' => false,
            'default'     => '#ffa61b'
        ),
        array(
            'id'          => 'primary_color3',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color 3', 'seomun'),
            'transparent' => false,
            'default'     => '#5438f7'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors 1', 'seomun'),
            'default' => array(
                'regular' => '#ef3b58',
                'hover'   => '#7d8c95',
                'active'  => '#7d8c95'
            ),
            'output'  => array('a')
        ),

        //Secondary Color
        array(
            'title' => esc_html__('Secondary Color', 'seomun'),
            'type'  => 'section',
            'id' => 'sec_secondary_color',
            'indent' => true,
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color 1', 'seomun'),
            'subtitle'    => esc_html__('Only apply for color body of your website.', 'seomun'),
            'transparent' => false,
            'default'     => '#7d8c95'
        ),
        array(
            'id'          => 'secondary_color2',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color 2', 'seomun'),
            'subtitle'    => esc_html__('Only apply for Title of your website.', 'seomun'),
            'transparent' => false,
            'default'     => '#092232'
        ),
        array(
            'id'          => 'secondary_color3',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color 3', 'seomun'),
            'subtitle'    => esc_html__('Only apply for color body of your website.', 'seomun'),
            'transparent' => false,
            'default'     => '#5f5f5f'
        ),
        array(
            'id'          => 'secondary_color4',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color 4', 'seomun'),
            'subtitle'    => esc_html__('Only apply for Title of your website.', 'seomun'),
            'transparent' => false,
            'default'     => '#252525'
        ),
    )
));
/* Social Media */
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Social Media', 'seomun'),
    'icon'       => 'el el-twitter',
    'subsection' => false,
    'fields'     => array(
        array(
            'id'      => 'social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_inkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Inkedin URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_rss_url',
            'type'    => 'text',
            'title'   => esc_html__('Rss URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_google_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'seomun'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'seomun'),
            'default' => '',
        ),
    )
));
/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::get_option($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'seomun'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'seomun'),
            'options'  => array(
                'Rubik'  => esc_html__('Default', 'seomun'),
                'Google-Font'  => esc_html__('Google Font', 'seomun'),
            ),
            'default'  => 'Rubik',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'seomun'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'body_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Color', 'seomun'),
            'transparent' => false,
            'default'     => '',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true,
            'output'      => array('body, .single-hentry.archive .entry-content, .single-post .content-area, .ct-related-post .item-holder .item-content'),
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'seomun'),
            'options'  => array(
                'Poppins'  => esc_html__('Default', 'seomun'),
                'Google-Font'  => esc_html__('Google Font', 'seomun'),
            ),
            'default'  => 'Poppins',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'seomun'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'seomun'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'seomun'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'seomun'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'seomun'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'seomun'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        )
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'seomun'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'seomun'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'seomun'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'seomun'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'seomun'),
            'validate' => 'no_html'
        )
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'seomun'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'seomun'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'seomun'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'seomun'),
                    'right' => esc_html__('Right', 'seomun'),
                    'none'  => esc_html__('Disabled', 'seomun')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'seomun'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'seomun'),
                'default' => 9,
                'min'  => 6,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'shop_content_padding',
                'type'     => 'spacing',
                'title'    => esc_html__('Content Paddings', 'seomun'),
                'subtitle' => esc_html__('Content paddings.', 'seomun'),
                'mode'     => 'padding',
                'units'    => array('em', 'px', '%'),
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
                'left'     => false,
                'output'   => array('.woocommerce #content, .woocommerce-page #content'),
                'default'  => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                    'units'  => 'px',
                )
            ),
        )
    ));
}

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Call To Action', 'seomun'),
    'icon'   => 'el el-align-center',
    'fields' => array(
        array(
            'id'       => 'cta',
            'type'     => 'button_set',
            'title'    => esc_html__('Call To Action', 'seomun'),
            'options'  => array(
                'show'  => esc_html__('Show', 'seomun'),
                'hide'  => esc_html__('Hide', 'seomun'),
            ),
            'default'  => 'hide'
        ),
        array(
            'id'       => 'cta_image',
            'type'     => 'media',
            'title'    => esc_html__('Image', 'seomun'),
            'default' => '',
            'required' => array( 0 => 'cta', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'      => 'cta_subtitle',
            'type'    => 'text',
            'title'   => esc_html__('Sub Title', 'seomun'),
            'default' => '',
            'required' => array( 0 => 'cta', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'      => 'cta_title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'seomun'),
            'default' => '',
            'required' => array( 0 => 'cta', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    ),
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'seomun'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'seomun'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'seomun'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'seomun'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'seomun'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'seomun'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'seomun')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'seomun'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'seomun'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));