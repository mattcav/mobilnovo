<?php get_header(); ?>

   <div class="row">
    <div class="results" id="results">
    
    <h2 class="results__title">Risultati per: <span class="result__key"><?php echo get_search_query(); ?></span></h2>
        <?php if ( have_posts() ) : ?>
        
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'component', 'result' ); ?>
            <?php endwhile; ?>
            
            <?php else : ?>
                <?php get_template_part( 'component', 'none' ); ?>
            
        <?php endif; // end have_posts() check ?>
        
        <?php /* Display navigation to next/previous pages when applicable */ ?>
    </div>
   </div>
        
<?php get_footer(); ?>