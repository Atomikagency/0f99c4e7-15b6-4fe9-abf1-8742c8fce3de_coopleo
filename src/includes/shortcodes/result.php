<?php

function coopleo_search_result_shortcode($atts) {
    $atts = shortcode_atts(array(
        'defaultFilters' => '{}',
        'limit' => 10,
        'hasPagination' => 'true',
    ), $atts, 'coopleo_search_result');

    $limit = intval($atts['limit']);
    $hasPagination = filter_var($atts['hasPagination'], FILTER_VALIDATE_BOOLEAN);
    $defaultFilters = json_decode(stripslashes($atts['defaultFilters']), true);

    $type_de_metiers = get_terms([
        'taxonomy' => 'type-de-therapeute',
        'hide_empty' => false,
    ]);

    $type_de_therapeute = array_map(function ($term) {
        return $term->name;
    }, $type_de_metiers);

    if (!is_array($defaultFilters)) {
        $defaultFilters = [];
    }

    ob_start();

    $vars = array_merge($atts, [
        'type_de_therapeute' => $type_de_therapeute,
    ]);
    include COOPLEO_PLUGIN_DIR . 'templates/results.tpl.php';

    return ob_get_clean();
}

add_shortcode('coopleo_search_result', 'coopleo_search_result_shortcode');
