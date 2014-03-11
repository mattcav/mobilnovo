<?php get_header(); ?>
<?php if ( have_posts() ) : 
    $tax = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $archive_title = $tax->name;

    $brands = array();
    $designers = array();

    p2p_type( 'prod_2_brands' )->each_connected( $wp_query, array(), 'brand' );
    p2p_type( 'prod_2_desi' )->each_connected( $wp_query, array(), 'designer' );

    while ( have_posts() ) : the_post();
        foreach ( $post->brand as $post ) : setup_postdata( $post ); 
                    $brand = $post->post_name;
                    array_push($brands, $brand); 
        endforeach;
        wp_reset_postdata();

        foreach ( $post->designer as $post ) : setup_postdata( $post ); 
                    $designer = $post->post_name;
                    array_push($designers, $designer); 
        endforeach;
        wp_reset_postdata();


        $brands_unique = array_unique($brands);
        $brands = array_filter($brands_unique, 'strlen');

        $designers_unique = array_unique($designers);
        $designers = array_filter($designers_unique, 'strlen');
    endwhile;
?>
    <div id="container" class="indice">
        <article class="indice__container masonry <?php 
                foreach ( $brands as $term ) {
                           echo ' ';
                           echo $term;
                         }
                wp_reset_postdata();         
                foreach ( $designers as $term ) {
                           echo ' ';
                           echo $term;
                         }   
                wp_reset_postdata();                 
                         ?>">
            <h1 class="indice__title">
                <?php echo $archive_title; ?>
            </h1>
            <div id="filters" class="indice__filters">
              <label for="filter">filtra per brand:</label>
               <select name="filter" id="filter_brand" class="filter option-set" data-filter-group="brand">
                     <option data-filter-value="" selected="selected">Tutti i brand</option>
                      <?php 
                        foreach ( $brands as $term ) {
                            $args= array(
                                  'name' => $term,
                                  'post_type' => 'brand',
                                  'post_status' => 'publish',
                                  'numberposts' => 1
                                );
                           $brand = get_posts($args);
                           echo '<option data-filter-value=".'.$term.'">'.$brand[0]->post_title.'</option>';
                         }
                         wp_reset_postdata();
                      ?>
               </select>
               <label for="filter">filtra per designer:</label>
               <select name="filter" id="filter_designer" class="filter option-set" data-filter-group="designer">
                     <option data-filter-value="" selected="selected">Tutti i designer</option>
                      <?php 
                        foreach ( $designers as $term ) {
                           $args= array(
                                  'name' => $term,
                                  'post_type' => 'designer',
                                  'post_status' => 'publish',
                                  'numberposts' => 1
                                );
                           $designer = get_posts($args);
                           echo '<option data-filter-value=".'.$term.'">'.$designer[0]->post_title.'</option>';
                         }
                         wp_reset_postdata();
                      ?>
               </select>
            </div>
        </article>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'component', 'obj' ); ?>
        <?php endwhile; ?>

    </div>      
    <?php else : ?>
        <?php get_template_part( 'component', 'none' ); ?>
    <?php endif; // end have_posts() check ?> 
<?php get_footer(); ?>