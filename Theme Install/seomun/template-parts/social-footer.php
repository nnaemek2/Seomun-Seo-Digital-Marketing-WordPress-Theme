<?php 
$footer_social = seomun_get_opt( 'footer_social' );
$social = $footer_social['enabled'];
if ($social) : foreach ($social as $key=>$value) { ?>
    <?php switch($key) {
 
        case 'facebook': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_facebook_url' )).'"><i class="zmdi zmdi-facebook"></i></a></li>';
        break;
 
        case 'twitter': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_twitter_url' )).'"><i class="zmdi zmdi-twitter"></i></a></li>';
        break;
 
        case 'linkedin': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_inkedin_url' )).'"><i class="zmdi zmdi-linkedin"></i></a></li>';
        break;
        
        case 'instagram': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_instagram_url' )).'"><i class="zmdi zmdi-instagram"></i></a></li>';    
        break;

        case 'google': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_google_url' )).'"><i class="zmdi zmdi-google-plus"></i></a></li>';    
        break;

        case 'skype': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_skype_url' )).'"><i class="zmdi zmdi-skype"></i></a></li>';    
        break;

        case 'pinterest': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_pinterest_url' )).'"><i class="zmdi zmdi-pinterest"></i></a></li>';    
        break;

        case 'vimeo': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_vimeo_url' )).'"><i class="zmdi zmdi-vimeo"></i></a></li>';    
        break;

        case 'youtube': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_youtube_url' )).'"><i class="zmdi zmdi-youtube"></i></a></li>';    
        break;

        case 'yelp': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_yelp_url' )).'"><i class="fa fa-yelp"></i></a></li>';    
        break;

        case 'tumblr': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_tumblr_url' )).'"><i class="fa fa-tumblr"></i></a></li>';    
        break;

        case 'tripadvisor': echo '<li><a href="'.esc_url(seomun_get_opt( 'social_tripadvisor_url' )).'"><i class="fa fa-tripadvisor"></i></a></li>';    
        break;
    }
}
endif;