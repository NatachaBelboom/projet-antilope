<?php

require_once(__DIR__ . '/Menus/MenuItem.php');

// Désactiver l'éditeur "Gutenberg" de Wordpress
add_filter('use_block_editor_for_post', '__return_false');

// Activer les images sur les articles
add_theme_support('post-thumbnails');

// enregistrer un custom post type module
register_post_type('product', [
    'label' => 'Modules',
    'labels' => [ //Ecraser des valeurs par defaut
        'name' => 'Modules',
        'singular_name' => 'Modules',
    ],
    'description' => "La ressource permettant de gérer les modules créés",
    'public' => true, //accessible dans l'interface admin (formulaire de contact: false)
    'menu_position' => 5,
    'menu_icon' => 'dashicons-admin-tools',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'modules'],
    'has_archive' => true,
]);


//Enregistrer les menus de navigation
register_nav_menu('primary', 'Emplacement de la navigation principale de haut de page');

// Définition de la fonction retournant un menu de navigation sous forme d'un tableau de lien niveau 0

function noair_get_menu_items($location)
{
    // Récuperer le menu qui correspond a l'emplacement souhaité

    $items = [];

    $locations = get_nav_menu_locations(); //fonction retourne un tableau de plusieurs emplacement

    if(!$locations[$location] ?? false){
        return $items;
    }

    $menu = $locations[$location];

    // Récuperer tous les éléments du menu en question
    $posts = wp_get_nav_menu_items($menu);

    // Traiter chaque éléments du menu pour les transformer en objet
    foreach ($posts as $post){
        // Créer une instance d'un objet personnalisé à partir de $post

        $item = new MenuItem($post);

        // Ajouter cette instance soit à $items (s'il s'agit d'un element de niveau 0), soit en tant que sous élément d'un item déja existant

        if(!$item->isSubItems()){
            $items[] = $item;
            continue;
        }

        //ajouter l'einstance comme enfant d'un item existant
        foreach ($items as $existing){
            if(!$existing->isParentFor($item)) continue;

            $existing->addSubItem($item);
        }
    }

    // Retourner les éléments de niveau 0
    return $items;
}

//Recuperer les modules pour la section module qui va sur toutes les pages
function noair_get_products($count = 20/*, $search = null*/)
{
    // 1. on instancie l'objet WP_QUERY
    $products = new WP_Query([
        'post_type' => 'product',
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => $count,
/*        's' => strlen($search) ? $search : null,*/
    ]);

    // 2. on retourne l'objet WP_QUERY
    return $products;
}

//fonction permettant d'inclure des composants et d'y injecter des variables locales (scope de l'appel de fonction)
function noair_include(string $partial, array $variables = [])
{
    //$partial = 'post'
    // =>/Utilisateurs/.../wp-content/dw/partials/post.php

    extract($variables);
    include(__DIR__ . '/partials/' . $partial . '.php');
}


function noair_the_img_attributes($id, $sizes = []) {
    $src = wp_get_attachment_url($id);
    $thumbnail_meta = get_post_meta($id);


    $sizes = array_map(function ($size) use ($id) {
        $data = wp_get_attachment_image_src($id, $size);


        return $data[0] . ' ' . $data[1] . 'w';
    }, $sizes);


    $srcset = implode(', ', $sizes);
    $alt = $thumbnail_meta['_wp_attachment_image_alt'][0] ?? null;


    return 'src="' . $src . '" srcset="' . $srcset . '" alt="' . $alt . '"';
}

function noair_the_thumbnail_attributes($sizes = [])
{
    // 1. Récupérer le thumbnail pour le post courant dans the loop
    $thumbnail = get_post(get_post_thumbnail_id());
    $thumbnail_meta = get_post_meta($thumbnail->ID);
    $src = null;

    // 2. Récupérer les tailles d'image qui nous intéressent & formater les tailles pour qu'elles soient utilisables dans srcset
    $sizes = array_map(function($size) use ($thumbnail, &$src) {
        $data = wp_get_attachment_image_src($thumbnail->ID, $size);

        if(is_null($src)) {
            $src = $data[0];
        }

        return $data[0] . ' ' . $data[1] . 'w';
    }, $sizes);

    // 4. Formater les attributs
    $srcset = implode(', ', $sizes);
    $alt = $thumbnail_meta['_wp_attachment_image_alt'][0] ?? null;

    // 5. Retourner les attributs générés
    return 'src="' . $src . '" srcset="' . $srcset . '" alt="' . $alt . '"';
}