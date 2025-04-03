<form id="coopleo-search">
    <div class="coopleo-search-mobile-toggles" style="display: none;">
        <button type="button" id="mobile-toogle-basic-modal">
            <p>Votre recherche</p>
            <div class="coopleo-button coopleo-button-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
        </button>
        <button type="button" class="coopleo-button coopleo-button-secondary coopleo-button-icon" id="advenced-filters-toggle-mobile">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_563" data-name="Groupe 563" width="15.535" height="12.428" viewBox="0 0 15.535 12.428">
                <defs>
                    <clipPath id="clip-path">
                    <rect id="Rectangle_845" data-name="Rectangle 845" width="15.535" height="12.428" fill="#3f3f46"/>
                    </clipPath>
                </defs>
                <g id="Groupe_563-2" data-name="Groupe 563" clip-path="url(#clip-path)">
                    <path id="Tracé_281" data-name="Tracé 281" d="M12.428,6.214A3.107,3.107,0,1,0,9.419,2.33H.777a.777.777,0,0,0,0,1.554H9.419a3.108,3.108,0,0,0,3.009,2.33M10.875,3.107a1.554,1.554,0,1,0,1.553-1.553,1.553,1.553,0,0,0-1.553,1.553M0,9.321a3.107,3.107,0,0,1,6.116-.777h8.642a.777.777,0,1,1,0,1.553H6.116A3.107,3.107,0,0,1,0,9.321Zm4.661,0a1.554,1.554,0,1,0-1.554,1.554A1.554,1.554,0,0,0,4.661,9.321" fill="#3f3f46" fill-rule="evenodd"/>
                </g>
            </svg>
        </button>
    </div>

    <div id="coopleo-basic-filters-modal" style="display: none;">
        <div id="basic-filters-modal-backdrop" class="coopleo-basic-filters-modal-backdrop"></div>
        <div class="coopleo-basic-filters-modal-container">
            <div class="coopleo-basic-filters-modal-header" style="display: none;">
                <h3>Votre recherche</h3>
            </div>
            <div class="coopleo-basic-filters-modal-main">
                <div class="coopleo-rdv-type-container">
                    <p class="ci-label" style="margin-bottom: .4rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11">
                            <g id="Groupe_638" data-name="Groupe 638" opacity="0.301">
                                <g id="Groupe_640" data-name="Groupe 640">
                                <path id="Tracé_296" data-name="Tracé 296" d="M11,3.143V1.964A1.179,1.179,0,0,0,9.821.786H8.25V.393a.393.393,0,0,0-.786,0V.786H3.536V.393a.393.393,0,1,0-.786,0V.786H1.179A1.179,1.179,0,0,0,0,1.964V3.143Z" fill="#3f3f46"/>
                                <path id="Tracé_297" data-name="Tracé 297" d="M0,160v5.893a1.179,1.179,0,0,0,1.179,1.179H9.821A1.179,1.179,0,0,0,11,165.893V160Zm7.72,2.262L4.97,164.62a.393.393,0,0,1-.533-.021L3.258,163.42a.393.393,0,0,1,.555-.555l.922.922,2.475-2.121a.393.393,0,0,1,.526.584l-.015.013Z" transform="translate(0 -156.071)" fill="#3f3f46"/>
                                </g>
                            </g>
                        </svg>
                        <span>Votre rendez-vous</span>
                    </p>
                    <div class="coopleo-rdv-type-choices">
                        <label>
                            <input type="radio" name="type" value="cabinet">
                            <span class="svg-container">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_634" data-name="Groupe 634" width="16.853" height="16.845" viewBox="0 0 16.853 16.845">
                                    <defs>
                                        <clipPath id="clip-path">
                                        <rect id="Rectangle_968" data-name="Rectangle 968" width="16.853" height="16.845" transform="translate(0 0)" fill="#c92c61"/>
                                        </clipPath>
                                    </defs>
                                    <g id="Groupe_633" data-name="Groupe 633" transform="translate(0 0)" clip-path="url(#clip-path)">
                                        <path id="Tracé_295" data-name="Tracé 295" d="M15.32,9.043V11.49a5.364,5.364,0,0,1-10.728,0v-.833A5.364,5.364,0,0,1,0,5.355V.763A.757.757,0,0,1,.763,0H3.068A.757.757,0,0,1,3.83.763a.757.757,0,0,1-.763.762H1.543v3.83a3.83,3.83,0,0,0,7.66,0V1.525H7.678A.757.757,0,0,1,6.915.763.757.757,0,0,1,7.678,0H9.983a.765.765,0,0,1,.745.763V5.355a5.377,5.377,0,0,1-4.592,5.3v.833a3.83,3.83,0,1,0,7.66,0V9.043a2.294,2.294,0,1,1,2.926-1.4,2.33,2.33,0,0,1-1.4,1.4" transform="translate(0 0)" fill="#c92c61"/>
                                    </g>
                                </svg>
                            </span>
                            <span>En cabinet</span>
                        </label>
                        <label>
                            <input type="radio" name="type" value="visio">
                            <span class="svg-container">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_628" data-name="Groupe 628" width="16.779" height="16.777" viewBox="0 0 16.779 16.777">
                                    <defs>
                                        <clipPath id="clip-path">
                                        <rect id="Rectangle_963" data-name="Rectangle 963" width="16.779" height="16.777" transform="translate(0 0)" fill="#c92c61"/>
                                        </clipPath>
                                    </defs>
                                    <g id="Groupe_627" data-name="Groupe 627" transform="translate(0 0)" clip-path="url(#clip-path)">
                                        <path id="Tracé_291" data-name="Tracé 291" d="M16.41,26.1a.84.84,0,0,0-.782-.084l-3.083,1.233a2.517,2.517,0,0,0-2.478-2.133H2.517A2.517,2.517,0,0,0,0,27.629V33.5a2.517,2.517,0,0,0,2.517,2.517h7.55a2.517,2.517,0,0,0,2.478-2.132l3.083,1.233a.839.839,0,0,0,1.15-.779V26.79A.839.839,0,0,0,16.41,26.1ZM10.067,34.34H2.517a.839.839,0,0,1-.839-.839V27.629a.839.839,0,0,1,.839-.839h7.55a.839.839,0,0,1,.839.839V33.5a.839.839,0,0,1-.839.839M15.1,33.1l-2.517-1.007V29.036L15.1,28.029V33.1Z" transform="translate(0 -19.241)" fill="#c92c61"/>
                                        <path id="Tracé_292" data-name="Tracé 292" d="M10.492,2.8a3.955,3.955,0,0,1,5.537,0,.839.839,0,0,0,1.174-1.2,5.638,5.638,0,0,0-7.886,0,.839.839,0,0,0,1.174,1.2Z" transform="translate(-6.969 0)" fill="#c92c61"/>
                                        <path id="Tracé_293" data-name="Tracé 293" d="M17.741,12.8a.839.839,0,1,0,1.117,1.252c.02-.018.04-.037.058-.057a1.076,1.076,0,0,1,1.51,0,.839.839,0,1,0,1.232-1.138c-.018-.02-.038-.039-.058-.057A2.76,2.76,0,0,0,17.741,12.8Z" transform="translate(-13.379 -9.203)" fill="#c92c61"/>
                                    </g>
                                </svg>
                            </span>
                            <span>En visio</span>
                        </label>
                    </div>
                </div>
                <div class="coopleo-rdv-filters-container">
                    <label style="position: relative;" id="coopleo-search-container">
                        <span class="ci-label">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="11.605" height="11.605" viewBox="0 0 11.605 11.605">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="Rectangle_844" data-name="Rectangle 844" width="11.605" height="11.605" fill="none"/>
                                    </clipPath>
                                </defs>
                                <g id="Groupe_561" data-name="Groupe 561" opacity="0.304">
                                    <g id="Groupe_562" data-name="Groupe 562" clip-path="url(#clip-path)">
                                    <path id="Tracé_279" data-name="Tracé 279" d="M130.321,4.642A2.321,2.321,0,1,0,128,2.321a2.321,2.321,0,0,0,2.321,2.321" transform="translate(-124.518)"/>
                                    <path id="Tracé_280" data-name="Tracé 280" d="M6.963,192a4.691,4.691,0,0,1,.58.036v1.734a1.451,1.451,0,0,0-1.16,1.422v2.031h1.16v-.58h-.58V195.19a.87.87,0,1,1,1.741,0v1.451h-.58v.58h1.16V195.19a1.451,1.451,0,0,0-1.16-1.422v-1.624a4.644,4.644,0,0,1,3.482,4.5v.677a1.064,1.064,0,0,1-1.064,1.064H1.064A1.064,1.064,0,0,1,0,197.318v-.677a4.644,4.644,0,0,1,2.9-4.3v2.033a.87.87,0,1,0,.58,0v-2.224A4.652,4.652,0,0,1,4.642,192l1.16.87Z" transform="translate(0 -186.777)"/>
                                    </g>
                                </g>
                            </svg>
                            <span>Votre problématique</span>
                        </span>
                        <div class="input-container">
                            <input type="text" name="search" id="coopleo-search-input" placeholder="Professionnel recherché" />
                        </div>
                        <div id="coopleo-search-results"></div>
                    </label>
                    <span class="coopleo-rdv-filters-divider"></span>
                    <label style="position: relative;" id="coopleo-address-container">
                        <span class="ci-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.154" height="12.02" viewBox="0 0 9.154 12.02">
                            <g id="Groupe_559" data-name="Groupe 559" transform="translate(-0.423 12.01)" opacity="0.302">
                                <g id="Groupe_560" data-name="Groupe 560">
                                <path id="Tracé_265" data-name="Tracé 265" d="M8.614,2.8a4.577,4.577,0,0,1,4.577,4.577c0,2.528-4.577,7.444-4.577,7.444S4.037,9.9,4.037,7.373A4.577,4.577,0,0,1,8.614,2.8m0,2.758A1.736,1.736,0,1,1,6.879,7.291,1.736,1.736,0,0,1,8.614,5.555" transform="translate(-3.614 -14.807)" fill="#3f3f46" fill-rule="evenodd"/>
                                </g>
                            </g>
                        </svg>
                            <span>Localisation</span>
                        </span>
                        <div class="input-container">
                            <button type="button" id="coopleo-localize-button-mobile" class="coopleo-button coopleo-button-secondary coopleo-button-icon" style="display: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_487" data-name="Groupe 487" width="20" height="20" viewBox="0 0 20 20">
                                    <defs>
                                        <clipPath id="clip-path">
                                        <rect id="Rectangle_790" data-name="Rectangle 790" width="20" height="20" fill="#c92c61"/>
                                        </clipPath>
                                    </defs>
                                    <g id="Groupe_486" data-name="Groupe 486" clip-path="url(#clip-path)">
                                        <path id="Tracé_258" data-name="Tracé 258" d="M138.839,136a2.839,2.839,0,1,0,2.839,2.839A2.843,2.843,0,0,0,138.839,136m0,4.056a1.217,1.217,0,1,1,1.217-1.217,1.218,1.218,0,0,1-1.217,1.217" transform="translate(-128.839 -128.839)" fill="#c92c61"/>
                                        <path id="Tracé_259" data-name="Tracé 259" d="M18.658,8.923h-1.67a7.311,7.311,0,0,0-6.442-6.442V.811a.811.811,0,0,0-1.622,0v1.67A7.311,7.311,0,0,0,2.482,8.923H.811a.811.811,0,0,0,0,1.622h1.67a7.311,7.311,0,0,0,6.442,6.442v1.67a.811.811,0,0,0,1.622,0v-1.67a7.311,7.311,0,0,0,6.442-6.442h1.67a.811.811,0,0,0,0-1.622m-8.923,6.49a5.679,5.679,0,1,1,5.679-5.679,5.685,5.685,0,0,1-5.679,5.679" transform="translate(0.265 0.265)" fill="#c92c61"/>
                                    </g>
                                </svg>
                            </button>
                            <input type="text" name="address" placeholder="Lieu de consultation" />
                        </div>
                        <input type="hidden" name="lat">
                        <input type="hidden" name="lng">
                        <div id="coopleo-address-results"></div>
                    </label>
                    <div class="coopleo-rdv-filters-buttons">
                        <button type="button" id="coopleo-localize-button" class="coopleo-button coopleo-button-secondary coopleo-button-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_487" data-name="Groupe 487" width="20" height="20" viewBox="0 0 20 20">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="Rectangle_790" data-name="Rectangle 790" width="20" height="20" fill="#c92c61"/>
                                    </clipPath>
                                </defs>
                                <g id="Groupe_486" data-name="Groupe 486" clip-path="url(#clip-path)">
                                    <path id="Tracé_258" data-name="Tracé 258" d="M138.839,136a2.839,2.839,0,1,0,2.839,2.839A2.843,2.843,0,0,0,138.839,136m0,4.056a1.217,1.217,0,1,1,1.217-1.217,1.218,1.218,0,0,1-1.217,1.217" transform="translate(-128.839 -128.839)" fill="#c92c61"/>
                                    <path id="Tracé_259" data-name="Tracé 259" d="M18.658,8.923h-1.67a7.311,7.311,0,0,0-6.442-6.442V.811a.811.811,0,0,0-1.622,0v1.67A7.311,7.311,0,0,0,2.482,8.923H.811a.811.811,0,0,0,0,1.622h1.67a7.311,7.311,0,0,0,6.442,6.442v1.67a.811.811,0,0,0,1.622,0v-1.67a7.311,7.311,0,0,0,6.442-6.442h1.67a.811.811,0,0,0,0-1.622m-8.923,6.49a5.679,5.679,0,1,1,5.679-5.679,5.685,5.685,0,0,1-5.679,5.679" transform="translate(0.265 0.265)" fill="#c92c61"/>
                                </g>
                            </svg>
                        </button>
                        <button class="coopleo-button coopleo-button-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="coopleo-basic-filters-modal-footer" style="display: none;">
                <button class="coopleo-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    Afficher les résultats
                </button>
            </div>
        </div>
    </div>

    <?php if ($vars['hasAdvencedFilters']) { ?>
        <button type="button" class="coopleo-button coopleo-button-secondary" id="advenced-filters-toggle" style="margin-top: .625rem;">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_563" data-name="Groupe 563" width="15.535" height="12.428" viewBox="0 0 15.535 12.428">
                <defs>
                    <clipPath id="clip-path">
                    <rect id="Rectangle_845" data-name="Rectangle 845" width="15.535" height="12.428" fill="#3f3f46"/>
                    </clipPath>
                </defs>
                <g id="Groupe_563-2" data-name="Groupe 563" clip-path="url(#clip-path)">
                    <path id="Tracé_281" data-name="Tracé 281" d="M12.428,6.214A3.107,3.107,0,1,0,9.419,2.33H.777a.777.777,0,0,0,0,1.554H9.419a3.108,3.108,0,0,0,3.009,2.33M10.875,3.107a1.554,1.554,0,1,0,1.553-1.553,1.553,1.553,0,0,0-1.553,1.553M0,9.321a3.107,3.107,0,0,1,6.116-.777h8.642a.777.777,0,1,1,0,1.553H6.116A3.107,3.107,0,0,1,0,9.321Zm4.661,0a1.554,1.554,0,1,0-1.554,1.554A1.554,1.554,0,0,0,4.661,9.321" fill="#3f3f46" fill-rule="evenodd"/>
                </g>
            </svg>
            <span>Filtre avancés</span>
        </button>
    <?php } ?>

    <div id="coopleo-advenced-filters-modal" style="display: none;">
        <div id="advenced-filters-modal-backdrop" class="coopleo-advenced-filters-modal-backdrop"></div>
        <div class="coopleo-advenced-filters-modal-container">
            <div class="coopleo-advenced-filters-modal-header">
                <h3>Filtres avancés</h3>
            </div>
            <div class="coopleo-advenced-filters-modal-main">
                <div class="coopleo-advenced-filters-group price-filters-container">
                    <span class="label">Tarifs du praticien (en €)</span>
                    <div class="price-filters-inputs">
                        <label>
                            <span>min</span>
                            <input type="number" id="price-min" name="price-min" placeholder="Min" min="0" value="0">
                        </label>
                        <span>-</span>
                        <label>
                            <span>max</span>
                            <input type="number" id="price-max" name="price-max" placeholder="Max" min="0" value="150">
                        </label>
                    </div>
                    <div id="dual-range-price" class="coopleo-dual-range">
                        <input type="range" class="range-start" min="0" max="150" value="0">
                        <input type="range" class="range-end" min="0" max="150" value="150">
                    </div>
                </div>
                <div class="coopleo-advenced-filters-group perimeter-filters-container">
                    <label class="label" for="perimeter">Périmètre de recherche</label>
                    <div>
                        <input type="number" id="perimeter" name="perimeter" placeholder="Km" min="0" max="150" value="150">
                        <span>km</span>
                    </div>
                    <div id="dual-range-perimeter" class="coopleo-dual-range no-start">
                        <input type="range" class="range-start" min="0" max="150" value="0">
                        <input type="range" class="range-end" min="0" max="150" value="150">
                    </div>
                </div>
                <div class="coopleo-advenced-filters-group dispo-filters-container">
                    <span class="label">Disponibilité</span>
                    <div class="dispo-filters-inputs">
                        <label>
                            <span>Cette semaine</span>
                            <input type="checkbox" value="this_week" />
                        </label>
                        <label>
                            <span>Semaine prochaine</span>
                            <input type="checkbox" value="next_week" />
                        </label>
                    </div>
                </div>
                <div class="coopleo-advenced-filters-group lang-filters-container">
                    <label class="label" for="lang">Langue parlée</label>
                    <select id="lang" name="lang">
                        <option>Toutes les langues</option>
                        <option value="fr">Français</option>
                        <option value="en">Anglais</option>
                    </select>
                </div>
            </div>
            <div class="coopleo-advenced-filters-modal-footer">
                <button type="button" id="coopleo-reset-filters-button" class="coopleo-button coopleo-button-secondary">Tout effacer</button>
                <button class="coopleo-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    Afficher les résultats
                </button>
            </div>
        </div>
    </div>
