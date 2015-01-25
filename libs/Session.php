<?php

class Session {

    public function __construct() {
        @session_start();
    }


    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }


    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }


    public function __destroy () {
        unset($_SESSION);
        session_destroy();
    }


}
