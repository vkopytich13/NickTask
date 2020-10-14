<?php

$server = "192.168.10.10";
$dbUser = "homestead";
$dbPassword = "secret";
$dbName = "ntdev";
$tbName = "participants";

$firstUser = [
    'entity_id' => 1,
    'firstname' => 'Mike',
    'lastname' => 'Patterson',
    'email' => 'f',
    'position' => 'president',
    'shares_amount' => '10000',
    'start_date' => 1273449600,
    'parent_id' => 0
];

try {
    $connection = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $checkIfDbExists = $connection->prepare("DESCRIBE participants");

// check if we have the table 'participants'
    if ($checkIfDbExists->execute() === true) {
        echo "Table already exists <br/> ";
        $sqlDataArray = $connection->query("SELECT * FROM {$tbName}")->fetchAll();
        $countDataArray = count($sqlDataArray);

        foreach ($sqlDataArray as $value) {
            if ($value['entity_id'] == 1 && $value['email'] == $firstUser['email']) {
                echo 'Match!';
                if ($countDataArray < 100) {

                } else {
                    die("The program worked successfully!!!");
                }
                exit;
            } else {
                $sqlDeleteFirstRow = $connection->query("DELETE FROM {$tbName}");

                if($sqlDeleteFirstRow) echo "Table is empty!";

                exit;
            }
        }

        // check if we have any rows in table 'participants'

//        if (!empty($sqlFirstRow)) {
////            $firstUserId = $sqlFirstRow['entity_id'];
//
//            if (trim($sqlFirstRow['email']) === $firstUser['email']) {
//                echo 'Have true! Generating data...';
//
//            } else {
//                $sqlDeleteFirstRow = $connection->prepare("DELETE FROM participants WHERE entity_id=:id");
//                $sqlDeleteFirstRow->bindParam(":id", $firstUserId);
//                $sqlDeleteFirstRow->execute();
//
//
//                echo 'bad...';
//            }
//        } else {
//            echo "Table is empty. Creating the first row..." . PHP_EOL;
////            $sqlInsertFirstRow = "INSERT INTO participants (entity_id, firstname, lastname, email, position, shares_amount, start_date, parent_id)
////                                                    VALUES (".$firstUser['entity_id'].", "..")";
//        }

    } else {
        $sqlQuery = "CREATE TABLE participants (
            entity_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(40) NOT NULL,
            lastname VARCHAR(40) NOT NULL,
            email VARCHAR(60) NOT NULL,
            position VARCHAR(40) NOT NULL,
            shares_amount INT(20),
            start_date TIMESTAMP NOT NULL,
            parent_id INT(11) NOT NULL
        )";

        $connection->exec($sqlQuery);
        echo "Table created successfully!";
    }

} catch (PDOException $e) {
    echo "Troubles with connecting to database. Error message: " . $e->getMessage();
}

$connection = null;