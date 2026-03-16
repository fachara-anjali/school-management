<?php
session_start();
include('config.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    // Get old image
    $getData = mysqli_query($conn, "SELECT image FROM testimonials WHERE id='$id'");
    $row = mysqli_fetch_assoc($getData);
    $old_image = $row['image'];

    if(!empty($image))
    {
        // Unique image name
        $image = time().'_'.$image;

        $upload_path = "assets/uploads/testimonials/".$image;

        // Upload new image
        move_uploaded_file($tmp_image, $upload_path);

        // Delete old image
        if(file_exists("assets/uploads/testimonials/".$old_image))
        {
            unlink("assets/uploads/testimonials/".$old_image);
        }

        $update = mysqli_query($conn, "UPDATE testimonials 
        SET name='$name', position='$position', description='$description', image='$image' 
        WHERE id='$id'");
    }
    else
    {
        $update = mysqli_query($conn, "UPDATE testimonials 
        SET name='$name', position='$position', description='$description' 
        WHERE id='$id'");
    }

    if($update)
    {
        $_SESSION['success_msg'] = "Testimonial Updated Successfully!";
    }
    else
    {
        $_SESSION['success_msg'] = "Update Failed!";
    }

    header("Location: testimonials_list.php");
    exit();
}
?>