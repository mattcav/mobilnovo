<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <div id="container" class="indice">
        <article class="indice__container masonry">
            <h1 class="indice__title">
                <?php post_type_archive_title(); ?>
            </h1>
        </article>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'component', 'obj' ); ?>
        <?php endwhile; ?>

    </div>      
    <?php else : ?>
        <?php get_template_part( 'component', 'none' ); ?>
    <?php endif; // end have_posts() check ?> 
<?php get_footer(); ?>