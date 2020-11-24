<?php

$user = 'root';
$pass = '';


$pdo = new PDO('mysql:host=localhost;dbname=crud', $user, $pass);


if($pdo){
    try {
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $sql = $pdo->prepare("CREATE TABLE IF NOT EXISTS users(
            id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            age INT NOT NULL)");   
            $sql->execute();
            
    } catch(PDOException $e) {
        echo $e->getMessage();
    }


  
} else {
    echo "<h1>failed to connect to database</h1>";
}








