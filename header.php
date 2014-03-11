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


        <!-- Off Canvas Menu -->
        <aside class="menu right-off-canvas-menu" > 
          <nav class="offcanvas-nav" role="navigation">
            <ul class="menu__list off-canvas-list"> 
              <li class="menu__item"><a class="menu__link move-left" href="404.html">Chi siamo</a></li> 
              <li class="menu__item"><a class="menu__link move-left" href="404.html">Servizi</a></li> 
              <li class="menu__item"><a class="menu__link move-left" href="404.html">Prodotti</a></li>
              <li class="menu__item"><a class="menu__link move-left" href="<?php bloginfo('url'); ?>/brand/">Brand</a></li>  
              <li class="menu__item"><a class="menu__link move-left" href="404.html">Promozioni</a></li> 
            </ul>
          </nav> 

          <form method="get" class="searchform" id="searchform" action="<?php echo home_url('/'); ?>">
            <div class="searchform__inner">
            <h2 class="searchform__title">Cerca nel sito</h2>
              <div class="newsletter__input">
                <input type="search" value="" name="s" id="s" placeholder="scrivi qui per cercare">
              </div>
              <div class="searchform__button">
                <button class="postfix">Go</button>
              </div>
            </div>
          </form>
        </aside>
        
        <main role="main" id="main">