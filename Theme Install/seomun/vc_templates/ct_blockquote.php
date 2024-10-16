<?php
extract(shortcode_atts(array(
    'title' => '',
    'position' => '',
    'desc' => '',
    'animation' => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
if(!empty($desc)) : ?>
    <div id="ct-blockquote" class="ct-blockquote <?php echo esc_attr( $animation_classes ); ?>"> 
        <blockquote>
            <p><?php echo wp_kses_post( $desc ); ?></p>
            <cite>-<?php echo esc_attr( $title ).', '; ?><span><?php echo esc_attr( $position ); ?></span></cite>
        </blockquote>
    </div>
<?php endif; ?>