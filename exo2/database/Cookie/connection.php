<?php
require "db.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);
    print("YES");

} catch(PDOException $e){
    echo"Erreur databases: ".$e->getMessage();
    exit;
}
?>