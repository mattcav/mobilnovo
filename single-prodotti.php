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

        <div class="item__inner item__column-container" data-equalizer>
          <section id="item__content" class="item__content item__column" data-equalizer-watch>
            <div class="item__category">
              <?php
                echo get_the_term_list( $post->ID, 'categorie',
                '', '', '' );
              ?>
            </div>

            <div class="item__content-inner">
              <h1 class="item__title">
                <?php the_title(); ?>
              </h1>
              <p class="item__text item__details">
                <?php $term =""; if( has_term( $term, 'materiali' ) ) : ?>
                  <strong>Materiale:</strong> 
                    <em><?php
                          echo get_the_term_list( $post->ID, 'materiali',
                          '', ', ', '' );
                        ?>
                    </em>
                  <br>
                <?php endif; ?>
                
                <?php if( get_post_meta($post->ID, '_mobil_dimensioni', true) ) : ?>
                  <strong>Dimensioni:</strong> <em><?php echo get_post_meta($post->ID, '_mobil_dimensioni', true); ?></em>
                  <br>
                <?php endif; ?>

                 <?php if( has_term( $term, 'colore' ) ) : ?>
                  <strong>Varianti colore:</strong> 
                    <em><?php
                          echo get_the_term_list( $post->ID, 'colore',
                          '', ', ', '' );
                        ?>
                    </em>
                <?php endif; ?>
              
              </p>

              <p class="item__desc item__text">
                <?php echo get_the_content(); ?> 
              </p>

              <a href="#" data-reveal-id="contact" data-reveal class="button item__action">
                richiedi informazioni
              </a>
            </div>
          </section>

          <aside id="item__sidebar" class="item__sidebar item__column" data-equalizer-watch>
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
                  <a href="<?php the_permalink(); ?>" class="brand__link">Altri prodotti <?php the_title();?>&nbsp;→</a>
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
                <a href="<?php the_permalink(); ?>" class="designer__link">Altri prodotti <?php the_title(); ?>&nbsp;→</a>
              </section>
              <?php endwhile; ?>
            </section>
            <?php wp_reset_postdata(); endif; ?>
          </aside> 
        </div>
      </article>

      <!-- modals -->
      <div id="contact" class="reveal-modal small contact" data-reveal> 
        <h2 class="contact__title">Contatta Mobilnovo</h2> 
        <p class="lead lead--contact">Riempi la form per ricevere informazioni riguardo a <?php the_title(); ?>.</p> 
        <form id="contact-form" class="contact__form" data-abide method="post" action="<?php bloginfo('url'); ?>/grazie/"> 
          <div class="contact__inner">
            <div class="name-field"> 
              <label for="nome">Il tuo nome <small>*</small> 
                <input id="nome" name="nome" type="text" required pattern="[a-zA-Z]+" placeholder="es. Mario Rossi"> 
              </label> 
              <small class="error">È necessario inserire un nome.</small>
            </div> 
            <div class="email-field"> 
              <label for="email">Email <small>*</small> 
                <input type="email" name="email" id="email" required placeholder="esempio@email.com"> 
              </label> 
              <small class="error">È necessaria un'email.</small> 
            </div>
            <div class="phone-field"> 
              <label for="phone">Telefono <small></small> 
                <input type="text" name="phone" id="phone" pattern="alpha_numeric" placeholder="3391234567"> 
              </label> 
              <small class="error">Inserisci il numero senza spazi tra le cifre</small> 
            </div>  
            <div class="privacy-field"> 
                <input id="privacy" name="privacy" id="privacy" type="checkbox" checked required><label for="privacy">Accetto le <a class="contact__link" href="<?php bloginfo(); ?>/privacy/">condizioni della privacy</a></label></label> 
              <small class="error">È necessario accettare le condizioni di privacy.</small> 
            </div>
          </div>
          <input type="hidden" name="item" value="<?php the_title(); ?>">
          <input type="hidden" name="action" value="contact__formSubmit">
          <button type="contact__submit submit">Invia</button> 
          <small class="contact__notes">I campi contrassegnati con (*) sono obbligatori.</small>
        </form>
      </div>

  <?php endwhile; // End the loop ?>
<?php get_footer(); ?>
