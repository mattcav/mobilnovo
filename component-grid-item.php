<li class="grid-item coming">
  <a href="<?php the_permalink(); ?>" class="grid-item__link show-caption">
    <figure class="grid-item__figure">
      <?php echo get_the_post_thumbnail($post->ID, 'small', array('class' => 'grid-item__img')); ?>
      <figcaption class="grid-item__caption">
        <div class="caption__container">
            <p class="caption__label caption--name"><?php the_title(); ?></p>
            <?php foreach ( $post->brand as $post ) : setup_postdata( $post ); ?>
                    <p class="caption__label caption--brand"><?php the_title(); ?></p>
            <?php endforeach; ?>
        </div>
        </figcaption>
    </figure>
  </a>
</li>