<?php

function coopleo_search_shortcode($atts) {

    $atts = shortcode_atts(array(
        'isredirect' => 'false',
        'hasadvancedfilters' => 'true',
        'whitelabelcolor' => 'false'
    ), $atts, 'coopleo_search');

    $isRedirect = filter_var($atts['isredirect'], FILTER_VALIDATE_BOOLEAN);
    $hasAdvancedFilters = filter_var($atts['hasadvancedfilters'], FILTER_VALIDATE_BOOLEAN);
    $whiteLabelColor = filter_var($atts['whitelabelcolor'], FILTER_VALIDATE_BOOLEAN);
    ob_start();
    $searchPageResultUrl = get_permalink(COOPLEO_SEARCH_PAGE_RESULT);

    $autocompleteSearch = [];

    $cache_key = 'autocomplete_search_data';
    $autocompleteSearch = get_transient($cache_key);

    if ($autocompleteSearch === false) {
        $autocompleteSearch = [];

        $therapeutes = get_posts([
            'post_type' => 'therapeute',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'fields' => 'titles',
        ]);

        $autocompleteSearch['therapeutes'] = array_map(function ($post) {
            return $post->post_title;
        }, $therapeutes);

        $type_de_metiers = get_terms([
            'taxonomy' => 'type-de-therapeute',
            'hide_empty' => false,
        ]);

        $autocompleteSearch['type_de_therapeute'] = array_map(function ($term) {
            return $term->name;
        }, $type_de_metiers);

        $problematique_terms = get_terms([
            'taxonomy' => 'cat_problematique',
            'hide_empty' => false,
        ]);

        $autocompleteSearch['cat_problematique'] = array_map(function ($term) {
            return $term->name;
        }, $problematique_terms);

        set_transient($cache_key, $autocompleteSearch, 3600);
    }


    $vars = [
        'isRedirect' => $isRedirect,
        'searchPageResultUrl' => $searchPageResultUrl,
        'api_endpoint' => COOPLEO_API_ENDPOINT,
        'autocompleteData' => $autocompleteSearch,
        'hasAdvancedFilters' => $hasAdvancedFilters,
        'whiteLabelColor' => $whiteLabelColor
    ];


    include COOPLEO_PLUGIN_DIR . 'templates/search.tpl.php';
    return ob_get_clean();
}

add_shortcode('coopleo_search', 'coopleo_search_shortcode');
