<?php get_header(
/**
 * The Template for displaying all single posts.
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

                <div class="home-post-image">
                	<?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>
                  <div class="home-post-image-overlay hidden-xs">
                    <h3><a href="<?php the_permalink() ?>"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
echo $date->format('l F d, Y');?> | <?php the_field('event_time'); ?> | <?php the_field('event_price'); ?></a></h3>
                    <h4><?php the_title();?></h4>
                  </div>
                </div>

                <div class="home-post-content">
                    <div class="visible-xs post-info-mobile">
                        <h3><a href="<?php the_permalink() ?>"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
echo $date->format('l F d, Y');?> | <?php the_field('event_time'); ?> | <?php the_field('event_price'); ?></a></h3>
                        <h4><a href="<?php the_permalink() ?>"><?php the_title();?></a></h4>
                    </div>
                    
                	<?php the_content();?>

                <h4>Event location:</h4>
                <?php the_field('event_location'); ?>

                <?php 
                    $location = get_field('event_map');
                    if( !empty($location) ):
                ?>
                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
                <?php endif; ?>

                </div>

            </div>

		<?php endwhile; ?>

	 	</div>
        <?php get_sidebar(); ?> 
    </div>
</div>


<?php get_footer(); ?>