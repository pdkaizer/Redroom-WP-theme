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

            <div class="home-post-area">
                <img src="<?php bloginfo('template_url');?>/images/pattern-recognition-5.jpg" class="img-responsive" alt="">
                <div class="home-post-image">
                  <div class="home-post-image-overlay">
                    <h3>Search Results</h3>
                  </div>
                </div>

                <div class="home-post-content">

                   
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h1>
            <?php the_excerpt();?>
        <?php endwhile; ?>
    
        <?php else : ?>
    
            <p>No posts found. Try a different search?</p>
            <?php get_search_form(); ?>
    
        <?php endif; ?>
                   
                </div>

            </div>

	 	</div>
        <?php get_sidebar(); ?> 
    </div>
</div>


<?php get_footer(); ?>