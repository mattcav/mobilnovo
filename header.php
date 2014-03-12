<!doctype html>
<html class="no-js" lang="it">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>Mobilnovo</title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css" />
    <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
    <script type="text/javascript" src="//use.typekit.net/gbq0sle.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="off-canvas-wrap">
      <div class="inner-wrap">

        <header class="tab-bar">
          <section class="tab-bar__title">
            <a href="<?php bloginfo('url'); ?>">
              <img class="tab-bar__logo" src="<?php bloginfo('template_directory'); ?>/images/mobilnovo/mobilnovo.svg" alt="mobilnovo">
            </a>
          </section>
          <section class="tab-bar__trigger">
            <button class="right-off-canvas-toggle tiny tab-bar__button">
              menù
            </button>
          </section>
        </header>


       <?php get_sidebar(); ?>
        
        <main role="main" id="main">