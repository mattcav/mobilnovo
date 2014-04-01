 <!-- Off Canvas Menu -->
<aside class="menu right-off-canvas-menu" > 
  <nav class="offcanvas-nav" role="navigation">
    <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => false,
            'depth' => 0,
            'items_wrap' => '<ul class="menu__list off-canvas-list">%3$s</ul>',
            'walker'  => new offcanvasWalker()
        ) );
    ?>  
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