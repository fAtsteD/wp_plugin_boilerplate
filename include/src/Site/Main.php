<?php

namespace Boilerplate\Site;

use Boilerplate\App;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
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
     * Path to public files for templates, styles, scripts
     *
     * @var string
     */
    private $publicDir;

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
        $this->publicDir = $pluginDir . 'site/';
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @return void
     */
    public function enqueueStyles()
    {
        wp_enqueue_style($this->pluginName, plugins_url('site/css/main.min.css', $this->publicDir), array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_script($this->pluginName, plugins_url('site/js/main.js', $this->publicDir), array('jquery'), $this->version, false);
    }
}
