<?php

namespace PluginName;

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
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @var Loader
     */
    private $loader;

    /**
     * The unique identifier of this plugin.
     * It can be use like unique name for data related to plugin.
     */
    private $pluginName;

    /**
     * The current version of the plugin.
     *
     * @var string
     */
    private $version;

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
        $this->pluginName = 'plugin-name';

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
     */
    private function loadDependencies()
    {
        $this->loader = new Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     */
    private function setLocale()
    {
        $pluginTranslation = new Translation();

        $this->loader->addAction('plugins_loaded', $pluginTranslation, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     */
    private function defineAdminРooks()
    {
        $pluginAdmin = new Main($this->pluginName, $this->getVersion());

        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueue_styles');
        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueue_scripts');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     */
    private function definePublicHooks()
    {
        $pluginPublic = new PluginPublic($this->pluginName, $this->getVersion());

        $this->loader->addAction('wp_enqueue_scripts', $pluginPublic, 'enqueue_styles');
        $this->loader->addAction('wp_enqueue_scripts', $pluginPublic, 'enqueue_scripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return string
     */
    public static function getPluginName()
    {
        return $this->pluginName;
    }

    /**
     * Return path to the plugin dir. Unified using from all files
     *
     * @return string
     */
    public static function getPluginDir()
    {
        return PLUGIN_NAME_DIR;
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
