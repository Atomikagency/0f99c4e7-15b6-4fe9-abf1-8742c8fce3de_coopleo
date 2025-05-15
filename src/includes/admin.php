<?php
function coopleo_search_engine_register_settings() {
    register_setting('coopleo_search_engine_options', 'coopleo_search_engine_options');

    add_settings_section(
        'coopleo_main_section',
        'Paramètres du moteur de recherche Coopleo',
        null,
        'coopleo-search-engine'
    );

    add_settings_field(
        'liste_metier_defilement',
        'Liste métier défilement',
        'coopleo_textarea_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'liste_metier_defilement', 'help' => 'Un métier par ligne']
    );

    add_settings_field(
        'label_liste_metier',
        'Label liste métier',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'label_liste_metier', 'default' => 'Prendre rendez-vous avec']
    );

    add_settings_field(
        'liste_types_therapeutes',
        'Liste des types de thérapeutes',
        'coopleo_textarea_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'liste_types_therapeutes', 'help' => 'Laisser vide pour utiliser la taxonomy : type-de-therapeute']
    );

    add_settings_field(
        'liste_therapeutes',
        'Liste des thérapeutes',
        'coopleo_textarea_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'liste_therapeutes', 'help' => 'Laisser vide pour utiliser la taxonomy : therapeutes']
    );

    add_settings_field(
        'label_btn',
        'Label bouton',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'label_btn', 'default' => 'Prendre un rendez-vous']
    );

    add_settings_field(
        'ouvrir_profil_nouvel_onglet',
        'Ouvrir le profil dans un nouvel onglet',
        'coopleo_checkbox_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'ouvrir_profil_nouvel_onglet']
    );

    add_settings_field(
        'search_page_result_id',
        'ID de la page de résultats',
        'coopleo_number_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'search_page_result_id']
    );

    add_settings_field(
        'display_only_fsf',
        'Afficher uniquement les FSF',
        'coopleo_checkbox_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'display_only_fsf']
    );

    add_settings_field(
        'cta1_active',
        'Activer le 1er CTA',
        'coopleo_checkbox_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta1_active']
    );

    add_settings_field(
        'cta1_label',
        'Label 1er CTA',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta1_label', 'default' => '']
    );

    add_settings_field(
        'cta1_image',
        'Image 1er CTA',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta1_image']
    );

    add_settings_field(
        'cta1_link',
        'Lien 1er CTA',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta1_link', 'default' => '']
    );

    add_settings_field(
        'cta2_active',
        'Activer le 2ème CTA',
        'coopleo_checkbox_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta2_active']
    );

    add_settings_field(
        'cta2_label',
        'Label 2ème CTA',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta2_label', 'default' => '']
    );

    add_settings_field(
        'cta2_image',
        'Image 2ème CTA',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta2_image']
    );

    add_settings_field(
        'cta2_link',
        'Lien 2ème CTA',
        'coopleo_text_callback',
        'coopleo-search-engine',
        'coopleo_main_section',
        ['id' => 'cta2_link', 'default' => '']
    );

}
add_action('admin_init', 'coopleo_search_engine_register_settings');

function coopleo_search_engine_menu() {
    add_menu_page(
        'Coopleo Search Engine',
        'Coopleo Search',
        'manage_options',
        'coopleo-search-engine',
        'coopleo_search_engine_settings_page',
        'dashicons-search',
        81
    );
}
add_action('admin_menu', 'coopleo_search_engine_menu');

function coopleo_search_engine_settings_page() {
    ?>
    <div class="wrap">
        <h1>Paramètres - Coopleo Search Engine</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('coopleo_search_engine_options');
            do_settings_sections('coopleo-search-engine');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function coopleo_text_callback($args) {
    $options = get_option('coopleo_search_engine_options');
    $value = $options[$args['id']] ?? $args['default'] ?? '';
    echo "<input type='text' name='coopleo_search_engine_options[{$args['id']}]' value='" . esc_attr($value) . "' class='regular-text' />";
}

function coopleo_textarea_callback($args) {
    $options = get_option('coopleo_search_engine_options');
    $value = $options[$args['id']] ?? '';
    echo "<textarea name='coopleo_search_engine_options[{$args['id']}]' rows='5' class='large-text'>" . esc_textarea($value) . "</textarea>";
    if (!empty($args['help'])) {
        echo "<p class='description'>{$args['help']}</p>";
    }
}

function coopleo_checkbox_callback($args) {
    $options = get_option('coopleo_search_engine_options');
    $checked = !empty($options[$args['id']]) ? 'checked' : '';
    echo "<input type='checkbox' name='coopleo_search_engine_options[{$args['id']}]' value='1' $checked />";
}

function coopleo_number_callback($args) {
    $options = get_option('coopleo_search_engine_options');
    $value = $options[$args['id']] ?? '';
    echo "<input type='number' name='coopleo_search_engine_options[{$args['id']}]' value='" . esc_attr($value) . "' />";
}
