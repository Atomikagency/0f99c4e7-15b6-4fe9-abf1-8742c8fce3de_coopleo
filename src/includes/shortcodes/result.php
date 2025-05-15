<?php

function coopleo_search_result_shortcode($atts)
{
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

    $settings = get_option('coopleo_search_engine_options');

    if (!empty($settings['liste_metier_defilement'])) {
        $listWords = explode("\n",$settings['liste_metier_defilement']);
    } else {
        $listWords = [
            'une sexologue',
            'un coach de couple',
            'une psychologue de couple',
            'un médiateur familial',
            'une conseillere conjugale et familiale',
            'un sexothérapeute',
            'une médiatrice familiale',
            'un thérapeute de couple',
            'un conseiller conjugal et familial',
            'un sexologue',
            'une coach de couple',
            'un psychologue de couple',
            'une thérapeute de couple',
            'une sexothérapeute'
        ];
    }

    $type_de_therapeute = array_map(function ($term) {
        return $term->name;
    }, $type_de_metiers);

    if (!is_array($defaultFilters)) {
        $defaultFilters = [];
    }

    ob_start();

    $vars = array_merge($atts, [
        'type_de_therapeute' => $type_de_therapeute,
        'listWords' => $listWords,
        'labelListeMetier' => $settings['label_liste_metier'] ?? 'Prendre rendez-vous avec',
        'labelBtn' => $settings['label_btn'] ?? 'Prendre rendez-vous',
        'openNewTab' => !empty($settings['ouvrir_profil_nouvel_onglet']) ?? false,
        'fsf_only' => !empty($settings['display_only_fsf']) ?? false,
        'cta_1' => [
            'active' => !empty($settings['cta1_active']) ?? false,
            'label' => !empty($settings['cta1_label']) ? $settings['cta1_label'] :'',
            'image' => !empty($settings['cta1_image']) ? $settings['cta1_image'] :'',
            'link' => !empty($settings['cta1_link']) ? $settings['cta1_link'] :'',
        ],
        'cta_2' => [
            'active' => !empty($settings['cta2_active']) ?? false,
            'label' => !empty($settings['cta2_label']) ? $settings['cta2_label'] : '',
            'image' => !empty($settings['cta2_image']) ? $settings['cta2_image'] : '',
            'link' => !empty($settings['cta2_link']) ? $settings['cta2_link'] : '',
        ]
    ]);

    include COOPLEO_PLUGIN_DIR . 'templates/results.tpl.php';

    return ob_get_clean();
}

add_shortcode('coopleo_search_result', 'coopleo_search_result_shortcode');
