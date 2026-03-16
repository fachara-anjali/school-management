<?php
session_start();
include('config.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>AdminLTE v4 | Mentor</title>
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

      <!-- Header -->
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0">
              <i class="fa fa-user-graduate"></i> Mentor
              </h3>
            </div>
            <div class="col-sm-6 text-end">
              <a href="mentor_add.php" class="btn btn-primary">
                <i class="fa fa-user-graduate"></i>  Add Mentor
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
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $query = "SELECT * FROM mentor ";
                  $result = mysqli_query($conn, $query);

                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>

                        <td>
                          <img src="assets/uploads/mentor/<?php echo $row['image']; ?>"
                            width="80" height="80" class="rounded-circle">
                        </td>

                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['description']; ?></td>

                        <td>
                          <a href="mentor_edit.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-info btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                          </a>

                          <form action="mentor_delete.php" method="POST"
                            style="display:inline-block;"
                            onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="id"
                              value="<?php echo $row['id']; ?>">
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
          </div>
        </div>
      </div>

    </main>

    <?php include('layout/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>

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

    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"></script>
    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [{
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"></script>
    <!-- jsvectormap -->
    <script>
      // World map by jsVectorMap
      new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [{
          data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
        }, ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [{
          data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
        }, ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [{
          data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
        }, ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>