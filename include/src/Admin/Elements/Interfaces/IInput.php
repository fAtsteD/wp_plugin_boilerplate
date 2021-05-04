<?php

namespace Boilerplate\Admin\Elements\Interfaces;

/**
 * Interface for ane lists input
 */
interface IInput extends IElement
{
    /**
     * Get element name. Also it will be used for id
     *
     * @return string
     */
    public function getName();

    /**
     * Set element name. Also it will be used for id
     *
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * Add class to the element
     *
     * @param string $className
     * @return void
     */
    public function addClass($className);
}
