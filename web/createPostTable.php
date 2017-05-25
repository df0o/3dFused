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
    $sql = "CREATE TABLE Postt (
    id            INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid        INT             NOT NULL,
    create_date   TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    title         VARCHAR         NOT NULL,
    content       VARCHAR         NOT NULL,
    printer       VARCHAR         NOT NULL,
    lat           VARCHAR         NOT NULL,
    lon           VARCHAR         NOT NULL,
    website       VARCHAR
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table User created successfully";
}

catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
