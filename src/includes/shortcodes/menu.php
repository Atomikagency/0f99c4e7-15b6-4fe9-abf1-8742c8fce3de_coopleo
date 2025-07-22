<?php

function coopleo_menu_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'menu_name' => 'main_menu',
        'container_class' => 'coopleo-menu-container',
        'menu_class' => 'coopleo-menu',
        'mobile_toggle' => 'true'
    ), $atts, 'coopleo_menu');

    $menu_name = sanitize_text_field($atts['menu_name']);
    $container_class = sanitize_html_class($atts['container_class']);
    $menu_class = sanitize_html_class($atts['menu_class']);
    $mobile_toggle = filter_var($atts['mobile_toggle'], FILTER_VALIDATE_BOOLEAN);

    ob_start();

    // Récupérer l'objet menu
    $menu_obj = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_obj) {
        return '<p class="coopleo-menu-error">' . __('Menu non trouvé. Veuillez créer un menu nommé "' . esc_html($menu_name) . '" dans l\'administration WordPress.', 'coopleo') . '</p>';
    }

    // Récupérer les éléments du menu principal
    $menu_items = wp_get_nav_menu_items($menu_obj->term_id);
    
    if (!$menu_items) {
        return '<p class="coopleo-menu-error">' . __('Le menu "' . esc_html($menu_name) . '" est vide.', 'coopleo') . '</p>';
    }

    // Organiser les éléments du menu par parent
    $menu_items_by_parent = array();
    foreach ($menu_items as $item) {
        $parent_id = $item->menu_item_parent;
        if (!isset($menu_items_by_parent[$parent_id])) {
            $menu_items_by_parent[$parent_id] = array();
        }
        $menu_items_by_parent[$parent_id][] = $item;
    }

    // Récupérer le menu problématique (toujours disponible)
    $menu_problematique_items = array();
    $menu_problematique_items_by_parent = array();
    
    $menu_problematique_obj = wp_get_nav_menu_object('menu_problematique');
    
    if ($menu_problematique_obj) {
        $menu_problematique_items = wp_get_nav_menu_items($menu_problematique_obj->term_id);
        
        if ($menu_problematique_items) {
            // Organiser les éléments du menu problématique par parent
            foreach ($menu_problematique_items as $item) {
                $parent_id = $item->menu_item_parent;
                if (!isset($menu_problematique_items_by_parent[$parent_id])) {
                    $menu_problematique_items_by_parent[$parent_id] = array();
                }
                $menu_problematique_items_by_parent[$parent_id][] = $item;
            }
        }
    }

    $vars = [
        'menu_items' => isset($menu_items_by_parent[0]) ? $menu_items_by_parent[0] : array(),
        'menu_items_by_parent' => $menu_items_by_parent,
        'menu_problematique_items' => isset($menu_problematique_items_by_parent[0]) ? $menu_problematique_items_by_parent[0] : array(),
        'menu_problematique_items_by_parent' => $menu_problematique_items_by_parent,
        'mobile_toggle' => $mobile_toggle,
        'container_class' => $container_class,
        'menu_class' => $menu_class
    ];

    require COOPLEO_PLUGIN_DIR . 'templates/menu.tpl.php';
    
    return ob_get_clean();
}

add_shortcode('coopleo_menu', 'coopleo_menu_shortcode');