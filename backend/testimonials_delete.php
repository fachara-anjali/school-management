<?php
session_start();
include('config.php');

if(isset($_POST['id']))
{
    $id = intval($_POST['id']);

    $query = "SELECT image FROM testimonials WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $data = mysqli_fetch_assoc($result);
        $image = $data['image'];

        $image_path = "assets/uploads/testimonials/" . $image;

        if(!empty($image) && file_exists($image_path))
        {
            unlink($image_path);
        }

        $delete = mysqli_query($conn, "DELETE FROM testimonials WHERE id = $id");

        if($delete)
        {
            $_SESSION['success_msg'] = "Testimonial Deleted Successfully!";
        }
        else
        {
            $_SESSION['success_msg'] = "Delete Failed!";
        }
    }
    else
    {
        $_SESSION['success_msg'] = "Record Not Found!";
    }
}

header("Location: Testimonials_list.php");
exit();
?>