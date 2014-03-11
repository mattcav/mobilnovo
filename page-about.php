<?php 
/*
Template name: About
*/
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<article class="about">

  <header class="photohead">
    <h2 class="photohead__title"><?php the_title(); ?></h2>
    <img src="<?php bloginfo('template_directory'); ?>/images/mobilnovo/apertura.jpg" alt="mobilnovo" class="photohead__img">
  </header>

  <div class="row">
    <section class="infoblock">
      <div class="infoblock__text">
        <?php the_content(); ?>
      </div>

      <div class="infoblock__figure">
          <img src="<?php bloginfo('template_directory'); ?>/images/mobilnovo/storica.jpg" alt="Mobilnovo com'era" class="infoblock__img">
      </div>
    </section>
  </div>  

  <section class="photosection">
    <h2 class="photosection__title">
      Oggi siamo una realtà con 8 punti vendita a Roma
    </h2>
    <img src="" alt="" class="photosection__img">
  </section>

</article>

<?php endwhile; // End the loop ?>
<?php get_footer(); ?>