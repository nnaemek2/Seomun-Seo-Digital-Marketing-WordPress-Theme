<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Romada
 */
$portfolio_client_label = seomun_get_opt( 'portfolio_client_label' );
$portfolio_category_label = seomun_get_opt( 'portfolio_category_label' );
$portfolio_date_label = seomun_get_opt( 'portfolio_date_label' );
$portfolio_share_label = seomun_get_opt( 'portfolio_share_label' );

//$portfolio_feature_img = seomun_get_page_opt('portfolio_feature_img', 'show');
$portfolio_gallery = seomun_get_page_opt('portfolio_gallery');
$portfolio_gallery_list = explode(',', $portfolio_gallery);

$portfolio_date_page = seomun_get_page_opt( 'portfolio_date' );
$portfolio_sub_title = seomun_get_page_opt( 'portfolio_sub_title' );
$portfolio_sub_title2 = seomun_get_page_opt( 'portfolio_sub_title2' );
$portfolio_excerpt  = seomun_get_page_opt( 'portfolio_excerpt' );

$portfolio_link     = seomun_get_page_opt( 'portfolio_link' );

$portfolio_client   = seomun_get_page_opt( 'portfolio_client' );

$portfolio_btn_text = seomun_get_page_opt( 'portfolio_btn_text' );
$portfolio_btn_link = seomun_get_page_opt( 'portfolio_btn_link' );
$portfolio_btn_target = seomun_get_page_opt( 'portfolio_btn_target', '_self' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-type-inner">
        <div class="post-type-meta">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-6">
                    <?php if(!empty($portfolio_gallery)) { ?>
                        <div class="post-type-gallery images-light-box">
                            <div class="row">
                            <?php foreach ($portfolio_gallery_list as $img_id): ?>
                                <div class="sg-galler-item col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="post-type-gallery-item">
                                        <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'gallery-portfolio-popup'));?>">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'gallery-portfolio'));?>" alt="<?php echo esc_attr(get_post_meta($img_id, '_wp_attachment_image_alt', true)) ?>"/>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    <?php } else {?>
                        <div class="post-type-single-image">
                        <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <?php if(!empty($portfolio_sub_title2)) : ?>
                        <h4 class="sg-portfolio-subtitle2">
                            <?php echo esc_attr($portfolio_sub_title2); ?>
                        </h4>
                    <?php endif; ?>
                    <?php if(!empty($portfolio_sub_title)) : ?>
                        <h2 class="sg-portfolio-subtitle1">
                            <?php echo esc_attr($portfolio_sub_title); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if(!empty($portfolio_excerpt)) : ?>
                        <div class="sg-portfolio-excerpt">
                            <?php echo wp_kses_post($portfolio_excerpt); ?>
                        </div>
                    <?php endif; ?>
                    <div class="sg-meta">
                        <div class="sg-portfolio-client">
                            <?php if(!empty($portfolio_client)) : ?>
                                <?php if(!empty($portfolio_client_label)) { ?>
                                    <span class="sg-label">
                                        <?php echo esc_attr($portfolio_client_label); ?>
                                    </span>
                                <?php } else { ?>
                                    <span class="sg-label">
                                        <?php echo esc_html__('Client:', 'seomun'); ?>
                                    </span>
                                <?php } ?>
                                <span class="sg-content-meta">
                                    <?php echo esc_attr($portfolio_client); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($portfolio_link)) : ?>
                            <div class="sg-portfolio-link">
                                <label class="sg-label"><?php echo esc_html__('Link:', 'seomun');?></label>
                                <span class="sg-content-meta">
                                    <?php echo esc_attr($portfolio_link); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        <div class="sg-portfolio-category">
                            <?php if(!empty($portfolio_category_label)) { ?>
                                <span class="sg-label"><?php echo esc_attr($portfolio_category_label); ?></span>
                            <?php } else { ?>
                                <span class="sg-label"><?php echo esc_html__('Category:', 'seomun'); ?></span>
                            <?php } ?>
                            <div class="sg-content-meta">
                                <?php the_terms( get_the_ID(), 'portfolio-category', '', ', ' ); ?>
                            </div>
                        </div>
                        <div class="sg-portfolio-date">
                            <?php if(!empty($portfolio_date_label)) { ?>
                                <span class="sg-label"><?php echo esc_attr($portfolio_date_label); ?></span>
                            <?php } else { ?>
                                <span class="sg-label"><?php echo esc_html__('Date:', 'seomun'); ?></span>
                            <?php } ?>
                            <span class="sg-content-meta"><?php if(!empty($portfolio_date_page)) { echo esc_attr($portfolio_date_page); } else { echo get_the_date(); } ?></span>
                        </div>
                    </div>

                    <div class="sg-portfolio-share">
                        <?php if(!empty($portfolio_share_label)) { ?>
                            <span class="sg-label"><?php echo esc_attr($portfolio_share_label); ?></span>
                        <?php } else { ?>
                            <span class="sg-label"><?php echo esc_html__('Share:', 'seomun'); ?></span>
                        <?php } ?>
                        <?php seomun_socials_share_portfolio(); ?>
                    </div>
                    <?php if(!empty($portfolio_btn_text)) : ?>
                        <div class="footer-button"><a class="btn" href="<?php echo esc_url($portfolio_btn_link); ?>" target="<?php echo esc_attr($portfolio_btn_target); ?>"><?php echo esc_attr($portfolio_btn_text); ?></a></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="post-type-content">
            <?php the_content(); ?>
        </div>
    </div>
</article><!-- #post -->