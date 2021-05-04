<?php

namespace Boilerplate\Admin\Elements\Interfaces;

/**
 * Interface for ane lists input
 */
interface IElement
{
    /**
     * Render element
     *
     * @param bool $isReturn return or render
     * @return string
     */
    public function render($isReturn = true);
}
