<?php

class Autoloader {

    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class) {
        $file = __DIR__ . '/' . $class . '.class.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
}