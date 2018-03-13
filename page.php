<?php get_header(
/**
 * The Template for displaying all regular pages
 *
 * @package red-room
 */

); ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="<?php bloginfo('template_url');?>/js/g-map.js"></script>

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
                    <div class="acf-map" id="map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div><?php endif; ?>

                </div>

            </div>

		<?php endwhile; ?>

	 	</div>
        <?php get_sidebar(); ?> 
    </div>
</div>


<?php get_footer(); ?>