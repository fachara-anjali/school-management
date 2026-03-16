<?php
session_start();
include('config.php');

// Secure ID
$id = intval($_POST['id']);

// 1️⃣ Get image name first
$query = "SELECT image FROM mentor WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if($data)
{
    $image = $data['image'];

    // 2️⃣ Delete image from uploads folder
    if(!empty($image) && file_exists("assests/uploads/mentor/".$image))
    {
        unlink("assests/uploads/mentor/".$image);
    }

    // 3️⃣ Delete record from database
    $delete_query = "DELETE FROM mentor WHERE id = $id";
    
    if(mysqli_query($conn, $delete_query))
    {
        $_SESSION['success_msg'] = "Mentor Deleted Successfully!";
    }
    else
    {
        $_SESSION['success_msg'] = "Delete Failed!";
    }
}

// 4️⃣ Redirect
header("Location: Mentor_list.php");
exit();
?>