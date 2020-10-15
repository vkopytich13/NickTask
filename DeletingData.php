<?php
require_once 'config.php';

class DeletingData
{
    private $database = null;
    private $table = "participants";
    private $userEmail = "f@mail.com";

    public function __construct(DB $database)
    {
        $this->database = $database;
    }

    public function logic()
    {
        $arraySource = $this->database->run("SELECT * FROM {$this->table}")->fetchAll();
        var_dump($arraySource);
        $countRows = self::getArraySize($arraySource);

        if ($countRows) {
            $row = self::checkMainRow(1, $arraySource);
            var_dump($row);
            if (!empty($row)) {
                echo 'GOOD!';
            } else {
                $this->deletingData();
            }
//            if ($arraySource['email'] == $this->userEmail) {
//                echo "match - {$arraySource['email']}<br>";
//                if (self::$countRows < 100)
//                    echo 100 - self::$countRows;
//            }
        } else {
            echo "Your table '{$this->table}' is empty";
//            generating new table
        }
    }

    public static function getArraySize($array) : int
    {
        return count($array);
    }

    public static function checkMainRow($id, $array)
    {
        foreach ($array as $key => $value) {
            if ($value['entity_id'] == $id && $value['email'] == 'f@mail.com') {
                return $value;
            } else {
                return false;
            }
        }
    }

    public function deletingData()
    {
        $arraySource = $this->database->run("TRUNCATE TABLE {$this->table}");
        var_dump();
    }

}