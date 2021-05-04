<?php

namespace Boilerplate\Admin\Settings;

use Boilerplate\Core\Settings\SettingsBD as CoreSettingsBD;
use Boilerplate\Core\Settings\SettingsWP as CoreSettingsWP;

/**
 * Factory for recreate right object for setting
 */
class FactorySettings
{
    /**
     * Instance of object
     *
     * @var FactorySettings
     */
    private static $instance = null;

    /**
     * Name of classes for settings
     *
     * @var AbstractSettings[]
     */
    private $objectSettings;

    /**
     * Initialize objects
     *
     * @param string $adminTemplateDir
     * @return void
     */
    private function __construct($adminTemplateDir)
    {
        $this->objectSettings = [
            new Settings(CoreSettingsBD::getInstance(), $adminTemplateDir),
        ];
    }

    /**
     * Initialize object
     *
     * @return void
     */
    private static function init($adminTemplateDir)
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($adminTemplateDir);
        }
    }

    /**
     * Return settings through POST param for settings
     *
     * @param string $adminTemplateDir
     * @return AbstractSettings|null
     */
    public static function getSettingByFormParam($adminTemplateDir)
    {
        self::init($adminTemplateDir);

        return self::$instance->getByFormParam();
    }

    /**
     * Register pages
     *
     * @param string $adminTemplateDir
     * @param string $pluginName
     * @return void
     */
    public static function registerPages($pluginName, $adminTemplateDir)
    {
        self::init($adminTemplateDir);

        self::$instance->registrate($pluginName);
    }

    /**
     * Return settings through POST param for settings
     *
     * @param CoreSettings $settings
     * @return AbstractSettings|null
     */
    private function getByFormParam()
    {
        if (isset($_POST[AbstractSettings::PARAM_FORM])) {
            foreach ($this->objectSettings as $objectSetting) {
                if ($objectSetting->getSettingsNameValue() == $_POST[AbstractSettings::PARAM_FORM]) {
                    return $objectSetting;
                }
            }
        }

        return null;
    }

    /**
     * Register pages for settings in admin panel
     *
     * @param string $pluginName
     * @return void
     */
    private function registrate($pluginName)
    {
        foreach (self::$instance->objectSettings as $objectSetting) {
            add_submenu_page(
                $pluginName,
                $objectSetting->getName(),
                $objectSetting->getName(),
                'edit_pages',
                $pluginName . '_' . $objectSetting->getSettingsNameValue(),
                [$objectSetting, 'render']
            );
        }
    }
}
