<?php

namespace Boilerplate\Admin\Elements;

use Boilerplate\Admin\Elements\Interfaces\IElement;
use Boilerplate\Admin\Elements\Interfaces\IGroup;

/**
 * Abstract group for renedering elements in one group
 */
abstract class AbstractGroup implements IGroup
{
    /**
     * Array of elements for rendering
     *
     * @var IElement
     */
    private $elements = [];

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
     * Create group
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @inheritDoc
     */
    public function render($isReturn = true)
    {
        $html = $this->renderContentBeforeGroup();

        $html .= '<div class="' . $this->getNameGroup() . '">';
        foreach ($this->elements as $element) {
            $html .= $this->renderElement($element);
        }
        $html .= '</div>';

        $html .= $this->renderContentAfterGroup();

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
    public function addElement($element)
    {
        $this->elements[] = $element;
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
     * Name of group element
     *
     * @return string
     */
    abstract protected function getNameGroup();

    /**
     * Render one element for group
     *
     * @param IElement $element
     * @return string
     */
    abstract protected function renderElement($element);

    /**
     * Render html before group
     *
     * @return string
     */
    abstract protected function renderContentBeforeGroup();

    /**
     * Render html after group
     *
     * @return string
     */
    abstract protected function renderContentAfterGroup();
}
