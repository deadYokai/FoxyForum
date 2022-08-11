<?php

if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    die(header('HTTP/1.1 403 Forbidden', true, 403));
}

//TDOD: MySQLi(mysqli), SQLite3(sql3), PostgreSQL(psql)
$db = [
    'type' => "none",
    'host' => '',
    'port' => '',
    'user' => '',
    'dbname' => '',
    'password' => '',
    'path' => '',
    'addargs' => ''
];

$theme = 'none'; //In future
$lang = "uk_ua";
