<?php
//require_once 'vendor/autoload.php';
//$faker = Faker\Factory::create();
require_once 'config.php';
require_once 'DB.php';
require_once 'DeletingData.php';

$pdo = new DB("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

$partic = new DeletingData($pdo);

$res = $partic->logic();

var_dump($res);


//try {
//    self::$instance = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS, $opt);
//    echo 'Beautiful connection' . PHP_EOL;
//} catch (PDOException $e) {
//    die("Could not connect to the database " . self::DB_NAME . ": " . $e->getMessage());
//}


//for ($i=0; $i < 100; $i++) {
//    echo $faker->firstName . " " . $faker->lastName . " " . $faker->email;
//    echo "<br>";
//}


//$server = "192.168.10.10";
//$dbUser = "homestead";
//$dbPassword = "secret";
//$dbName = "ntdev";
//$tbName = "participants";
//
//$firstUser = [
//    'entity_id' => 1,
//    'firstname' => 'Mike',
//    'lastname' => 'Patterson',
//    'email' => 'f',
//    'position' => 'president',
//    'shares_amount' => '10000',
//    'start_date' => 1273449600,
//    'parent_id' => 0
//];
//
//try {
//    $connection = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPassword);
//    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $checkIfDbExists = $connection->prepare("DESCRIBE participants");
//
//// check if we have the table 'participants'
//    if ($checkIfDbExists->execute() === true) {
//        echo "Table already exists <br/> ";
//        $sqlDataArray = $connection->query("SELECT * FROM {$tbName}")->fetchAll();
//        $countDataArray = (count($sqlDataArray));
//
//        foreach ($sqlDataArray as $value) {
//            if ($value['entity_id'] == 1 && $value['email'] == $firstUser['email']) {
//                echo 'Good Match!<br>';
//                if ($countDataArray < 100) {
//                    echo "Creating other elements - " . (100 - $countDataArray) . " pieces<br/>";
//                    for () {}
//                } else {
//                    die("The program worked successfully!!!");
//                }
//                exit;
//            } else {
//                $sqlDeleteFirstRow = $connection->query("TRUNCATE TABLE {$tbName}");
//
//                if($sqlDeleteFirstRow) echo "Table is empty!";
//
//                exit;
//            }
//        }
//    } else {
//        $sqlQuery = <<<EOSQL
//            CREATE TABLE IF NOT EXISTS participants (
//                entity_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//                firstname VARCHAR(40) NOT NULL,
//                lastname VARCHAR(40) NOT NULL,
//                email VARCHAR(60) NOT NULL,
//                position VARCHAR(40) NOT NULL,
//                shares_amount INT(20),
//                start_date TIMESTAMP NOT NULL,
//                parent_id INT(11) NOT NULL
//            );
//        EOSQL;
//
//        $connection->exec($sqlQuery);
//        echo "Table created successfully!" . PHP_EOL;
//    }
//
//} catch (PDOException $e) {
//    echo "Troubles with connecting to database. Error message: " . $e->getMessage();
//}
//
//$connection = null;

