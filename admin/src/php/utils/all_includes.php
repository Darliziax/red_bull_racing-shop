<?php

session_start();

require_once __DIR__ . '/../classes/Autoloader.class.php';

Autoloader::register();

require_once __DIR__ . '/../db/db_pg_connect.php';

$cnx = Connection::getInstance($dsn, $user, $pass);