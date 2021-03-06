<?php get_header(
/**
 *Template Name: Events test page
 * @package red-room
 */

); ?>

<div class="container">
    <div class="row">
    <?php get_sidebar(); ?>	

    	<div class="col-md-9">
<?php
   $today = date('Ymd');
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
                'compare' => '>='
            )
        ),
        'orderby' => 'meta_value',
        'order' => 'ASC'
    );

    $the_query = new WP_Query( $args );
    
    
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            
            $the_query->the_post(); ?>

            <div class="home-post-area">

                <div class="home-post-image">
                    <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>
                  <div class="home-post-image-overlay">
                    <h3><a href="<?php the_permalink() ?>"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
echo $date->format('F d, Y');?> | <?php the_field('event_time'); ?> | <?php the_field('event_price'); ?></a></h3>
                    <h4><a href="<?php the_permalink() ?>"><?php the_title();?></a></h4>
                  </div>
                </div>

                <div class="home-post-content">
                    <?php the_excerpt();?>

                <p><a href="<?php the_permalink() ?>"><strong>>> MORE</strong></a></p>

                </div>

            </div>

        <?php } } else { ?>

        <h2>Not Found</h2>

    <?php //endif; ?>
    <?php } ?>
    <?php wp_reset_postdata(); ?>



	 	</div>
    </div>
</div>


<?php get_footer(); ?>
