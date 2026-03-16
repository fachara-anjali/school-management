<?php
session_start();
include('config.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>AdminLTE v4 | Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="css/adminlte.css" />
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        <?php include('layout/header.php'); ?>
        <?php include('layout/sidebar.php'); ?>

        <main class="app-main">

            <!-- Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">
                            <i class="fa fa-star"></i> Events
                            </h3>
                        </div>
                        <div class="col-sm-6 text-end">
                            <a href="Events_add.php" class="btn btn-primary">
                                <i class="fa fa-star"></i>  Add Events
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid ">

                <!-- ✅ SUCCESS MESSAGE -->
                <?php if (isset($_SESSION['success_msg'])) { ?>
                    <div id="message" class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['success_msg']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php
                    unset($_SESSION['success_msg']);
                } ?>

                <!-- Table -->
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Day</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $query = "SELECT * FROM events ";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td>
                                        <img src="assets/uploads/events/<?= $row['image']; ?>" width="80">
                                    </td>
                                    <td><?= $row['title']; ?></td>
                                    <td><?= $row['description']; ?></td>
                                    <td><?= $row['events_day']; ?></td>
                                    <td><?= $row['events_date']; ?></td>
                                    <td><?= $row['events_time']; ?></td>
                                    <td>

                                        <!-- Edit -->
                                        <a href="events_edit.php?id=<?= $row['id']; ?>"
                                            class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="events_delete.php"
                                            method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure?');">

                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6">No Records Found</td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>

            </div>
        </main>
    </div>

    <?php include('layout/footer.php'); ?>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>

    <!-- ✅ Auto Hide Message After 3 Seconds -->
    <script>
        setTimeout(function() {
            var message = document.getElementById("message");
            if (message) {
                message.style.display = "none";
            }
        }, 3000);
    </script>

</body>

</html>