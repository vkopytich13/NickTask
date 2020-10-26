<?php

require_once 'vendor/autoload.php';
require_once 'Setup/ConfigReader.php';
require_once 'DB.php';
$config = require_once 'Config/Config.php';

$dbConfig = new ConfigReader($config);

echo '<pre>';
var_dump($dbConfig->getPresident());
echo '</pre>';

try {
    $pdo = new DB("mysql:host=".$dbConfig->getHostName().";dbname=".$dbConfig->getDBName(), $dbConfig->getUserName(), $dbConfig->getUserPassword());
    var_dump($pdo);

    $pdo = null;
} catch (PDOException $e) {
    die("Could not connect to the database " . $dbConfig->getDBName() . ": " . $e->getMessage());
}
