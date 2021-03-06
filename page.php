<?php get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>
            <article class="entry entry--page">

                <?php if(has_post_thumbnail()): 
                    echo get_the_post_thumbnail($post->ID, 'small', array('class' => 'negozio__img')); 
                    endif;    
                ?>

                <header class="entry__header">
                    <h1 class="entry__title">
                        <?php the_title(); ?>
                    </h1>
                </header>
                <div class="entry__text">
                    <?php the_content(); ?>
                </div>
            </article>
    <?php endwhile; ?>

<?php get_footer(); ?>