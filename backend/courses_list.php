<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>AdminLTE v4 | Courses</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />

  <!-- OverlayScrollbars -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />

  <!-- Bootstrap Icons -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- AdminLTE -->
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
              <i class="fa fa-book-open"></i> Courses
              </h3>
            </div>
            <div class="col-sm-6 text-end">
              <a href="courses_add.php" class="btn btn-primary">
                <i class="fa fa-book-open"></i> Add Courses
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Table Content -->
      <div class="app-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <!--  SUCCESS MESSAGE -->
              <?php if (isset($_SESSION['success_msg'])) { ?>
                <div id="message" class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="fa-solid fa-circle-check"></i>
                  <?php
                  echo $_SESSION['success_msg'];
                  unset($_SESSION['success_msg']);
                  ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              <?php } ?>

              <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Person Image</th>
                    <th>Person Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Button Name</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  include('config.php');

                  $query = "SELECT * FROM courses";
                  $result = $conn->query($query);

                  if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>

                        <td>
                          <img src="assets/uploads/courses/<?php echo $row['courses_image']; ?>"
                            width="50" height="50" class="rounded-circle">
                        </td>

                        <td>
                          <img src="assets/uploads/person/<?php echo $row['person_image']; ?>"
                            width="50" height="50" class="rounded-circle">
                        </td>

                        <td><?php echo $row['person_name']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>

                        <td>
                          <span class="badge bg-success">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <?php echo $row['price']; ?>
                          </span>
                        </td>

                        <td>
                          <button class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-eye"></i>
                            <?php echo $row['btn_name']; ?>
                          </button>
                        </td>

                        <td>
                          <a href="courses_edit.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-info btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                          </a>

                          <a href="courses_delete.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="9">No records found</td>
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

    <!-- ✅ Auto Hide Script -->
    <script>
      setTimeout(function() {
        var message = document.getElementById("message");
        if (message) {
          var alert = new bootstrap.Alert(message);
          alert.close();
        }
      }, 3000);
    </script>

    <!-- Required Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
    <script src="js/adminlte.js"></script>

</body>

</html>