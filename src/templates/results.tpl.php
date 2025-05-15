<?php
// if(empty($vars)){
//     return;
// }
// echo '<pre>';
// print_r($vars);
// echo '</pre>';
?>
<div id="coopleo-results">
    <div class="header">
        <h1><span class="underline"><?php  echo $vars['labelListeMetier'] ?></span> <span id="coopleo-type-effect"><?php echo $vars['listWords'][0]; ?></span></h1>
       <div id="coopleo-results-count-container">
            <p data-target-tpl="results-count"></p>
            <label>
                <span>Tri par :</span>
                <select name="sort_by" id="coopleo-sort-by">
                    <option value="default">Prochaine disponibilité</option>
                    <option value="location" id="coopleo-sort-by-location" selected>Localisation</option>
                    <option value="price">Prix croissant</option>
                </select>
                <span class="svg-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="7" viewBox="0 0 8 7">
                        <g id="Groupe_502" data-name="Groupe 502" transform="translate(-1281 -248)">
                            <rect id="Rectangle_331" data-name="Rectangle 331" width="6" height="1" rx="0.5" transform="translate(1283 251)" fill="#3f3f46"/>
                            <rect id="Rectangle_332" data-name="Rectangle 332" width="4" height="1" rx="0.5" transform="translate(1285 254)" fill="#3f3f46"/>
                            <rect id="Rectangle_333" data-name="Rectangle 333" width="8" height="1" rx="0.5" transform="translate(1281 248)" fill="#3f3f46"/>
                        </g>
                    </svg>
                </span>
            </label>
       </div>
    </div>
    <div id="coopleo-results-container"></div>
    <div id="coopleo-no-results" style="display: none;">
        <p>Nous n'avons pas de professionnel à proximité.</p>
        <p>L'accompagnement en visioconférence est une véritable aide. N'hésitez pas à élargir votre recherche en sélectionnant Visioconférence.</p>
    </div>
    <?php if (!($vars["hasPagination"] !== "true")) { ?>
        <div id="coopleo-results-pagination-container">
            <button type="button" id="coopleo-results-pagination-previous" class="coopleo-button coopleo-button-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg></button>
            <p data-target-tpl="page-number">Page 1 sur 1</p>
            <button type="button" id="coopleo-results-pagination-next" class="coopleo-button coopleo-button-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg></button>
        </div>
        <div id="coopleo-results-per-page">
            <label>
                <span>Résultats par page</span>
                <select name="per_page" id="coopleo-per-page">
                    <?php if ($vars["limit"] && $vars["limit"] !== 10 && $vars["limit"] !== 25 && $vars["limit"] !== 50) { ?>
                        <option value="<?php echo $vars["limit"] ?>" selected><?php echo $vars["limit"] ?></option>
                    <?php } ?>
                    <option value="10" <?php echo $vars["limit"] === 10 ? 'selected' : '' ?>>10</option>
                    <option value="25" <?php echo $vars["limit"] === 25 ? 'selected' : '' ?>>25</option>
                    <option value="50" <?php echo $vars["limit"] === 50 ? 'selected' : '' ?>>50</option>
                </select>
            </label>
        </div>
    <?php } ?>
</div>

