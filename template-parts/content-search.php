<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package punchtheme
 */

?>





<div class="items col-sm-12" id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<div class="filler">

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="col-sm-2 col-md-3 col-lg-3 col-xl-4">
			<figure class="seg-image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
				<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
		</figure>
		</div>
		<?php endif; ?>

		<div class="col-sm-8">
			<h2 class="seg-title"><?php the_title(); ?></h2>
			<div class="seg-summary">
				<?php echo get_excerpt(); ?>
			</div>
			<div class="seg-time">
				<?php the_time('F jS, Y') ?>
			</div>
		</div>


	</div>
	</a>
</div>
