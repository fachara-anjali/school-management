<?php
session_start();
include('config.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $position = $_POST['position'];
    $description = $_POST['description'];
    $name = $_POST['name'];

    $image = $_POST['image'];

    if(!empty($_FILES['image']['name']))
    {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, "assets/uploads/mentor/".$image);

        if(file_exists("assets/uploads/mentor/".$old_image))
        {
            unlink("assets/uploads/mentor/".$old_image);
        }
    }
    else
    {
        $image = $old_image;
    }

    $update_query = "UPDATE mentor SET 
        name='$name',
        description='$description',
        position='$position',
        image='$image'
        WHERE id=$id";

    if(mysqli_query($conn, $update_query))
    {
        $_SESSION['success_msg'] = "Mentor updated successfully!";
        header("Location: mentor_list.php");
        exit();
    }
    else
    {
        echo "Update Failed!";
    }
}
?>