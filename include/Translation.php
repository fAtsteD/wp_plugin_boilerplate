<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package PluginName
 * @author Your Name <email@example.com>
 */
class Translation
{
    /**
     * Load the plugin text domain for translation.
     */
    public function loadPluginTextdomain()
    {
        load_plugin_textdomain(
            PluginName::PLUGIN_NAME,
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
