<?php


function coopleo_check_for_update( $transient ) {
    if ( empty( $transient->checked ) ) {
        return $transient;
    }

    // URL de votre endpoint de mise à jour
    $update_url = 'https://plugin-manager.atomikagency.fr/api/pull/0f99c4e7-15b6-4fe9-abf1-8742c8fce3de';

    // Récupère les données de mise à jour
    $response = wp_remote_get( $update_url );
    if ( is_wp_error( $response ) ) {
        return $transient;
    }

    $update_data = json_decode( wp_remote_retrieve_body( $response) );

    // Compare les versions
    $plugin_slug = plugin_basename( COOPLEO_PLUGIN_DIR.'/coopleo.php' );
    $current_version = get_plugin_data( COOPLEO_PLUGIN_DIR.'/coopleo.php' )['Version'];

    if ( version_compare( $current_version, $update_data->version, '<' ) ) {
        $transient->response[ $plugin_slug ] = (object) [
            'slug'        => $plugin_slug,
            'new_version' => $update_data->version,
            'package'     => $update_data->package,
            'url'         => 'https://atomikagency.fr/', // Page de détails du plugin
        ];
    }

    return $transient;
}
add_filter( 'site_transient_update_plugins', 'coopleo_check_for_update' );
