<?php
require_once "includes/dbh.inc.php";
$sql = "SELECT * FROM places;";
$results = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/slide.js"></script>




    <title>Visit Meghalaya | Welcome</title>
</head>

<body>


    <div class="big-container">

        <!-- //! default-margin -->
        <!-- //*Header -->
        <?php
        require "header.php";
        ?>
        <!-- //? End Header -->

        <div class="first-page">
            <div class="back-rotate"></div>
            <!--//~ Hidden elems-->

            <div class="landing">
                <div class="landing-text view">
                    <h1 class="">VISIT MEGHALAYA</h1>
                    <p class="slidepar">Want to explore Meghalaya but don't know where to start? A tour might help.</p>
                </div>
                <div class="landing-text ">
                    <h1 class="">Sit Back and <br> Relax</h1>
                    <p class="slidepar">Reserve a vehicle and plan your destination later!</p>
                </div>
                <div class="landing-text">
                    <h1 class="">Far from home?</h1>
                    <p class="slidepar">Finding a place to stay has never been so easy</p>
                </div>
            </div>
            <!--//~ Hidden elems-->
            <div class="slider-container">
                <div class="slider ">
                    <div class="slide display">
                        <div class="content">
                            <h1 class="">VISIT MEGHALAYA</h1>
                            <p class="slidepar">Want to explore Meghalaya but don't know where to start? A tour might help.</p>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="content">
                            <h1 class="">Sit Back and <br> Relax</h1>
                            <p class="slidepar">Reserve a vehicle and plan your destination later!</p>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="content">
                            <h1 class="">Slide three</h1>
                            <p class="slidepar"> </p>
                        </div>
                    </div>

                </div>
                <div class="button">
                    <button id="prev"><i class="fas fa-chevron-left"></i></i></button>
                    <button id="next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <a href="#services"><button id="explore" value="EXPLORE">EXPLORE</button></a>
            <!-- <button id="pause">Pause</button> -->

            <!-- </div> -->
        </div>

        <!-- //*Places Container -->
        <div class="places-container">
            <!-- <div class="tour-row"> -->
            <h1>Popular Places in Meghalaya</h1>
            <div class="skreet">
                <?php while ($room = mysqli_fetch_assoc($results)) : ?>
                    <div class="elements">
                        <div class="img-case">

                            <img src="./places/<?= $room['photo']; ?>" alt="room" width="100%" height="100%">
                        </div>
                        <section>
                            <h4><?= $room['pname']; ?> </h4>


                            <a href="places.php?pname=<?= $room['pname']; ?>" class="btn btn-block btn-primary">More Details</a>

                        </section>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
        <div class="second-page default-padding" id="services">

            <div class="bookers">
                <h1>Tour Packages</h1>
                <div class="images-service">
                    <i class="fas fa-route"></i>
                </div>
                <div class="redirectlink">
                    Are you a traveller looking for an adventure? Get started with a tour package.
                </div>
                <a href="./tour/index.php"><button class="clicks">Click Here</button></a>
            </div>


            <div class="bookers">
                <h1>Vehicles</h1>
                <div class="images-service">
                    <i class="fas fa-taxi"></i>
                </div>
                <div class="redirectlink">
                    Book a vehicle according to your needs!
                </div>
                <a href="car.php"><button class="clicks">Click Here</button></a>
            </div>


            <div class="bookers">
                <h1>Hotels</h1>
                <div class="images-service">
                    <i class="fas fa-hotel"></i>
                </div>
                <div class="redirectlink">
                    Need a place to stay? Make a reservation.
                </div>
                <a href="hotel/"> <button class="clicks">Click Here</button></a>
            </div>


        </div>

        <!-- //*Footer  -->
        <?php
        include "footer.php";
        ?>

        <!-- //? End Footer  -->

    </div>

    <!-- <div class="wrap"> -->
    <!-- <div class="first"></div> -->

</body>

</html>