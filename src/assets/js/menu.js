/**
 * Coopleo Menu JavaScript
 * Gère les interactions du menu (mobile toggle, sous-menus, etc.)
 */

class CoopleoMenu {
    constructor() {
        this.init();
    }

    init() {
        this.initProblematicSubmenuHover();
        this.toggleMobileMenu();
        this.openLoginModal();
    }

    initProblematicSubmenuHover() {
        const target = document.querySelector(".coopleo-menu-wrapper .sub-problematique-target");
        const submenuItem = document.querySelectorAll(".coopleo-menu-wrapper .problematique-menu-item");

        submenuItem.forEach((item) => {
            item.addEventListener("mouseover", () => {
                const content = item.querySelector(".sub-menu").innerHTML;
                target.innerHTML = content;
            });
        });
        const defaultContent = submenuItem[0].querySelector(".sub-menu").innerHTML;
        target.innerHTML = defaultContent;
    }

    toggleMobileMenu() {
        const toggleButton = document.querySelector(".coopleo-menu-toggle");
        const menu = document.querySelector(".coopleo-menu-container");
        const menuDropdown = document.querySelectorAll(".coopleo-menu-container .coopleo-menu li>a");

        toggleButton.addEventListener("click", () => {
            if (menu.classList.contains("active")) {
                this.closeAllChildren(menu);
            }
            menu.classList.toggle("active");
        });

        menuDropdown.forEach((item) => {
            item.addEventListener("click", () => {
                // Fermer tous les dropdowns frères (même niveau) qui ne sont pas des parents de l'élément cliqué
                const currentParent = item.closest("li");
                const siblings = Array.from(currentParent.parentElement.children);

                siblings.forEach((sibling) => {
                    if (sibling !== currentParent) {
                        const siblingLink = sibling.querySelector(":scope > a");
                        if (siblingLink) {
                            siblingLink.classList.remove("active");
                            // Fermer récursivement tous les enfants du frère
                            this.closeAllChildren(sibling);
                        }
                    }
                });

                // Toggle l'état de l'élément cliqué
                item.classList.toggle("active");
            });
        });
    }

    closeAllChildren(element) {
        const childLinks = element.querySelectorAll("a");
        childLinks.forEach((link) => {
            link.classList.remove("active");
        });
    }

    openLoginModal() {
        const trigger = document.querySelector(".coopleo-menu-wrapper .connection");
        const loginModal = document.querySelector(".coopleo-login-modal");
        const closeIcon = document.querySelector(".coopleo-login-modal .close-modal");

        trigger.addEventListener("click", () => {
            loginModal.showModal();
        });
        closeIcon.addEventListener("click", () => {
            loginModal.close();
        });

        loginModal.addEventListener("click", (e) => {
            const dialogDimensions = loginModal.getBoundingClientRect();
            if (
                e.clientX < dialogDimensions.left ||
                e.clientX > dialogDimensions.right ||
                e.clientY < dialogDimensions.top ||
                e.clientY > dialogDimensions.bottom
            ) {
                loginModal.close();
            }
        });
    }
}

// Initialiser le menu quand le DOM est prêt
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
        new CoopleoMenu();
    });
} else {
    new CoopleoMenu();
}

export default CoopleoMenu;
