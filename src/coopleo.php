<?php

/**
 * Plugin Name: Coopleo
 * Description: Add powerfull search engine on website
 * Version: 1.0.1
 * Author: AtomikAgency
 * Author URI: https://atomikagency.fr/
 */

define('COOPLEO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('COOPLEO_PLUGIN_URL', plugin_dir_url(__FILE__));

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

require_once COOPLEO_PLUGIN_DIR . 'update-checker.php';