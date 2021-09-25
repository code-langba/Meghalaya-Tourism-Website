<?php
// session_start();
// Include config file

require_once "includes/dbh.inc.php";
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Vehicle Booking | VisitMeg</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<div class="main-maincontainer">

		<!-- //*Header -->
		<?php
		require "header.php";
		?>
		<!-- //? End Header -->

		<div class="vehicle-container">
			<h5>Book a vehicle &nbsp;<i class="fas fa-taxi"></i></h5>


			<div class="veh-form">
				<!-- Cars Description -->
				<div class="vehicles">
					<div class="cars">

						<div class="carpic" id="i1">
							<img src="./img/2_seat.jpg" alt="No Ac 4 seat" width="100%">
						</div>
						<div class="cardes">
							<div>
								<h1>Mini</h1><br>
								<p>A regular comfortable hatchback that becomes your everyday dependable ride. An economical option for daily commute.</p>
								<br>
								<br>
								<b>AC:</b> No &nbsp&nbsp&nbsp&nbsp<b>Seats:</b> 4 <br><br><br>
								<h2><b>Price:</b> &nbsp ₹ 2000 </h2>
							</div>

						</div>

					</div>
					<div class="cars">
						<div class="carpic" id="i2">
							<img src="./img/4_seat.jpg" alt="Ac 4 seat" width="100%" height="100%">
						</div>
						<div class="cardes">
							<div>
								<h1>Sedan</h1><br>
								<p>
									Top rated drivers, and a hand-picked fleet of the best cars with extra legroom and boot space.
								</p>
								<br>
								<br>
								<b>AC:</b> Yes &nbsp&nbsp&nbsp&nbsp<b>Seats:</b> 4 <br><br><br>
								<h2><b>Price:</b> &nbsp ₹ 3000 </h2>
							</div>
						</div>
					</div>
					<div class="cars">
						<div class="carpic" id="i3">
							<img src="./img/7_seat.jpg" alt="Ac 7 seat" width="100%" height="100%">
						</div>
						<div class="cardes">
							<div>
								<h1>Economic</h1><br>
								<p>
									A perfect choice of car for your weekend getaways, with plenty of room for everyone including that extra bag.
								</p>
								<br>
								<br>
								<b>AC:</b> Yes &nbsp&nbsp&nbsp&nbsp<b>Seats:</b> 7 <br><br><br>
								<h2><b>Price:</b> &nbsp ₹ 5000 </h2>
							</div>
						</div>
					</div>
					<div class="cars">
						<div class="carpic" id="i4">
							<img src="./img/10_seat.jpg" alt="Ac 10 seat" width="100%" height="100%">
						</div>
						<div class="cardes">
							<div>
								<h1>Party</h1><br>
								<p>The best choice you can make when it comes to travelling with a big family.</p>
								<br>
								<br>
								<b>AC:</b> Yes &nbsp&nbsp&nbsp&nbsp<b>Seats:</b> 10 <br><br><br>
								<h2><b>Price:</b> &nbsp ₹ 7000 </h2>
							</div>
						</div>
					</div>
				</div>
				<div class="carbook-form">
					<form action="includes/car.inc.php" method="post" class="car-form">

						<!-- @Location -->
						<h3>BOOKING DETAILS</h3>
						<?php
						if (isset($_GET['error'])) {
							if ($_GET['error'] == "emptyfields") {
								echo '<p style="color:#F00; font-size: 20px; text-align:center; border:1px solid red; padding:10px 0; background:rgba(255, 0, 0, 0.18); width:100%; margin:0;" class="signuperror">Fill in all the fields!</p>';
							} elseif ($_GET['error'] == "invaliddate") {
								echo '<p style="color:#F00; font-size: 20px; text-align:center; border:1px solid red; padding:10px 0; background:rgba(255, 0, 0, 0.18); width:100%; margin:0;" class="signuperror">Invalid Booking date provided. Please avoid using a past date!</p>';
							}
						}
						if (isset($_GET['booking']) == "success") {
							echo '<p id="success" class="signupsuccess" style="color:rgb(31, 156, 14); font-size: 20px; text-align:center; border:1px solid green; padding:10px 0; background:rgba(0, 255, 0, 0.20); align-self:center; margin:0; width:100%;">Booking Successful!</p>';
						}
						?>
						<?php if (isset($_GET['error'])) {
							if ($_GET['error'] == "full") {
								echo "<p>Book Full</p>";
							}
						}
						?>
						<p>Pickup Location</p>
						<select class="place-select" name="inputAddress">
							<option value="Nongpoh" selected>Nongpoh,Meghalaya</option>
							<option value="Jowai" selected>Jowai,Meghalaya</option>
							<option value="Tura" selected>Tura,Meghalaya</option>
							<option value="Shillong" selected>Shillong,Meghalaya</option>
							<option value="Nongstoin" selected>Nongstoin,Meghalaya</option>
							<option value="Khanapara" selected>Khanapara,Guwahati, Assam</option>
							<option value="Jhalukbari">Jhalukbari,Guwahati,Assam</option>
							<option value="Airport">Airport,Guwahati,Assam</option>
							<option value="PaltanBazaar">Paltan Bazaar,Guwahati,Assam</option>
						</select>
						<!-- <input type="text" name="inputAddress" placeholder="Pickup Location" required> -->
						<!-- <p></p>
						<input type="text" name="destination" placeholder="Enter Destination" required> -->
						<p>Pickup Date</p>
						<input type="date" name="S_date" placeholder="Reserve date" required>
						<p>Pickup Time</p>
						<input type="time" name="S_time" placeholder="Pickup time" required>
						<span id="vehtype">
							<h2>Vehicle type</h2>
							<select class="custom-select custom-select-lg mb-3" name="vtype">
								<option value="MINI" selected>Mini</option>
								<option value="SEDAN">Sedan</option>
								<option value="ECONOMIC">Economic</option>
								<option value="PARTY">Party</option>
							</select>
						</span>

						<?php
						if (isset($_SESSION['email'])) {
							echo '<input type="submit" id="checkin" value="BOOK" name="Book">';
						} else {
							echo '
							<a id="check-log" >Login <i class="fas fa-sign-in-alt"></i></a>
      							';
						}


						?>
					</form>
				</div>


			</div>

		</div>

		<!-- Cars End -->
		<!-- //*Footer  -->
		<?php
		include "footer.php";
		?>

		<!-- //? End Footer  -->

	</div>
</body>

</html>