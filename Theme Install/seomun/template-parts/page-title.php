<?php
$titles = seomun_get_page_titles();
ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', esc_attr($titles['title']) );
}
$titles_html = ob_get_clean();
$ptitle_on = seomun_get_opt( 'ptitle_on', 'show');
$page_ptitle_on = seomun_get_page_opt( 'ptitle_on', 'themeoption');
$custom_sub_title = seomun_get_page_opt( 'custom_sub_title' );
if(is_page() && !empty($page_ptitle_on) && $page_ptitle_on != 'themeoption') {
	$ptitle_on = $page_ptitle_on;
} 
$ptitle_breadcrumb_on = seomun_get_opt( 'ptitle_breadcrumb_on', 'hidden' );
?>
<?php if($ptitle_on == 'show') : ?>
	<div id="pagetitle" class="page-title bg-overlay">
	    <div class="container">
	        <div class="page-title-inner">
	        	<div class="ct-col-title">
		        	<?php if(!empty($custom_sub_title)) : ?>
		            	<div class="page-subtitle">
		            		<span class="ct-line-color ct-first"></span>
		            			<?php echo wp_kses_post($custom_sub_title); ?>
		            		<span class="ct-line-color ct-last"></span>
		            	</div>
		        	<?php endif; ?>
		            <?php printf( '%s', wp_kses_post($titles_html)); ?>
	        	</div>
	        	<?php if($ptitle_breadcrumb_on == 'show') : ?>
		        	<div class="ct-col-brc">
			            <?php seomun_breadcrumb(); ?>
		        	</div>
	        	<?php endif; ?>
	        </div>
	    </div>
	</div>
<?php endif; ?>