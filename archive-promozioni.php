<?php get_header(); ?>
    <div class="results promozioni--index" id="promozioni-index">
    
    <h2 class="promozioni__title">Promozioni</h2>
        <?php if ( have_posts() ) : ?>
        
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="promozione promozione--archive-item">
                    <div class="promozione__inner promozione--archive-inner">
                        <h1 class="promozione__title"><?php the_title(); ?></h1>
                        <p class="promozione__text"><?php the_excerpt_rss(); ?></p>
                        <a class="button small promozione__link" href="<?php the_permalink(); ?>">Scopri di più</a>
                    </div>
                    <a href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'promozione__img promozione--archive-img')); ?>
                    </a>
                </article>
            <?php endwhile; ?>
            
            <?php else : ?>
                <?php get_template_part( 'component', 'none' ); ?>
        <?php endif; // end have_posts() check ?>
        
        <?php /* Display navigation to next/previous pages when applicable */ ?>
        <?php if ( function_exists('mobil_pagination') ) { mobil_pagination(); } else if ( is_paged() ) { ?>
            <nav id="post-nav">
                <div class="post-previous"><?php next_posts_link( __( '&larr; Precedente', 'mobil' ) ); ?></div>
                <div class="post-next"><?php previous_posts_link( __( 'Successiva &rarr;', 'mobil' ) ); ?></div>
            </nav>
        <?php } ?>
    </div>
<?php get_footer(); ?>