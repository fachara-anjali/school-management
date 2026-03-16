<?php
session_start();   // IMPORTANT
include('config.php');

if(isset($_POST['id']))
{
    $id = intval($_POST['id']);

    $query = "SELECT image FROM trainers WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $data = mysqli_fetch_assoc($result);
        $image = $data['image'];

        $image_path = "assets/uploads/trainers/" . $image;

        // Delete image file
        if(!empty($image) && file_exists($image_path))
        {
            unlink($image_path);
        }

        // Delete record
        $delete = mysqli_query($conn, "DELETE FROM trainers WHERE id = $id");

        if($delete)
        {
            $_SESSION['success_msg'] = "Trainer Deleted Successfully!";
        }
        else
        {
            $_SESSION['success_msg'] = "Delete Failed!";
        }
    }
}

header("Location: trainers_list.php");
exit();
?>