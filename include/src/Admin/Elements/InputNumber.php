<?php

namespace Boilerplate\Admin\Elements;

/**
 * Create input for number
 */
class InputNumber extends AbstractInput
{
    /**
     * Initialize element
     *
     * @param string $name
     * @param int $value
     */
    public function __construct($name, $value)
    {
        $this->setName($name);
        $this->setValue(is_numeric($value) ? $value : 0);
    }

    /**
     * @inheritDoc
     */
    protected function getType()
    {
        return 'number';
    }

    /**
     * @inheritDoc
     */
    protected function getAdditionalParams()
    {
        return '';
    }
}
