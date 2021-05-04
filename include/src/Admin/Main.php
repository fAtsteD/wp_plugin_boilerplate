<?php

namespace Boilerplate\Admin;

use Boilerplate\App;
use Boilerplate\Admin\Settings\FactorySettings;

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
        wp_enqueue_style($this->pluginName, plugins_url('admin/css/admin.min.css', $this->adminDir), array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_script($this->pluginName, plugins_url('admin/js/admin.js', $this->adminDir), array('jquery'), $this->version, false);
    }


    /**
     * Add menu to admin panel
     *
     * @return void
     */
    public function registerPage()
    {
        add_menu_page(
            'QATestLab',
            'QATestLab',
            'edit_pages',
            $this->pluginName,
            function () {
                echo '<h2>Choose one of subpages</h2>';
            },
            '',
            81
        );

        FactorySettings::registerPages($this->pluginName, $this->adminDir);
    }

    /**
     * Save settings through ajax query
     *
     * @return void
     */
    public function saveSettings()
    {
        $result = [
            'status' => 'error',
        ];

        $settings = FactorySettings::getSettingByFormParam($this->adminDir);

        if (is_user_logged_in()) {
            $result = [
                'status' => ($settings->saveSettings() ? 'success' : 'error'),
            ];
        }

        wp_send_json($result);
    }
}
