<?php

namespace Boilerplate\Admin\Elements\Interfaces;

/**
 * Interface for group of elements
 */
interface IGroup extends IInput
{
    /**
     * Add element to the group
     *
     * @param IElement $element
     * @return void
     */
    public function addElement($element);
}
