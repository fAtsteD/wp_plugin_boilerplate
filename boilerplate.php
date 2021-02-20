<?php

use Boilerplate\App;
use Boilerplate\Core\Activator;
use Boilerplate\Core\Deactivator;
use Boilerplate\Core\Uninstaller;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since 1.0.0
 * @package Boilerplate
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
 * Include composer autoload
 */
include_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Activator.php
 *
 * @return void
 */
function activateBoilerplate()
{
    Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/Deactivator.php
 *
 * @return void
 */
function deactivateBoilerplate()
{
    Deactivator::deactivate();
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Activator.php
 *
 * @return void
 */
function uninstallBoilerplate()
{
    Uninstaller::uninstall();
}

register_activation_hook(__FILE__, 'activateBoilerplate');
register_deactivation_hook(__FILE__, 'deactivateBoilerplate');
register_uninstall_hook(__FILE__, 'uninstallBoilerplate');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @return void
 */
function runBoilerplate()
{
    $plugin = new App(
        [
            'version' => '1.0.0',
            'pluginDir' => plugin_dir_path(__FILE__),
        ]
    );
    $plugin->run();
}
runBoilerplate();
