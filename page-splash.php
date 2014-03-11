<?php 
/* 
Template name: Splashmail
*/
get_header(); ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="row">
            <article class="entry entry--page">
                <header class="entry__header">
                    <h1 class="entry__title">
                        <?php the_title(); ?>
                    </h1>
                </header>
                <div class="entry__text">
                    <?php the_content(); ?>
                    <hr>
                      <div class="contact__confirmation">
                    <?php
                        if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "contact__formSubmit") {

                            $email = $_POST['email'];
                            $name = $_POST['nome'];
                            $phone = $_POST['phone'];
                            $item = $_POST['item'];

                            $to = 'matteo.cavucci@gmail.com';
                            $subject = '[mobilnovo.it] ' .$item;
                            $msg = '<h2>Messaggio dal sito mobilnovo</h2> <br><strong>Contatto:</strong> ' .$name . '<br><strong>Email:</strong> ' .$email. ' <br><strong>Interessato a:</strong> ' .$item. ' <br> ';

                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            $headers .= 'From: mobilnovo <noreply@mobilnovo.it>' . "\r\n";

                            $headers .= "Reply-To:" .$email. "\r\n";
                            $headers .= "\r\nX-Mailer: PHP/".phpversion(). "\r\n";

                            if(mail($to, $subject, $msg, $headers)){
                                    echo '<h3 class="contact__success-title">Richiesta inviata con successo</h3>'; ?>
                                    <table class="contact__success-table">
                                    <thead>
                                        <tr>
                                            <td colspan="2">
                                                Riepilogo dei dati inviati:
                                            </td>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nome:</td>
                                                <td><?php echo $name; ?></td>
                                            </tr>
                                             <tr>
                                                <td>Email:</td>
                                                <td><?php echo $email; ?></td>
                                            </tr>
                                             <tr>
                                                <td>Telefono:</td>
                                                <td><?php if($phone): echo $phone; else: echo '&mdash;'; endif; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Prodotto:</td>
                                                <td><?php if($item): echo $item; else: echo '&mdash;'; endif; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            <?php }
                            else{
                                    echo '<p class="contact__fail">Si è verificato un errore; Scrivici direttamente la tua richiesta a info@mobilnovo.it</p>';
                                }
                        }
                        echo '<h1></h1>';
                    ?>
                </div>
                </div>
            </article>
        </div>
    <?php endwhile; ?>


<?php get_footer(); ?>