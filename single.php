<?php get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="row">
            <article class="entry entry--single">
                <header class="entry__header">
                    <h1 class="entry__title">
                        <?php the_title(); ?>
                    </h1>
                </header>
                <div class="entry__text">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    <?php endwhile; ?>

<?php get_footer(); ?>