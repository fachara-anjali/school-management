<?php
session_start();
include('config.php');

$id = intval($_GET['id']);

$query = "SELECT courses_image, person_image FROM courses WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if ($data) {
    $course_image = $data['courses_image'];
    $person_image = $data['person_image'];

    if (!empty($course_image) && file_exists("assets/uploads/courses/" . $course_image)) {
        unlink("assets/uploads/courses/" . $course_image);
    }

    if (!empty($person_image) && file_exists("assets/uploads/courses/" . $person_image)) {
        unlink("assets/uploads/person/" . $person_image);
    }

    $delete_query = "DELETE FROM courses WHERE id = $id";
    if (mysqli_query($conn, $delete_query)) {
        $_SESSION['success_msg'] = "Record deleted successfully!";
    }
}

header("Location: courses_list.php");
exit();
