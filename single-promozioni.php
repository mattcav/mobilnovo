<?php get_header(); ?>
 <?php while (have_posts()) : the_post(); 


    $product = new WP_Query( array(
      'connected_type' => 'prod_2_promo',
      'connected_items' => get_queried_object(),
      'nopaging' => true
    ) );  ?>
<div  class="indice">

    <article class="indice__container promo--container promo masonry">
          <div class="promo__inner">
            <h1 class="indice__title promo--title">
                <?php the_title(); ?>
            </h1>
            <div class="indice__text promo--text">
              <p class="indice__excerpt promo--excerpt">
                <?php the_excerpt_rss(); ?>
              </p>
            </div>
          </div>

          <?php echo get_the_post_thumbnail($post->ID, 'small', array('class' => 'indice__img promo--img')); ?>
          <div class="promo__inner">
            <div class="indice__text promo--text">
              <?php the_content(); ?> 
            </div>
          </div> 
    </article>

 <?php endwhile; ?>



      <?php 
        if ( $product->have_posts() ) : ?>
         <div class="masonry promoproducts">
           <h3 class="promoproducts__title">I prodotti in offerta:</h3>
         </div>

        <?php while ( $product->have_posts() ) : $product->the_post(); ?>
            <?php get_template_part('component', 'obj'); ?>
          <?php endwhile; ?>    
        <?php wp_reset_postdata(); 
        else :
           get_template_part('component', 'noproducts');
        endif; ?>
 </div>

<?php get_footer(); ?>