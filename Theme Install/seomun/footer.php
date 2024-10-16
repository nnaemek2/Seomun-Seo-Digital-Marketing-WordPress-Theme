<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Seomun
 */
$back_totop_on = seomun_get_opt('back_totop_on', true); ?>

		</div><!-- #content inner -->
	</div><!-- #content -->
	
	<?php seomun_call_to_action(); ?>

	<?php seomun_footer(); ?>
	
	<?php if (isset($back_totop_on) && $back_totop_on) : ?>
        <a href="#" class="ct-scroll-top"></a>
    <?php endif; ?>
    
	</div><!-- #page -->
	
	<?php seomun_popup_search(); ?>

	<?php seomun_hidden_sidebar(); ?>

	<?php wp_footer(); ?>
	
	</body>
</html>
