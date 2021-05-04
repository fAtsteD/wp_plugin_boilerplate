<?php

namespace Boilerplate\Core\Session;

use Boilerplate\App;

/**
 * Interface and some methods for working with session from class
 *
 * @package Training_Qatestlab
 * @author Andrii Dats <andrii.dats@web100.com.ua>
 */
abstract class AbstractSessionData
{
    /**
     * Session name for data from class
     *
     * @var string
     */
    private $sessionName;

    /**
     * Array that saved in session for class
     *
     * @var array
     */
    protected $sessionData;

    protected function __construct()
    {
        $this->sessionName = App::PLUGIN_NAME;
        $this->sessionData = [];

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION[$this->sessionName][$this->getSessionName()])) {
            $this->sessionData = $_SESSION[$this->sessionName][$this->getSessionName()];
        }

        add_action('init', [$this, 'setUpdateSessionData']);
    }

    public function __destruct()
    {
        $this->updateSessionData();
    }

    /**
     * Run function in the hook of WP 'init'
     *
     * @return void
     */
    public function setUpdateSessionData()
    {
        $this->setSessionData();
        $this->updateSessionData();
    }

    /**
     * Update saved data in the session
     *
     * @return void
     */
    protected function updateSessionData()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION[$this->sessionName][$this->getSessionName()] = $this->sessionData;
    }

    /**
     * Save data in session in the hook WP 'init'
     *
     * @return void
     */
    abstract protected function setSessionData();

    /**
     * Unique name for saving in plugin namespace unique data through the class
     *
     * @return string
     */
    abstract protected function getSessionName();
}
