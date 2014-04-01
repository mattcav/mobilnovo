<?php 
// pagination 
if( ! function_exists( 'mobil_pagination' ) ) {
    function mobil_pagination() {
        global $wp_query;
     
        $big = 999999999; // This needs to be an unlikely integer
     
        // For more options and info view the docs for paginate_links()
        // http://codex.wordpress.org/Function_Reference/paginate_links
        $paginate_links = paginate_links( array(
            'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'mid_size' => 5,
            'prev_next' => True,
            'prev_text' => __('&laquo;'),
            'next_text' => __('&raquo;'),
            'type' => 'list'
        ) );
     
        // Display the pagination if more than one page is found
        if ( $paginate_links ) {
            echo '<div class="pagination clearfix">';
            echo $paginate_links;
            echo '</div><!--// end .pagination -->';
        }
    }
};

// Add post thumbnail supports. 
        add_theme_support('post-thumbnails');
        // set_post_thumbnail_size(150, 150, false);
        add_image_size('small', 640, 99999);
// menus
        add_theme_support('menus');
        register_nav_menus(array(
            'primary' => __('Primary Navigation', 'mobilnovo') 
        ));

// excerpts to pages
add_action( 'init', 'mmobil_add_excerpts_to_pages' );
    function mmobil_add_excerpts_to_pages() {
        add_post_type_support( 'page', 'excerpt' );
   }        
// magic excerpt
    function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

// menu walkers
    class offcanvasWalker extends Walker_Nav_Menu
    {
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="menu__item '. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ' class="menu-item__link hover-move-left"';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
    }
// prodotti CPT
    add_action( 'init', 'register_cpt_prodotti' );
    function register_cpt_prodotti() {
        $labels = array(
            'name' => _x( 'Prodotti', 'prodotti' ),
            'singular_name' => _x( 'Prodotto', 'prodotti' ),
            'add_new' => _x( 'Add New', 'prodotti' ),
            'add_new_item' => _x( 'Add New Prodotto', 'prodotti' ),
            'edit_item' => _x( 'Edit Prodotto', 'prodotti' ),
            'new_item' => _x( 'New Prodotto', 'prodotti' ),
            'view_item' => _x( 'View Prodotto', 'prodotti' ),
            'search_items' => _x( 'Search Prodotti', 'prodotti' ),
            'not_found' => _x( 'No prodotto found', 'prodotti' ),
            'not_found_in_trash' => _x( 'No prodotti found in Trash', 'prodotti' ),
            'parent_item_colon' => _x( 'Parent Prodotti:', 'prodotti' ),
            'menu_name' => _x( 'Prodotti', 'prodotti' ),
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'description' => 'I prodotti che espone il sito',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );
        register_post_type( 'prodotti', $args );
        flush_rewrite_rules();
    } 

    // Promozioni CPT
    add_action( 'init', 'register_cpt_promozioni' );
    function register_cpt_promozioni() {
        $labels = array(
            'name' => _x( 'Promozioni', 'promozioni' ),
            'singular_name' => _x( 'Promozione', 'promozioni' ),
            'add_new' => _x( 'Add New', 'promozioni' ),
            'add_new_item' => _x( 'Add New Promozione', 'promozioni' ),
            'edit_item' => _x( 'Edit Promozione', 'promozioni' ),
            'new_item' => _x( 'New Promozione', 'promozioni' ),
            'view_item' => _x( 'View Promozione', 'promozioni' ),
            'search_items' => _x( 'Search Promozioni', 'promozioni' ),
            'not_found' => _x( 'No promozioni found', 'promozioni' ),
            'not_found_in_trash' => _x( 'No promozioni found in Trash', 'promozioni' ),
            'parent_item_colon' => _x( 'Parent Promozione:', 'promozioni' ),
            'menu_name' => _x( 'Promozioni', 'promozioni' ),
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'description' => 'Le promozioni di Mobilnovo',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );
        register_post_type( 'promozioni', $args );
        flush_rewrite_rules();
    } 

