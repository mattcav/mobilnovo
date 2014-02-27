<article class="obj masonry">
  <figure class="obj__figure">
    <a href="<?php the_permalink(); ?>" class="obj__link">
        <?php echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'obj__img')); ?>
    </a>
  </figure>
  <section class="obj__section">
    <a href="<?php the_permalink(); ?>">
      <h2 class="obj__title">
        <?php the_title(); ?>
      </h2>
    </a>  
  </section>
</article>