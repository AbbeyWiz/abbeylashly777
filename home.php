<?php
/**
 * The main template file.
 * Template Name: Home Page Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package punchtheme
 */

get_header(); ?>




		<article style="width: 100%; overflow-x: hidden;" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >


		<main id="pb-root" class="site-main container-fluid" role="main" style="min-height: 100px;">



<!--============================  Header Advert   ===================================-->
			<?php //include 'header-advert.php'; ?>


<section class="first-row" style="margin-top: 20px;">
		<section class="col-md-12 col-lg-6 hero-wrap">


<!--============================  Hero large   ===================================-->

	<?php
		$hero_args = array( 'posts_per_page' => 1, 'offset' => 0, 'ignore_sticky_posts' => 1, 'category_name' => "featured" );
		$hero_loop = new WP_Query( $hero_args ); 	while ( $hero_loop->have_posts() ) : $hero_loop->the_post(); ?>

    	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<div class="b-lazy" id="hero" data-src="<?php the_post_thumbnail_url('large'); ?>"> <!--#-->
					<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
				</div>
			</a>
			<h1 class="hero-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

	<?php endwhile; wp_reset_postdata(); ?>


<!--============================  Hero Subset   ===================================-->


<div class="sub-hero">

		<?php $hero_sub_args = array( 'posts_per_page' => 3, 'offset' => 1, 'ignore_sticky_posts' => 1, 'category_name' => "featured" );
			$hero_sub_loop = new WP_Query( $hero_sub_args ); while ( $hero_sub_loop->have_posts() ) : $hero_sub_loop->the_post(); ?>

			<div class="sub-hero_item" >
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<div class="sub-hero_image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
					<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
				</div>
				<div class="title-box">
					<?php the_title(); ?>
				</div>
				</a>
			</div>

		<?php endwhile; wp_reset_postdata(); ?>

	</div> <!-- //sub-hero -->


