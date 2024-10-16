<?php
/**
 * Template part for displaying site branding
 */

$logo = seomun_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
$logo_url = $logo['url'];

$logo_yellow = seomun_get_opt( 'logo_yellow', array( 'url' => '', 'id' => '' ) );
$logo_yellow_url = $logo_yellow['url'];

$logo_light = seomun_get_opt( 'logo_light', array( 'url' => '', 'id' => '' ) );
$logo_light_url = $logo_light['url'];

if ($logo_url || $logo_light_url)
{
    printf(
        '<a class="logo-dark" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo', 'seomun').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_url )
    );
    printf(
        '<a class="logo-yellow" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%4$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_yellow_url ),
        esc_html__("Logo Yellow",'seomun')
    );
    printf(
        '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%4$s"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $logo_light_url ),
        esc_html__("Logo Light",'seomun')
    );
}
else
{
    printf(
        '<a class="logo" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo', 'seomun').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( get_template_directory_uri().'/assets/images/logo.png' )
    );
}