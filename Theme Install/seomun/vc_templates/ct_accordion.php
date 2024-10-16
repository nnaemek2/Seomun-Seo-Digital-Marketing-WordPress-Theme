<?php
extract(shortcode_atts(array(
    //Title 
    'font_size' => '',
    'text_color' => '',
    'bg_title' => '',
    'font_weight' => '',
    'text_transform' => '',
    'letter_spacing' => '',

    //Description
    'content_font_size' => '',
    'content_text_color' => '',
    'line_height' => '',
    'bg_content' => '',
    //Image

    //Extra
    'ct_accordion' => '',
    'active_section' => '1',
    'el_class' => '',
    'animation' => '',
), $atts));

$accordion = array();
$accordion = (array) vc_param_group_parse_atts($ct_accordion);

$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

$styles_title = array(
    'color'         => $text_color,
    'font-size'     => $font_size,
    'letter-spacing'=> $letter_spacing,
    'font-weight'   => $font_weight,
    'text-transform'=> $text_transform,
    'background-color' => $bg_title,
);
$title_styles = '';
foreach ($styles_title as $key => $value) {
    if (!empty($value)) {
        $title_styles .= $key . ':' . $value . ';';
    }
}

$styles_desc = array(
    'color'         => $content_text_color,
    'font-size'     => $content_font_size,
    'line-height'   => $line_height,
);
$desc_styles = '';
foreach ($styles_desc as $key => $value) {
    if (!empty($value)) {
        $desc_styles .= $key . ':' . $value . ';';
    }
}

$html_id = cmsHtmlID('ct-accordion');
$key_id = cmsHtmlID('key');

if(!empty($accordion)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>"  class="ct-accordion layout1 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
        <div class="ct-accordion-body">
            <?php foreach ($accordion as $key => $value) {
                $ac_title = isset($value['ac_title']) ? $value['ac_title'] : '';
                $ac_content = isset($value['ac_content']) ? $value['ac_content'] : '';
                ?>
                <div class="card">
                    <div class="card-header" id="heading-<?php echo esc_attr($key_id.$key) ?>">
                        <a data-toggle="collapse" data-target="#collapse-<?php echo esc_attr($key_id.$key) ?>" aria-expanded="<?php if($key == ($active_section - 1)) { echo 'true'; } else { echo 'false'; } ?>" aria-controls="collapse-<?php echo esc_attr($key_id.$key) ?>" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . '"' : '' ?>>
                          <?php echo esc_attr($ac_title); ?>
                          <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div id="collapse-<?php echo esc_attr($key_id.$key) ?>" class="collapse  <?php if($key == ($active_section - 1)) { echo 'show'; } ?>" aria-labelledby="heading-<?php echo esc_attr($key_id.$key) ?>" data-parent="#<?php echo esc_attr($html_id); ?>" <?php if(!empty($bg_content)):?> style="background-color: <?php echo esc_attr($bg_content);?>"<?php endif;?>>
                        <?php if(!empty($ac_content)): ?>
                                <div class="card-body" <?php echo !empty($desc_styles) ? 'style="' . esc_attr($desc_styles) . '"' : '' ?>>
                                    <?php echo wp_kses_post($ac_content); ?>
                                </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php endif; ?>