</section> <!-- //hero-wrap -->




					<!--============================  Latest Stories   ===================================-->


					<section class="col-md-12 col-lg-6 latest-news-wraper">
							<div class="row latest-news-row">
									<div class="col-md-12 col-lg-6 latest-news">
										<div class="row" style="height: 100%;">
												<div class="title-header">Just In</div>
												<ul>

													<?php
													$args = array( 'numberposts' => 10 );
													$lastposts = get_posts( $args );
													foreach($lastposts as $post) : setup_postdata($post); ?>

													<li>
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h3><?php the_title(); ?></h3></a>
														<div class="_time"><?php the_time('g:i a'); ?></div></li>
														<!-- <div class="_time"><?php //echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></div></li> -->

													<?php endforeach; wp_reset_postdata(); ?>

													<li class="read-more">
														<a href="<?php echo get_category_link( get_category_by_slug('news') ); ?>">Read More</a>
													</li>

												</ul>
										</div>
								</div>







								<!--===================== #Hero Sidebar / #Trending News ==========================-->

									<section class="col-xs-12 col-lg-6 trending-news">
										<div class="hidden-sm-up" style="width: 100%; margin-bottom: 20px;">
											<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
																<!-- Punch_Mobile_Banner -->
													<ins class="adsbygoogle"
																     style="display:inline-block;width:320px;height:50px"
																     data-ad-client="ca-pub-7167863529667065"
																     data-ad-slot="1870972691"></ins>
													<script>
													(adsbygoogle = window.adsbygoogle || []).push({});
													</script>
											</div>


								<!--//////////////////// #Trending News ////////////////////-->

														<div class="row" style=" overflow: hidden;">
																<div class="title-header">Trending</div>
																<ul>
																	<?php
																		$today = getdate();
																		$query_args = array(
																			'posts_per_page' => '5',
																			'meta_key' => 'wpb_post_views_count',
																			'orderby' => 'meta_value_num',
																			'order' => 'DESC',
																			'ignore_sticky_posts' => 1,
																			'date_query' => array(
																				array(
																						'year'  => $today['year'],
																						'month' => $today['mon'],
																						'day'   => $today['mday'],
																				),
																	    ),
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
															</div>

									 </section> <!-- //#Hero Sidebar / #Trending News -->







						</div>   <!-- //latest-news-row -->
					</section> <!-- //latest-news-wraper -->








			</section> <!-- //first row -->
		</main><!-- //main -->





		<!--===================== #Opinion pane ==========================-->

		<section class="pb-root container-fluid sub-section-wrapper">

				<main class="col-md-12 col-lg-8">


					<!--======================== METRO ================================-->






					<a href="<?php echo get_category_link( get_category_by_slug('metro-plus') ); ?>" class="title-header" style="padding-right: 20px; margin-bottom: 6px; color: #404040; display: block; margin-top: 40px;">Metro Plus <span>read more</span></a>

					<!-- cat-sections -->
						<div class="cat-sections">

							<?php $args = array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, 'offset' => 0, 'category_name' => "metro-plus" );
							$lastposts = new WP_Query( $args );
							while ( $lastposts->have_posts() ) : $lastposts->the_post(); ?>

									<div class="cat-sections_item" >
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<div class="cat-sections_image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
											<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
										</div>
										<div class="title-box">
											<?php the_title(); ?>
										</div>
										</a>
									</div>

								<?php endwhile; wp_reset_postdata(); ?>

							</div> <!-- //cat-sections -->


							<!-- cat-sections -->
								<div class="cat-sections" style="margin-top: 10px;">

									<?php $args = array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, 'offset' => 3, 'category_name' => "metro-plus" );
									$lastposts = new WP_Query( $args );
									while ( $lastposts->have_posts() ) : $lastposts->the_post(); ?>

											<div class="cat-sections_item" >
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<div class="cat-sections_image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
													<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
												</div>
												<div class="title-box">
													<?php the_title(); ?>
												</div>
												</a>
											</div>

										<?php endwhile; wp_reset_postdata(); ?>

								</div>
							<!-- //cat-sections -->








							<!--======================== ADDITIONAL ADSENSE 728 BY 90 ================================-->

						<div style="margin-top: 40px;">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- mobile_view_responsive -->
						<ins class="adsbygoogle"
						     style="display:block"
						     data-ad-client="ca-pub-7167863529667065"
						     data-ad-slot="8132419091"
						     data-ad-format="auto"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>

						</div>

						<!--======================== Mads 468 x 60 ATF ================================-->
						<div class="col-sm-12 hidden-md-down" style="text-align: center;">
						<script>
						MADSAdrequest.adrequest({
						pid: '7560853098'
						});
						</script>
						</div>





					<!--======================== POLITICS ================================-->


					<a href="<?php echo esc_url(get_category_link( get_category_by_slug( 'politics' ) )); ?>" class="title-header" style="margin-top: 40px; padding-right: 20px; margin-bottom: 6px; color: #404040; display: block;">Politics <span>read more</span></a>




							<!-- cat-sections -->
								<div class="cat-sections" style="margin-top: 10px;">

									<?php $args = array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, 'offset' => 0, 'category_name' => "politics" );
									$lastposts = new WP_Query( $args );
									while ( $lastposts->have_posts() ) : $lastposts->the_post(); ?>

											<div class="cat-sections_item" >
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<div class="cat-sections_image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
													<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
												</div>
												<div class="title-box">
													<?php the_title(); ?>
												</div>
												</a>
											</div>

										<?php endwhile; wp_reset_postdata(); ?>

								</div>
							<!-- //cat-sections -->


						<!-- cat-sections -->
							<div class="cat-sections" style="margin-top: 10px;">

								<?php $args = array( 'posts_per_page' => 3, 'ignore_sticky_posts' => 1, 'offset' => 3, 'category_name' => "politics" );
								$lastposts = new WP_Query( $args );
								while ( $lastposts->have_posts() ) : $lastposts->the_post(); ?>

										<div class="cat-sections_item" >
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<div class="cat-sections_image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
												<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
											</div>
											<div class="title-box">
												<?php the_title(); ?>
											</div>
											</a>
										</div>

									<?php endwhile; wp_reset_postdata(); ?>

							</div>
						<!-- //cat-sections -->



				</main>







				<div class="col-md-12 col-lg-4">

					<?php if ( is_active_sidebar( 'home_sidebar' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'home_sidebar' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>


				</div>

		</section>


		<!--===================== #video-pane ==========================-->

		<section class="video-pane-wrapper">

			<div class="pb-root container-fluid video-pane">

				<div class="col-md-8">
					<h1 class="video-pane-wrapper_title"><span>Punch </span>videos</h1>

						<?php $args = array( 'posts_per_page' => 1, 'ignore_sticky_posts' => 1, 'offset' => 0, 'category_name' => "video" );
						$lastposts = new WP_Query( $args );
						while ( $lastposts->have_posts() ) : $lastposts->the_post(); ?>
							<div data-type="youtube" data-video-id="<?php echo get_post_meta($post->ID, "_post_reference_name", true); ?>"></div>
						<?php endwhile; wp_reset_postdata(); ?>



				</div>
				<div class="col-sm-4 video--playlist-wide">
					<div class="video--playlist">
						<div class="title-header">Explore More</div>
						<ul>
							<?php $args = array( 'posts_per_page' => 5, 'ignore_sticky_posts' => 1, 'offset' => 1, 'category_name' => "video" );
							$lastposts = new WP_Query( $args );
							while ( $lastposts->have_posts() ) : $lastposts->the_post(); ?>

							<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>

						<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>

			</div>
		</section>


		<!--===================== #Categories ==========================-->

		<section class="pb-root container-fluid category-pane-wrapper">
			<div class="category-pane col-sm-12">


				<!-- #Items -->


				<?php if ( is_active_sidebar( 'main-cat' )  ) : ?>

						<?php dynamic_sidebar( 'main-cat' ); ?>

				<?php endif; ?>




			</div>
		</section>



	</article><!-- #wrapper-## --><!-- #primary -->

<?php
//get_sidebar();
get_footer();
