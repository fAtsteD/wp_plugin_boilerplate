<?php

namespace Boilerplate\Core;

/**
 * Fired during plugin uninstalling.
 *
 * This class defines all code necessary to run during the plugin's uninstalletion.
 *
 * @package Boilerplate
 * @author Your Name <email@example.com>
 */
class Uninstaller
{
    /**
     * Method running for activating plugin
     *
     * @return void
     */
    public static function uninstall()
    {
        $instance = new self();
    }
}
