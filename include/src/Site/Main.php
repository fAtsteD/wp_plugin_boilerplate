<?php

namespace PluginName\Site;

use PluginName\App;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
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
     * Path to public files for templates, styles, scripts
     *
     * @var string
     */
    private $publicDir;

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
        $this->publicDir = App::getPluginDir() . 'site/';
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->pluginName, plugins_url('site/css/plugin-name-public.css', $this->publicDir), array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->pluginName, plugins_url('js/plugin-name-public.js', $this->publicDir), array('jquery'), $this->version, false);
    }
}
