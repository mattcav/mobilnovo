<?php 
  $args = array(
          'post_type' => 'prodotti',
          'posts_per_page' => 12
          );
  $evidenza = new WP_Query( $args ); 
  p2p_type( 'prod_2_brands' )->each_connected( $evidenza, array(), 'brand' );
  if ( $evidenza->have_posts() ) {
?>
  <section id="evidenza" class="evidenza">
    <div class="row">
      <h2 class="evidenza__title">In vetrina</h2>
      <ul class="evidenza__list">
        <?php 
        while ( $evidenza->have_posts() ) {
            $evidenza->the_post();
            get_template_part('component', 'grid-item'); 
          }
        ?>                        
      </ul>
    </div>
  </section>

<?php 
} else {
  // no posts found
}
wp_reset_postdata();
?>  