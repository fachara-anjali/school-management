<?php
session_start();
include('config.php');

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $position = $_POST['position'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "assets/uploads/trainers/".$image);

    $insert = mysqli_query($conn, "INSERT INTO trainers(name,position,description,image) 
        VALUES('$name','$position','$description','$image')");

    if($insert)
    {
        $_SESSION['success_msg'] = "Trainer Added Successfully!";
        header("Location: trainers_list.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>AdminLTE v4 | Add Trainers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="css/adminlte.css" />
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
<div class="app-wrapper">

<?php include('layout/header.php'); ?>
<?php include('layout/sidebar.php'); ?>

<main class="app-main">

<div class="app-content-header">
<div class="container-fluid">
<div class="row">
<div class="col-sm-6">
<h3 class="mb-0">Add Trainers</h3>
</div>
<div class="col-sm-6 text-end">
<a href="trainers_list.php" class="btn btn-primary">Back</a>
</div>
</div>
</div>
</div>

<div class="app-content">
<div class="container-fluid">
<div class="row">

<form method="POST" enctype="multipart/form-data">

<label>Name</label>
<input type="text" name="name" class="form-control" required><br>

<label>Position</label>
<input type="text" name="position" class="form-control" required><br>

<label>Description</label>
<input type="text" name="description" class="form-control" required><br>

<label>Image</label>
<input type="file" name="image" class="form-control" required><br>

<input type="submit" name="submit" value="Submit" class="btn btn-success">

</form>

</div>
</div>
</div>

</main>

<?php include('layout/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>

</body>
</html>