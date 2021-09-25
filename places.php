<?php
if (isset($_GET['pname'])) {
    $pname = $_GET['pname'];
    require_once "includes/dbh.inc.php";
    $sql = mysqli_query($conn, "SELECT * FROM places where pname='$pname';");
    ?>

    <!DOCTYPE html>
        <html>

        <head>
            <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                <title><?php echo $row['pname']; ?> | VisitMeg</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
                <!-- <link rel="stylesheet" type="text/css" href="page2.css"> -->
                <link rel="stylesheet" type="text/css" href="./css/style.css">
        </head>

        <body>

            <!-- //*Header -->
            <?php
                    require "header.php";
                    ?>
            <!-- //? End Header -->
            <div class="main-maincontainer">




                <div class="jaka-container">
                    <div class="div">
                        <div class="immg-case">

                            <img src="./places/<?php echo $row['photo']; ?>" width="100%" >
                        </div>

                        <div class="defin">
                            <h1><?php echo $row['pname']; ?></h1>
                            <p><?php echo $row['pdesc']; ?></p>

                            <p><a href="https://en.wikipedia.org/wiki/<?php echo $row['pname']; ?>" >Click here</a> to find out more about <?php echo $row['pname']; ?></p>
                        </div>

                    </div>



                <?php } ?>

                </div>



                <!-- //*Footer  -->
                <?php
                    include "footer.php";
                    ?>

                <!-- //? End Footer  -->

            </div>

        </body>

        </html>

    <?php } ?>