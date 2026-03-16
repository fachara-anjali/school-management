<?php
include('config.php');

if(isset($_POST['submit']))
{

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$btn_name = $_POST['btn_name'];
$person_name = $_POST['person_name'];


/* Course Image */
$course_image = $_FILES['courses_image']['name'];
$tmp_course = $_FILES['courses_image']['tmp_name'];

move_uploaded_file($tmp_course,"assets/uploads/courses/".$course_image);


/* Person Image */
$person_image = $_FILES['person_image']['name'];
$tmp_person = $_FILES['person_image']['tmp_name'];

move_uploaded_file($tmp_person,"assets/uploads/person/".$person_image);


$query = "INSERT INTO courses 
(title,description,price,btn_name,courses_image,person_image,person_name)
VALUES
('$title','$description','$price','$btn_name','$course_image','$person_image','$person_name')";

mysqli_query($conn,$query);

header("Location:courses_list.php");

}
?>