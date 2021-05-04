<?php

namespace Boilerplate\Core;

use Exception;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @package Training_Qatestlab
 * @author Andrii Dats <andrii.dats@web100.com.ua>
 */
class PluginException extends Exception
{
    /**
     * For exception message is required
     *
     * @param string $message
     * @param int $code
     * @param Exception $previous
     */
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Exception to string for sending
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
