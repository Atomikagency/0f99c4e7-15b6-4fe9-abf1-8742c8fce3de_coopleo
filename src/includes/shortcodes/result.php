<?php

function coopleo_search_result_shortcode($atts) {
    $atts = shortcode_atts(array(
        'defaultFilters' => '{}',
        'limit' => 12,
        'hasPagination' => 'true',
    ), $atts, 'coopleo_search_result');

    $limit = intval($atts['limit']);
    $hasPagination = filter_var($atts['hasPagination'], FILTER_VALIDATE_BOOLEAN);
    $defaultFilters = json_decode(stripslashes($atts['defaultFilters']), true);

    if (!is_array($defaultFilters)) {
        $defaultFilters = [];
    }

    ob_start();

    $vars = $atts;
    include COOPLEO_PLUGIN_DIR . 'templates/results.tpl.php';

    return ob_get_clean();
}

add_shortcode('coopleo_search_result', 'coopleo_search_result_shortcode');
