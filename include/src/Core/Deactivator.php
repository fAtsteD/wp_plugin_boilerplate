<?php

namespace Boilerplate\Core;

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @package Boilerplate
 * @author Your Name <email@example.com>
 */
class Deactivator
{
    /**
     * Method running for deactivating plugin
     *
     * @return void
     */
    public static function deactivate()
    {
        $instance = new self();
    }
}
