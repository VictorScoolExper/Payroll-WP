<?php
// Payroll WP by Victor Martinez

/**
 * Plugin Name:         Payroll WP
 * Plugin URI:          https://thenorth.tech
 * Description:         A plugin for handling employee payroll
 * Version:             0.0.1
 * Requires at least:   6.0
 * Requires PHP:        8.0
 * Author:              Victor Martinez
 * License:             Apache License Version 2.0
 * License URI:         https://www.apache.org/licenses/LICENSE-2.0
 * Text Domain:         payroll-wp
 * Domain Path:         /languages
 */

 defined( 'ABSPATH' ) || exit;

// will help us find function
if (!function_exists('add_action')) {
    echo 'Seems like you stumbled';
    exit;
}

// setup directory
define('PR_WP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PR_WP_PLUGIN_FILE', __FILE__);

// glob, searches for the pathnames 
$rootFiles = glob(PR_WP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(PR_WP_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach ($allFiles as $filename) {
    // avoid all duplicates
    include_once($filename);
}

register_activation_hook( __FILE__, 'pr_wp_activate_plugin' );
// add_action('rest_api_init', 'pr_wp_api_init');
