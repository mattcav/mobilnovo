<?php get_header(); ?>
<?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('component', 'obj'); ?>
        <?php endwhile; ?>
<?php get_footer(); ?>