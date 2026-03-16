<?php
session_start();
include('config.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $description = $_POST['description'];

    $update = mysqli_query($conn, "UPDATE trainers 
        SET name='$name', position='$position', description='$description' 
        WHERE id='$id'");

    if($update)
    {
        $_SESSION['success_msg'] = "Trainer Updated Successfully!";
        header("Location: trainers_list.php");
        exit();
    }
}
?> 