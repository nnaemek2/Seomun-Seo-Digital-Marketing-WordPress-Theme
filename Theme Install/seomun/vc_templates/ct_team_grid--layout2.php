<?php
$atts_extra = shortcode_atts(array(
    'content_list'         => '',
    'title_color'          => '',
    'position_color'       => '',
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 2,
    'col_xs'               => 1,
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);

$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$grid_sizer = "col-xl-{$col_lg} col-lg-{$col_md} col-md-{$col_sm} col-sm-{$col_xs}";

wp_enqueue_script('isotope');
wp_enqueue_script('imagesloaded');
wp_enqueue_script('seomun-isotope', get_template_directory_uri() . '/assets/js/isotope.ct.js', array('jquery'), '1.0.0', true);
$team_content_list = (array) vc_param_group_parse_atts( $content_list );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-grid-team-layout2">

    <div class="ct-grid-inner ct-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($team_content_list as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            
            $social = isset($value['social']) ? $value['social'] : '';
            $el_social = (array) vc_param_group_parse_atts( $social );
            $image = isset($value['image']) ? $value['image'] : '';
            $img_size = isset($value['img_size']) ? $value['img_size'] : '600x600';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            $item_class = "grid-item col-xl-{$col_lg} col-lg-{$col_md} col-md-{$col_sm} col-sm-{$col_xs} col-{$col_xs}";
            ?>
            <div class="<?php echo esc_attr($item_class); ?>">
                <div class="team-item-inner">
                    <?php if(!empty($image)) : ?>
                        <div class="team-featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>

                    <div class="team-holder">
                        <div class="team-holder-inner">
                            <h3 class="team-title" <?php if(!empty($title_color)) { ?> style="color:<?php echo esc_attr( $title_color ); ?>" <?php } ?>>
                                <?php echo esc_attr($title); ?>
                            </h3>
                            <div class="team-position" <?php if(!empty($position_color)) { ?> style="color:<?php echo esc_attr( $position_color ); ?>" <?php } ?>>
                                <?php echo esc_attr($position); ?>
                            </div>
                        </div>
                    </div>
                    <div class="team-social">
                        <?php foreach ($el_social as $key => $value) {
                            $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                            $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                            <a href="<?php echo esc_url($social_link); ?>"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>