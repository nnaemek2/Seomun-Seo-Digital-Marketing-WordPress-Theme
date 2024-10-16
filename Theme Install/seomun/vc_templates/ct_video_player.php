<?php
extract(shortcode_atts(array(
    'video_link' => '',
    'video_image' => '',
    'play_fixed_center' => 'play-no-fixed',
    'play_style' => 'style1',
    'animation' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('ct-video');
$link = vc_build_link($video_link);
$a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
$image_url = '';
if (!empty($video_image)) {
    $attachment_image = wp_get_attachment_image_src($video_image, 'full');
    $image_url = $attachment_image[0];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); ?>

<div id="<?php echo esc_attr($html_id);?>" class="ct-video-wrapper <?php if(!empty($image_url)) { echo 'intro-added'; } ?> <?php echo esc_attr( $play_style.' '.$play_fixed_center.' '.$el_class.' '.$animation_classes ); ?>">
    <div class="ct-video-inner">
    	<?php if(!empty($image_url)) : ?>
    		<img src="<?php echo esc_url($image_url); ?>" />
    	<?php endif; ?>
        <a class="ct-video-button" href="<?php echo esc_url($a_href);?>">
            <i class="fa fa-play"></i>
        </a>
    </div>
</div>