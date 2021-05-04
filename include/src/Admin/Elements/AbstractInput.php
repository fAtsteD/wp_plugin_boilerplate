<?php

namespace Boilerplate\Admin\Elements;

use Boilerplate\Admin\Elements\Interfaces\IInput;

/**
 * Abstract for input element
 */
abstract class AbstractInput implements IInput
{
    /**
     * Name of list
     *
     * @var string
     */
    private $name = '';

    /**
     * Value of input
     *
     * @var string
     */
    private $value = '';

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
        $html = '';

        $html .= '<input';
        $html .= ' type="' . $this->getType() . '"';
        $html .= ' name="' . $this->getName() . '" id="' . $this->getName() . '"';
        $html .= empty($this->value) ? '' : ' value="' . $this->value . '"';
        $html .= empty($this->classes) ? '' : ' class="' . implode(' ', $this->classes) . '"';

        $html .= ' ' . $this->getAdditionalParams();

        $html .= '>';

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
     * Value of input
     *
     * @return string
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Type of input
     *
     * @return string
     */
    abstract protected function getType();

    /**
     * Additional params that printed under input tag
     *
     * @return string
     */
    abstract protected function getAdditionalParams();
}
