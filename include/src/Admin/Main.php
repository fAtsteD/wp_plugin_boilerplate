<?php

namespace Boilerplate\Admin;

use Boilerplate\App;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package Boilerplate
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
     * @param string $pluginDir
     * @param string $version
     */
    public function __construct($pluginDir, $version)
    {
        $this->pluginName = App::PLUGIN_NAME;
        $this->version = $version;
        $this->adminDir = $pluginDir . 'admin/';
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @return void
     */
    public function enqueueStyles()
    {
        wp_enqueue_style($this->pluginName, plugins_url('admin/css/main.min.css', $this->adminDir), array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_script($this->pluginName, plugins_url('admin/js/main.js', $this->adminDir), array('jquery'), $this->version, false);
    }
}
