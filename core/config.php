<?php

if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    die(header('HTTP/1.1 403 Forbidden', true, 403));
}

class Config{

    //TDOD: MySQLi(mysqli), SQLite3(sql3), PostgreSQL(psql)
    public static $db = [
        'type' => "none",
        'host' => '',
        'port' => '',
        'user' => '',
        'dbname' => '',
        'password' => '',
        'path' => '',
        'addargs' => ''
    ];

    //TODO: add themes support
    public static $globalTheme = 'none'; //In future
    public static $userTheme = 'none'; //In future

    public static $lang = "uk_ua";
}