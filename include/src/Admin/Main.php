<?php

namespace PluginName\Admin;

use PluginName\App;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package PluginName
 * @author Your Name <email@example.com>
 */
class Main
{
    /**
     * The ID of this plugin.
     *
     * @var string
     */
    private $pluginName;

    /**
     * The version of this plugin.
     *
     * @var string
     */
    private $version;

    /**
     * Path to admin files for templates, styles, scripts
     *
     * @var string
     */
    private $adminDir;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name
     * @param string $version
     */
    public function __construct($pluginName, $version)
    {
        $this->pluginName = $pluginName;
        $this->version = $version;
        $this->adminDir = App::getPluginDir() . 'admin/';
    }

    /**
     * Register the stylesheets for the admin area.
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->pluginName, plugins_url('css/plugin-name-admin.css', $this->adminDir), array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->pluginName, plugins_url('js/plugin-name-admin.js', $this->adminDir), array('jquery'), $this->version, false);
    }
}
