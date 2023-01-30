<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/Menus/MenuItem.php');
require_once(__DIR__ . '/Forms/BaseFormController.php');
require_once(__DIR__ . '/Forms/ContactFormController.php');
require_once(__DIR__ . '/Forms/EstimationFormController.php');
require_once(__DIR__ . '/Forms/Sanitizers/BaseSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/TextSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/EmailSanitizer.php');
require_once(__DIR__ . '/Forms/Validators/BaseValidator.php');
require_once(__DIR__ . '/Forms/Validators/AbsoluteNumberValidator.php');
require_once(__DIR__ . '/Forms/Validators/AlphaValidator.php');
require_once(__DIR__ . '/Forms/Validators/NumericValidator.php');
require_once(__DIR__ . '/Forms/Validators/PollutionCheckboxValidator.php');
require_once(__DIR__ . '/Forms/Validators/PostalCodeValidator.php');
require_once(__DIR__ . '/Forms/Validators/RequiredValidator.php');
require_once(__DIR__ . '/Forms/Validators/EmailValidator.php');
require_once(__DIR__ . '/Forms/Validators/AcceptedValidator.php');
require_once(__DIR__ . '/Forms/Validators/DateValidator.php');
require_once(__DIR__ . '/Forms/Validators/DateFormatValidator.php');
require_once(__DIR__ . '/Forms/Validators/DateEndValidator.php');
require_once(__DIR__ . '/Forms/Validators/CheckboxValidator.php');
require_once(__DIR__ . '/Api/GoogleApi.php');
require_once(__DIR__ . '/Helper/DistanceHelper.php');

add_action('init', 'dw_init_php_session', 1);


function dw_init_php_session()
{
    if(!session_id()){
        session_start();
    }
}

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

register_post_type('pollution', [
    'label' => 'Polluants',
    'labels' => [ //Ecraser des valeurs par defaut
        'name' => 'Polluants',
        'singular_name' => 'Polluants',
    ],
    'description' => "La ressource permettant de gérer les polluants",
    'public' => true, //accessible dans l'interface admin (formulaire de contact: false)
    'menu_position' => 5,
    'menu_icon' => 'dashicons-admin-site',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'pollution'],
    'has_archive' => true,
]);

register_post_type('partner', [
    'label' => 'Partenaires',
    'labels' => [ //Ecraser des valeurs par defaut
        'name' => 'Partenaires',
        'singular_name' => 'Partenaires',
    ],
    'description' => "La ressource permettant de gérer les partenaires",
    'public' => true, //accessible dans l'interface admin (formulaire de contact: false)
    'menu_position' => 5,
    'menu_icon' => 'dashicons-universal-access',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'partenaires'],
    'has_archive' => true,
]);

register_post_type('publication', [
    'label' => 'Publications',
    'labels' => [ //Ecraser des valeurs par defaut
        'name' => 'Références',
        'singular_name' => 'Références',
    ],
    'description' => "La ressource permettant de gérer les références",
    'public' => true, //accessible dans l'interface admin (formulaire de contact: false)
    'menu_position' => 5,
    'menu_icon' => 'dashicons-book',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'references'],
]);

register_post_type('campagne', [
    'label' => 'Campagnes',
    'labels' => [ //Ecraser des valeurs par defaut
        'name' => 'Campagnes',
        'singular_name' => 'Campagnes',
    ],
    'description' => "La ressource permettant de gérer les campagnes",
    'public' => true, //accessible dans l'interface admin (formulaire de contact: false)
    'menu_position' => 5,
    'menu_icon' => 'dashicons-book',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'references'],
]);

register_post_type('message', [
    'label' => 'Messages de contact',
    'labels' => [ //Ecraser des valeurs par defaut
        'name' => 'Messages de contact',
        'singular_name' => 'Message de contact',
    ],
    'description' => "Les messages envoyés par les utilisateurs via le formulaire de contact",
    'public' => false, //accessible dans l'interface admin (formulaire de contact: false)
    'show_ui' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-buddicons-pm',
    'capabilities' => [
        'create_posts' => false, //enlever le bouton add new
    ],
    'map_meta_cap' => true,
]);

