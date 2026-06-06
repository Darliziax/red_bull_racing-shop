<?php

class Connection {

    private static $instance = null;
    private $cnx;

    private function __construct($dsn, $user, $pass) {
        try {
            $this->cnx = new PDO($dsn, $user, $pass);
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur de connexion : " . $e->getMessage();
        }
    }

    public static function getInstance($dsn, $user, $pass) {
        if (self::$instance === null) {
            self::$instance = new Connection($dsn, $user, $pass);
        }

        return self::$instance->cnx;
    }
}