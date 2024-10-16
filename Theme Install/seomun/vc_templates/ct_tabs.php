<?php
extract(shortcode_atts(array(
    'ct_tabs' => '',
    'tab_active_section' => '1',
    'style' => 'style1',
), $atts));
$uqid = uniqid();

$ct_tabs = (array) vc_param_group_parse_atts($ct_tabs);
if(!empty($ct_tabs)) : ?>
    
<?php endif; ?>
<div id="ct-tabs-<?php echo esc_attr($uqid);?>" class="ct-tabs clearfix">
  <ul class="nav nav-tabs" role="tablist">
      <?php foreach ($ct_tabs as $key => $value) {
          $tab_title = isset($value['tab_title']) ? $value['tab_title'] : '';
          $tab_title = isset($value['tab_title']) ? $value['tab_title'] : '';
          ?>
          <li class="nav-item">
            <a class="nav-link <?php if($key == 0) : ?>active<?php endif; ?>" id="tab-<?php echo esc_attr( $key ); ?>" data-toggle="tab" href="#tab-content-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-content-<?php echo esc_attr( $key ); ?>" aria-selected="true">
              <i class="<?php echo !empty($value['tab_title_icon'])? $value['tab_title_icon']:'flaticon-diamond' ?>" aria-hidden="true"></i>
              <span class="tab-text">
                <?php echo esc_attr( $tab_title ); ?>
              </span>
            </a>
          </li>
      <?php } ?>
    </ul>
    <div class="tab-content">
      <?php foreach ($ct_tabs as $key => $value) {
          $tab_content = isset($value['tab_content']) ? $value['tab_content'] : '';
          $first_title = isset($value['first_title']) ? $value['first_title'] : '';
          $second_title = isset($value['second_title']) ? $value['second_title'] : '';
          $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
          $tab_content = isset($value['tab_content']) ? $value['tab_content'] : '';          

          $content_image = isset($value['content_image']) ? $value['content_image'] : '';

          $content_image_url = '';
          if (!empty($content_image)) {
              $attachment_image = wp_get_attachment_image_src($content_image, 'full');
              $content_image_url = $attachment_image[0];
          }

          $key_id = cmsHtmlID('key');
          ?>
          <div class="tab-pane fade <?php if($key == 0) : ?>show active<?php endif; ?>" id="tab-content-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-<?php echo esc_attr( $key ); ?>">
            <div class="inner-tab-pane">
              <?php if(!empty( $content_image_url) ) { ?>
                <div class="col-tab-content col-tab-left">
                  <div class="tab-image">
                      <img src="<?php echo esc_url( $content_image_url ); ?>" alt="<?php echo esc_attr(get_post_meta( $content_image, '_wp_attachment_image_alt', true )) ?>"/>
                  </div>
                </div>
              <?php } ?>
              <div class="col-tab-content col-tab-right">
                <div class="inner-tab-content">
                    <?php if(!empty( $first_title) ) { ?>
                      <h4 class="first-title">
                        <?php echo wp_kses_post( $first_title ); ?>
                      </h4>
                    <?php } ?>
                    <?php if(!empty( $second_title) ) { ?>
                      <h2 class="second-title">
                        <?php echo wp_kses_post( $second_title ); ?>
                      </h2>
                    <?php } ?>
                    <?php if(!empty( $sub_title) ) { ?>
                      <h4 class="sub-title">
                        <?php echo wp_kses_post( $sub_title ); ?>
                      </h4>
                    <?php } ?>
                    
                    <?php if(!empty( $tab_content) ) { ?>
                      <div class="content">
                        <?php echo wp_kses_post( $tab_content ); ?>
                      </div>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
      <?php } ?>
    </div>
</div>         