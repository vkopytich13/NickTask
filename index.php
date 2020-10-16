<?php
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'DB.php';
require_once 'DataProcessing.php';


try {
    $pdo = new DB("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $partic = new DataProcessing($pdo);
    $res = $partic->logic();

    $pdo = null;
} catch (PDOException $e) {
    die("Could not connect to the database " . DB_NAME . ": " . $e->getMessage());
}
