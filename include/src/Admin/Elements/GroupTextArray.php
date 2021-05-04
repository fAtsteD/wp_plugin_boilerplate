<?php

namespace Boilerplate\Admin\Elements;

/**
 * Create group of textfields like array
 */
class GroupTextArray extends AbstractGroup
{
    /**
     * Iterate throug element when print them
     *
     * @var bool
     */
    private $iterateElement;

    /**
     * Number for iterate when print
     *
     * @var int
     */
    private $iterateElementNumber;

    /**
     * Create group
     *
     * @param string $name
     * @param bool $iterateElement print number near the element
     */
    public function __construct($name, $iterateElement = false)
    {
        $this->iterateElement = $iterateElement;

        parent::__construct($name);
    }

    /**
     * Add only elements of type text. You need give value
     *
     * @param string $value
     * @return void
     */
    public function addElement($value = '')
    {
        $element = new InputText($this->getName() . '[]', $value);
        $element->addClass('regular-text');
        parent::addElement($element);
    }

    /**
     * @inheritDoc
     */
    protected function renderContentBeforeGroup()
    {
        $this->iterateElementNumber = 1;
        return '';
    }

    /**
     * @inheritDoc
     */
    protected function renderElement($element)
    {
        $html = '';
        $html .= '<div class="row-' . $this->getName() . '">';
        $html .= $this->renderElementRaw($element);
        $html .= '</div>';

        $this->iterateElementNumber++;

        return $html;
    }

    /**
     * @inheritDoc
     */
    protected function renderContentAfterGroup()
    {
        $html = '';

        $element = new InputText($this->getName() . '[]');
        $element->addClass('regular-text');

        $html .= '<button class="add-element" onclick="';
        $html .= 'addElementToGroup(\'' . $this->getNameGroup() . '\', \'' . str_replace('"', '\\\'', $this->renderElementRaw($element)) . '\');return false;';
        $html .= '"><i class="fa fa-plus"></i></button>';

        return $html;
    }

    /**
     * @inheritDoc
     */
    protected function getNameGroup()
    {
        return 'group-' . $this->getName();
    }

    /**
     * Render element without holder
     *
     * @param InputText $element
     * @return string
     */
    private function renderElementRaw($element)
    {
        $deleteBtn = '<button class="delete-element" onclick="this.parentElement.remove(); return false;"><i class="fa fa-trash"></i></button>';

        $html = '';
        $html .= $this->iterateElement ? '<span class="id">' . $this->iterateElementNumber . '. </span>' : '';
        $html .= $element->render();
        $html .= $deleteBtn;

        return $html;
    }
}
