<?php
session_start();
include('config.php');

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $position = $_POST['position'];
    $description = $_POST['description'];

    // Image Upload
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if($image != "")
    {
        move_uploaded_file($tmp_name, "assets/uploads/testimonials/" . $image);
    }

    $insert = mysqli_query($conn, "INSERT INTO testimonials (name, position, description, image) 
        VALUES ('$name', '$position', '$description', '$image')");

    if($insert)
    {
        $_SESSION['success_msg'] = "Testimonial Added Successfully!";
    }
    else
    {
        $_SESSION['success_msg'] = "Insert Failed!";
    }

    header("Location: testimonials_list.php");
    exit();
}
?>