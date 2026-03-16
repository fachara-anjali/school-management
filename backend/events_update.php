<?php
session_start();
include('config.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $day = $_POST['events_day'];
    $date = $_POST['events_date'];
    $time = $_POST['events_time'];
    $old_image = $_POST['old_image'];

    $new_image = $old_image;

    // Check if new image uploaded
    if(!empty($_FILES['image']['name']))
    {
        $image_name = time() . "_" . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $upload_path = "assets/uploads/events/" . $image_name;

        move_uploaded_file($tmp_name, $upload_path);

        // Delete old image
        if(file_exists("assets/uploads/events/" . $old_image))
        {
            unlink("assets/uploads/events/" . $old_image);
        }

        $new_image = $image_name;
    }

    $update = "UPDATE events SET 
                title='$title',
                description='$description',
                events_day='$day',
                events_date='$date',
                events_time='$time',
                image='$new_image'
                WHERE id='$id'";

    if(mysqli_query($conn,$update))
    {
        $_SESSION['success_msg'] = "Event Updated Successfully!";
        header("Location: events_list.php");
        exit();
    }
    else
    {
        echo "Update Failed!";
    }
}
?>