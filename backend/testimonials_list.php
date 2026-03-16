<?php
session_start();
include('config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>AdminLTE v4 | Testimonials</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
                                <i class="fa fa-user-circle"></i> Testimonials
                            </h3>
                        </div>
                        <div class="col-sm-6 text-end">
                            <a href="testimonials_add.php" class="btn btn-primary">
                               <i class="fa fa-user-circle"></i>  Add Testimonials
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Success Message -->
            <div class="container-fluid mt-3">
                <?php if (isset($_SESSION['success_msg'])) { ?>
                    <div id="message" class="alert alert-success alert-dismissible fade show">
                        <?php
                        echo $_SESSION['success_msg'];
                        unset($_SESSION['success_msg']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php } ?>
            </div>

            <!-- Table -->
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <table class="table table-bordered table-striped text-center align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "SELECT * FROM testimonials ";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                            <tr>
                                                <td><?php echo $row['id']; ?></td>

                                                <td>
                                                    <img src="assets/uploads/testimonials/<?php echo $row['image']; ?>"
                                                        width="80" height="80" class="rounded-circle">
                                                </td>

                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['position']; ?></td>
                                                <td><?php echo $row['description']; ?></td>

                                                <td>

                                                    <a href="testimonials_edit.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>

                                                    <form action="testimonials_delete.php"
                                                        method="POST"
                                                        style="display:inline-block;"
                                                        onsubmit="return confirm('Are you sure?');">

                                                        <input type="hidden" name="id"
                                                            value="<?php echo $row['id']; ?>">

                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">
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
                    </div>
                </div>
            </div>

        </main>

        <?php include('layout/footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
        <script src="js/adminlte.js"></script>

        <!-- ✅ 3 Second Auto Hide Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    let message = document.getElementById("message");
                    if (message) {
                        let alert = new bootstrap.Alert(message);
                        alert.close();
                    }
                }, 3000);
            });
        </script>

</body>

</html>