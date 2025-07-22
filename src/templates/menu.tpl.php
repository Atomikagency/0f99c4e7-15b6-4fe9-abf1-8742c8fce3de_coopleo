<?php
/**
  Le système de menu utilise une architecture en 3 couches :

  1. Template PHP (menu.tpl.php:1-124)

  - Structure HTML hiérarchique avec support multi-niveaux
  - Gère 2 types de menus : normal et "problématique"
  - Classes CSS dynamiques : menu-item-has-children, menu-item-problematique-dropdown
  - Fonction récursive coopleo_render_submenu() pour les sous-menus (menu.tpl.php:17-52)

  2. JavaScript (menu.js:1-112)

  Classe CoopleoMenu avec 3 modules :
  - Mobile toggle : bouton hamburger avec états aria et gestion clicks extérieurs
  - Sous-menus : ajout dynamique boutons toggle, fermeture exclusive autres menus
  - Accessibilité : navigation clavier (Enter/Space), échappement ESC

  3. CSS (menu.css:1-243)

  - Desktop : dropdowns positionnés absolument avec transitions opacity/transform
  - Mobile : menu collapsible avec max-height, sous-menus en accordéon
  - États : .is-open, .is-active pour animations fluides

  Points clés dev :

  - Logique spéciale : classe open_sub_menu_problematique déclenche affichage menu alternatif
  - Performance : fermeture exclusive des autres dropdowns ouverts
  - Responsive : transformation flex→column + overlay mobile
  - Sécurité : échappement esc_attr(), esc_url(), esc_html()
 * Template pour l'affichage du menu
 * 
 * @var array $menu_items
 * @var array $menu_items_by_parent
 * @var array $menu_problematique_items
 * @var array $menu_problematique_items_by_parent
 * @var bool $mobile_toggle
 * @var string $container_class
 * @var string $menu_class
 */

/**
 * Fonction helper pour afficher les sous-menus récursivement
 */
function coopleo_render_submenu($items_by_parent, $parent_id, $depth = 1) {
    if (!isset($items_by_parent[$parent_id])) {
        return '';
    }
    
    $sub_menu_class = $depth > 1 ? 'sub-menu level-' . $depth : 'sub-menu';
    $output = '<ul class="' . $sub_menu_class . '">';
    
    foreach ($items_by_parent[$parent_id] as $item) {
        $has_children = isset($items_by_parent[$item->ID]);
        $item_class = 'menu-item menu-item-' . $item->ID;
        
        if ($has_children) {
            $item_class .= ' menu-item-has-children';
        }
        
        if (!empty($item->classes)) {
            $item_class .= ' ' . implode(' ', $item->classes);
        }
        
        $output .= '<li class="' . esc_attr($item_class) . '">';
        $output .= '<a href="' . esc_url($item->url) . '" class="menu-link">';
        $output .= esc_html($item->title);
        $output .= '</a>';
        
        // Afficher les sous-menus récursivement
        if ($has_children) {
            $output .= coopleo_render_submenu($items_by_parent, $item->ID, $depth + 1);
        }
        
        $output .= '</li>';
    }
    
    $output .= '</ul>';
    return $output;
}
?>

<div class="coopleo-menu-wrapper">
    <?php if ($mobile_toggle) : ?>
        <button class="coopleo-menu-toggle" aria-label="Toggle menu" aria-expanded="false">
            <span class="coopleo-menu-toggle-bar"></span>
            <span class="coopleo-menu-toggle-bar"></span>
            <span class="coopleo-menu-toggle-bar"></span>
        </button>
    <?php endif; ?>
    
    <nav class="<?php echo esc_attr($container_class); ?>">
        <?php if (!empty($menu_items)) : ?>
            <ul class="<?php echo esc_attr($menu_class); ?>">
                <?php foreach ($menu_items as $item) : 
                    $has_children = isset($menu_items_by_parent[$item->ID]);
                    $item_class = 'menu-item menu-item-' . $item->ID;
                    
                    // Vérifier si cet élément a la classe pour ouvrir le menu problématique
                    $has_problematique_dropdown = false;
                    if (!empty($item->classes) && in_array('open_sub_menu_problematique', $item->classes)) {
                        $has_problematique_dropdown = true;
                        $item_class .= ' menu-item-has-children menu-item-problematique-dropdown';
                    } elseif ($has_children) {
                        $item_class .= ' menu-item-has-children';
                    }
                    
                    if (!empty($item->classes)) {
                        $item_class .= ' ' . implode(' ', $item->classes);
                    }
                ?>
                    <li class="<?php echo esc_attr($item_class); ?>">
                        <a href="<?php echo esc_url($item->url); ?>" class="menu-link">
                            <?php echo esc_html($item->title); ?>
                        </a>
                        
                        <?php if ($has_problematique_dropdown && !empty($menu_problematique_items)) : ?>
                            <!-- Afficher le menu problématique comme dropdown -->
                            <ul class="sub-menu problematique-dropdown">
                                <?php foreach ($menu_problematique_items as $prob_item) : 
                                    $prob_has_children = isset($menu_problematique_items_by_parent[$prob_item->ID]);
                                    $prob_item_class = 'menu-item menu-item-' . $prob_item->ID . ' problematique-menu-item';
                                    
                                    if ($prob_has_children) {
                                        $prob_item_class .= ' menu-item-has-children';
                                    }
                                    
                                    if (!empty($prob_item->classes)) {
                                        $prob_item_class .= ' ' . implode(' ', $prob_item->classes);
                                    }
                                ?>
                                    <li class="<?php echo esc_attr($prob_item_class); ?>">
                                        <a href="<?php echo esc_url($prob_item->url); ?>" class="menu-link">
                                            <?php echo esc_html($prob_item->title); ?>
                                        </a>
                                        
                                        <?php if ($prob_has_children) : ?>
                                            <?php echo coopleo_render_submenu($menu_problematique_items_by_parent, $prob_item->ID); ?>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php elseif ($has_children) : ?>
                            <!-- Afficher les sous-menus normaux -->
                            <?php echo coopleo_render_submenu($menu_items_by_parent, $item->ID); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </nav>
</div>