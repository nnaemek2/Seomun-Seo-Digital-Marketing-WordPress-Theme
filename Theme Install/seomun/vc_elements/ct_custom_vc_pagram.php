<?php
/*
 * VC
 */
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Style", 'seomun'),
    "param_name" => "ct_row_class",
    "value" => array(
        'None' => '',
        'Row Overlay' => 'row-overlay',
        'Row Background Color Primary' => 'bg-primary',
        'Row Background Color Secondary' => 'bg-secondary',
        'Row Visible' => 'row-visible',
        'Row Flex' => 'row-flex',
        'Row Padding Right Remove' => 'rm-padding-right',
    ),
    "group" => esc_html__("Customs", 'seomun'),
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Background Image Position", 'seomun'),
    "param_name" => "bg_image_position",
    "value" => array(
        'Inherit' => 'bg-image-ps-inherit',
        'Top'     => 'bg-image-ps-top',
        'Right'   => 'bg-image-ps-right',
        'Center'  => 'bg-image-ps-center',
        'Bottom'  => 'bg-image-ps-bottom',
        'Left'    => 'bg-image-ps-left',
    ),
    "group" => esc_html__("Design Options", 'seomun'),
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Style", 'seomun'),
    "param_name" => "ct_column_class",
    "value" => array(
        'None' => '',
        'Column Overlay' => 'col-overlay',
        'Remove Padding (Left/Right) Large Devices ( < 1199px ) to 15px' => 'rm-padding-lg',
        'Remove Padding (Left/Right) Medium Devices ( < 991px ) to 15px' => 'rm-padding-md',
        'Remove Padding (Left/Right) Small Devices ( < 767px ) to 15px' => 'rm-padding-sm',
        'Remove Padding (Left/Right) Mini Devices ( < 575px ) to 15px' => 'rm-padding-xs',
        'Remove Margin (Top/Right/Bottom/Left) Small Devices ( < 767px ) to 0px' => 'rm-margin-sm',
    ),
    "group" => esc_html__("Customs", 'seomun'),
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Column Offset", 'seomun'),
    "param_name" => "ct_column_offset",
    "value" => array(
        'None' => '',
        'Offset Container Left' => 'col-offset-left',
        'Offset Container Left Small' => 'col-offset-left-sm',
        'Offset Container Right' => 'col-offset-right',
        'Offset Container Right Small' => 'col-offset-right-sm',
    ),
    "group" => esc_html__("Customs", 'seomun'),
));

vc_add_param("vc_column", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Column Border Bottom", 'seomun'),
    "param_name" => "ct_column_bd_bottom",
    "value" => array(
        'None' => '',
        'Border-Radius Bottom Column' => 'column-bd-bottom',
        'Border-Radius Bottom Column Has Shadow' => 'column-bd-bottom has-shadow',
    ),
    "group" => esc_html__("Customs", 'seomun'),
));

vc_add_param("vc_column_inner", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Style", 'seomun'),
    "param_name" => "ct_column_inner_class",
    "value" => array(
        'None' => '',
        'Remove Padding (Left/Right) Large Devices ( < 1199px ) to 30px' => 'rm-padding-lg30',
        'Remove Padding (Left/Right) Large Devices ( < 1199px ) to 15px' => 'rm-padding-lg',
        'Remove Padding (Left/Right) Medium Devices ( < 991px ) to 15px' => 'rm-padding-md',
        'Remove Padding (Left/Right) Small Devices ( < 767px ) to 15px' => 'rm-padding-sm',
        'Remove Padding (Left/Right) Mini Devices ( < 575px ) to 15px' => 'rm-padding-xs',
    ),
    "group" => esc_html__("Customs", 'seomun'),
));

