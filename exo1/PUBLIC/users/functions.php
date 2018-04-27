<?php

function get_user_list(){
    include "connection.php";

    try{
        return $reponse = $connection->query("SELECT * FROM Utilisateur");
    } catch(PDOException $e){
       echo "Error : ". $e->getMessage();
       return false; 
    }
}

function get_user($id){
    include "connection.php";

    try{
       $sql= "SELECT * FROM Utilisateur WHERE id= ?";
        $result=$connection->prepare($sql);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    return $result->fetch();
}

function add_user($name, $prenom, $id=null){
    include "connection.php";

   if($id){
        $sql = "INSERT INTO UTILISATEUR (nom, prenom) VALUE(?, ?)";
       // print('Affiche');
    }
    

    try{
        $result= $connection->prepare($sql);
        $result->bindValue(1, $name, PDO::PARAM_STR);
       // $result->bindValue(2, $date, PDO::PARAM_STR);
       $result->bindValue(2, $prenom, PDO::PARAM_STR);
        if($id){
            $result->bindValue(3, $id,PDO::PARAM_INT);
           // echo'Je suis';
        }
        $result->execute();
    } catch(Exception $e){
        echo $e->getMessage();
        return false;
        
    }
    return true;
}
?>