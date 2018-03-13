<?php get_header(); ?>

<div class="container">
    <div class="row">
    <?php get_sidebar(); ?>	

    	<div class="col-md-9">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div class="home-post-area">

                <div class="home-post-image">
                	<?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>
                  <div class="home-post-image-overlay">
                    <h3><?php the_field('event_date'); ?> <?php the_field('event_price'); ?></h3>
                    <h4><?php the_title();?></h4>
                  </div>
                </div>

                <div class="home-post-content">
                	<?php the_excerpt();?>

                <p><a href="<?php the_permalink() ?>"><strong>>> MORE</strong></a></p>

                </div>

            </div>

		<?php endwhile; ?>

	 	</div>
    </div>
</div>


<?php get_footer(); ?>
