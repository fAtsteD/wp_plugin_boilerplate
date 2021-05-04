<?php

namespace Boilerplate\Core\Settings;

use Boilerplate\App;

/**
 * Class with settings for plugin/site
 *
 * Save settings in the WP.
 * Instance can be used anywhere.
 * For adding settings see README.md of plugin.
 *
 * @package Boilerplate
 */
class SettingsWP extends AbstractSettings
{
    /**
     * Instance of settings
     *
     * @var SettingsWP
     */
    private static $instance = null;

    /**
     * Return instance of settings. Use it for avoiding reload settings
     *
     * @return SettingsWP
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @inheritDoc
     */
    public function save()
    {
        update_option(App::PLUGIN_NAME, $this->settings);
    }

    /**
     * @inheritDoc
     */
    protected function load()
    {
        $this->settings = get_option(App::PLUGIN_NAME, []);
    }

    // CUSTOM SETTERS


    // CUSTOM GETTERS


}
