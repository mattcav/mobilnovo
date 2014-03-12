<section id="promozione" class="promozione" data-equalizer-watch>
<h2 class="promozione__heading">Promozione in corso</h2>
<?php
    $args = array(
            'post_type' => 'promozione',
            'posts_per_page'=> '-1'
            );
    $promozione_query = new WP_Query( $args );

    if ( $promozione_query->have_posts() ) {
        while ( $promozione_query->have_posts() ) {
            $promozione_query->the_post(); ?>
            <article>
                <div class="promozione__inner">
                    <h1 class="promozione__title"><?php the_title(); ?></h1>
                    <p class="promozione__text"><?php the_excerpt_rss(); ?></p>
                    <a class="button small promozione__link" href="<?php the_permalink(); ?>">Scopri di più</a>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'promozione__img')); ?>
                </a>
        </article>
    <?php }
    } 
    wp_reset_postdata();
?>
</section>