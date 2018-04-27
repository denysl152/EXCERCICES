<?php include "component/header.php"; ?>
<?php
include("connection.php");

?>


	<p style="margin:20px"><a href="admin.php"><strong>CREER</strong> un utilisateur</a></p>


<?php
	require "functions.php";
	require "connection.php";

?>

<ul>
<?php
foreach(get_user_list() as $admin){
	echo "<div id='container-flex'><href='event.php?id=".$admin['id']."'>" . $admin["name"] . "</>";
    echo "<table>";
    echo "<form method='post' action='admin.php' />";
    /*echo "<tr class='margin'><td>Nom</td><td>Prenom</td><td>Titre document téléchargé</td>
    <td>Date de téléchargement</td> </tr>";
    echo "<tr><td>" . $admin["nom"] ."</td><td>" . $admin["prenom"] . " </td> <td></td><td></td></tr>";
    echo "</form>";
    echo "</table>";*/
    echo "Jai testé";
	echo "</div>";
//	echo "<div><p href='event.php?id=".$admin['id']."'>date :".$admin["date"] . "</p></div>";
}
?>
</ul>












<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
    crossorigin="anonymous">
</head>
<body>
    <div id="container">
    <table class="users-table">
     <tr class="margin"><td>Nom</td><td>Prenom</td><td>Titre document téléchargé</td>
     <td>Date de téléchargement</td> </tr>
         Partie users 
     <tr><td></td> <td></td> <td></td><td></td></tr>
   
    </table>
    </div>
</body>
</html>
