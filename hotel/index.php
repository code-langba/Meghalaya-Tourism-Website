<?php
require_once "dbh.inc.php";
$sql = "SELECT * FROM hotel;";
$results = mysqli_query($conn, $sql);
?>
<!--END NAV SECTION -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Visit Meghalaya | Hotels</title>
  <link rel="stylesheet" href="../css/style.css">
  <!-- <link rel="stylesheet" href="../css/hotel.css"> -->
</head>

<body>


  <div class="main-maincontainer">

    <!-- //*Header -->
    <?php
    require "../header.php";
    ?>
    <!-- //? End Header -->
    <div class="hotel-container ">
  <h1>Hotels</h1>
      <!-- <div class="filter">
        <div class="filters">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique, voluptates.</div>
      </div> -->

      <div class="row">

        <?php while ($room = mysqli_fetch_assoc($results)) : ?>
          <div class="details">
            <div class="image-hotel">

              <img src="images/<?= $room['photo']; ?>" class="img-responsive" alt="room">
            </div>
            <div class="description">
              <h4 class="text-center"><?= $room['hname']; ?></h4>

              <!-- <section class="text-justify"> -->
              <p>
                <?= $room['hdesc']; ?>
              </p>
              <a href="rooms.php?hname=<?= $room['hname']; ?>" class="btn btn-block btn-primary" id="more-details">More Details</a>
              <!-- </section> -->
            </div>

          </div>


        <?php endwhile; ?>

      </div>

    </div>
   
  <!-- //*Footer  -->
  <?php
    include "../footer.php";
    ?>

    <!-- //? End Footer  -->
  </div>


  <!-- <script src="http://localhost/ultimate/js/slider.js"></script> -->

</body>

</html>