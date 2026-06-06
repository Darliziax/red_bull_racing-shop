<?php

session_start();

require_once __DIR__ . '/../src/php/classes/Autoloader.class.php';

Autoloader::register();

require_once __DIR__ . '/../src/php/db/db_pg_connect.php';

$cnx = Connection::getInstance($dsn, $user, $pass);