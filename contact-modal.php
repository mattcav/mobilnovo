 <div id="contact" class="reveal-modal small contact" data-reveal> 
        <h2 class="contact__title">Contatta Mobilnovo</h2> 
        <p class="lead lead--contact">Riempi la form per ricevere informazioni riguardo a <?php the_title(); ?>.</p> 
        <form id="contact-form" class="contact__form" data-abide method="post" action="<?php bloginfo('url'); ?>/grazie/"> 
          <div class="contact__inner">
            <div class="name-field"> 
              <label for="nome">Il tuo nome <small>*</small> 
                <input id="nome" name="nome" type="text" required pattern="[a-zA-Z]+" placeholder="es. Mario Rossi"> 
              </label> 
              <small class="error">È necessario inserire un nome.</small>
            </div> 
            <div class="email-field"> 
              <label for="email">Email <small>*</small> 
                <input type="email" name="email" id="email" required placeholder="esempio@email.com"> 
              </label> 
              <small class="error">È necessaria un'email.</small> 
            </div>
            <div class="phone-field"> 
              <label for="phone">Telefono <small></small> 
                <input type="text" name="phone" id="phone" pattern="alpha_numeric" placeholder="3391234567"> 
              </label> 
              <small class="error">Inserisci il numero senza spazi tra le cifre</small> 
            </div>  
            <div class="privacy-field"> 
                <input id="privacy" name="privacy" id="privacy" type="checkbox" checked required><label for="privacy">Accetto le <a class="contact__link" href="<?php bloginfo('url'); ?>/privacy/">condizioni della privacy</a></label></label> 
              <small class="error">È necessario accettare le condizioni di privacy.</small> 
            </div>
          </div>
          <input type="hidden" name="item" value="<?php the_title(); ?>">
          <input type="hidden" name="action" value="contact__formSubmit">
          <button type="contact__submit submit">Invia</button> 
          <small class="contact__notes">I campi contrassegnati con (*) sono obbligatori.</small>
        </form>
      </div>