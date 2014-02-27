<!doctype html>
<html class="no-js" lang="it">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css" />
    <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
    <script type="text/javascript" src="//use.typekit.net/gbq0sle.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="off-canvas-wrap">
      <div class="inner-wrap">

        <nav class="tab-bar">
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
        </nav>


        <!-- Off Canvas Menu -->
        <aside class="menu right-off-canvas-menu" role="navigation"> 
          <ul class="menu__list off-canvas-list"> 
            <li class="menu__item"><a class="menu__link move-left" href="404.html">Profilo</a></li> 
            <li class="menu__item"><a class="menu__link move-left" href="404.html">Prodotti</a></li> 
            <li class="menu__item"><a class="menu__link move-left" href="404.html">Brand</a></li>
            <li class="menu__item"><a class="menu__link move-left" href="404.html">Progettazione</a></li>  
            <li class="menu__item"><a class="menu__link move-left" href="404.html">Promozioni</a></li> 
            <li class="menu__item"><a class="menu__link move-left" href="404.html">Contatti</a></li> 
          </ul> 

          <form action="#" class="search" id="search">
            <div class="search__inner">
            <h2 class="search__title">Cerca nel sito</h2>
              <div class="newsletter__input">
                <input type="search" placeholder="scrivi qui per cercare">
              </div>
              <div class="search__button">
                <a class="button postfix" href="404.html">Go</a>
              </div>
            </div>
          </form>

        </aside>
        
        <main role="main" id="main">