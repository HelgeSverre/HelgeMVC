<?php


/**
 * Class Flash
 * Responsible for flash messaging, a flash message
 * in HelgeMVC is a session based flash message which will
 * only be displayed once, then deleted
 */
class Flash {

    /**
     * @param string $message sets a flash message
     */
    public static function set($message) {
        Session::set("flash", $message);
    }


    /**
     * @return bool whether or not there are a flash message
     */
    public static function hasMessage() {
        return !is_null(Session::get("flash")) ? true : false;
    }

    /**
     * Gets the flash message and unsets it.
     * @return mixed the flash message string or null
     */
    public static function get() {
        $tmp = Session::get("flash");
        Session::delete("flash");
        return $tmp;
    }


}