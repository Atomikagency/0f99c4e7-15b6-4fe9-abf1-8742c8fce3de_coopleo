<?php

/**
 * Plugin Name: Coopleo
 * Description: Add powerful search engine on website
 * Version: 1.0.43
 * Author: Kevin JANIKY
 * Author URI: https://kevinjaniky.fr/
 */

define('COOPLEO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('COOPLEO_PLUGIN_URL', plugin_dir_url(__FILE__));
define('COOPLEO_SEARCH_PAGE_RESULT', 52111);
define('COOPLEO_API_ENDPOINT','https://coopleo.api.demo.atomikagency.fr/api/search');
define('COOPLEO_API_ENDPOINT_BASE','https://coopleo.api.demo.atomikagency.fr');
//define('COOPLEO_API_ENDPOINT','https://coopleo_backend.test/api/search');
define('COOPLEO_API_ENDPOINT_AI','https://coopleo.api.demo.atomikagency.fr/api/ia_autocomplete');

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

require_once  COOPLEO_PLUGIN_DIR.'/includes/therapeute.api.php';
require_once  COOPLEO_PLUGIN_DIR.'/includes/shortcodes/search.php';
require_once  COOPLEO_PLUGIN_DIR.'/includes/shortcodes/result.php';
require_once  COOPLEO_PLUGIN_DIR.'/includes/welcome-email-on-register.php';
require_once  COOPLEO_PLUGIN_DIR.'/includes/admin.php';



require_once COOPLEO_PLUGIN_DIR . 'update-checker.php';

function ta_enqueue_styles()
{
    wp_enqueue_style('coopleo-search', COOPLEO_PLUGIN_URL . 'assets/css/search.css', [], '1.9.1');
    wp_enqueue_style('coopleo-results', COOPLEO_PLUGIN_URL . 'assets/css/results.css', [], '1.9.1');
    wp_enqueue_style('coopleo-dual-range', COOPLEO_PLUGIN_URL . 'assets/css/dual-range.css', [], '1.9.1');
    wp_enqueue_script_module('coopleo-dual-range-input', COOPLEO_PLUGIN_URL . 'assets/js/dual-range-input.js', [], '1.9.1');
}

add_action('wp_enqueue_scripts', 'ta_enqueue_styles');