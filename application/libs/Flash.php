<?php


/**
 * Class Flash
 * Responsible for flash messaging, a flash message
 * in HelgeMVC is a session based flash message which will
 * only be displayed once, then deleted
 */
class Flash
{

    /**
     * @var bool if there are any flash messages to display
     */
    public static $hasMessage = false;

    /**
     * @param string $message sets a flash message
     */
    public static function set($message)
    {
        Session::set("flash", $message);
        self::$hasMessage = true;
    }


    /**
     * Gets the flash message and unsets it.
     * @return mixed the flash message string or null
     */
    public static function get()
    {
        $tmp = Session::get("flash");
        Session::delete("flash");
        self::$hasMessage = false;
        return $tmp;
    }


}