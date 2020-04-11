<?php

//$db = new PDO('mysql:host=172.31.22.43;dbname=Jinal_Pareshkumar200442270', 'Jinal_Pareshkumar200442270', 'N4ZACyc65_');

try {
    $conn =new PDO('mysql:host=172.31.22.43;dbname=Jinal_Pareshkumar200442270', 'Jinal_Pareshkumar200442270', 'N4ZACyc65_');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
?>
