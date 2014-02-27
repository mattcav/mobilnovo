<?php get_header(); ?>
  <?php while (have_posts()) : the_post(); ?>
      <article class="item">
       
        <figure id="item__figure" class="item__figure">
        <?php 
             $small_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small');
             $large_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
        ?>

          <img class="item__img" data-interchange="[<?php echo  $small_img[0] ?>, (default)], [<?php echo  $large_img[0] ?>, (medium)]" alt="<?php the_title(); ?>"> 

          <noscript><img src="<?php echo  $large_img[0] ?>" alt="copertina"></noscript>

        </figure>

        <div class="item__inner item__column-container">
          <section id="item__content" class="item__content item__column">
            <div class="item__category">
              <?php
                echo get_the_term_list( $post->ID, 'categorie',
                '', ' ', '' );
              ?>
            </div>

            <div class="item__content-inner">
              <h1 class="item__title">
                <?php the_title(); ?>
              </h1>
              <p class="item__text item__details">
                <strong>Materiale:</strong> 
                  <em><?php
                        echo get_the_term_list( $post->ID, 'materiali',
                        '', ', ', '' );
                      ?>
                  </em>
                <br>
                <strong>Dimensioni:</strong> <em><?php echo get_post_meta($post->ID, '_mobil_dimensioni', true); ?></em>
              </p>

              <p class="item__desc item__text">
                <?php echo get_the_content(); ?> 
              </p>

              <button class="button item__action">
                richiedi informazioni
              </button>
            </div>
          </section>

        <aside id="item__sidebar" class="item__sidebar item__column">
          <?php 
            $brand = new WP_Query( array(
                    'connected_type' => 'prod_2_brands',
                    'connected_items' => get_queried_object(),
                    'nopaging' => true,
                  ) );          
            if ( $brand->have_posts() ) :
          ?>
            
            <section class="brand media">
            <?php while ( $brand->have_posts() ) : $brand->the_post(); ?>
              <figure class="brand__figure">
                <?php echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'brand__img')); ?>
              </figure>
              <section class="brand__info">
                <p class="brand__text item__text"><?php echo the_excerpt_rss(); ?></p>
                <a href="<?php the_permalink(); ?>" class="brand__link">Altri prodotti <?php the_title();?> &raquo;</a>
              </section>
              <?php endwhile; ?>
            </section>

          <?php wp_reset_postdata(); endif; ?>

          <?php  
            $designer = new WP_Query( array(
                    'connected_type' => 'prod_2_desi',
                    'connected_items' => get_queried_object(),
                    'nopaging' => true,
                  ) );          
            if ( $designer->have_posts() ) :
          ?>  

           <section class="designer media media--right">
            <section class="designer__info">
              <?php while ( $designer->have_posts() ) : $designer->the_post(); ?>
              <h3 class="designer__title"><?php the_title(); ?></h3>
              <p class="designer__text item__text"><?php the_excerpt_rss(); ?></p>
              <a href="<?php the_permalink(); ?>" class="designer__link">Altri prodotti di <?php the_title(); ?> &raquo;</a>
            </section>
            <?php endwhile; ?>
          </section>
        <?php wp_reset_postdata(); endif; ?>
        </aside> 
        </div>

      </article>

  <?php endwhile; // End the loop ?>
<?php get_footer(); ?>
