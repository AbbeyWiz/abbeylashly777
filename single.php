<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package punchtheme
 */

get_header();

wpb_set_post_views(get_the_ID());
?>

	<div id="primary" class="content-area" style="width: 100%; overflow-x: hidden;">
		<main id="pb-root" class="site-main container-fluid" role="main" style="min-height: 100px; margin-top: 2px;">
			<div class="" style="margin-bottom: 10px;">
				<?php include 'header-advert.php'; ?>
			</div>



		<?php

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();


			?>
			<div class="col-md-12 col-lg-8">
				<div class="row">
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>

			</div>


		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
