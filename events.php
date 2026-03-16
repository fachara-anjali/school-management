<?php
include('layout/header.php');
?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Events</h1>
            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li class="current">Events</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Events Section -->
  <section id="events" class="events section">

    <div class="container" data-aos="fade-up">

      <div class="row">

        <?php include('backend/config.php'); ?>


        <?php
        $result = mysqli_query($conn, "SELECT * FROM events ");

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="backend/assets/uploads/events/<?= $row['image']; ?>" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href=""><?= $row['title']; ?></a></h5>
                <p class="fst-italic text-center"><?= $row['events_day']; ?>,<?= $row['events_date']; ?> at <?= $row['events_time']; ?></p>
                <p class="card-text"> <?= $row['description']; ?></p>
              </div>
            </div>
          </div>

        <?php } ?>



        <!-- <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/events-item-2.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Marketing Strategies</a></h5>
                <p class="fst-italic text-center">Sunday, November 15th at 7:00 pm</p>
                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
              </div>
            </div>

          </div>
        </div> -->

      </div>

  </section><!-- /Events Section -->

</main>

<?php
include('layout/footer.php');
?>