</from>

<script type="module">
    import DualRangeInput from "<?php echo COOPLEO_PLUGIN_URL . 'assets/js/dual-range-input.js'; ?>";
    const form = document.getElementById('coopleo-search');
    const resetFilters = document.getElementById('coopleo-reset-filters-button');
    const autocompleteData = <?php echo json_encode($vars["autocompleteData"], JSON_UNESCAPED_UNICODE); ?>;

    form.addEventListener('submit', function(e){
        e.preventDefault();
        console.log('submit');
    });

    // Modal management
    const advencedFiltersModalBackdrop = document.getElementById('advenced-filters-modal-backdrop');
    const advencedFiltersToggle = document.getElementById('advenced-filters-toggle');
    const advencedFiltersModal = document.getElementById('coopleo-advenced-filters-modal');
    const basicFiltersModalMobile = document.getElementById('mobile-toogle-basic-modal');
    const advencedFiltersToggleMobile = document.getElementById('advenced-filters-toggle-mobile');
    const basicFiltersModal = document.getElementById('coopleo-basic-filters-modal');
    const basicFiltersModalBackdrop = document.getElementById('basic-filters-modal-backdrop');

    const closeAdvencedFiltersByEscape = (e) => {
        if(e.key === "Escape"){
            advencedFiltersModal.style.display = "none";
            document.removeEventListener("keydown", closeAdvencedFiltersByEscape)
        }
    }

    const closeBasicFiltersByEscape = (e) => {
        if(e.key === "Escape"){
            basicFiltersModal.style.display = "none";
            document.removeEventListener("keydown", closeBasicFiltersByEscape)
        }
    }

    advencedFiltersToggle?.addEventListener("click", (e) => {
        advencedFiltersModal.style.display = "flex";
        document.addEventListener("keydown", closeAdvencedFiltersByEscape)
    })

    advencedFiltersToggleMobile?.addEventListener("click", (e) => {
        advencedFiltersModal.style.display = "flex";
        document.addEventListener("keydown", closeAdvencedFiltersByEscape)
    })

    basicFiltersModalMobile?.addEventListener("click", (e) => {
        basicFiltersModal.style.display = "flex";
        document.addEventListener("keydown", closeBasicFiltersByEscape)
    })

    advencedFiltersModalBackdrop?.addEventListener("pointerdown", (e) => {
        advencedFiltersModal.style.display = "none";
        document.removeEventListener("keydown", closeAdvencedFiltersByEscape)
    })

    basicFiltersModalBackdrop?.addEventListener("pointerdown", (e) => {
        basicFiltersModal.style.display = "none";
        document.removeEventListener("keydown", closeBasicFiltersByEscape)
    })

    // Modal dual range price
    const minPrice = document.getElementById('price-min');
    const maxPrice = document.getElementById('price-max');
    const dualRange = DualRangeInput({
        selector: "#dual-range-price",
    })

    minPrice?.addEventListener("change", (e) => {
        dualRange.update({start: e.target.value})
    })
    maxPrice?.addEventListener("change", (e) => {
        dualRange.update({end: e.target.value})
    })

    dualRange?.on("change", (e, {start, end}) => {
        minPrice.value = start;
        maxPrice.value = end;
    })

    // Modal dual rang perimeter (min hidden)
    const perimeterInput = document.getElementById('perimeter');
    const dualRangePerimeter = DualRangeInput({
        selector: "#dual-range-perimeter",
    })

    perimeterInput?.addEventListener("change", (e) => {
        dualRangePerimeter.update({end: e.target.value})
    })

    dualRangePerimeter?.on("change", (e, {start, end}) => {
        perimeterInput.value = end;
    })

    // Reset filters
    resetFilters.addEventListener('click', () => {
        form.reset();
        dualRange.update({start: 0, end: 150})
    })

    // Location management
    const localizeBtn = document.getElementById('coopleo-localize-button');
    const mobileLocalizeBtn = document.getElementById('coopleo-localize-button-mobile');
    const latInput = document.querySelector("#coopleo-search input[name='lat']");
    const lngInput = document.querySelector("#coopleo-search input[name='lng']");
    const addressInput = document.querySelector("#coopleo-search input[name='address']");
    const adressResults = document.getElementById('coopleo-address-results');
    let hasAddressCompletion = false;
    let focusedAddressCompletion = 0;
    let addressCompletionOptions = [];
    let addressTimeoutId;

    addressInput.addEventListener('keydown', function(e){
        if (e.key === 'ArrowDown' && hasAddressCompletion) {
            e.preventDefault();
            if (focusedAddressCompletion === null) {
                focusedAddressCompletion = 0;
            } else if (focusedAddressCompletion < addressCompletionOptions.length - 1) {
                focusedAddressCompletion++;
            }
            updateAddressCompletionFocus();
        } else if (e.key === 'ArrowUp' && hasAddressCompletion) {
            e.preventDefault();
            if (focusedAddressCompletion > 0) {
                focusedAddressCompletion--;
            }
            updateAddressCompletionFocus();
        } else if (e.key === 'Enter' && hasAddressCompletion) {
            e.preventDefault();
            if (focusedAddressCompletion !== null) {
                addressCompletionOptions[focusedAddressCompletion].click();
            }else{
                addressCompletionOptions[0].click();
            }
        }else if (e.key === 'Escape' && hasAddressCompletion) {
            e.preventDefault();
            resetAddressAutocomplete();
        }
    });

    function updateAddressCompletionFocus() {
        addressCompletionOptions.forEach((option, index) => {
            if (index === focusedAddressCompletion) {
                option.classList.add('focus');
                const elementRect = option.getBoundingClientRect();
                const containerRect = adressResults.getBoundingClientRect();
                const topLimit = containerRect.top + containerRect.height * 0.15;
                const bottomLimit = containerRect.top + containerRect.height * 0.9;
                if (elementRect.top < topLimit) {
                    adressResults.scrollTop -= (topLimit - elementRect.top);
                } else if (elementRect.bottom > bottomLimit) {
                    adressResults.scrollTop += (elementRect.bottom - bottomLimit);
                }
            } else {
                option.classList.remove('focus');
            }
        });
    }

    addressInput.addEventListener('input', function(e){
        const value = e.target.value;
        latInput.value = '';
        lngInput.value = '';
        if (addressTimeoutId) {
            clearTimeout(addressTimeoutId);
        }
        if (value.replaceAll(' ', '').length > 2) {
            addressTimeoutId = setTimeout(() => {
                searchByAddress(value);
            }, 300);
        }else{
            resetAddressAutocomplete();
        }
    })

    addressInput.addEventListener('blur', () => {
        setTimeout(() => {
            resetAddressAutocomplete();
        }, 300);
    });

    function getUserPosition(){
        navigator.geolocation.getCurrentPosition(async (position) => {
            latInput.value = position.coords.latitude;
            lngInput.value = position.coords.longitude;
            const addresses = await getAddressByPosition(position.coords.latitude, position.coords.longitude)
            addressInput.value = addresses.features[0].properties.label;
        }, (err) => {
            if (err.code === 1) {
                alert('Veuillez autoriser la géolocalisation dans votre navigateur.');
            }
        }, {
            enableHighAccuracy: false,
        });
    }

    localizeBtn.addEventListener('click', getUserPosition);
    mobileLocalizeBtn.addEventListener('click', getUserPosition);

    function searchByAddress(address) {
        getAddressBySearch(address).then((res) => {
            resetAddressAutocomplete();
            if(!res.features.length) return;
            displayAddressAutocompleteResults("Communes ou Arrondissements", res.features.filter(feature => feature.properties.type === "municipality"))
            displayAddressAutocompleteResults("Lieux-dits", res.features.filter(feature => feature.properties.type === "locality"))
            displayAddressAutocompleteResults("Rues", res.features.filter(feature => feature.properties.type === "street"))
            displayAddressAutocompleteResults("Adresses", res.features.filter(feature => feature.properties.type === "housenumber"))
        });
    }

    function resetAddressAutocomplete(){
        adressResults.innerHTML = "";
        addressCompletionOptions = [];
        focusedAddressCompletion = 0;
        hasAddressCompletion = false;
    }

    function displayAddressAutocompleteResults(group, results){
        if (!results.length) return;
        hasAddressCompletion = true;
        const groupResults = document.createElement('div');
        groupResults.classList.add('coopleo-search-results-group');
        groupResults.innerHTML = `<span>${group}</span>`;
        results.forEach(result => {
            const resultElement = document.createElement('button');
            resultElement.type = "button";
            resultElement.classList.add('coopleo-search-result');
            resultElement.innerText = result.properties.label;
            resultElement.addEventListener('click', function(e){
                addressInput.value = result.properties.label;
                latInput.value = result.geometry.coordinates[1];
                lngInput.value = result.geometry.coordinates[0];
                resetAddressAutocomplete();
            });
            groupResults.appendChild(resultElement);
            addressCompletionOptions.push(resultElement);
        })
        adressResults.appendChild(groupResults);
        updateAddressCompletionFocus();
    }

    // Search autocomplete
    const searchInput = document.getElementById('coopleo-search-input');
    const searchResults = document.getElementById('coopleo-search-results');
    let hasCompletion = false;
    let focusedCompletion = 0;
    let completionOptions = [];
    let timeoutId;

    searchInput.addEventListener('keydown', function(e){
        if (e.key === 'ArrowDown' && hasCompletion) {
            e.preventDefault();
            if (focusedCompletion === null) {
                focusedCompletion = 0;
            } else if (focusedCompletion < completionOptions.length - 1) {
                focusedCompletion++;
            }
            updateCompletionFocus();
        } else if (e.key === 'ArrowUp' && hasCompletion) {
            e.preventDefault();
            if (focusedCompletion > 0) {
                focusedCompletion--;
            }
            updateCompletionFocus();
        } else if (e.key === 'Enter' && hasCompletion) {
            e.preventDefault();
            if (focusedCompletion !== null) {
                completionOptions[focusedCompletion].click();
            }else{
                completionOptions[0].click();
            }
        }else if (e.key === 'Escape' && hasCompletion) {
            e.preventDefault();
            resetautocomplete();
        }
    });

    function updateCompletionFocus() {
        completionOptions.forEach((option, index) => {
            if (index === focusedCompletion) {
                option.classList.add('focus');
                const elementRect = option.getBoundingClientRect();
                const containerRect = searchResults.getBoundingClientRect();
                const topLimit = containerRect.top + containerRect.height * 0.15;
                const bottomLimit = containerRect.top + containerRect.height * 0.9;
                if (elementRect.top < topLimit) {
                    searchResults.scrollTop -= (topLimit - elementRect.top);
                } else if (elementRect.bottom > bottomLimit) {
                    searchResults.scrollTop += (elementRect.bottom - bottomLimit);
                }
            } else {
                option.classList.remove('focus');
            }
        });
    }

    searchInput.addEventListener('input', function(e){
        const value = e.target.value;
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        if (value.replaceAll(' ', '').length > 2) {
            timeoutId = setTimeout(() => {
                searchAutocomplete(value);
            }, 300);
        }else{
            resetautocomplete();
        }
    });

    function searchAutocomplete(search){
        const results = {};
        Object.entries(autocompleteData).forEach(([key, values]) => {
            results[key] = filterAndSort(search, values);
        })
        resetautocomplete();
        displaySearchAutocompleteResults("Problématiques", results.cat_problematique);
        displaySearchAutocompleteResults("Type de thérapeutes", results.type_de_therapeute);
        displaySearchAutocompleteResults("Thérapeutes", results.therapeutes);
    }

    function displaySearchAutocompleteResults(group, results){
        if (!results.length) return;
        hasCompletion = true;
        const groupResults = document.createElement('div');
        groupResults.classList.add('coopleo-search-results-group');
        groupResults.innerHTML = `<span>${group}</span>`;
        results.forEach(result => {
            const resultElement = document.createElement('button');
            resultElement.type = "button";
            resultElement.classList.add('coopleo-search-result');
            resultElement.innerText = result;
            resultElement.addEventListener('click', function(e){
                searchInput.value = result;
                resetautocomplete();
            });
            groupResults.appendChild(resultElement);
            completionOptions.push(resultElement);
        })
        searchResults.appendChild(groupResults);
        updateCompletionFocus();
    }

    searchInput.addEventListener('blur', () => {
        setTimeout(() => {
            resetautocomplete();
        }, 300);
    });

    function resetautocomplete(){
        searchResults.innerHTML = "";
        completionOptions = [];
        focusedCompletion = 0;
        hasCompletion = false;
    }

    // Autocomplete calculation
    function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    function preprocessString(str) {
        return removeAccents(str.toLowerCase());
    }

    function levenshtein(a, b) {
        const m = a.length;
        const n = b.length;
        
        // Si la recherche est vide, on considère que c'est une correspondance parfaite
        if (m === 0) return 0;
        
        // Création de la matrice dp de dimensions (m+1) x (n+1)
        const dp = Array.from({ length: m + 1 }, () => Array(n + 1).fill(0));

        // Initialisation : pour une chaîne a vide, la distance est 0 pour tous les préfixes de b
        for (let j = 0; j <= n; j++) {
            dp[0][j] = 0;
        }
        // Pour a non vide et b vide, la distance est i (il faut insérer tous les caractères)
        for (let i = 1; i <= m; i++) {
            dp[i][0] = i;
        }

        // Remplissage de la matrice dp
        for (let i = 1; i <= m; i++) {
            for (let j = 1; j <= n; j++) {
            const cost = a[i - 1] === b[j - 1] ? 0 : 1;
            dp[i][j] = Math.min(
                dp[i - 1][j - 1] + cost, // substitution ou match
                dp[i - 1][j] + 1,        // suppression
                dp[i][j - 1] + 1         // insertion
            );
            }
        }
        
        // La distance minimale entre a et une sous-chaîne de b
        // correspond au minimum de la dernière ligne dp[m][j] pour j allant de 0 à n.
        let minDistance = Infinity;
        for (let j = 0; j <= n; j++) {
            if (dp[m][j] < minDistance) {
            minDistance = dp[m][j];
            }
        }
        return minDistance;
    }

    function filterAndSort(search, candidates, maxDistanceRatio = 0.1) {
        const searchPre = preprocessString(search);
        const threshold = Math.max(1, Math.floor(searchPre.length * maxDistanceRatio));
        
        const results = [];
        
        for (const candidate of candidates) {
            const candidatePre = preprocessString(candidate);
            const distance = levenshtein(searchPre, candidatePre);
            if (distance <= threshold) {
                results.push({ candidate, distance });
            }
        }
        
        // Trie par distance (plus petite distance en premier)
        results.sort((a, b) => a.distance - b.distance);
        
        // Retourne uniquement la liste des valeurs candidates
        return results.map(item => item.candidate);
    }

    // Addresses gouv api
    async function getAddressByPosition(lat, lng){
        const res = await fetch(`https://api-adresse.data.gouv.fr/reverse/?lon=${lng}&lat=${lat}`);
        const data = await res.json();
        return data;
    }

    async function getAddressBySearch(search){
        const res = await fetch(`https://api-adresse.data.gouv.fr/search/?q=${search}`);
        const data = await res.json();
        return data;
    }
</script>


<?php
// if(empty($vars)){
//     return;
// }

// echo '<pre>';
// var_dump($vars["autocompleteData"]);
// echo '</pre>';
?>