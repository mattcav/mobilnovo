<?php 
  $post_thumb = get_the_post_thumbnail($post->ID, 'medium', array('class' => 'obj__img'));
  $post_name = get_the_title(); 
  $post_link = get_permalink();
?>
<article class="show-caption obj masonry <?php 
    if ( 'prodotti' == get_post_type() ) :
          $term_list = wp_get_post_terms($post->ID, 'categorie', array("fields" => "slugs"));
          echo $term_list[0]; 

            if(is_archive()) {
              foreach ( $post->brand as $post ) : setup_postdata( $post );
                echo ' ';
                echo $post->post_name;
              endforeach;
              wp_reset_postdata();

              foreach ( $post->designer as $post ) : setup_postdata( $post );
                echo ' ';
                echo $post->post_name;
              endforeach;
            }
    endif;        
        ?>">
  <figure class="obj__figure">
    <a href="<?php echo $post_link; ?>" class="obj__link">
        <?php echo $post_thumb; ?>
    </a>
  </figure>
  <section class="obj__section">
    <a href="<?php echo $post_link; ?>">
      <h2 class="obj__title">
        <?php echo $post_name; ?>
      </h2>
    </a>  
  </section>
</article>