// brand CPT
    add_action( 'init', 'register_cpt_brand' );

    function register_cpt_brand() {

        $labels = array( 
            'name' => _x( 'Brands', 'brand' ),
            'singular_name' => _x( 'Brand', 'brand' ),
            'add_new' => _x( 'Add New', 'brand' ),
            'add_new_item' => _x( 'Add New Brand', 'brand' ),
            'edit_item' => _x( 'Edit Brand', 'brand' ),
            'new_item' => _x( 'New Brand', 'brand' ),
            'view_item' => _x( 'View Brand', 'brand' ),
            'search_items' => _x( 'Search Brands', 'brand' ),
            'not_found' => _x( 'No brands found', 'brand' ),
            'not_found_in_trash' => _x( 'No brands found in Trash', 'brand' ),
            'parent_item_colon' => _x( 'Parent Brand:', 'brand' ),
            'menu_name' => _x( 'Brands', 'brand' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            'description' => 'Marchi di Mobilnovo',
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            
            
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );

        register_post_type( 'brand', $args );
        flush_rewrite_rules();
    }
// designers CPT    
    add_action( 'init', 'register_cpt_designer' );

    function register_cpt_designer() {

        $labels = array( 
            'name' => _x( 'Designers', 'designer' ),
            'singular_name' => _x( 'designer', 'designer' ),
            'add_new' => _x( 'Add New', 'designer' ),
            'add_new_item' => _x( 'Add New designer', 'designer' ),
            'edit_item' => _x( 'Edit designer', 'designer' ),
            'new_item' => _x( 'New designer', 'designer' ),
            'view_item' => _x( 'View designer', 'designer' ),
            'search_items' => _x( 'Search Designers', 'designer' ),
            'not_found' => _x( 'No designers found', 'designer' ),
            'not_found_in_trash' => _x( 'No designers found in Trash', 'designer' ),
            'parent_item_colon' => _x( 'Parent designer:', 'designer' ),
            'menu_name' => _x( 'Designers', 'designer' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            
            
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );

        register_post_type( 'designer', $args );
        flush_rewrite_rules();
    }

// materiali tax
add_action( 'init', 'register_taxonomy_materiali' );
function register_taxonomy_materiali() {

    $labels = array( 
        'name' => _x( 'Materiali', 'materiali' ),
        'singular_name' => _x( 'Materiale', 'materiali' ),
        'search_items' => _x( 'Search Materiali', 'materiali' ),
        'popular_items' => _x( 'Popular Materiali', 'materiali' ),
        'all_items' => _x( 'All Materiali', 'materiali' ),
        'parent_item' => _x( 'Parent Materiale', 'materiali' ),
        'parent_item_colon' => _x( 'Parent Materiale:', 'materiali' ),
        'edit_item' => _x( 'Edit Materiale', 'materiali' ),
        'update_item' => _x( 'Update Materiale', 'materiali' ),
        'add_new_item' => _x( 'Add New Materiale', 'materiali' ),
        'new_item_name' => _x( 'New Materiale', 'materiali' ),
        'separate_items_with_commas' => _x( 'Separate materiali with commas', 'materiali' ),
        'add_or_remove_items' => _x( 'Add or remove Materiali', 'materiali' ),
        'choose_from_most_used' => _x( 'Choose from most used Materiali', 'materiali' ),
        'menu_name' => _x( 'Materiali', 'materiali' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'materiali', array('prodotti'), $args );
}

// categorie TAX
add_action( 'init', 'register_taxonomy_categorie' );

function register_taxonomy_categorie() {

    $labels = array( 
        'name' => _x( 'Categorie', 'categorie' ),
        'singular_name' => _x( 'Categoria', 'categorie' ),
        'search_items' => _x( 'Search Categorie', 'categorie' ),
        'popular_items' => _x( 'Popular Categorie', 'categorie' ),
        'all_items' => _x( 'All Categorie', 'categorie' ),
        'parent_item' => _x( 'Parent Categoria', 'categorie' ),
        'parent_item_colon' => _x( 'Parent Categoria:', 'categorie' ),
        'edit_item' => _x( 'Edit Categoria', 'categorie' ),
        'update_item' => _x( 'Update Categoria', 'categorie' ),
        'add_new_item' => _x( 'Add New Categoria', 'categorie' ),
        'new_item_name' => _x( 'New Categoria', 'categorie' ),
        'separate_items_with_commas' => _x( 'Separate categorie with commas', 'categorie' ),
        'add_or_remove_items' => _x( 'Add or remove categorie', 'categorie' ),
        'choose_from_most_used' => _x( 'Choose from the most used categorie', 'categorie' ),
        'menu_name' => _x( 'Categorie', 'categorie' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'categorie', array('prodotti'), $args );
    flush_rewrite_rules();
}

// colori tax
add_action( 'init', 'register_taxonomy_colore' );

function register_taxonomy_colore() {

    $labels = array( 
        'name' => _x( 'colore', 'colore' ),
        'singular_name' => _x( 'colori', 'colore' ),
        'search_items' => _x( 'Search colore', 'colore' ),
        'popular_items' => _x( 'Popular colore', 'colore' ),
        'all_items' => _x( 'All colore', 'colore' ),
        'parent_item' => _x( 'Parent colori', 'colore' ),
        'parent_item_colon' => _x( 'Parent colori:', 'colore' ),
        'edit_item' => _x( 'Edit colori', 'colore' ),
        'update_item' => _x( 'Update colori', 'colore' ),
        'add_new_item' => _x( 'Add New colori', 'colore' ),
        'new_item_name' => _x( 'New colori', 'colore' ),
        'separate_items_with_commas' => _x( 'Separate colore with commas', 'colore' ),
        'add_or_remove_items' => _x( 'Add or remove colore', 'colore' ),
        'choose_from_most_used' => _x( 'Choose from most used colore', 'colore' ),
        'menu_name' => _x( 'colore', 'colore' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'colore', array('prodotti'), $args );
    flush_rewrite_rules();
}



// Dimensioni CMB

function dimensioni_metabox( $meta_boxes ) {
    $prefix = '_mobil_'; // Prefix for all fields
    $meta_boxes['dimensioni'] = array(
        'id' => 'dimensioni',
        'title' => 'Dimensioni',
        'pages' => array('prodotti'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Dimensioni',
                'desc' => 'ad esempio: 62,5x69x67cm H Seduta 33cm',
                'id' => $prefix . 'dimensioni',
                'type' => 'text'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'dimensioni_metabox' );

function promozione_metabox( $meta_boxes ) {
    $prefix = '_promo_'; // Prefix for all fields
    $meta_boxes['promobox'] = array(
        'id' => 'promobox',
        'title' => 'Articolo in promozione',
        'pages' => array('prodotti'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Prezzo',
                'desc' => 'senza segno € - ad esempio: 500,00',
                'id' => $prefix . 'price',
                'type' => 'text'
            ),
             array(
                'name' => 'In promozione?',
                'desc' => 'Spunta se è un articolo in promozione',
                'id' => $prefix . 'inpromo',
                'type' => 'checkbox'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'promozione_metabox' );


function isHome_metabox( $meta_boxes ) {
    $prefix = '_mobil_'; // Prefix for all fields
    $meta_boxes['isHome'] = array(
        'id' => 'isHome',
        'title' => 'Homepage',
        'pages' => array('prodotti'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Homepage',
                'desc' => 'Spunta se è un prodotto visualizzato in homepage',
                'id' => $prefix . 'isHome',
                'type' => 'checkbox'
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'isHome_metabox' );

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'lib/metabox/init.php' );
    }
}

// connections many 2 many
function brand_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'prod_2_brands',
        'from' => 'prodotti',
        'to' => 'brand',
        'reciprocal' => true,
        'admin_box' => array(
            'show' => 'any',
            'context' => 'advanced'
          )
    ) );
}
add_action( 'p2p_init', 'brand_connection_types' );

function designers_connection_types() {
   p2p_register_connection_type( array(
        'name' => 'prod_2_desi',
        'from' => 'prodotti',
        'to' => 'designer',
        'reciprocal' => true,
        'admin_box' => array(
            'show' => 'any',
            'context' => 'advanced'
          )
    ) );
}
add_action( 'p2p_init', 'designers_connection_types' );

function promozioni_connection_types() {
   p2p_register_connection_type( array(
        'name' => 'prod_2_promo',
        'from' => 'prodotti',
        'to' => 'promozioni',
        'reciprocal' => true,
        'admin_box' => array(
            'show' => 'any',
            'context' => 'advanced'
          )
    ) );
}
add_action( 'p2p_init', 'promozioni_connection_types' );


// end functions.php
?>