<?php

namespace Boilerplate\Admin\Settings;

use Boilerplate\Core\Settings\AbstractSettings as CoreSettings;

/**
 * Settings page for saving them in settings to the plugin
 */
abstract class AbstractSettings
{
    /**
     * Parameter in form for saving name of settings
     */
    const PARAM_FORM = 'name-setting';

    /**
     * Object for settings of plugin
     *
     * @var CoreSettings
     */
    protected $settings;

    /**
     * Action for ajax request save settings
     *
     * @var string
     */
    private $action;

    /**
     * Dir with templates for admin panel
     *
     * @var string
     */
    private $adminTemplateDir;

    /**
     * Initialize common variables
     *
     * @param CoreSettings $settings
     */
    public function __construct($settings, $adminTemplateDir)
    {
        $this->settings = $settings;
        $this->action = 'qatestlab_save_settings';
        $this->adminTemplateDir = $adminTemplateDir . 'templates/';
    }

    /**
     * Name of action for ajax request
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Save settings through ajax query
     *
     * @return bool
     */
    public function saveSettings()
    {
        $ignoreParams = [
            'action',
            self::PARAM_FORM
        ];

        $relationalValues = $this->getRelationNameValue();

        foreach ($_POST as $name => $value) {
            if (!in_array($name, $ignoreParams)) {
                $newValue = isset($relationalValues[$name]) && isset($relationalValues[$name][$value]) ? $relationalValues[$name][$value] : $value;
                $this->settings->set($name, $newValue);
            }
        }

        $this->settings->save();

        return true;
    }

    /**
     * Parameter where saving setting name
     *
     * @return void
     */
    public function getSettingsNameParam()
    {
        return self::PARAM_FORM;
    }

    /**
     * Return folder in template folder where all settings page saved
     *
     * @return string
     */
    protected function getSubfolderSettingsTemplate()
    {
        return 'settings/';
    }

    /**
     * Render page
     *
     * @return void
     */
    public function render()
    {
        include $this->adminTemplateDir . $this->getPathView();
    }

    /**
     * Name of settings in menus
     *
     * @return string
     */
    abstract public function getName();

    /**
     * Value of param for identify object
     *
     * @return string
     */
    abstract public function getSettingsNameValue();

    /**
     * Return path to view of page
     *
     * @return string
     */
    abstract protected function getPathView();

    /**
     * Array with params and their corresponding value
     *
     * Example, for input name 'test_name' with type checkbox:
     * 'test_name' => [
     *     'on' => true,
     *     '' => false,
     * ]
     *
     * @return array
     */
    abstract protected function getRelationNameValue();
}
