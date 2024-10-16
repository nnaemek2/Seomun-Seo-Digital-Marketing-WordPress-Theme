<?php
extract(shortcode_atts(array(
    'button_text' => '',
    'button_link' => '',
    'video_link'  => '',
    'animation'   => '',
    'button_vd_color'   => 'primary-color1',
), $atts));

$link = vc_build_link($button_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}

$video_link = vc_build_link($video_link);
$video_a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $video_link['url'] ) > 0 ) {
    $video_a_href = $video_link['url'];
}

$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

?>
<div class="ct-button-video <?php echo esc_attr( $button_vd_color.' '.$animation_classes); ?>">
    <?php if(!empty($button_text)) : ?>
        <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>" class="btn btn-outline">
            <span><?php echo esc_attr($button_text); ?></span>
        </a>
    <?php endif; ?>
    <a class="ct-video-button" href="<?php echo esc_url($video_a_href);?>"><i class="fac fac-play"></i></a>
</div>