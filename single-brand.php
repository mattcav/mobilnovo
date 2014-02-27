<?php get_header(); ?>
<div id="container" class="indice">
 <?php while (have_posts()) : the_post(); ?>
    <?php 
        $product = new WP_Query( array(
          'connected_type' => 'prod_2_brands',
          'connected_items' => get_queried_object(),
          'nopaging' => true,
        ) );
        if ( $product->have_posts() ) :
    ?>

    <article class="indice__container masonry">
        <h1 class="indice__title">
            <?php echo get_the_post_thumbnail($post->ID, 'small', array('class' => 'indice__img')); ?>
        </h1>
          <div class="indice__text">
            <?php the_content(); ?>  
          </div>
    </article>

    <?php while ( $product->have_posts() ) : $product->the_post(); ?>
        <?php get_template_part('component', 'obj'); ?>
    <?php endwhile; ?>    

    <?php wp_reset_postdata(); endif; ?>

 <?php endwhile; ?>
 </div>

<?php get_footer(); ?>