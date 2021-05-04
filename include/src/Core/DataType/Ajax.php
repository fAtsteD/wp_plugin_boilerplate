<?php

namespace Boilerplate\Core\DataType;

use Boilerplate\App;

/**
 * Class that contain all information for one ajax that need to registrate.
 *
 * @package Training_Qatestlab
 * @author Andrii Dats <andrii.dats@web100.com.ua>
 */
class Ajax
{
    /**
     * Is privelage action registrate
     *
     * @var bool
     */
    private $isPriv;

    /**
     * Action name
     *
     * Name without prefixes.
     *
     * @var string
     */
    private $action;

    /**
     * Object for hook
     *
     * @var object|string
     */
    private $object;

    /**
     * Function. It has to be convinced with functions in wp for actions
     *
     * @var string
     */
    private $function;

    /**
     * Priority for hook
     *
     * @var int
     */
    private $priority;

    /**
     * Define params
     *
     * @param string $action will be prefixed
     * @param array|string $function has to be convinced with functions in wp for actions
     * @param bool $isPriv
     */
    public function __construct($action, $object, $function, $isPriv = false, $priority = 10)
    {
        $this->action = $action;
        $this->object = $object;
        $this->function = $function;
        $this->isPriv = $isPriv;
        $this->priority = $priority;
    }

    /**
     * Return action name for ajax query
     *
     * @return string
     */
    public function getActionName()
    {
        return App::PLUGIN_NAME . $this->action;
    }

    /**
     * Name of hook for registrate
     *
     * @return string
     */
    public function getHookName()
    {
        $action = 'wp_ajax_';
        $action .= $this->isPriv ? '' : 'nopriv_';
        $action .= App::PLUGIN_NAME . '_';
        $action .= $this->action;

        return $action;
    }

    /**
     * Return funtion for hook
     *
     * @return object|string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Return funtion for hook
     *
     * @return array|string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Return priority for action
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
