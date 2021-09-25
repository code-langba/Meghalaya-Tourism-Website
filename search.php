      <!DOCTYPE html>
\

      <html>

      <head>
        <title>Search</title>
        <link rel="stylesheet" href="./css/style.css">
        <!-- <link rel="stylesheet" href="./css/signup.css"> -->
      </head>

      <body>

        <div class="loading-anim" id="loading">
          <img src="./assets/plane-loader-slower.gif" alt="">
        </div>
        <div class="main-maincontainer">

          <!-- //*Header -->
          <?php
          require "./header.php";
          ?>



          <div class="parent-search">
            <!-- <form action="search.php" method="post" class="search-form">
            <input type="text" name="search" placeholder="Type to search">
            <button type="submit" value="search">Search</button>
          </form> -->
            <?php
            require_once "includes/dbh.inc.php";
            $output1 = $num = $count = $output1 = $output2 = '';
            if (isset($_POST['search'])) {
              $searchkey = $_POST['search'];
              $searchkey = preg_replace("#[^0-9a-z]#i", "", $searchkey);

              $query = mysqli_query($conn, "SELECT * FROM tourpackage INNER JOIN hplaces ON tourpackage.tourname = hplaces.tname WHERE hplaces.pname LIKE '%$searchkey%'") or die("Could not search!");
              $count = mysqli_num_rows($query);
              $sql = mysqli_query($conn, "SELECT * FROM hotel WHERE pname LIKE '%$searchkey%'") or die("Could not search!");
              $num = mysqli_num_rows($sql);
              if ($count == 0) {
                $output1 = "1";
              } else {
                ?>
                <!-- tour -->

                <div class="search-tour screen-width"><br />
                  <h2 class="text-center"> Tour Results</h2>

                  <div class="row">

                    <?php while ($tour = mysqli_fetch_assoc($query)) : ?>
                      <div class="loop">
                        <div class="img-case">
                          <img src="./tour/images/<?= $tour['timage1'] ?>" width="100%" height="100%" alt="Tour Image.jpg">
                        </div>
                        <section class="text-justify  search-link text-center">
                          <h4 class="text-center"><?= $tour['tourname']; ?> Tour</h4>

                          <a href="./tour/bookingtour.php?tourname=<?= $tour['tourname']; ?>" class="text-center">Click to view tour</a>

                        </section>
                      </div>
                    <?php endwhile; ?>

                  </div>

                </div>
              <?php }
                if ($num == 0) {
                  $output2 = "1";
                } else {
                  ?>
                <!-- hotel -->
                <div class="hotel-search screen-width"><br />
                  <h2 class="text-center"> Hotels Results</h2>
                  <div class="row">

                    <?php while ($room = mysqli_fetch_assoc($sql)) : ?>
                      <div class="loop">
                        <!-- <div class="details">

                        <div class="description"> -->

                        <div class="img-case">
                          <img src="./hotel/images/<?= $room['photo'] ?>" width="100%" height="100%" alt="Hotel Image.jpg">
                        </div>

                        <section class=" search-link text-center">
                          <h4 class="text-center"><?= $room['hname']; ?></h4>

                          <a href="./hotel/rooms.php?hname=<?= $room['hname']; ?>" class="text-center" id="more-details">Click to view hotel</a>
                        </section>
                        <!-- </div>

                      </div> -->
                      </div>


                    <?php endwhile; ?>

                  </div>

                </div>

            <?php }
            } ?>
            <?php if ($output1 == 1 &&  $output2 == 1) {

              echo '
            <div class="no-search">
            <div><p><i class="fas fa-times-circle" ></i>&nbspThere was no search result!<p></div>
            </div>
            ';
            } ?>

          </div>

          <!-- //*Footer  -->
          <?php
          include "./footer.php";
          ?>

          <!-- //? End Footer  -->
        </div>



<script>window.onload = ()=>{
  document.querySelector('#loading').style.display = 'none';
}</script>


      </body>

      </html>