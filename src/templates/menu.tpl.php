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

    <img class="coopleo-logo" src="/wp-content/uploads/2024/02/LOGO-COOPLEO-V2-DEF.png" />
    
    <nav class="<?php echo esc_attr($container_class); ?>">
        <?php if (!empty($menu_items)) : ?>
            <ul class="<?php echo esc_attr($menu_class); ?>">
                <?php foreach ($menu_items as $item) : 
                    // Afficher seulement les éléments de premier niveau
                    if ($item->menu_item_parent != 0) continue;
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                        </a>
                        
                        <?php if ($has_problematique_dropdown && !empty($menu_problematique_items)) : ?>
                            <!-- Afficher le menu problématique comme dropdown -->
                            <ul class="sub-menu problematique-dropdown">
                                <div class="problematique-dropdown-wrapper">
                                    <div class="problematique-list">
                                        <?php
                                        $top_level_prob_items = array_filter($menu_problematique_items, function($item) {
                                            return $item->menu_item_parent == 0;
                                        });
                                        
                                        foreach ($top_level_prob_items as $prob_item) :
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
                                                    <span><?php echo $prob_item->title; ?></span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right problematic-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                                                </a>
                                                
                                                <?php if ($prob_has_children) : ?>
                                                    <?php echo coopleo_render_submenu($menu_problematique_items_by_parent, $prob_item->ID); ?>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </div>
                                    <ul class="sub-problematique-target"></ul>
                                </div>
                                <div class="problematique-dropdown-cta">
                                    <p class="cta-title">Prenez soin de votre couple</p>
                                    <a href="/trouver-therapeute-de-couple" class="find-pro">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>    
                                        Trouver un professionnel
                                    </a>
                                    <div>
                                        <p class="question-title">Vous avez des questions ?</p>
                                        <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-question-mark-icon lucide-circle-question-mark"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>FAQ Complète</p>
                                        <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>01 84 73 02 37</p>
                                        <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>bonjour@coopleo.care</p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="131.83" height="164.993" viewBox="0 0 131.83 164.993">
                                        <path id="Tracé_308" data-name="Tracé 308" d="M131.83,65.914A65.914,65.914,0,1,0,0,65.914s-1.948,99.079,95.457,99.079c0,0-21.46-10.646-27.794-33.21A65.9,65.9,0,0,0,131.83,65.914" fill="#fcf6ed"/>
                                    </svg>
                                </div>
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

    <div class="coopleo-actions">
        <a href="/trouver-therapeute-de-couple" class="find-pro">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>    
            <span>Trouver un professionnel</span>
        </a>
        <button class="connection">
            <i aria-hidden="true" class="material-icons md-person_outline"></i>
        </button>
    </div>
</div>
<dialog class="coopleo-login-modal">
    <div class="coopleo-login-modal-wrapper">
        <button class="close-modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <a href="/espace-personnel">Espace personnel</a>
        <a href="/accueil-amelia-pro">Espace pro</a>
    </div>
</dialog>