<?php

namespace Boilerplate\Admin\Elements;

/**
 * List of values
 */
class InputList extends AbstractList
{
    /**
     * Is multiple options
     *
     * @var bool
     */
    private $multiple;

    /**
     * Values for list
     *
     * @var string[]
     */
    private $values;

    /**
     * Initialize list
     *
     * @param string[] $values
     * @param string $name
     * @param string $choosenValue
     * @param bool $isMultiple
     */
    public function __construct($values, $name, $choosenValue, $isMultiple = false)
    {
        $this->values = is_array($values) ? $values : [];
        $this->multiple = $isMultiple;

        $this->setName($name);
        $this->setSelectedOptions($choosenValue);
    }

    /**
     * @inheritDoc
     */
    protected function isMultiple()
    {
        return $this->multiple;
    }

    /**
     * @inheritDoc
     */
    protected function getOptions()
    {
        $options = [];

        foreach ($this->values as $value) {
            $options[$value] = $value;
        }

        return $options;
    }
}
