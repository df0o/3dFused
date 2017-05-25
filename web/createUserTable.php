<?php
   $servername = "localhost:3306";
   $username = "3dfused";
   $password = "lamabatterynexus";
   $dbname = "3dfused_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create User table
    $sql = "CREATE TABLE User (
    id            INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username      VARCHAR(20)     UNIQUE NOT NULL,
    passhash      CHAR(128)       NOT NULL,
    create_date   TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    email         VARCHAR(255)    UNIQUE NOT NULL,
    name          VARCHAR(255)    NOT NULL,
    age           INT(3)          NOT NULL,
    bday          DATETIME        NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table User created successfully";

    $sql = "CREATE TABLE Post (
    id            INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid        INT             NOT NULL,
    create_date   TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    title         VARCHAR(255)         NOT NULL,
    content       VARCHAR(1000)        NOT NULL,
    printer       VARCHAR(255)         NOT NULL,
    lat           VARCHAR(20)         NOT NULL,
    lon           VARCHAR(20)         NOT NULL,
    website       VARCHAR(255)
    )";

    $conn->exec($sql);
    echo "Table User created successfully";

    $sql = "CREATE TABLE Review (
    id            INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    postid        INT             NOT NULL,
    userid        INT             NOT NULL,
    create_date   TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    content       VARCHAR(255)         NOT NULL,
    rating        int(1)          NOT NULL        
    )";

    $conn->exec($sql);
    echo "Table User created successfully";
}

catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
