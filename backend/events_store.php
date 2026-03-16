<?php
session_start();
include('config.php');

if(isset($_POST['add']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $day = $_POST['events_day'];
    $date = $_POST['events_date'];
    $time = $_POST['events_time'];

    // Image Upload
    $image_name = time() . "_" . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $upload_path = "assets/uploads/events/" . $image_name;

    move_uploaded_file($tmp_name, $upload_path);

    // Insert Query
    $insert = "INSERT INTO events (title, description, events_day, events_date, events_time, image)
               VALUES ('$title','$description','$day','$date','$time','$image_name')";

    if(mysqli_query($conn,$insert))
    {
        $_SESSION['success_msg'] = "Events Added Successfully!";
        header("Location: events_list.php");
        exit();
    }
    else
    {
        echo "Insert Failed!";
    }
}
?>