register_post_type('estimation', [
    'label' => 'Estimations',
    'labels' => [ //Ecraser des valeurs par defaut
        'name' => 'Estimations',
        'singular_name' => 'Estimations',
    ],
    'description' => "Les messages envoyés par les utilisateurs via le formulaire d\'estimations",
    'public' => false, //accessible dans l'interface admin (formulaire de contact: false)
    'show_ui' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-buddicons-pm',
    'capabilities' => [
        'create_posts' => false, //enlever le bouton add new
    ],
    'map_meta_cap' => true,
]);


// enregistrer le traitement du formulaire de contact personnalisé
add_action('admin_post_nopriv_submit_contact_form', 'noair_handle_submit_contact_form');
add_action('admin_post_submit_contact_form', 'noair_handle_submit_contact_form');

function noair_handle_submit_contact_form()
{
    $form = new ContactFormController($_POST);
}

// enregistrer le traitement du formulaire de l'estimation de cout
add_action('admin_post_nopriv_submit_estimation_form', 'noair_handle_submit_estimation_form');
add_action('admin_post_submit_estimation_form', 'noair_handle_submit_estimation_form');

function noair_handle_submit_estimation_form()
{
    $form = new EstimationFormController($_POST);
}

function noair_get_form_field_value($field, $form){

    if(!isset($_SESSION[$form])) {
        return '';
    }

    return $_SESSION[$form]['data'][$field] ?? '';
}

function noair_get_form_field_error($field, $form)
{
    if(! isset($_SESSION[$form])) {
        return '';
    }

    if(! ($_SESSION[$form]['errors'][$field] ?? null)) {
        return '';
    }

    return '<p class="form__error">' . $_SESSION[$form]['errors'][$field] . '</p>';
}

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
        'order' => 'ASC',
        'orderby' => 'ID',
        'posts_per_page' => $count,
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
    include(__DIR__ . '/Partials/' . $partial . '.php');
}

function noair_get_template_page(string $template)
{
    // 1. creer une wp-query
    $query = new WP_Query([
        'post_type' => 'page', // 2. filtrer sur le post type de type 'page'
        'post_status' => 'publish', // 3. Uniquement les pages publiées
        'meta_query' => [
            ['key' => '_wp_page_template', 'value' => $template . '.php'] // 4. Filtrer sur le type de template utilisé
        ]
    ]);

    return $query->posts[0] ?? null;    // 5. Retourner la premiere occurence pour cette requete (ou null)
}

function noair_mix($path)
{
    $path = '/' . ltrim($path, '/');

    // Checker si le fichier demandé existe bien, sinon retourner NULL
    if(! realpath(__DIR__ . '/public' . $path)) {
        return;
    }

    // Check si le fichier mix-manifest existe bien, sinon retourner le fichier sans cache-bursting
    if(! ($manifest = realpath(__DIR__ . '/public/mix-manifest.json'))) {
        return get_stylesheet_directory_uri() . '/public' . $path;
    }

    // Ouvrir le fichier mix-manifest et lire le JSON
    $manifest = json_decode(file_get_contents($manifest), true);

    // Check si le fichier demandé est bien présent dans le mix manifest, sinon retourner le fichier sans cache-bursting
    if(! array_key_exists($path, $manifest)) {
        return get_stylesheet_directory_uri() . '/public' . $path;
    }

    // C'est OK, on génère l'URL vers la ressource sur base du nom de fichier avec cache-bursting.
    return get_stylesheet_directory_uri() . '/public' . $manifest[$path];
}

function noair_getLatAndLngIssep(){
    $position = get_post(246);

    return [
        'lat' => $position->lat,
        'lng' => $position->lng
    ];
}

