<?php

namespace Boilerplate\Admin\Elements;

/**
 * Create input for checkbox
 */
class InputCheckbox extends AbstractInput
{
    /**
     * Is checkbox on
     *
     * @var bool
     */
    private $isChecked;

    /**
     * Initialize element
     *
     * @param string $name
     * @param bool $isChecked
     * @param string $value
     */
    public function __construct($name, $isChecked = false, $value = '')
    {
        $this->setName($name);
        $this->setValue($value);
        $this->isChecked = $isChecked;
    }

    /**
     * @inheritDoc
     */
    protected function getType()
    {
        return 'checkbox';
    }

    /**
     * @inheritDoc
     */
    protected function getAdditionalParams()
    {
        return $this->isChecked ? 'checked' : '';
    }
}
