<?php 
/*
Template name: Negozio
*/
get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>
            <article class="entry entry--page entry--negozio">
                <?php echo get_the_post_thumbnail($post->ID, 'small', array('class' => 'negozio__img')); ?>

                <header class="entry__header">
                    <h1 class="entry__title">
                        <?php the_title(); ?>
                        <span class="negozio__address"><?php echo the_excerpt_rss(); ?></span>
                    </h1>
                </header>
                <div class="entry__text">
                    <?php the_content(); ?>
                </div>
            </article>

            
    <?php endwhile; ?>

<?php get_footer(); ?>