<template id="coopleo-result-tpl">
    <a href="#" class="result-card" <?php echo ($vars['openNewTab'] ? 'target="_blank"': '') ?> data-target-tpl="button-link">
        <div class="result-card-therapist">
            <div class="result-card-therapist-infos">
                <img src="" alt="Photo de profil">
                <div>
                    <h2 class="result-card-therapist-name" data-target-tpl="name"></h2>
                    <h3 class="result-card-therapist-type" data-target-tpl="type"></h3>
                </div>
            </div>
            <div class="result-card-therapist-bottom">
                <div class="result-card-therapist-details">
                    <div class="result-card-therapist-detail result-card-therapist-address">
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <p data-target-tpl="address"></p>
                    </div>
                    <div class="result-card-therapist-detail result-card-therapist-price">
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-euro-icon lucide-euro"><path d="M4 10h12"/><path d="M4 14h9"/><path d="M19 6a7.7 7.7 0 0 0-5.2-2A7.9 7.9 0 0 0 6 12c0 4.4 3.5 8 7.8 8 2 0 3.8-.8 5.2-2"/></svg>
                        </div>
                        <p data-target-tpl="price-range"><span data-target-tpl="min_price"></span> à <span data-target-tpl="max_price"></span>€</p>
                    </div>
                    <div class="result-card-therapist-detail result-card-therapist-lang">
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flag-icon lucide-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg>
                        </div>
                        <p data-target-tpl="langue"></p>
                    </div>
                    <div class="result-card-therapist-detail result-card-therapist-free-rdv">
                        <img src="<?php echo COOPLEO_PLUGIN_URL . 'assets/icons/free-rdv-icon.png'; ?>" alt="">
                        <p>1er RDV gratuit</p>
                    </div>
                </div>
                <div class="result-card-therapist-rdv">
                   <div class="rdv-type-list">
                        <div class="rdv-type-cabinet">
                            <img src="<?php echo COOPLEO_PLUGIN_URL . 'assets/icons/visio-en-cabinet-rond.png'; ?>" alt="">
                            <p class="tooltip">En cabinet</p>
                        </div>
                        <div class="rdv-type-visio">
                            <img src="<?php echo COOPLEO_PLUGIN_URL . 'assets/icons/visio-en-visio-rond.png'; ?>" alt="">
                            <p class="tooltip">En visio</p>
                        </div>
                        <!-- <svg class="rdv-type-cabinet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30">
                            <defs>
                                <clipPath id="clip-path">
                                <rect id="Rectangle_808" data-name="Rectangle 808" width="14.146" height="14.139" transform="translate(0 0)" fill="#c92c61"/>
                                </clipPath>
                            </defs>
                            <g id="Groupe_715" data-name="Groupe 715" transform="translate(-635 -633)">
                                <g id="Ellipse_7" data-name="Ellipse 7" transform="translate(635 633)" fill="none" stroke="#c92c62" stroke-width="1" opacity="0.997">
                                <circle cx="15" cy="15" r="15" stroke="none"/>
                                <circle cx="15" cy="15" r="14.5" fill="none"/>
                                </g>
                                <g id="Groupe_505" data-name="Groupe 505" transform="translate(643 640.93)">
                                <g id="Groupe_500" data-name="Groupe 500" transform="translate(0 0)" clip-path="url(#clip-path)">
                                    <path id="Tracé_264" data-name="Tracé 264" d="M12.86,7.591V9.645a4.5,4.5,0,0,1-9,0v-.7A4.5,4.5,0,0,1,0,4.495V.64A.635.635,0,0,1,.64,0H2.575a.635.635,0,0,1,.64.64.635.635,0,0,1-.64.64H1.295V4.495a3.215,3.215,0,1,0,6.43,0V1.28H6.445A.635.635,0,0,1,5.8.64.635.635,0,0,1,6.445,0H8.38A.642.642,0,0,1,9,.64V4.495A4.514,4.514,0,0,1,5.15,8.945v.7a3.215,3.215,0,1,0,6.43,0V7.591a1.925,1.925,0,1,1,2.456-1.176A1.955,1.955,0,0,1,12.86,7.591" transform="translate(0 0)" fill="#c92c61"/>
                                </g>
                                </g>
                            </g>
                        </svg>
                        <svg class="rdv-type-visio" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30">
                            <defs>
                                <clipPath id="clip-path">
                                <rect id="Rectangle_806" data-name="Rectangle 806" width="14.084" height="14.082" transform="translate(0 0)" fill="#c92c61"/>
                                </clipPath>
                            </defs>
                            <g id="Groupe_717" data-name="Groupe 717" transform="translate(-703 -633)">
                                <g id="Ellipse_9" data-name="Ellipse 9" transform="translate(703 633)" fill="none" stroke="#c92c62" stroke-width="1" opacity="0.997">
                                <circle cx="15" cy="15" r="15" stroke="none"/>
                                <circle cx="15" cy="15" r="14.5" fill="none"/>
                                </g>
                                <g id="Groupe_507" data-name="Groupe 507" transform="translate(711.063 639.729)">
                                <g id="Groupe_498" data-name="Groupe 498" transform="translate(0 0)" clip-path="url(#clip-path)">
                                    <path id="Tracé_260" data-name="Tracé 260" d="M13.775,25.937a.7.7,0,0,0-.656-.07L10.53,26.9a2.113,2.113,0,0,0-2.08-1.79H2.113A2.113,2.113,0,0,0,0,27.225v4.929a2.113,2.113,0,0,0,2.113,2.113H8.45a2.113,2.113,0,0,0,2.08-1.789l2.588,1.035a.7.7,0,0,0,.965-.654V26.52A.7.7,0,0,0,13.775,25.937ZM8.45,32.858H2.113a.7.7,0,0,1-.7-.7V27.225a.7.7,0,0,1,.7-.7H8.45a.7.7,0,0,1,.7.7v4.929a.7.7,0,0,1-.7.7m4.225-1.04-2.113-.845V28.405l2.113-.845v4.258Z" transform="translate(0 -20.184)" fill="#c92c61"/>
                                    <path id="Tracé_261" data-name="Tracé 261" d="M10.268,2.353a3.319,3.319,0,0,1,4.648,0,.7.7,0,0,0,.986-1,4.733,4.733,0,0,0-6.619,0,.7.7,0,0,0,.986,1Z" transform="translate(-7.311 0)" fill="#c92c61"/>
                                    <path id="Tracé_262" data-name="Tracé 262" d="M17.7,12.672a.7.7,0,1,0,.937,1.051c.017-.015.033-.031.049-.048a.9.9,0,0,1,1.268,0,.7.7,0,1,0,1.034-.956c-.016-.017-.032-.033-.049-.048A2.317,2.317,0,0,0,17.7,12.672Z" transform="translate(-14.034 -9.654)" fill="#c92c61"/>
                                </g>
                                </g>
                            </g>
                        </svg> -->
                   </div>
                   <span class="coopleo-button" >
                        <img width="16" height="16" src="<?php echo COOPLEO_PLUGIN_URL . 'assets/icons/calendrier.png'; ?>" alt="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_516" data-name="Groupe 516" width="15.158" height="15.982" viewBox="0 0 15.158 15.982">
                            <defs>
                                <clipPath id="clip-path">
                                <rect id="Rectangle_817" data-name="Rectangle 817" width="15.158" height="15.982" fill="#fff"/>
                                </clipPath>
                            </defs>
                            <g id="Groupe_515" data-name="Groupe 515" clip-path="url(#clip-path)">
                                <path id="Tracé_268" data-name="Tracé 268" d="M107.25,3.345a.575.575,0,0,1-.583-.558V.558a.584.584,0,0,1,1.166,0v2.23a.575.575,0,0,1-.583.558" transform="translate(-102.78)" fill="#fff"/>
                                <path id="Tracé_269" data-name="Tracé 269" d="M277.916,3.345a.575.575,0,0,1-.583-.558V.558a.584.584,0,0,1,1.166,0v2.23a.575.575,0,0,1-.583.558" transform="translate(-267.228)" fill="#fff"/>
                                <path id="Tracé_270" data-name="Tracé 270" d="M112.777,241.6a.869.869,0,0,1-.552-.216.751.751,0,0,1-.225-.528.713.713,0,0,1,.062-.283.854.854,0,0,1,.163-.245.808.808,0,0,1,.257-.156.821.821,0,0,1,.847.156.764.764,0,0,1,.225.528,1.072,1.072,0,0,1-.016.149.459.459,0,0,1-.047.134.555.555,0,0,1-.07.134,1.178,1.178,0,0,1-.093.112A.837.837,0,0,1,112.777,241.6Z" transform="translate(-107.919 -231.754)" fill="#fff"/>
                                <path id="Tracé_271" data-name="Tracé 271" d="M187.444,241.508a.869.869,0,0,1-.552-.216.751.751,0,0,1-.225-.528.713.713,0,0,1,.062-.282.854.854,0,0,1,.163-.245.829.829,0,0,1,1.1,0,.764.764,0,0,1,.225.528,1.07,1.07,0,0,1-.016.149.459.459,0,0,1-.047.134.554.554,0,0,1-.07.134,1.179,1.179,0,0,1-.093.112A.837.837,0,0,1,187.444,241.508Z" transform="translate(-179.865 -231.659)" fill="#fff"/>
                                <path id="Tracé_272" data-name="Tracé 272" d="M262.111,241.508a.869.869,0,0,1-.552-.216l-.093-.112a.552.552,0,0,1-.07-.134.459.459,0,0,1-.047-.134,1.068,1.068,0,0,1-.016-.149.764.764,0,0,1,.225-.528.829.829,0,0,1,1.1,0,.764.764,0,0,1,.225.528,1.072,1.072,0,0,1-.015.149.459.459,0,0,1-.047.134.553.553,0,0,1-.07.134,1.182,1.182,0,0,1-.093.112A.837.837,0,0,1,262.111,241.508Z" transform="translate(-251.812 -231.659)" fill="#fff"/>
                                <path id="Tracé_273" data-name="Tracé 273" d="M112.777,316.412a.8.8,0,0,1-.3-.059.9.9,0,0,1-.257-.156.764.764,0,0,1-.225-.528.713.713,0,0,1,.062-.283.691.691,0,0,1,.163-.245.842.842,0,0,1,1.1,0,.731.731,0,0,1,0,1.055.837.837,0,0,1-.552.216" transform="translate(-107.919 -303.96)" fill="#fff"/>
                                <path id="Tracé_274" data-name="Tracé 274" d="M187.444,316.412a.837.837,0,0,1-.552-.216.764.764,0,0,1-.225-.528.713.713,0,0,1,.062-.283.691.691,0,0,1,.163-.245.842.842,0,0,1,1.1,0,.691.691,0,0,1,.163.245.713.713,0,0,1,.062.283.764.764,0,0,1-.225.528.837.837,0,0,1-.552.216" transform="translate(-179.865 -303.96)" fill="#fff"/>
                                <path id="Tracé_275" data-name="Tracé 275" d="M262.111,316.134a.837.837,0,0,1-.552-.216.691.691,0,0,1-.163-.245.673.673,0,0,1,0-.565.691.691,0,0,1,.163-.245.8.8,0,0,1,.7-.2.484.484,0,0,1,.148.045.6.6,0,0,1,.14.067,1.215,1.215,0,0,1,.117.089.731.731,0,0,1,0,1.056A.837.837,0,0,1,262.111,316.134Z" transform="translate(-251.812 -303.683)" fill="#fff"/>
                                <path id="Tracé_276" data-name="Tracé 276" d="M24.464,152.365H11.249a.558.558,0,1,1,0-1.115H24.464a.558.558,0,1,1,0,1.115" transform="translate(-10.277 -145.98)" fill="#fff"/>
                                <path id="Tracé_277" data-name="Tracé 277" d="M10.688,46.867H4.47C1.632,46.867,0,45.306,0,42.593V36.274C0,33.561,1.632,32,4.47,32h6.219c2.837,0,4.47,1.561,4.47,4.274v6.319c0,2.713-1.632,4.274-4.47,4.274M4.47,33.115c-2.223,0-3.3,1.033-3.3,3.159v6.319c0,2.126,1.081,3.159,3.3,3.159h6.219c2.223,0,3.3-1.033,3.3-3.159V36.274c0-2.126-1.08-3.159-3.3-3.159Z" transform="translate(0 -30.885)" fill="#fff"/>
                            </g>
                        </svg> -->
                        <span data-target-tpl="button-label"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="result-card-calendar">
            <div class="days-list"></div>
            <span class="result-card-calendar-more">Plus de créneaux</span>
            <div class="result-card-calendar-no-amelia">
                <p>Calendrier indisponible</p>
                <span class="coopleo-button">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Groupe_516" data-name="Groupe 516" width="15.158" height="15.982" viewBox="0 0 15.158 15.982">
                        <defs>
                            <clipPath id="clip-path">
                            <rect id="Rectangle_817" data-name="Rectangle 817" width="15.158" height="15.982" fill="#fff"/>
                            </clipPath>
                        </defs>
                        <g id="Groupe_515" data-name="Groupe 515" clip-path="url(#clip-path)">
                            <path id="Tracé_268" data-name="Tracé 268" d="M107.25,3.345a.575.575,0,0,1-.583-.558V.558a.584.584,0,0,1,1.166,0v2.23a.575.575,0,0,1-.583.558" transform="translate(-102.78)" fill="#fff"/>
                            <path id="Tracé_269" data-name="Tracé 269" d="M277.916,3.345a.575.575,0,0,1-.583-.558V.558a.584.584,0,0,1,1.166,0v2.23a.575.575,0,0,1-.583.558" transform="translate(-267.228)" fill="#fff"/>
                            <path id="Tracé_270" data-name="Tracé 270" d="M112.777,241.6a.869.869,0,0,1-.552-.216.751.751,0,0,1-.225-.528.713.713,0,0,1,.062-.283.854.854,0,0,1,.163-.245.808.808,0,0,1,.257-.156.821.821,0,0,1,.847.156.764.764,0,0,1,.225.528,1.072,1.072,0,0,1-.016.149.459.459,0,0,1-.047.134.555.555,0,0,1-.07.134,1.178,1.178,0,0,1-.093.112A.837.837,0,0,1,112.777,241.6Z" transform="translate(-107.919 -231.754)" fill="#fff"/>
                            <path id="Tracé_271" data-name="Tracé 271" d="M187.444,241.508a.869.869,0,0,1-.552-.216.751.751,0,0,1-.225-.528.713.713,0,0,1,.062-.282.854.854,0,0,1,.163-.245.829.829,0,0,1,1.1,0,.764.764,0,0,1,.225.528,1.07,1.07,0,0,1-.016.149.459.459,0,0,1-.047.134.554.554,0,0,1-.07.134,1.179,1.179,0,0,1-.093.112A.837.837,0,0,1,187.444,241.508Z" transform="translate(-179.865 -231.659)" fill="#fff"/>
                            <path id="Tracé_272" data-name="Tracé 272" d="M262.111,241.508a.869.869,0,0,1-.552-.216l-.093-.112a.552.552,0,0,1-.07-.134.459.459,0,0,1-.047-.134,1.068,1.068,0,0,1-.016-.149.764.764,0,0,1,.225-.528.829.829,0,0,1,1.1,0,.764.764,0,0,1,.225.528,1.072,1.072,0,0,1-.015.149.459.459,0,0,1-.047.134.553.553,0,0,1-.07.134,1.182,1.182,0,0,1-.093.112A.837.837,0,0,1,262.111,241.508Z" transform="translate(-251.812 -231.659)" fill="#fff"/>
                            <path id="Tracé_273" data-name="Tracé 273" d="M112.777,316.412a.8.8,0,0,1-.3-.059.9.9,0,0,1-.257-.156.764.764,0,0,1-.225-.528.713.713,0,0,1,.062-.283.691.691,0,0,1,.163-.245.842.842,0,0,1,1.1,0,.731.731,0,0,1,0,1.055.837.837,0,0,1-.552.216" transform="translate(-107.919 -303.96)" fill="#fff"/>
                            <path id="Tracé_274" data-name="Tracé 274" d="M187.444,316.412a.837.837,0,0,1-.552-.216.764.764,0,0,1-.225-.528.713.713,0,0,1,.062-.283.691.691,0,0,1,.163-.245.842.842,0,0,1,1.1,0,.691.691,0,0,1,.163.245.713.713,0,0,1,.062.283.764.764,0,0,1-.225.528.837.837,0,0,1-.552.216" transform="translate(-179.865 -303.96)" fill="#fff"/>
                            <path id="Tracé_275" data-name="Tracé 275" d="M262.111,316.134a.837.837,0,0,1-.552-.216.691.691,0,0,1-.163-.245.673.673,0,0,1,0-.565.691.691,0,0,1,.163-.245.8.8,0,0,1,.7-.2.484.484,0,0,1,.148.045.6.6,0,0,1,.14.067,1.215,1.215,0,0,1,.117.089.731.731,0,0,1,0,1.056A.837.837,0,0,1,262.111,316.134Z" transform="translate(-251.812 -303.683)" fill="#fff"/>
                            <path id="Tracé_276" data-name="Tracé 276" d="M24.464,152.365H11.249a.558.558,0,1,1,0-1.115H24.464a.558.558,0,1,1,0,1.115" transform="translate(-10.277 -145.98)" fill="#fff"/>
                            <path id="Tracé_277" data-name="Tracé 277" d="M10.688,46.867H4.47C1.632,46.867,0,45.306,0,42.593V36.274C0,33.561,1.632,32,4.47,32h6.219c2.837,0,4.47,1.561,4.47,4.274v6.319c0,2.713-1.632,4.274-4.47,4.274M4.47,33.115c-2.223,0-3.3,1.033-3.3,3.159v6.319c0,2.126,1.081,3.159,3.3,3.159h6.219c2.223,0,3.3-1.033,3.3-3.159V36.274c0-2.126-1.08-3.159-3.3-3.159Z" transform="translate(0 -30.885)" fill="#fff"/>
                        </g>
                    </svg>
                    <span>Contacter</span>
                </span>
            </div>
        </div>
    </a>
