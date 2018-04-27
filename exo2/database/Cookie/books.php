<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
    crossorigin="anonymous">
<?php
require "function.php";

if(isset($_GET['id'])){
        list($id, $name, $description, $image) = get_event(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_URL));
print'je sui en cours de test: '.$name;


        if(empty($name) || empty($description) || empty($image)){
                $error_message= "Please fill in the required fields";
        } else {

                if(add_event($name, $description, $image, $id)){
                        header('Location: admin.php');
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


<form method="POST" action="">
        <label for="name">Book Title</label>
        <input type="text" name="name" id="name" value="<?php echo $name ?>">

        <label for="description">Description</label>
    <textarea id="description" name="description"><?php echo $description ?></textarea>

        <label for="image">Image</label>
        <input type="text" name="image" id="image" value="<?php echo $image ?>">
        <?php
        if(!empty($id)){
                echo '<input type="hidden" name="id" value="'.$id.'">';
        }
?>
        <input type="submit" name="submit" value="Envoyer">
</form>

<a href="admin.php">Back to home</a>%