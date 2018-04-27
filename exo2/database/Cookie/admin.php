<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
    crossorigin="anonymous">
<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
header('location:index.php');
}
?>
<h1 class="welcome">Bienvenue,<?php echo $_SESSION['username'];   ?></h1>

<ul>
	<li><a href=""><strong>Back to home</strong></a></li>
</ul>

<?php
	require "function.php";
	require "db.php";

	if(isset($_POST['delete'])){
		if(delete_event(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT))){
			header('Location: admin.php');
			exit;
		}
	}
?>

<ul>
<?php
foreach(get_event_list() as $books){
	echo "<div id='container-flex'><a href='books.php?id=".$books['id']."'>". $books["name"] . "</a>\n";	
	echo"<p>Description: ". $books["description"] ."</p>\n";	
	echo"<a href='books.php?id=".$books['id']."'><img src=".$books["image"]."></a>\n\n\n";
	echo "<form method='post' action='admin.php' />\n";
	echo "<input type='hidden' value='".$books['id']."' name='delete' />\n";
	echo "<input type='submit' value='Delete' />\n";
	echo "</form>";
	echo "</div>";
}
?>
</ul>

 <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
 

                   <a href="logout.php">Se déconnecter</a>
               
                   
 <body class="connected">
  <br/></body>