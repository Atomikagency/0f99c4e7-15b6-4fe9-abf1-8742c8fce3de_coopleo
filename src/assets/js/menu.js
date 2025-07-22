/**
 * Coopleo Menu JavaScript
 * Gère les interactions du menu (mobile toggle, sous-menus, etc.)
 */

class CoopleoMenu {
    constructor() {
        this.init();
    }

    init() {
        this.setupMobileToggle();
        this.setupSubMenus();
        this.setupAccessibility();
    }

    setupMobileToggle() {
        const toggleButton = document.querySelector('.coopleo-menu-toggle');
        const menuContainer = document.querySelector('.coopleo-menu-container');

        if (!toggleButton || !menuContainer) return;

        toggleButton.addEventListener('click', () => {
            const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
            toggleButton.setAttribute('aria-expanded', !isExpanded);
            menuContainer.classList.toggle('is-active');
            toggleButton.classList.toggle('is-active');
        });

        // Fermer le menu en cliquant en dehors
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.coopleo-menu-wrapper')) {
                menuContainer.classList.remove('is-active');
                toggleButton.classList.remove('is-active');
                toggleButton.setAttribute('aria-expanded', 'false');
            }
        });
    }

    setupSubMenus() {
        const menuItems = document.querySelectorAll('.coopleo-menu .menu-item-has-children > a');

        menuItems.forEach(item => {
            // Ajouter un bouton toggle pour les sous-menus
            const toggleBtn = document.createElement('button');
            toggleBtn.className = 'coopleo-submenu-toggle';
            toggleBtn.setAttribute('aria-label', 'Toggle submenu');
            toggleBtn.innerHTML = '<span class="coopleo-submenu-icon"></span>';
            
            item.parentNode.insertBefore(toggleBtn, item.nextSibling);

            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const submenu = item.nextElementSibling.nextElementSibling;
                const isOpen = submenu.classList.contains('is-open');
                
                // Fermer tous les autres sous-menus
                document.querySelectorAll('.coopleo-menu .sub-menu.is-open').forEach(openSubmenu => {
                    if (openSubmenu !== submenu) {
                        openSubmenu.classList.remove('is-open');
                        openSubmenu.previousElementSibling.classList.remove('is-active');
                    }
                });

                submenu.classList.toggle('is-open');
                toggleBtn.classList.toggle('is-active');
            });
        });
    }

    setupAccessibility() {
        const menuLinks = document.querySelectorAll('.coopleo-menu a');

        // Navigation au clavier
        menuLinks.forEach(link => {
            link.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    const submenuToggle = link.nextElementSibling;
                    if (submenuToggle && submenuToggle.classList.contains('coopleo-submenu-toggle')) {
                        e.preventDefault();
                        submenuToggle.click();
                    }
                }
            });
        });

        // Escape pour fermer le menu mobile
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const menuContainer = document.querySelector('.coopleo-menu-container.is-active');
                const toggleButton = document.querySelector('.coopleo-menu-toggle.is-active');
                
                if (menuContainer && toggleButton) {
                    menuContainer.classList.remove('is-active');
                    toggleButton.classList.remove('is-active');
                    toggleButton.setAttribute('aria-expanded', 'false');
                }
            }
        });
    }
}

// Initialiser le menu quand le DOM est prêt
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        new CoopleoMenu();
    });
} else {
    new CoopleoMenu();
}

export default CoopleoMenu;