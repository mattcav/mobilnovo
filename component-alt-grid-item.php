<li class="alt-grid-item">
  <a href="<?php the_permalink(); ?>" class="alt-grid-item__link">
    <figure class="alt-grid-item__figure">
      <?php echo get_the_post_thumbnail($post->ID, 'small', array('class' => 'alt-grid-item__img')); ?>
      <figcaption class="alt-grid-item__caption">
        <div class="caption__container alt--caption-container">
            <p class="caption__label caption--name alt-caption--name"><?php the_title(); ?></p>
            <?php foreach ( $post->brand as $post ) : setup_postdata( $post ); ?>
                    <p class="caption__label caption--brand alt-caption--brand"><?php the_title(); ?></p>
            <?php endforeach; ?>
        </div>
        </figcaption>
    </figure>
  </a>
</li>