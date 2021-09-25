<footer id="footer" class="default-padding">
    <div class="admin-details flex-column">
        <h1>About Us</h1>
        <label>Business owner: Hame Mawlong</label>
        <label>Business partners: Aleazer, Aiden</label>


    </div>
    <div class="contact-details flex-column">
        <h1>Contact</h1>
        <label>Helpline No: 8257885296</label>
        <label>Email: visitmeghalaya@gmail.com</label>
        <label>Address: Shillong, Meghalaya</label>
        <div id="icons">
            <a href="#">
                <i class="fab fa-facebook"></i>

            </a>
            <a href="#">
                <i class="fab fa-twitter-square"></i>

            </a>
            <a href="#">
                <i class="fab fa-instagram"></i>

            </a>
        </div>
    </div>
    <div class="useful-links flex-column">
        <h1>Links</h1>

        <a href="http://localhost:8080/ultimate/admin/"><i class="fas fa-user-shield"></i>&nbspAdmin</a>
        <a href="http://localhost:8080/ultimate/hotelmanager/"><i class="fas fa-concierge-bell"></i>&nbspHotel Manager</a>
        <a href="http://localhost:8080/ultimate/feedback.php"><i class="far fa-comment-dots"></i>&nbspGive your feedback</a>
  
    </div>
</footer>

<script src="https://kit.fontawesome.com/3fdeee195a.js" crossorigin="anonymous"></script>
 <script src="http://localhost:8080/ultimate/js/slide.js"></script>
<script src="http://localhost:8080/ultimate/js/slider.js"></script>


<?php
	//  $error = "";

	if (isset($_GET['error'])) {
		if ($_GET['error'] == "emptyfield") {
			echo '<script>
				open(1);
			  
			</script>';
		}
		if ($_GET['error'] == "wrongpassword") {
			echo '<script>
				open(2);
			    </script>';
		}
		if ($_GET['error'] == "nouser") {
			echo '<script>
				open(3);
			  </script>';
		}
	}

	?>