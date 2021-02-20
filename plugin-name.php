<?php

use PluginName\App;
use PluginName\Core\Activator;
use PluginName\Core\Deactivator;
use PluginName\Core\Uninstaller;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since 1.0.0
 * @package PluginName
 *
 * @wordpress-plugin
 * Plugin Name: WordPress Plugin Boilerplate
 * Plugin URI: http://example.com/plugin-name-uri/
 * Description: This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version: 1.0.0
 * Author: Your Name or Your Company
 * Author URI: http://example.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: plugin-name
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 */
define('PLUGIN_NAME_VERSION', '1.0.0');

/**
 * Plugin directory
 */
define('PLUGIN_NAME_DIR', plugin_dir_path(__FILE__));

/**
 * Include composer autoload
 */
include PLUGIN_NAME_DIR . 'vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Activator.php
 *
 * @return void
 */
function activatePluginName()
{
    Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/Deactivator.php
 *
 * @return void
 */
function deactivatePluginName()
{
    Deactivator::deactivate();
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Activator.php
 *
 * @return void
 */
function uninstallPluginName()
{
    Uninstaller::uninstall();
}

register_activation_hook(__FILE__, 'activatePluginName');
register_deactivation_hook(__FILE__, 'deactivatePluginName');
register_uninstall_hook(__FILE__, 'uninstallPluginName');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @return void
 */
function runPluginName()
{
    $plugin = new App();
    $plugin->run();
}
runPluginName();
