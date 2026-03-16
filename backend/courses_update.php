<?php
session_start();
include('config.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $btn_name = $_POST['btn_name'];
    $person_name = $_POST['person_name'];

    $old_course_image = $_POST['old_course_image'];
    $old_person_image = $_POST['old_person_image'];

    /* Course Image Upload */
    if(!empty($_FILES['courses_image']['name']))
    {
        $course_image = $_FILES['courses_image']['name'];
        $tmp_name = $_FILES['courses_image']['tmp_name'];

        move_uploaded_file($tmp_name, "assets/uploads/courses/".$course_image);

        if(file_exists("assets/uploads/courses/".$old_course_image))
        {
            unlink("assets/uploads/courses/".$old_course_image);
        }
    }
    else
    {
        $course_image = $old_course_image;
    }

    /* Person Image Upload */
    if(!empty($_FILES['person_image']['name']))
    {
        $person_image = $_FILES['person_image']['name'];
        $tmp_name2 = $_FILES['person_image']['tmp_name'];

        move_uploaded_file($tmp_name2, "assets/uploads/person/".$person_image);

        if(file_exists("assets/uploads/person/".$old_person_image))
        {
            unlink("assets/uploads/person/".$old_person_image);
        }
    }
    else
    {
        $person_image = $old_person_image;
    }

    /* Update Query */
    $update_query = "UPDATE courses SET 
        title='$title',
        description='$description',
        price='$price',
        btn_name='$btn_name',
        person_name='$person_name',
        courses_image='$course_image',
        person_image='$person_image'
        WHERE id='$id'";

    if(mysqli_query($conn, $update_query))
    {
        $_SESSION['success_msg'] = "Course updated successfully!";
        header("Location: courses_list.php");
        exit();
    }
    else
    {
        echo "Update Failed!";
    }
}
?>