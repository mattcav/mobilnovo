<?php get_header(); ?>
  <?php 
        //main loop 
        while (have_posts()) : the_post(); 
        
        $thumb_ID = get_post_thumbnail_id( $post->ID );
        $galleryargs = array(
                      'post_parent' => $post->ID,
                      'post_type' => 'attachment',
                      'numberposts' => -1,
                      'post_mime_type' => 'image',
                      'order' => 'ASC',
                      'exclude' => $thumb_ID
                    );
        $images = get_posts($galleryargs);
        $thumb_img = wp_get_attachment_image_src( $thumb_ID, 'thumbnail');
        $small_img = wp_get_attachment_image_src( $thumb_ID, 'small');
        $large_img = wp_get_attachment_image_src( $thumb_ID, 'full');

        // promo
        $promo = get_post_meta($post->ID, '_promo_inpromo', true);  
        $price = get_post_meta($post->ID, '_promo_price', true); 

       $promozione = get_posts( array(
        'connected_type' => 'prod_2_promo',
        'connected_items' => get_queried_object(),
        'nopaging' => true,
        'suppress_filters' => false
      ) );
  ?>
      <article class="item">
        
        <?php if($promozione) :
          foreach ( $promozione as $post ) : setup_postdata( $post ); ?>
           <a class="promo-msg" href="<?php the_permalink(); ?>">In promozione</a>
        <?php endforeach; 
        wp_reset_postdata(); endif;?>
             

        <figure id="item__figure" class="item__figure">
          <?php if($images) : ?>
                <a href="#" class="open-clearing gallery__trigger" data-thumb-index="0">
                  <img class="item__img clearing-thumb" data-interchange="[<?php echo  $small_img[0] ?>, (default)], [<?php echo  $large_img[0] ?>, (medium)]" alt="<?php the_title(); ?>"> 
                  <noscript><img src="<?php echo  $large_img[0] ?>" alt="copertina"></noscript>
                    <span class="gallery__message">guarda la gallery</span>
                </a>
          <?php else : ?>      
              <img class="item__img clearing-thumb" data-interchange="[<?php echo  $small_img[0] ?>, (default)], [<?php echo  $large_img[0] ?>, (medium)]" alt="<?php the_title(); ?>"> 
              <noscript><img src="<?php echo  $large_img[0] ?>" alt="copertina"></noscript>
          <?php endif; ?>    
          </figure>

          <?php            
            if ( $images) :
              echo '<ul class="clearing-thumbs" data-clearing>';
              echo '<li><a href="'.$large_img[0].'"><img src="'.$thumb_img[0].'" alt="gallery-cover"></a></li>';
                foreach( $images as $image ) :
                $attachmenturl=wp_get_attachment_url($image->ID);
                $attachmentthumb=wp_get_attachment_image_src( $image->ID, 'thumbnail' );
                $attachmentfull=wp_get_attachment_image_src( $image->ID, 'full' );

                echo '<li><a href="'.$attachmentfull[0].'">';
                  echo '<img src="'.$attachmentthumb[0].'" alt="gallery img">';
                echo '</a></li>';
              endforeach;
              echo '</ul>';
            endif;
          ?>
          

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
                <?php $term =""; if( has_term( $term, 'materiali' ) ) : 
                  $get_materiali = get_the_terms( $post->ID, 'materiali' );
                  $elenco_materiali = array();
                  foreach ( $get_materiali as $materiale ) {
                    $elenco_materiali[] = $materiale->name;
                  }
                  
                  $materiali = join( ", ", $elenco_materiali );
                ?>
                  <strong>Materiale:</strong> 
                    <?php echo $materiali; ?>
                  <br>
                <?php endif; ?>
                
                <?php if( get_post_meta($post->ID, '_mobil_dimensioni', true) ) : ?>
                  <strong>Dimensioni:</strong> <em><?php echo get_post_meta($post->ID, '_mobil_dimensioni', true); ?></em>
                  <br>
                <?php endif; ?>

                 <?php if( has_term( $term, 'colore' ) ) : ?>
                  <strong>Varianti colore:</strong> 
                    <em><?php
                          $get_colori = get_the_terms( $post->ID, 'colore' );
                          $elenco_colori = array();
                          foreach ( $get_colori as $colore ) {
                            $elenco_colori[] = $colore->name;
                          }
                          
                          $colore = join( ", ", $elenco_colori );
                          echo $colore;
                        ?>
                    </em>
                <?php endif; ?>
              
              </p>

              <p class="item__desc item__text">
                <?php echo get_the_content(); ?> 
              </p>

              <?php 
              $promo = get_post_meta($post->ID, '_promo_inpromo', true);  

              if($promo && $price) : ?>
                <div class="price">
                  <p class="price__label">Prezzo speciale:</p>
                  <span class="price__value">€ <?php echo $price; ?></span>
                </div>
              <?php endif; ?>  

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
