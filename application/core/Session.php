<?php

/**
 * Class Session
 * Responsible for dealing with setting, getting and deleting of session variables, starts a session when initialised.
 */
class Session
{

    /**
     * Start a session when a new instance of the session class is instantiated.
     */
    public function __construct()
    {
        @session_start();
    }


    /**
     * Sets a session variable with key of $key and value of $value
     * @param string $key
     * @param string $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    /**
     * Returns the value stored in the session variable $key or null if that key does not exist
     * @param string $key
     * @return mixed
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }


    /**
     * @param string $key deletes the session variable with key of $key
     */
    public static function delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }


    /**
     * Unset the session superglobal and destroy the session.
     */
    public function __destroy()
    {
        unset($_SESSION);
        session_destroy();
    }


}
