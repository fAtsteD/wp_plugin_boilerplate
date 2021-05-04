<?php

namespace Boilerplate\Core\Settings;

use Boilerplate\App;

/**
 * Abstract settings class for different storage of settings
 *
 * @package Boilerplate
 */
abstract class AbstractSettings
{
    /**
     * Settings from variable WP. For setter and getter have to be transformed
     *
     * Key - name of setting
     * Value - anything, that can be serialized
     *
     * @var array
     */
    protected $settings = [];

    /**
     * Save settings if value true in destructor
     *
     * @var bool
     */
    private $isWillSave = false;

    /**
     * Construct load all raw settings
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     * Save settings to db if set was called once
     */
    public function __destruct()
    {
        if ($this->isWillSave) {
            $this->save();
        }
    }

    /**
     * Get value of option
     *
     * If option has special gettet than it uses it or return raw.
     * Special method has name get[]
     *
     * @param string $optionName
     * @return mixed
     */
    public function get($optionName)
    {
        $optionMethod = 'get';
        $optionWords = explode('_', $optionName);
        if (count($optionWords) > 1) {
            array_map('ucfirst', $optionWords);
            $optionMethod .= implode('', $optionWords);
        }

        if ($optionMethod !== 'get' && method_exists($this, $optionMethod)) {
            return $this->$optionMethod();
        } else {
            return $this->settings[$optionName];
        }
    }

    /**
     * Set value of option
     *
     * If option has special settet than it uses it or setting raw.
     * Special method has name get[]
     *
     * @param string $optionName
     * @return mixed
     */
    public function set($optionName, $optionValue)
    {
        $this->isWillSave = true;

        $optionMethod = 'set';
        $optionWords = explode('_', $optionName);
        if (count($optionWords) > 1) {
            array_map('ucfirst', $optionWords);
            $optionMethod .= implode('', $optionWords);
        }

        if ($optionMethod !== 'set' && method_exists($this, $optionMethod)) {
            $this->$optionMethod($optionValue);
        } else {
            $this->settings[$optionName] = $optionValue;
        }
    }

    /**
     * Load settings
     *
     * @return void
     */
    abstract protected function load();

    /**
     * Save all options
     *
     * @return void
     */
    abstract public function save();
}
