<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hotel Rooms</title>
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>

	<div class="main-maincontainer">


		<div class="room-container">
			<!-- //*Header -->
			<?php
			require "../header.php";
			?>
			<!-- //? End Header -->
			<?php
			require_once "dbh.inc.php";

			if (isset($_GET['hname'])) {
				$hname = $_GET['hname'];
				$results = mysqli_query($conn, "SELECT * FROM roomtype where hname='$hname'");
				$hotels = mysqli_query($conn, "SELECT * from hotel where hname='$hname'");
				$sql = mysqli_fetch_assoc($results);
				$_SESSION['hname'] = $hname;
				$_SESSION['roomnumber'] = $sql['noofroom'];
			}
			?>
			<?php $results = mysqli_query($conn, "SELECT * FROM roomtype where hname='$hname'"); ?>
			<div class="roomer-container">
				<div id="room-types">Room Types Available</div>

				<?php while ($room = mysqli_fetch_assoc($results)) : ?>
					<div class="room-row">
						<div class="img-case">
							<img src="images/<?= $room['photo']; ?>" class="img-responsive" alt="room" width="100%" height="100%">
						</div>
						<div class="room-des">
							<h4 class="text-center"><?= $room['rname']; ?></h4>
							<p><b>Room Type:</b> <?= $room['rname']; ?></p>
							<p><b>Room Price (per night):</b> Rs.<?= $room['cost']; ?></p>
							<p><b>Available Rooms:</b> <?= $room['noofroom']; ?></p>
							<p><b>Room details:</b> <?= $room['rdesction']; ?></p>
							<?= ($room['noofroom'] <= 0) ? '<p style="color:red; font-size: 20px; text-align:center; border:1px solid red; padding:10px 0; background:rgba(255, 0, 0, 0.20); align-self:center; margin:0; width:100%;" class="text-danger">Reservations have been closed for this room!</p>' : ''; ?>
							<?php if ($room['status'] == 'CLOSED') {
									echo '<p style="color:red; font-size:15px; text-align:center;" class="text-danger">All rooms are currently booked!</p>';
								} ?>

						</div>

					</div>

				<?php endwhile; ?>
			</div>
						
			<div class="boomer">

				<div class="container">
					<?php while ($hot = mysqli_fetch_assoc($hotels)) : ?>
						<h4 class="text-center"><?= $hot['hname']; ?></h4>

						<div class="phew">
							<div class="img-case">
								<img src="images/<?= $hot['photo']; ?>" class="img-responsive" alt="room" width="100%" height="100%">

							</div>
							<div class="phew-text">
								<h1><b>Hotel Details</b> </h1><br>
								<p><?= $hot['hdesc']; ?> </p>
								<p><?= $hot['pname']; ?></p>
							</div>


						</div>


				</div>

				<form action="hotel.inc.php?room=<?php $roomID ?>" method="post" class="tour-form" id="form">
					<h2>Booking details</h2>
					<?php
						if (isset($_GET['error'])) {
							if ($_GET['error'] == "emptyfields") {
								echo '<p style="color:red; font-size:15px; text-align:center;" class="signuperror">Fill in all the fields!</p>';
							} elseif ($_GET['error'] == "invalidcheckoutdate") {
								echo '<p style="color:#F00; font-size: 15px; text-align:center; border:1px solid red; padding:5px 0; background:rgba(255, 0, 0, 0.18);" class="signuperror">Invalid Check-out date provided. Please avoid using a past date!</p>';
							} elseif ($_GET['error'] == "invalidcheckindate") {
								echo '<p style="color:red; font-size:15px; text-align:center;" class="signuperror">Invalid Check-in date provided. Please avoid using a past date.</p>';
							}
						}
						if (isset($_GET['booking']) == "success") {
							echo '<p style="color:rgb(31, 156, 14); font-size: 20px; text-align:center; border:1px solid green; padding:10px 0; background:rgba(0, 255, 0, 0.20);" class="signupsuccess">Booking Successful!</p>';
						}
						?>
					<label>Check-in date:</label>
					<input min="0" type="date" name="in_date" required>
					<label>Check-out date:</label>
					<input type="date" name="out_date" required min="0">

					<label>Room Type:</label>

					<select class="custom-select custom-select-lg mb-3" name="rname">
						<?php $new = mysqli_query($conn, "SELECT * FROM roomtype where hname='$hname';");
							while ($room = mysqli_fetch_assoc($new)) {
								if ($room['noofroom'] == '0' || $room['status'] == 'CLOSED') {
									$flag = '1';
								} else {
									$flag = '0';
								} ?>
							<option value="<?php echo $room['rname']; ?>" <?= ($flag == '1') ? 'disabled' : ''; ?>> <?php echo $room['rname']; ?></option>
						<?php } ?>
					</select>

					<label>No of Rooms:</label>
					<input type="number" class="form-control" max="5" min="1" name="rooms" required>

					<label></label>
					<?php if (isset($_SESSION['email'])) { ?>
						<input type="submit" class="form-control btn btn-primary" id="checkin" value="Make Reservation" name="checkin">
					<?php  } else {
							echo '
					<a id="check-log" >Login <i class="fas fa-sign-in-alt"></i></a>
					';
						}
						?>
				</form>


			<?php endwhile; ?>

			</div>

			<!-- //*Footer  -->

			<?php
			include "../footer.php";
			?>

			<!-- //? End Footer  -->
		</div>



	</div>
	<!-- <script src="http://localhost/ultimate/js/slide.js"></script> -->

</body>

</html>