<?php

namespace Boilerplate\Core\Settings;

use Boilerplate\App;
use Boilerplate\Core\PluginException;

/**
 * Get from db all settings
 *
 * For settings using different table.
 * All data from db retrive in the class.
 *
 * Class have associative array with all settings, but
 * user has to access through only getters and setters.
 *
 * @package Training_Qatestlab
 * @author Andrii Dats <andrii.dats@web100.com.ua>
 */
class SettingsBD extends AbstractSettings
{
    /**
     * Name of table for settings
     */
    const TABLE_NAME = 'tq_settings';

    /**
     * Instance of settings
     *
     * @var SettingsBD
     */
    private static $instance = null;

    /**
     * Return instance of settings
     *
     * @return SettingsBD
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Save option to db. If parameter is empty = save all
     *
     * @param string $optionName
     * @return void
     */
    public function save($optionName = '')
    {
        global $wpdb;

        if (empty($optionName)) {
            foreach ($this->settings as $name => $value) {
                $wpdb->replace(strtolower(self::TABLE_NAME), [
                    'name' => $name,
                    'value' => $value
                ]);
            }

            $this->isWillSave = false;
        } else {
            $wpdb->replace(strtolower(self::TABLE_NAME), [
                'name' => $optionName,
                'value' => $this->settings[$optionName]
            ]);
        }
    }

    /**
     * Load settings from db
     *
     * @throws PluginException
     * @return void
     */
    protected function load()
    {
        global $wpdb;

        $sql = '
            SELECT `name`, `value` FROM `' . strtolower(self::TABLE_NAME) . '`;
        ';

        $result = $wpdb->get_results($sql, ARRAY_A);

        if (is_null($result)) {
            throw new PluginException('Cannot get options from db');
        }

        foreach ($result as $setting) {
            $this->settings[$setting['name']] = $setting['value'];
        }
    }

    // CUSTOM SETTERS


    // CUSTOM GETTERS


}
