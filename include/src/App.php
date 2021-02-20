<?php

namespace PluginName;

use PluginName\Core\Loader;
use PluginName\Core\Translation;
use PluginName\Admin\Main as PluginAdmin;
use PluginName\Site\Main as PluginPublic;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @package PluginName
 * @author Your Name <email@example.com>
 */
class App
{
    /**
     * The unique identifier of this plugin.
     *
     * @var string
     */
    const PLUGIN_NAME = 'plugin-name';

    /**
     * The current version of the plugin.
     *
     * @var string
     */
    protected $version;

    /**
     * Root of plugin
     *
     * @var string
     */
    protected $pluginDir;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     */
    public function __construct()
    {
        if (defined('PLUGIN_NAME_VERSION')) {
            $this->version = PLUGIN_NAME_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->pluginDir = PLUGIN_NAME_DIR;

        $this->loadDependencies();
        $this->setLocale();
        $this->defineAdminРooks();
        $this->definePublicHooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     * - Loader - Orchestrates the hooks of the plugin.
     * - Translation - Defines internationalization functionality.
     * - Admin - Defines all hooks for the admin area.
     * - Public - Defines all hooks for the public side of the site.
     *
     * @return void
     */
    private function loadDependencies()
    {
        $this->loader = new Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * @return void
     */
    private function setLocale()
    {
        $pluginTranslation = new Translation($this->getPluginDir());

        $this->loader->addAction('plugins_loaded', $pluginTranslation, 'loadPluginTextdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @return void
     */
    private function defineAdminРooks()
    {
        $pluginAdmin = new PluginAdmin($this->getPluginDir(), $this->getVersion());

        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueueStyles');
        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueueScripts');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @return void
     */
    private function definePublicHooks()
    {
        $pluginPublic = new PluginPublic($this->getPluginDir(), $this->getVersion());

        $this->loader->addAction('wp_enqueue_scripts', $pluginPublic, 'enqueueStyles');
        $this->loader->addAction('wp_enqueue_scripts', $pluginPublic, 'enqueueScripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * Return path to the plugin dir. Unified using from all files
     *
     * @return string
     */
    public function getPluginDir()
    {
        return $this->pluginDir;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return Loader
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
