<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>AdminLTE v4 | Courses</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Font -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />

    <!-- OverlayScrollbars -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

    <!-- ✅ Font Awesome CDN -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- AdminLTE -->
    <link rel="stylesheet" href="css/adminlte.css" />
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        <?php
        include('config.php');
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM events WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        ?>

        <?php include('layout/header.php'); ?>
        <?php include('layout/sidebar.php'); ?>

        <div class="container mt-4">
            <h3>Edit Event</h3>

            <form action="events_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="hidden" name="old_image" value="<?= $row['image']; ?>">

        Title:
        <input type="text" name="title" value="<?= $row['title']; ?>" class="form-control" required><br>

        Description:
        <textarea name="description" class="form-control" required><?= $row['description']; ?></textarea><br>

        Day:
        <input type="text" name="events_day" value="<?= $row['events_day']; ?>" class="form-control" required><br>

        Date:
        <input type="date" name="events_date" value="<?= $row['events_date']; ?>" class="form-control" required><br>

        Time:
        <input type="text" name="events_time" value="<?= $row['events_time']; ?>" class="form-control" required><br>

        Current Image:<br>
        <img src="assets/uploads/events/<?= $row['image']; ?>" width="100"><br><br>

        Change Image:
        <input type="file" name="image" class="form-control"><br>

        <button type="submit" name="update" class="btn btn-primary">
            <i class="fa fa-save"></i> Update
        </button>
        </form>
        </div>

        <?php include('layout/footer.php'); ?>

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