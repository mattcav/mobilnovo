   <section id="footer" class="footer">
            <div class="row">

              <section class="blurb">
                <h2 class="footer__title">Mobilnovo</h2>
                <p class="blurb__text">Nasce nel 1968 con l'apertura a Roma dello storico showroom di via Anastasio II, seguita da una progressiva espansione nelle principali zone della capitale dedicate all'arredamento.</p>

                <p class="blurb__text">Nel tempo l'azienda si è affermata nel panorama nazionale e internazionale come una realtà di riferimento nel settore del design e dell'arredamento contemporaneo.</p>
              
                <a href="mailto:info@mobilnovo.it" class="blurb__feature">info@mobilnovo.it</a>
                <p class="blurb__feature blurb--phone">tel +39 06 6381104</p>


              <form class="newsletter"> 
                <h2 class="newsletter__title">Newsletter</h2>
                <p class="newsletter__text">Iscriviti e rimani aggiornato sulle offerte di mobilnovo.</p>
                <div class="newsletter__inner">
                  <div class="newsletter__input">
                    <input type="email" placeholder="esempio@email.com">
                  </div>
                  <div class="newsletter__button">
                    <a class="button postfix" href="404.html">Go</a>
                  </div>
                </div>
              </form>
              </section>

             <div class="negozi">
              <h2 class="footer__title negozi--title">Punti Vendita</h2>
                <ul class="negozi__list">
                 <?php
                      $args = array(
                                  'child_of' => 36,
                                  'sort_order' => 'DESC',
                                  'sort_column' => 'post_date'
                              );
                      $negozi = get_pages( $args );
                      foreach( $negozi as $negozio ) {    
                        $name = $negozio->post_title;
                        $address = $negozio->post_excerpt;
                        $link = get_page_link( $negozio->ID ); ?>
                         <li class="negozio">
                          <div class="negozio__inner">
                            <h3 class="negozio__title"><?php echo $name; ?></h3>
                            <a class="negozio__link" href="<?php echo $link; ?>">
                              <?php echo $address; ?>
                            </a>
                          </div>
                        </li>
                      <?php } ?>
                </ul>
              </div>

            
            </div>
          </section>

          <footer id="content-info" class="contentinfo">
            <div class="row">
              <div class="contentinfo__inner">
                <small>Mobilnovo srl &ndash; P.I. 00917721003 &mdash; Copyright © 2014 &mdash; Tutti i diritti riservati  <a class="contentinfo__link" href="<?php bloginfo('url');?>/impressum/">impressum</a>&nbsp;<a class="contentinfo__link" href="<?php bloginfo('url');?>/privacy/">privacy</a> | <a href="mailto:info@mobilnovo.it" class="contentinfo__link">info@mobilnovo.it</a> -  +39 06 6381104 </small>
              </div>
            </div>
          </footer>
        </main>

      <!-- close the off-canvas menu -->
      <a class="exit-off-canvas"></a>

      </div><!-- offcanvas inner wrap-->
    </div><!-- offcanvas wrap--> 

        
  <script src="<?php bloginfo('template_directory'); ?>/js/build/app.js"></script>
  <?php wp_footer(); ?>
  </body>
</html>

