<?php
/**

 */

get_header();

$category_id = get_cat_ID(single_cat_title('', false));
?>

<div id="primary" class="content-area">
  <main id="pb-root" class="site-main container-fluid" role="main" style="min-height: 100px;">

    <?php include 'header-advert.php'; ?>

    <h1 class="category_name"><?php single_cat_title(); ?></h1>
    <section class="first-row" style="margin-top: 20px;">
      <div class="col-md-12 col-lg-8 hero-wrap">



        <?php if ( $paged < 2 ) : ?>

        <!--===================== #Hero ==========================-->
          <?php
          $args = array( 'numberposts' => 1, 'offset' => 0, 'cat' => $category_id );
          $lastposts = get_posts( $args );
          foreach($lastposts as $post) : setup_postdata($post); ?>

          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <div class="b-lazy" id="hero" data-src="<?php the_post_thumbnail_url('large'); ?>"> <!--#-->

            <div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
          </div>
          </a>
          <h1 class="hero-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>


          <?php endforeach; wp_reset_postdata(); ?>





        <!--===================== #Sub Hero ==========================-->


        <div class="sub-hero">

          <?php $args = array( 'numberposts' => 3, 'offset' => 1, 'cat' => $category_id );
          $lastposts = get_posts( $args );
          foreach($lastposts as $post) : setup_postdata($post); ?>

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

          <?php endforeach; wp_reset_postdata(); ?>


        </div>

        <?php endif; ?>



        <!--=============== LOOP ========-->
        <section class="">
            <main class="col-md-12 col-lg-12 sub-section-wrapper" <?php if ( !$paged < 2 ) : ?> style="padding-top: 0px;"<?php endif; ?>>


              <!--======================== METRO ================================-->

              <section class="row .lll">

                <div class="cards no-gutter">


                  <?php

                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $args = array('posts_per_page' => 3, 'paged' => $paged,'cat' => $category_id );
                  query_posts($args); ?>
                  <!-- the loop -->
                  <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>


                    <div class="items col-sm-12">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                      <div class="filler">

                        <div class="col-sm-2 col-md-3 col-lg-3 col-xl-4">
                          <figure class="seg-image b-lazy" data-src="<?php the_post_thumbnail_url('large'); ?>" data-src-small="<?php the_post_thumbnail_url('medium'); ?>">
                            <div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
                        </figure>
                        </div>

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

                    <?php
                    endwhile; // End of the loop.
                    endif;
                    wp_reset_postdata();
                		?>


              </div>

            </section>
          </main>
    </section>

      <div class="paginations">
        <?php echo paginate_links(); ?>
      </div>



      </div><!-- //END -->




      <!--=============== SIDEBAR ========-->
      <aside>

        <!--================= sidebars ============-->
        <section class="col-lg-4 col-md-12 trending-news" style="width: 100%;">

        	<div class="row in-post" style="overflow: hidden; position: relative;">
        		<!--===================== #Trending News ==========================-->
        		<div class="title-header">Trending</div>

        		<ul style="margin-bottom: 20px; height: auto;">
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


        		<?php if ( is_active_sidebar( 'post_sidebar' ) ) : ?>
        			<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
        				<?php dynamic_sidebar( 'post_sidebar' ); ?>
        			</div><!-- #primary-sidebar -->
        		<?php endif; wp_reset_postdata(); ?>
        	</div>



        </section>
      </aside>

    </div>
  </section>


  </main><!-- #main -->


<?php

get_footer();
