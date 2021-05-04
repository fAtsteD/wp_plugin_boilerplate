<?php

namespace Boilerplate\Admin\Settings;

/**
 * Additional methods for settings page
 */
class Settings extends AbstractSettings
{
    /**
     * @inheritDoc
     */
    public function getSettingsNameValue()
    {
        return 'settings-main';
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'Main';
    }

    /**
     * @inheritDoc
     */
    protected function getPathView()
    {
        return $this->getSubfolderSettingsTemplate() . 'main.php';
    }

    /**
     * @inheritDoc
     */
    protected function getRelationNameValue()
    {
        return [
            'schedule_on' => [
                'on' => true,
                '' => false,
            ]
        ];
    }
}
