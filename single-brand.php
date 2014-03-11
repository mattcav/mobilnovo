<?php get_header(); ?>
<div id="container" class="indice">
 <?php while (have_posts()) : the_post(); 
      $brand_title = get_the_title(); 
      $brand_content = get_the_content();
      $brand_thumb = get_the_post_thumbnail($post->ID, 'small', array('class' => 'indice__img'));

      $terms = get_terms("categorie");

      $product = new WP_Query( array(
        'connected_type' => 'prod_2_brands',
        'connected_items' => get_queried_object(),
        'nopaging' => true
      ) );

        if ( $product->have_posts() ) :
          $categories = array();
          while ( $product->have_posts() ) : $product->the_post(); 
            $category = wp_get_post_terms($post->ID, 'categorie', array("fields" => "slugs"));
            $category_slug = $category[0];
            array_push($categories, $category_slug);
          endwhile; 
          $categories_unique = array_unique($categories);
          $categories = array_filter($categories_unique, 'strlen');
        endif; ?>

    <article class="indice__container masonry <?php foreach ( $terms as $term ) { echo $term->slug . ' ';} ?>">
        <h1 class="indice__title">
            <?php echo $brand_thumb; ?>
        </h1>
          <div class="indice__text">
            <p>
              <?php echo $brand_content; ?>  
            </p>  
          </div>
          <div id="filters" class="indice__filters">
          <label for="filter">filtra per categorie:</label>
           <select name="filter" id="filter" class="filter option-set" data-filter-group="categorie">
                 <option data-filter-value="" selected="selected">Tutti i prodotti</option>
                  <?php 
                    foreach ( $categories as $term ) {
                      $cat = get_term_by( 'slug', $term, 'categorie' );
                      echo '<option data-filter-value=".'.$term.'">'.$cat->name.'</option>';
                     }
                  ?>
           </select>
          </div>
    </article>
 <?php endwhile; ?>

    <?php 
    if ( $product->have_posts() ) :
    while ( $product->have_posts() ) : $product->the_post(); ?>
        <?php get_template_part('component', 'obj'); ?>
    <?php endwhile; ?>    

    <?php wp_reset_postdata(); 
      else :
        get_template_part('component', 'noproducts');
    endif; ?>

 </div>

<?php get_footer(); ?>