<?php

class ParticipantsTable
{
    private $dbConfig;

    public function __construct(
        Config $dbConfig
    ){
        $this->dbConfig = $dbConfig;
    }

    public function execute()
    {
        $sql = "CREATE TABLE Participants (
            id INT(6) UNSINED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            position VARCHAR(10),
            
        )";
    }
}