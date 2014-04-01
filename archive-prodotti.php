<?php get_header(); ?>
<div class="row archive-prodotti">
 <?php 
    $args = array( 
        'hide_empty'=>'0',
        // 'exclude'=> array(91, 92, 93) 
        );
    $terms = get_terms('categorie', $args);

    $count = count($terms); $i=0;
    if ($count > 0) {
        $term_list = '<ul class="categorie-archive">';
        foreach ($terms as $term) {
            $i++;
            $term_list .= '<li class="categorie-archive__item"><a class="categorie-archive__link" href="' . get_term_link( $term ) . '" title="Guarda tutti i prodotti ' .$term->name . '"><h2 class="categorie-archive__title">' . $term->name . '</h2></a></li>';
            if ($count != $i) $term_list .= ''; else $term_list .= '</ul>';
        }
        echo $term_list;
    }
 ?>
</div>

<?php get_footer(); ?>