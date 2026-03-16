<?php
session_start();
include('config.php');

if(isset($_POST['login']))
{
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0)
{
$user = mysqli_fetch_assoc($result);

if(password_verify($password,$user['password']))
{
$_SESSION['user'] = $user['name'];

header("Location: index.php");
exit();
}
else
{
echo "Invalid Password";
}
}
else
{
echo "User Not Found";
}
}
?>