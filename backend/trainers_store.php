<?php
include('config.php');

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $image_name = $_FILES['image']['name'];


    $tmp_name   = $_FILES['image']['tmp_name'];

    $new_image = "";

    if(!empty($image_name)){

        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $new_image = md5(time().rand()) . "." . $ext;

        $upload_path = "assets/uploads/trainers/" . $new_image;

        move_uploaded_file($tmp_name, $upload_path);
    }

    $query = "INSERT INTO trainers (name, position, description, image)
              VALUES ('$name', '$position', '$description', '$new_image')";

    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: trainers_list.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

