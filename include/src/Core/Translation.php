<?php

namespace Boilerplate\Core;

use Boilerplate\App;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package Boilerplate
 * @author Your Name <email@example.com>
 */
class Translation
{
    /**
     * Load the plugin text domain for translation.
     *
     * @return void
     */
    public function loadPluginTextdomain($pluginDir)
    {
        load_plugin_textdomain(
            App::PLUGIN_NAME,
            false,
            $pluginDir . 'languages/'
        );
    }
}
