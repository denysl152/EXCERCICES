<?php
require "config.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);
print($dsn);
} catch(PDOException $e){
    echo $e->getMessage();
    exit;
}

?>