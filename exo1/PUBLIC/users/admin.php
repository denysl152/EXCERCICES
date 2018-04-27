<?php include "component/header.php"; ?>
<?php

require "functions.php";

if(isset($_GET['id'])){
	list($id, $name, /*$date*/ ,  $prenom) = get_user(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
	$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $prenom = trim(filter_input(INPUT_POST, 'prenom' , FILTER_SANITIZE_STRING));
//	$date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_URL));
	if(empty($name) || empty($prenom) ){
		$error_message= "Please fill in the required fields";
	} else {

		if(add_user($name,/* $date, */ $id , $prenom)){
			header('Location: index.php');
			exit;
		} else {
			$error_message = "Could not add event";
		}
	}
}
?>

<?php 
if(isset($error_message)){
	echo $error_message;
}
?>

<h2>
<?php

	echo "Add an user";

?></h2>

<form method="post" action="admin.php">
	<label for="name">Title document :</label>
	<input type="text" name="name" id="name" value="<?php echo $name ?>">

	<!--<label for="date">Date</label>
    <input type="date" name="date" id="date" value="<//?php echo $date ?>">-->
    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" id="prenom" value="<?php echo $prenom ?>">
	<?php
	if(!empty($id)){
		echo '<input type="hidden" name="id" value="'.$id.'">';
	}
?>
	<input type="submit" class="btn btn-primary" name="submit" value="Envoyer">
</form>
<br>
<a href="index.php">Back to home</a>