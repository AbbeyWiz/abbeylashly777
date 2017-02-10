<?php
/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Punch Newspapers 1.0
 */

 function main_cat_widgets_init() {
 	register_sidebar( array(
 		'name'          => __( 'Punch Home Categories', 'twentysixteen' ),
 		'id'            => 'main-cat',
 		'description'   => __( 'Add widgets here to appear in your sidebar.', 'textdomain' ),
 		'before_widget' => '<section id="%1$s" class="">',
 		'after_widget'  => '</div>',
 		'before_title'  => '<h6 class="cat-title">',
 		'after_title'   => '</h6>',
 	) );
}
add_action( 'widgets_init', 'main_cat_widgets_init' );


 /**
 * Main Category Widget.
 */
class punch_main_categories extends WP_Widget {

  public function __construct(){
    parent::__construct(
      'main_categories', __('Punch Main Categories', 'textdomain'),
      array(
        'description' => __('Displays Punch Main Categories', 'textdomain')
      )
    );
  }


  public function widget( $args, $instance ) {

      $title          = isset( $instance['title'] ) ? $instance['title'] : '';
      $category       = isset( $instance['category'] ) ? $instance['category'] : '';
      $no_of_posts    = isset( $instance['no_of_posts'] ) ? $instance['no_of_posts'] : '';

      //$subcats = get_categories( 'child_of=' . $category );

      $cat_layout1 = new WP_Query( array(
          'post_type'         => 'post',
          'offset'            =>  '0',
          'cat'      => $category,
          'posts_per_page'    => $no_of_posts
      ) );

      ?>





      <!-- new category styling from kelvin -->

  <div class="category-pane-wrap col-lg-3 col-sm-6 col-xs-12 col-md-4">
					<div class="inner">

            <?php if ( $cat_layout1->have_posts() ) : ?>

             <?php
              if ( !empty( $title ) ) { ?>


                  <h1 class="category-pane-title"><a href="<?php echo esc_url( get_category_link( $category ) ) ?>"><?php echo esc_html( $title ) ?></a></h1>

              <?php
                } ?>


                <?php while ( $cat_layout1->have_posts() ) : $cat_layout1->the_post(); ?>

                  <?php if( $cat_layout1->current_post == 0 && !is_paged() ) : ?>
                  <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
    								<div class="category-pane-image b-lazy" data-src="<?php the_post_thumbnail_url('full'); ?>">
    									<div class="blurry" style="background-image: url('<?php the_post_thumbnail_url('blurry'); ?>')"></div>
    								</div>
                  </a>
                  <?php endif; ?>


                <ul>





                  <li> <a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"> <?php the_title(); ?> </a></li>


                <?php endwhile; wp_reset_postdata(); ?>
                </ul>


					</div>
				</div>

      <?php else : ?>

          <p><?php _e( 'Sorry, no posts found in selected category.', 'easymag' ); ?></p>

      <?php
      endif;

  }



  public function form( $instance ) {

      $instance = wp_parse_args(
          (array) $instance, array(
              'title'              => '',
              'category'           => '',
              'no_of_posts'        => '6'
          )
      );

      ?>

      <div class="cat-list">
          <div class="admin-input-wrap">
              <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title', 'easymag' ); ?></strong></label>

              <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" >
          </div><!-- .dt-admin-input-wrap -->

          <div class="admin-input-wrap">
              <label for="<?php echo $this->get_field_id( 'category' ); ?>"><strong><?php _e( 'Category', 'easymag' ); ?></strong></label>

              <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">

                  <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                      <option <?php selected( $instance['category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                  <?php } ?>

              </select>
          </div><!-- .dt-admin-input-wrap -->

          <div class="admin-input-wrap">

              <label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><strong><?php _e( 'No. of Posts', 'easymag' ); ?></strong></label>

              <!-- <input type="number" id="<?php //echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php //echo $this->get_field_name( 'no_of_posts' ); ?>" value="<?php //echo esc_attr( $instance['no_of_posts'] ); ?>"> -->
              <?php $p_nb = esc_attr( $instance['no_of_posts'] ); ?>
              <select id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>">
                <option value="2" <?php if ($p_nb == "2") echo "selected" ?>>2</option>
                <option value="4" <?php if ($p_nb == "4") echo "selected" ?>>4</option>
                <option value="6" <?php if ($p_nb == "6") echo "selected" ?>>6</option>
              </select>

          </div><!-- .dt-admin-input-wrap -->
      </div><!-- .dt-news-list-1 -->
      <?php
  }

  public function update( $new_instance, $old_instance ) {

      $instance                 = $old_instance;
      $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
      $instance['category']     = $new_instance['category'];
      $instance['no_of_posts']  = strip_tags( stripslashes( $new_instance['no_of_posts']  ) );
      return $instance;

  }





}




// Register widgets
function register_widgets() {
    register_widget( 'punch_main_categories' );

  }
add_action('widgets_init', 'register_widgets');
