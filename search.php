<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package punchtheme
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="pb-root" class="site-main container-fluid" role="main" style="min-height: 100px;">

		<?php
		if ( have_posts() ) : ?>


			<header class="entry-header">
				<h1 class="entry-title">
				<?php printf( esc_html__( 'Search Results for: %s', 'punchtheme' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
			</header><!-- .entry-header -->

			<!--=============== LOOP ========-->
			<section class="">
					<main class="col-md-6 col-lg-8 sub-section-wrapper" style="padding-top: 0px;">


						<!--======================== METRO ================================-->

						<section class="row .lll">

							<div class="cards no-gutter">






			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>




	</div>

	</section>
	</main>
	</section>



		</main><!-- #main -->


<?php
//get_sidebar();
get_footer();