function noair_calc_all_estimation_price_form(
    $ministations,
    $pollution,
    $distance,
    array $date,
    $rapport,
    $plateform,
) {
    return [
        'ministation_price' => noair_calc_estimation_price_form(
            $ministations,
            $pollution,
            $distance,
            $date,
            $rapport,
            $plateform,
            ['ministation_number' => true]
        ),
        'pollution_price' => noair_calc_estimation_price_form(
            $ministations,
            $pollution,
            $distance,
            $date,
            $rapport,
            $plateform,
            ['pollution' => true]
        ),
        'distance_price' => noair_calc_estimation_price_form(
            $ministations,
            $pollution,
            $distance,
            $date,
            $rapport,
            $plateform,
            ['distance' => true]
        ),
        'date_price' => noair_calc_estimation_price_form(
            $ministations,
            $pollution,
            $distance,
            $date,
            $rapport,
            $plateform,
            ['date' => true]
        ),
        'rapport_price' => noair_calc_estimation_price_form(
            $ministations,
            $pollution,
            $distance,
            $date,
            $rapport,
            $plateform,
            ['rapport' => true]
        ),
        'plateform_price' => noair_calc_estimation_price_form(
            $ministations,
            $pollution,
            $distance,
            $date,
            $rapport,
            $plateform,
            ['plateform' => true]
        ),
        'total_price' => noair_calc_estimation_price_form(
            $ministations,
            $pollution,
            $distance,
            $date,
            $rapport,
            $plateform
        ),
    ];
}

function noair_calc_estimation_price_form(
    $ministations,
    $pollution,
    $distance,
    array $date,
    $rapport,
    $plateforme,
    array $returns = [],
) {
    $total = 0;

    if ($ministations) {
        $ministationsPrice = 750 * (int) $ministations;
        $total += $ministationsPrice;

        if (isset($returns['ministation_number']) && $returns['ministation_number']) {
            return $ministationsPrice;
        }

        if ($pollution) {
            $pollutionPrice = (int) $ministations * count($pollution) * 100;
            $total += $pollutionPrice;

            if (isset($returns['pollution']) && $returns['pollution']) {
                return $pollutionPrice;
            }
        } else {
            if (isset($returns['pollution']) && $returns['pollution']) {
                return 0;
            }
        }
    } else {
        if (isset($returns['ministation_number']) && $returns['ministation_number']) {
            return 0;
        }
    }

    if ($distance) {
        $distancePrice = $distance * 1.6;
        $total += $distancePrice;

        if (isset($returns['distance']) && $returns['distance']) {
            return $distancePrice;
        }
    } else {
        if (isset($returns['distance']) && $returns['distance']) {
            return 0;
        }
    }

    if ($date) {
        $dateStart = new DateTimeImmutable($date['start']);
        $dateEnd = new DateTimeImmutable($date['end']);
        $interval = $dateStart->diff($dateEnd);

        $daysNumber = $interval->format('%a');
        $numberTimesInDaysNumber = (int) ((int)$daysNumber / 90);

        $datePrice = $numberTimesInDaysNumber * 500;
        $total += $datePrice;

        if (isset($returns['date']) && $returns['date']) {
            return $datePrice;
        }
    }

    if ($rapport) {
        $rapportPrice = 1000;
        $total += $rapportPrice;

        if (isset($returns['rapport']) && $returns['rapport']) {
            return $rapportPrice;
        }
    } else {
        if (isset($returns['rapport']) && $returns['rapport']) {
            return 0;
        }
    }

    if ($plateforme) {
        $plateformePrice = 1000;
        $total += $plateformePrice;

        if (isset($returns['plateform']) && $returns['plateform']) {
            return $plateformePrice;
        }
    } else {
        if (isset($returns['plateform']) && $returns['plateform']) {
            return 0;
        }
    }

    return $total;
}

