<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since 1.0.0
 * @package PluginName
 * @author Your Name <email@example.com>
 */
class PluginName
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
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/Loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/Translation.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/Admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/Public.php';

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
        $pluginAdmin = new PluginAdmin(self::PLUGIN_NAME, $this->getVersion());

        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueue_styles');
        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueue_scripts');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     */
    private function definePublicHooks()
    {
        $pluginPublic = new PluginPublic(self::PLUGIN_NAME, $this->getVersion());

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
    public function getPluginName()
    {
        return $this->pluginName;
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
