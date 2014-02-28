<?php 
  $args = array(
          'post_type' => 'prodotti',
          'posts_per_page' => 12
          );
  $evidenza = new WP_Query( $args ); 
  p2p_type( 'prod_2_brands' )->each_connected( $evidenza, array(), 'brand' );
  if ( $evidenza->have_posts() ) {
?>
  <section id="vetrina" class="vetrina">
    <ul class="vetrina__list">
      <?php 
      while ( $evidenza->have_posts() ) {
          $evidenza->the_post();
          get_template_part('component', 'alt-grid-item'); 
        }
      ?>                        
    </ul>
  </section>

<?php 
} else {
  // no posts found
}
wp_reset_postdata();
?>  