<?php

namespace Boilerplate\Admin\Elements;

use Boilerplate\Admin\Elements\Interfaces\IList;

/**
 * Abstract list for render element select
 */
abstract class AbstractList implements IList
{
    /**
     * Id of choosen template
     *
     * @var int|int[]
     */
    private $choosenOptions;

    /**
     * Name of list
     *
     * @var string
     */
    private $name = '';

    /**
     * Classes for element
     *
     * @var string[]
     */
    private $classes = [];

    /**
     * @inheritDoc
     */
    public function render($isReturn = true)
    {
        $html = '<select' . ($this->isMultiple() ? ' multiple size="8"' : '') . ' name="' . $this->name . '" id="' . $this->name . '">';
        $html .= '<option value="">' . __('Choose', 'Boilerplate') . '</option>';

        foreach ($this->getOptions() as $value => $name) {
            $html .= '<option value="' . $value . '"' . ($this->isSelectedOption($value) ? ' selected ' : '') . '>' . $name . '</option>';
        }

        $html .= '</select>';

        if ($isReturn) {
            return $html;
        } else {
            echo $html;
            return '';
        }
    }

    /**
     * @inheritDoc
     */
    public function addClass($className)
    {
        $this->classes[] = $className;
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set selected options values
     *
     * @param mixed|mixed[] $options
     * @return void
     */
    protected function setSelectedOptions($options)
    {
        $this->choosenOptions = $options;
    }

    /**
     * Check if it is element selected
     *
     * @return bool
     */
    private function isSelectedOption($value)
    {
        if (is_array($this->choosenOptions)) {
            return in_array($value, $this->choosenOptions);
        }

        return $value == $this->choosenOptions;
    }

    /**
     * Multiple choosing or not
     *
     * @return bool
     */
    abstract protected function isMultiple();

    /**
     * Get options for element
     *
     * Array where:
     * - key - string, for value of option
     * - value - string, for name of option
     *
     * @return array
     */
    abstract protected function getOptions();
}