</template>

<template id="coopleo-result-day-tpl">
    <div class="day-info">
        <div class="day-header">
            <p class="day-name" data-target-tpl="day-name"></p>
            <p class="day-date" data-target-tpl="day-date"></p>
        </div>
        <div class="day-availablilty">
            <span class="available-morning">Matin</span>
            <span class="available-afternoon">Après-midi</span>
        </div>
    </div>
</template>

<script type="module">
    import {DateTime} from 'https://cdn.jsdelivr.net/npm/luxon@3.6.1/+esm';

    const main = document.querySelector("#coopleo-results");
    const searchURL = "<?php echo COOPLEO_API_ENDPOINT; ?>";
    const only_fsf = !!("<?php echo $vars['fsf_only'] ?>" === "1");
    const resultTpl = document.querySelector("#coopleo-result-tpl");
    const resultDayTpl = document.querySelector("#coopleo-result-day-tpl");
    const resultsContainer = document.querySelector("#coopleo-results-container");
    const nextPageButton = document.querySelector("#coopleo-results-pagination-next");
    const prevPageButton = document.querySelector("#coopleo-results-pagination-previous");
    const perPageSelect = document.getElementById("coopleo-per-page");
    const sortBySelect = document.getElementById("coopleo-sort-by");
    const sortByLocationOption = document.getElementById("coopleo-sort-by-location");
    const noResultsContainer = document.querySelector("#coopleo-results #coopleo-no-results");
    let filters = {"q":"","address":"","lat":"","lng":"","type":"cabinet","min_price":"0","max_price":"240","perimetre":"20"};
    let perPage = <?php echo $vars["limit"]; ?>;
    let currentPage = 1;
    let totalPages = 1;
    let orderBy = "location";

    window.addEventListener("DOMContentLoaded", () => {
        // wrap on condition if search params are present
        if (window.location.search !== "") {
            const urlParams = new URLSearchParams(window.location.search);
            const urlParamsObj = Object.fromEntries(urlParams.entries());

            filters = {...urlParamsObj};
            if (urlParamsObj.per_page) {
                perPage = parseInt(urlParamsObj.per_page) ?? <?php echo $vars["limit"]; ?>;
                perPageSelect.querySelectorAll("option").forEach((option) => {
                    option.selected = false;
                })
                const optionToSelect = perPageSelect.querySelector(`option[value="${perPage}"]`)
                if (optionToSelect) {
                    optionToSelect.selected = true;
                }
                perPageSelect.value = perPage;
            }
            if (urlParamsObj.sort_by) {
                sortBySelect.querySelectorAll("option").forEach((option) => {
                    option.selected = false;
                })
                const optionToSelect = sortBySelect.querySelector(`option[value="${urlParamsObj.sort_by}"]`)
                if (optionToSelect) {
                    optionToSelect.selected = true;
                    orderBy = urlParamsObj.sort_by;
                }else{
                    const type = urlParamsObj.type ?? "visio"
                    const optionToSelect = sortBySelect.querySelector(`option[value="${type === "cabinet" ? "location" : "default"}"]`)
                    optionToSelect.selected = true;
                    orderBy = type === "cabinet" ? "location" : "default";
                }
            }
            if (urlParamsObj.currentPage) {
                currentPage = urlParamsObj.currentPage;
            }
        }
        fetchResults();
    })

    const lang = {
        "english": "Anglais",
        "french": "Français",
        "spanish": "Espagnol"
    }

    nextPageButton.addEventListener("click", () => {
        if (currentPage === totalPages) {
            return;
        }
        currentPage++;
        fetchResults();
    })
    prevPageButton.addEventListener("click", () => {
        if (currentPage === 1) {
            return;
        }
        currentPage--;
        fetchResults();
    })

    perPageSelect.addEventListener("change", (e) => {
        const oldPerPage = perPage;
        perPage = e.target.value;
        currentPage = Math.ceil((currentPage * oldPerPage) / perPage);
        fetchResults();
    })

    sortBySelect.addEventListener("change", (e) => {
        orderBy = e.target.value;
        fetchResults();
    })

    document.addEventListener("coopleo-search", (e) => {
        filters = e.detail;
        currentPage = 1;
        if (filters.lat) {
            sortByLocationOption.style.display = "block";
        } else {
            sortByLocationOption.style.display = "none";
        }
        sortBySelect.querySelectorAll("option").forEach((option) => {
            option.selected = false;
        })
        if (filters.type) {
            const optionToSelect = sortBySelect.querySelector(`option[value="${filters.type === "cabinet" ? "location" : "default"}"]`)
            optionToSelect.selected = true;
            orderBy = filters.type === "cabinet" ? "location" : "default";
        }else{
            sortBySelect.querySelector("option[value='default']").selected = true;
            orderBy = "default";
        }
        fetchResults();
    })

    async function fetchResults(){
        delete filters.per_page
        delete filters.sort_by
        delete filters.currentPage
        if (filters.langue === "all") {
            delete filters.langue
        }
        filters.only_fsf = only_fsf;

        if (filters.address && (!filters.lat || !filters.lng)) {
            filters.address = "";
        }

        if (filters.has_online_calendar){
            filters.has_online_calendar = true;
        }
        const queryString = new URLSearchParams({...filters, per_page: perPage, sort_by: orderBy, currentPage: currentPage}).toString();
        window.history.pushState({}, '', `?${queryString}`);

        noResultsContainer.style.display = "none";

        const response = await fetch(searchURL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                "filters": filters,
                "sort": orderBy,
                "page": currentPage,
                "per_page": perPage
            })
        });
        const results = await response.json();
        resultsContainer.innerHTML = "";
        if (results.status === "success" && results.data.length) {
            results.data.forEach(result => {
                generateResult(result.document);
            });
        }else{
            noResultsContainer.style.display = "block";
        }

        generatePagination(results.pagination);
    }

    function generatePagination(pagination){
        if (pagination === undefined) {
            replaceTplContent(main, "results-count", "0 résultat");
            return;
        }

        totalPages = pagination.last_page;
        currentPage = parseInt(pagination.current_page) || pagination.current_page;

        replaceTplContent(main, "page-number", `Page ${currentPage} sur ${pagination.last_page}`);
        let resultCountSentence = `${pagination.total} résultat${pagination.total > 1 ? "s" : ""}`;

        if (filters.city) {
            resultCountSentence += ` à ${filters.city}`;
        }
        if (filters.q) {
            resultCountSentence += ` pour ${filters.q}`;
        }
        replaceTplContent(main, "results-count", resultCountSentence);

    }

    function generateResult(data){
        const result = resultTpl.content.cloneNode(true);
        let hasAmelia = !!(data.amelia_id > 0);
        const langLabel = Object.entries(data.langue_parlee).filter(([key, value]) => !!value).map(([key, value]) => {
            return lang[key];
        }).join(", ");

        if (data.photo_link) {
            result.querySelector(".result-card-therapist-infos img").src = data.photo_link;
        }
        replaceTplContent(result, "name", data.name);
        

        if (filters.q && data.type_therapist.includes(filters.q)) {
            replaceTplContent(result, "type", data.type_therapist.find((type) => type.toLowerCase() === filters.q.toLowerCase()) ?? '');
        }else{
            replaceTplContent(result, "type", data.type_therapist[0] ?? '');
        }

        if (data.localisation.adresse) {
            replaceTplContent(result, "address", data.localisation.adresse.split(",").find(el => el.match(/\d{5}/)) ?? data.localisation.adresse);
        }else{
            deleteTplElement(result, ".result-card-therapist-address");
        }
        if(data.tarifs.min && data.tarifs.max){
            if (data.tarifs.min === data.tarifs.max) {
                replaceTplContent(result, "price-range", data.tarifs.min + "€");
            }else{
                replaceTplContent(result, "min_price", data.tarifs.min);
                replaceTplContent(result, "max_price", data.tarifs.max);
            }
        }else{
            deleteTplElement(result, ".result-card-therapist-price");
        }

        if (!data.free_rdv) {
            deleteTplElement(result, ".result-card-therapist-free-rdv")
        }

        if(data.link){
            result.querySelector("[data-target-tpl='button-link']").href = data.link;
            // result.querySelector("[data-target-tpl='calendar-more-link']").href = data.link;
            // if (!hasAmelia) {
            //     result.querySelector("[data-target-tpl='button-link-calendar']").href = data.link;
            // }
        }

        if (hasAmelia) {
            replaceTplContent(result, "button-label", "<?php echo $vars['labelBtn'] ?>");
            deleteTplElement(result, ".result-card-calendar-no-amelia");
        }else{
            replaceTplContent(result, "button-label", "Contacter");
        }

        if (!data.types_disponibilites.includes("cabinet")) {
            deleteTplElement(result, ".rdv-type-cabinet");
        }
        if (!data.types_disponibilites.includes("visio")) {
            deleteTplElement(result, ".rdv-type-visio");
        }
        replaceTplContent(result, "langue", langLabel);

        generateCalendarOfCard(result, data);

        resultsContainer.appendChild(result);
    }

    function replaceTplContent(elem, name, value){
        const target = elem.querySelector(`[data-target-tpl="${name}"]`);
        if (target) {
            target.innerText = value;
        }
    }

    function deleteTplElement(elem, selector){
        elem.querySelector(`${selector}`)?.remove();
    }

    function generateCalendarOfCard(elem, data){
        const dayList = elem.querySelector(".days-list");
        dayList.innerHTML = "";
        const today = DateTime.local();
        let firstDay = today;
        if ((filters.first_available && filters.first_available === "next_week") || today.weekday > 5) {
            firstDay = firstDay.minus({ days: today.weekday - 1 }).plus({ weeks: 1 });
        }
        const jours = Array.from({ length: 5 }, (_, i) => firstDay.plus({ days: i }));

        jours.forEach((jour) => {
            const tpl = resultDayTpl.content.cloneNode(true);
            const dayName = jour.setLocale("fr").toFormat("cccc")
            replaceTplContent(tpl, "day-name", dayName.charAt(0).toUpperCase() + dayName.slice(1));
            replaceTplContent(tpl, "day-date", jour.setLocale("fr").toFormat("dd LLL"));
            if(today.ts > jour.ts){
                tpl.querySelector(".available-morning").classList.add("disabled");
                tpl.querySelector(".available-afternoon").classList.add("disabled");
            }else{
                if (!data.dates_disponibility_by_moment.includes(jour.toFormat("yyyy-MM-dd") + "-matin") || (today.hour >= 12 && today.day === jour.day)) {
                    tpl.querySelector(".available-morning").classList.add("disabled");
                }
                if (!data.dates_disponibility_by_moment.includes(jour.toFormat("yyyy-MM-dd") + "-apres-midi")) {
                    tpl.querySelector(".available-afternoon").classList.add("disabled");
                }
            }
            dayList.appendChild(tpl);
        });

    }
</script>

<script>
    // Type effect
    const listWords = <?php echo json_encode($vars['listWords']); ?>;
    const target = document.querySelector("#coopleo-results #coopleo-type-effect");
    const typingDelay = 50;
    const erasingDelay = 25;
    const newTextDelay = 2000;

    let textArrayIndex = 0;
    let charIndex = listWords[0].length;

    function type() {
        if (charIndex < listWords[textArrayIndex].length) {
            target.textContent += listWords[textArrayIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, typingDelay);
        } else {
            setTimeout(erase, newTextDelay);
        }
    }

    function erase() {
        if (charIndex > 0) {
            target.textContent = listWords[textArrayIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(erase, erasingDelay);
        } else {
            textArrayIndex = (textArrayIndex + 1) % listWords.length;
            setTimeout(type, typingDelay);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        if (listWords.length) setTimeout(erase, newTextDelay);
    });
</script>