vc_add_param("vc_column_inner",
    array(
        'type' => 'animation_style',
        'heading' => esc_html__( 'Animation', 'seomun' ),
        'param_name' => 'animation_column',
        'description' => esc_html__( 'Choose your animation style', 'seomun' ),
        'admin_label' => false,
        'weight' => 0,
        "group" => esc_html__("Customs", 'seomun'),
    )
);

// vc_tta_accordion
//--------------------------------------------------
vc_remove_param( 'vc_tta_accordion', 'title' );
vc_remove_param( 'vc_tta_accordion', 'style' );
vc_remove_param( 'vc_tta_accordion', 'shape' );
vc_remove_param( 'vc_tta_accordion', 'color' );
vc_remove_param( 'vc_tta_accordion', 'no_fill' );
vc_remove_param( 'vc_tta_accordion', 'spacing' );
vc_remove_param( 'vc_tta_accordion', 'gap' );
vc_remove_param( 'vc_tta_accordion', 'c_align' );
vc_remove_param( 'vc_tta_accordion', 'autoplay' );
vc_remove_param( 'vc_tta_accordion', 'c_icon' );
vc_remove_param( 'vc_tta_accordion', 'c_position' );
vc_add_param("vc_tta_accordion",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'seomun' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'default',
            'Primary Color1' => 'primary-color1',
            'Primary Color2' => 'primary-color2',
            'Secondary Color'=> 'secondary-color',
        ),
    )
);

// vc_tta_tabs
//--------------------------------------------------
vc_remove_param( 'vc_tta_tabs', 'title' );
vc_remove_param( 'vc_tta_tabs', 'style' );
vc_remove_param( 'vc_tta_tabs', 'shape' );
vc_remove_param( 'vc_tta_tabs', 'color' );
vc_remove_param( 'vc_tta_tabs', 'spacing' );
vc_remove_param( 'vc_tta_tabs', 'gap' );
vc_add_param("vc_tta_tabs",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'seomun' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'default',
        ),
    )
);

vc_remove_param( 'vc_tta_tour', 'title' );
vc_remove_param( 'vc_tta_tour', 'style' );
vc_remove_param( 'vc_tta_tour', 'shape' );
vc_remove_param( 'vc_tta_tour', 'color' );
vc_remove_param( 'vc_tta_tour', 'spacing' );
vc_remove_param( 'vc_tta_tour', 'gap' );
vc_add_param("vc_tta_tour",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'seomun' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'tour-default',
        ),
    )
);

// VC Image
//--------------------------------------------------
vc_remove_param( 'vc_single_image', 'style' );
vc_add_param("vc_single_image",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Styles', 'seomun' ),
        'param_name' => 'style',
        "value" => array(
            'Default' => 'default',
        ),
        "group" => esc_html__("Styles", 'seomun'),
    )
);
vc_add_param("vc_single_image",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image alignment small (768px < Screen < 991px)', 'seomun' ),
        'param_name' => 'ct_image_align_md',
        "value" => array(
            'Inherit' => 'inherit',
            'Left' => 'image_align_sm_left',
            'Center' => 'image_align_sm_center',
            'Right' => 'image_align_sm_right',
        ),
        "group" => esc_html__("Styles", 'seomun'),
    )
);
vc_add_param("vc_single_image",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image alignment small (Screen < 767px)', 'seomun' ),
        'param_name' => 'ct_image_align',
        "value" => array(
            'Inherit' => 'inherit',
            'Left' => 'image_align_xs_left',
            'Center' => 'image_align_xs_center',
            'Right' => 'image_align_xs_right',
        ),
        "group" => esc_html__("Styles", 'seomun'),
    )
);

// VC Text Block
//--------------------------------------------------
vc_add_param("vc_column_text",
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Text Align', 'seomun' ),
        'param_name' => 'text_align',
        "value" => array(
            'Left' => '',
            'Center' => 'text-center',
            'Right' => 'text-right',
        ),
    )
);
vc_remove_param( 'vc_pie', 'title' );
vc_remove_param( 'vc_pie', 'label_value' );