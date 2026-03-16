<?php
session_start();
include('config.php'); // your DB connection
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>AdminLTE | Add Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
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
                        <h3>Add Events</h3>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="events_list.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <?php
                if(isset($_SESSION['success_msg'])) {
                    echo '<div class="alert alert-success">'.$_SESSION['success_msg'].'</div>';
                    unset($_SESSION['success_msg']);
                }
                if(isset($_SESSION['error_msg'])) {
                    echo '<div class="alert alert-danger">'.$_SESSION['error_msg'].'</div>';
                    unset($_SESSION['error_msg']);
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <form action="events_store.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Description:</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Day:</label>
                                <input type="text" name="events_day" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Date:</label>
                                <input type="date" name="events_date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Time:</label>
                                <input type="text" name="events_time" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Image:</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>

                            <button type="submit" name="add" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>