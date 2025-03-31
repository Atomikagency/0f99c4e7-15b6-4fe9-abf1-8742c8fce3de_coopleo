<?php


function register_meta_for_rest() {
    register_rest_field('therapeute', 'meta_data', [
        'get_callback' => function ($object) {
            return get_post_meta($object['id']);
        },
        'update_callback' => null,
        'schema' => null,
    ]);
}
add_action('rest_api_init', 'register_meta_for_rest');

function add_meta_query_to_rest( $args, $request ) {
    if ( isset( $request['meta_key'] ) && isset( $request['meta_value'] ) ) {
        $args['meta_query'] = [
            [
                'key'   => $request['meta_key'],
                'value' => $request['meta_value'],
                'compare' => 'LIKE'
            ]
        ];
    }
    return $args;
}
add_filter('rest_therapeute_query', 'add_meta_query_to_rest', 10, 2);


function register_toolset_meta_to_rest() {
    $meta_fields = [
        'a_propos' => 'wpcf-a-propos',
        'code_postal_ville' => 'wpcf-code-postal-ville',
        'metier_therapeute' => 'wpcf-metier-therapeute',
        'nom_adresse' => 'wpcf-nom-adresse',
        'photo' => 'wpcf-photo',
        'prix_therapie_couple' => 'wpcf-prix-therapie-de-couple',
        'tarif' => 'wpcf-tarif',
        'tarif_2' => 'wpcf-tarif-2',
        'telephone' => 'wpcf-telephone',
        'therapeute_info_acces' => 'wpcf-therapeute-informations-d-acces',
        'lieu_affichage' => 'wpcf-therapeute-lieu-1-affichage-moteur-de-recherche',
        'tarif_max' => 'wpcf-therapeute-tarif-max',
        'tarif_min' => 'wpcf-therapeute-tarif-min',
        'langue_parlee' => 'wpcf-therapeutes-langue-parlee',
        'specialite_principale' => 'wpcf-therapeutes-specialite-principale-pour-affichage',
        'score' => 'wpcf-score'
    ];

    foreach ($meta_fields as $rest_field => $meta_key) {
        register_rest_field(
            'therapeute', // Remplace par ton CPT
            $rest_field,
            [
                'get_callback'    => function($object) use ($meta_key) {
                    return get_post_meta($object['id'], $meta_key, true);
                },
                'update_callback' => null,
                'schema'          => [
                    'description' => "Donnée Toolset : $meta_key",
                    'type'        => 'string'
                ],
            ]
        );
    }
}
add_action('rest_api_init', 'register_toolset_meta_to_rest');

function register_custom_taxonomies_to_rest() {
    $taxonomies = [
        'cat_problematique',
        'type-de-consultation',
        'statut',
        'specialite',
        'type-de-therapeute'
    ];

    foreach ($taxonomies as $taxonomy) {
        register_taxonomy($taxonomy, 'therapeute', [
            'show_in_rest' => true,
            'rest_base'    => $taxonomy
        ]);
    }
}
add_action('init', 'register_custom_taxonomies_to_rest');

function add_taxonomy_names_to_rest($response, $post, $request) {
    $taxonomy_names = [
        'cat_problematique',
        'type-de-consultation',
        'statut',
        'specialite',
        'type-de-therapeute'
    ];

    foreach ($taxonomy_names as $taxonomy) {
        $terms = get_the_terms($post->ID, $taxonomy);

        if (!empty($terms) && !is_wp_error($terms)) {
            $term_names = wp_list_pluck($terms, 'name'); // Récupère uniquement les noms
            $response->data[$taxonomy] = $term_names;
        }
    }

    return $response;
}

add_filter('rest_prepare_therapeute', 'add_taxonomy_names_to_rest', 10, 3);
