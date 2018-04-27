<?php

function get_event_list(){
    include "../connection.php";

    try{
        return $reponse = $connection->query("SELECT * FROM book");
    } catch(PDOException $e){
       echo "Error : ". $e->getMessage();
       return false; 
    }
}

function get_event($id){
    include "../connection.php";

    try{
        $sql= "SELECT * FROM book WHERE id= ?";
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

function add_event($name, $date, $id=null){
    include "../connection.php";

    if($id){
        $sql = "UPDATE book SET name = ?, date = ? WHERE id = ?";
    } else {
        $sql = "INSERT INTO book (name, date) VALUE(?, ?)";
    }

    try{
        $result= $connection->prepare($sql);
        $result->bindValue(1, $name, PDO::PARAM_STR);
        $result->bindValue(2, $date, PDO::PARAM_STR);
        if($id){
            $result->bindValue(3, $id,PDO::PARAM_INT);
        }
        $result->execute();
    } catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    return true;
}

function delete_event($id){
    include "../connection.php";

    $sql="DELETE FROM book WHERE id= ?";

    try{
        $result=$connection->prepare($sql);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    return true;
}
?>