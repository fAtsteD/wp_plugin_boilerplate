<?php

namespace Boilerplate\Admin\Elements;

/**
 * Create input for text
 */
class InputText extends AbstractInput
{
    /**
     * Initialize element
     *
     * @param string $name
     * @param int $value
     */
    public function __construct($name, $value = '')
    {
        $this->setName($name);
        $this->setValue($value);
    }

    /**
     * @inheritDoc
     */
    protected function getType()
    {
        return 'text';
    }

    /**
     * @inheritDoc
     */
    protected function getAdditionalParams()
    {
        return '';
    }
}
