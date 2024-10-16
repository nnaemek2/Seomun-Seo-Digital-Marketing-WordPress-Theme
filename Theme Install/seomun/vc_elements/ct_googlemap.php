<?php
vc_map(array(
    'name' => 'Google Map',
    'base' => 'ct_googlemap',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Google Map Displayed', 'seomun' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'seomun'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('API Key', 'seomun'),
            'param_name' => 'api',
            'value' => '',
            'description' => esc_html__('Enter you api key of map, get key from (https://console.developers.google.com)', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Address', 'seomun'),
            'param_name' => 'address',
            'value' => 'New York, United States',
            'description' => esc_html__('Enter address of Map', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Coordinate', 'seomun'),
            'param_name' => 'coordinate',
            'value' => '',
            'description' => esc_html__('Enter coordinate of Map, format input (latitude, longitude)', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Click Show Info window', 'seomun'),
            'param_name' => 'infoclick',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('Click a marker and show info window (Default Show).', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Marker Coordinate', 'seomun'),
            'param_name' => 'markercoordinate',
            'value' => '',
            'description' => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Marker Title', 'seomun'),
            'param_name' => 'markertitle',
            'value' => '',
            'description' => esc_html__('Enter Title Info windows for marker', 'seomun')
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Marker Description', 'seomun'),
            'param_name' => 'markerdesc',
            'value' => '',
            'description' => esc_html__('Enter Description Info windows for marker', 'seomun')
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Marker Icon', 'seomun'),
            'param_name' => 'markericon',
            'value' => '',
            'description' => esc_html__('Select image icon for marker', 'seomun')
        ),
        array(
            'type' => 'textarea_raw_html',
            'heading' => esc_html__('Marker List', 'seomun'),
            'param_name' => 'markerlist',
            'value' => '',
            'description' => esc_html__('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Info Window Max Width', 'seomun'),
            'param_name' => 'infowidth',
            'value' => '200',
            'description' => esc_html__('Set max width for info window', 'seomun')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Map Type', 'seomun'),
            'param_name' => 'type',
            'value' => array(
                'ROADMAP' => 'ROADMAP',
                'HYBRID' => 'HYBRID',
                'SATELLITE' => 'SATELLITE',
                'TERRAIN' => 'TERRAIN'
            ),
            'description' => esc_html__('Select the map type.', 'seomun')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style Template', 'seomun'),
            'param_name' => 'style',
            'value' => array(
                'Default' => '',
                'Custom' => 'custom',
                'Light Monochrome' => 'light-monochrome',
                'Blue water' => 'blue-water',
                'Midnight Commander' => 'midnight-commander',
                'Paper' => 'paper',
                'Red Hues' => 'red-hues',
                'Hot Pink' => 'hot-pink'
            ),
            'description' => 'Select your heading size for title.'
        ),
        array(
            'type' => 'textarea_raw_html',
            'heading' => esc_html__('Custom Template', 'seomun'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Get template from http://snazzymaps.com', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Zoom', 'seomun'),
            'param_name' => 'zoom',
            'value' => '13',
            'description' => esc_html__('zoom level of map, default is 13', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Width', 'seomun'),
            'param_name' => 'width',
            'value' => 'auto',
            'description' => esc_html__('Width of map without pixel, default is auto', 'seomun')
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Height', 'seomun'),
            'param_name' => 'height',
            'value' => '350px',
            'description' => esc_html__('Height of map without pixel, default is 350px', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Scroll Wheel', 'seomun'),
            'param_name' => 'scrollwheel',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Pan Control', 'seomun'),
            'param_name' => 'pancontrol',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('Show or hide Pan control.', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Zoom Control', 'seomun'),
            'param_name' => 'zoomcontrol',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('Show or hide Zoom Control.', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Scale Control', 'seomun'),
            'param_name' => 'scalecontrol',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('Show or hide Scale Control.', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Map Type Control', 'seomun'),
            'param_name' => 'maptypecontrol',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('Show or hide Map Type Control.', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Street View Control', 'seomun'),
            'param_name' => 'streetviewcontrol',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('Show or hide Street View Control.', 'seomun')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Over View Map Control', 'seomun'),
            'param_name' => 'overviewmapcontrol',
            'value' => array(
                esc_html__('Yes, please', 'seomun') => true
            ),
            'description' => esc_html__('Show or hide Over View Map Control.', 'seomun')
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Box', 'seomun'),
            'param_name' => 'map_box',
            'value' => array(
                'No' => 'no',
                'Yes' => 'yes',
            ),
            'group' => esc_html__('Info Box', 'seomun'),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'seomun' ),
            'param_name' => 'map_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'seomun' ),
            'group' => esc_html__('Info Box', 'seomun'),
            'dependency' => array(
                'element'=>'map_box',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Phone', 'seomun'),
            'param_name' => 'map_phone',
            'group' => esc_html__('Info Box', 'seomun'),
            'dependency' => array(
                'element'=>'map_box',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Email', 'seomun'),
            'param_name' => 'map_mail',
            'group' => esc_html__('Info Box', 'seomun'),
            'dependency' => array(
                'element'=>'map_box',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text Button', 'seomun'),
            'param_name' => 'map_text_butotn',
            'group' => esc_html__('Info Box', 'seomun'),
            'dependency' => array(
                'element'=>'map_box',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Link Button', 'seomun'),
            'param_name' => 'map_link_butotn',
            'group' => esc_html__('Info Box', 'seomun'),
            'dependency' => array(
                'element'=>'map_box',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'seomun' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'seomun' ),
            'group' => esc_html__('Extra', 'seomun'),
        ),
    )
));

class WPBakeryShortCode_ct_googlemap extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>