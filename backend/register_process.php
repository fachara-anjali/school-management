<?php
include('config.php');

if(isset($_POST['register']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')";

if(mysqli_query($conn,$query))
{
header("Location: login.php");
}
else
{
echo "Registration Failed";
}
}
?>