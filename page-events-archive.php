<?php get_header(
/**
 *Template Name: Events Archive page
 * @package red-room
 */

); ?>

<div class="container">
    <div class="row">
    	<div class="col-md-9">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div class="home-post-area">
                <img src="<?php bloginfo('template_url');?>/images/pattern-recognition-5.jpg" class="img-responsive" alt="">
                <div class="home-post-image">
                  <div class="home-post-image-overlay">
                    <h3><?php the_title();?></h3>
                  </div>
                </div>

                <div class="home-post-content">
                    <?php the_content();?>

                    <?php 
                        $location = get_field('event_map');
                        if( !empty($location) ):
                    ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div><?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                    <?php
                        $today = date('Ymd');
                        $numPerPage = 6; //set the number of posts to display per page
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $args = array(
                           'meta_key' => 'event_date',
                           'cat' => '2',
                           'meta_query' => array(
                                array(
                                    'key' => 'event_date'
                                ),
                                array(
                                    'key' => 'event_date',
                                    'value' => $today,
                                    'compare' => '<'
                                )
                            ),
                            'orderby' => 'meta_value',
                            'order' => 'DSC',
                            'paged' => $paged, //makes the query paged
                            'posts_per_page' => $numPerPage //sets the posts per page from above
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>

                        <div class="row event-archive">
                            <div class="col-md-3"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <div class="col-md-9">
                                <h3><a href="<?php the_permalink() ?>"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                                echo $date->format('l F d, Y');?> | <?php the_field('event_time'); ?></a></h3>
                                <h4><?php the_title();?></h4>
                                <?php the_excerpt();?>
                                <p><a href="<?php the_permalink() ?>"><strong>>> MORE</strong></a></p>
                            </div>
                        </div>

                        <hr />

                        <?php } } else { ?>

                        <h2>Not Found</h2>
                        <?php //endif; ?>
                        <?php } ?>

                        <nav>
                          <ul class="pager">
                            <li>
                                <?php
                                // next_posts_link() usage with max_num_pages
                                    next_posts_link( 'Older Events', $the_query->max_num_pages );
                                ?>
                            </li>
                            <li>
                                <?php
                                    previous_posts_link( 'Newer Events' );
                                ?>
                            </li>
                          </ul>
                        </nav>

                </div>

            </div>
	 	</div>
        <?php get_sidebar(); ?> 
    </div>
</div>


<?php get_footer(); ?>
