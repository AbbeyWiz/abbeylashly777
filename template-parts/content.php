<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package punchtheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

			<div class="post_cat">
				<span class="post-cat-links">
					<a style="color: #990000;">
						<?php $categories = get_the_category();
							if ( ! empty( $categories ) ) {
			    		echo esc_html( $categories[0]->name ); }
						?>
					</a>
				</span>
			</div>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="post_title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<?php //echo wpb_get_post_views(get_the_ID()); ?>

		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php punchtheme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>





		<main role="main" id="main">
				<div class="examples">

						<span class="button-addon">
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="button button-facebook" data-shr-network="facebook">
										<svg><use xlink:href="#shr-facebook"></use></svg>Share
								</a>
						</span>
						<a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="button button-twitter" data-shr-network="twitter">
								<svg><use xlink:href="#shr-twitter"></use></svg>Tweet
						</a>
						<span class="button-addon hidden-xs-down">
								<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php the_post_thumbnail_url('large'); ?>&description=" target=<?php the_title(); ?>"_blank" class="button button-pinterest" data-shr-network="pinterest">
										<svg><use xlink:href="#shr-pinterest"></use></svg>Pin it
								</a>
						</span>
						<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="button button-google hidden-xs-down" data-shr-network="google">
								<svg><use xlink:href="#shr-google"></use></svg>+1
						</a>
				</div>
		</main>


	</header><!-- .entry-header -->




<div class="col-md-12 col-lg-8">
	<div class="row post_featured_image">

		<?php
		if ( has_post_format( 'video' )) {
			?>
			<div data-type="youtube" data-video-id="<?php echo get_post_meta($post->ID, "_post_reference_name", true); ?>"></div>
			<?php
		} elseif ( has_post_format( 'gallery' )) {}

		 else {
			?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<div class="b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" style="width: 100%; height: 100%;"> <!--#-->

				<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
			</div>
			</a>

			<?php
				}
			?>




	</div>


	<div class="row">


	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'punchtheme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			//wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'punchtheme' ), 'after'  => '</div>', ) );
		?>
	</div><!-- .entry-content -->






	<footer class="entry-footer">
		<?php //punchtheme_entry_footer(); ?>

<div class="tags-links">


		<?php
			$posttags = get_the_tags();
			if ($posttags) {
			  foreach($posttags as $tag) {
					?>
					<a ><?php echo $tag->name . ' '; ?></a>
					<?php
			    }
			}
			?>
		</div>
	</footer><!-- .entry-footer -->
	</div>











		<?php $orig_post = $post;
			global $post;
			$tags = wp_get_post_tags($post->ID);

			if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args = array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page' => 8, // Number of related posts that will be shown.
					'ignore_sticky_posts' => 1,
					'orderby' => 'rand',
				);
				$my_query = new wp_query( $args );

				if( $my_query->have_posts() ) {
					echo '<div class="related--post row r-no-gutter">';

					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>


				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">

					<div class="boxs">
						<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
						<figure class="rel-image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
							<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
						</figure>
						<h2 class="rel-title"><?php the_title(); ?></h2>
						</a>
					</div>

				</div>



				<?php
				endwhile;

				echo '</div>';
				}
			}
			$post = $orig_post;

			wp_reset_query();
			wp_reset_postdata();

		?>




</div>




<!--================= sidebars ============-->
<section class="col-lg-4 col-md-12 trending-news">

	<div class="row in-post" style="overflow: hidden; position: relative;">
		<!--===================== #Trending News ==========================-->
		<div class="title-header">Trending</div>

		<ul style="margin-bottom: 20px;">
			<?php
			$today = getdate();
			$query_args = array(
				'posts_per_page' => '5',
				'meta_key' => 'wpb_post_views_count',
				'orderby' => 'meta_value_num',
				'order' => 'DESC',
				'ignore_sticky_posts' => 1,
				'date_query' => array(
					array( 'year' => $today['year'], 'month' => $today['mon'], 'day' => $today['mday'] )
				)
			);


			$popularpost = new WP_Query( $query_args );
				while ( $popularpost->have_posts() ) : $popularpost->the_post();
				?>


				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<figure class="trend-image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
							<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
					</figure>
					<h1><?php the_title(); ?></h1>

					</a>
				</li>


				<?php
				endwhile;
				 wp_reset_postdata();
			?>

		</ul>


		<?php if ( is_active_sidebar( 'post_sidebar' ) ) : ?>
			<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'post_sidebar' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
	</div>



</section>
</article><!-- #post-## -->
