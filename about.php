<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About & Contact</title>
    <link rel="stylesheet" href="CSS/about2.css">
    <link rel="stylesheet" href="CSS/validate.css">
	
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="CSS/styleI.css">

    <link rel="icon" type="image/ico" href="img/logo.jpg" />
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="js.js" charset="utf-8" defer></script>
   <style>
   body  {
   background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/3.jpg) /*repeat 0 0 */ no-repeat center center fixed;
   height: 70%;
   background-position: center;
/*  background-repeat: no-repeat;*/
   background-size:cover;

   }
  </style>

  </head>
  <body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#" style = "margin-left:-15px;margin-top:-12.5px; margin-bottom:-12.5px;">
          <img style="height: 81px;" src="img/logo.jpg" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" >
          <li class="nav-item">
            <a class="nav-link" href="index.php" id="prvi">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php" >About</a>
          </li>
        </ul>
      </div>
    </nav>



		<!--KOD-->
    <div class="naslov">
        <h3 class="mainh">Meet VEFAM</h6>
    </div>
    <div class="about-text">

      <button class="accordion">Who are we?</button>
      <div class="panel">
          <br>
        VEFAM stands for Virtual Europian Football Assotiation of Managers.
        We are a team of five IT students at University of Montenegro, who agreed
        to collaborate on a group project for their faculty, and our team is called Offside. The idea is to create
        unique Football manager accessible to as many people as it can reach.
        The project is developing day by day, and creators are trying their best to make it better by every update.
        <br>
        <br>
      </div>
      <button class="accordion">Team members</button>
      <div class="panel">
        <br>
        <p>Ahmedin Muratovic, backend developer,   index: 22/17 </p>
        <br>
        <p>Irvin Huremovic,  frontend developer,    index: 19/17 </p>
        <br>
        <p>Filip Stankovic,  frontend developer,    index: 5/17 </p>
        <br>
        <p>Enis Licina,  backend developer,    index: 38/17 </p>
        <br>
        <p>Ljiljana Gospic,   frontend developer,   index: 2/17 </p>
        <br>
      </div>

        <button class="accordion">Contact us</button>
        <div class="panel">
          <p style="color:#0195D5;"> Location:</p>
           Cetinjska 2, <br> 81 000 Podgorica <br> MONTENEGRO <br>
          <p style="color:#0195D5;">  e-mail:</p>
          huremovicirvin@gmail.com
                  <br> ljiljanagospic@gmail.com
                  <br>
                  <p style="color:#0195D5;">phone:</p>

                    +382 68 236 162,

                    +382 69 555 555,

                    +382 20 666 666
        </div>
        <button class="accordion"><a href="downloads/projekat.pdf" download="projekat"> Download</a></button>

          </div>

          <script>
          var acc = document.getElementsByClassName("accordion");
          var i;

          for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
              this.classList.toggle("active");
              var panel = this.nextElementSibling;
              if (panel.style.display === "block") {
                panel.style.display = "none";
              } else {
                panel.style.display = "block";
              }
            });
          }
          </script>


    <footer class="footer-distributed">

			<div class="footer-left">
          <img src="img/logo.jpg">
				<h3>About<span>VEFAM</span></h3>

				<p class="footer-links">
					<a href="index.php">Home</a>
					|
					<a href="about.php">About</a>
				</p>

				<p class="footer-company-name">© 2020 Project by Offside.</p>
			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <p><span>Bulevar Džordža Vašingtona, Podgorica</span>
						UCG PRIRODNO-MATEMATICKI FAKULTET</p>
				</div>

				<div>
				<i class="fas fa-phone"></i>
					<p>+382 695555555</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:">huremovicirvin@gmail.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					We are a team of five IT students at University of Montenegro, who agreed
        to collaborate on a group project for their faculty, and our team is called Offside.</p>

				<div class="footer-icons">
          <a href="https://www.facebook.com/" id="f1"><i class="fab fa-facebook-f" aria-hidden="true" ></i></a>
					<a href="https://www.twitter.com/" id="f2"><i class="fab fa-twitter" aria-hidden="true"></i></a>
          <a href="https://www.pinterest.com/" id="f3">	<i class="fab fa-pinterest" aria-hidden="true"></i></a>
					<a href="https://www.instagran.com/" id="f4"><i class="fab fa-instagram"></i></a>
					<a href="https://www.youtube.com/" id="f5"><i class="fab fa-youtube"></i></a>

				</div>
			</div>
		</footer>



    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }





    var dom = document.getElementById("maj");

    // Get the button that opens the modal
    var bat = document.getElementById("bat");

    // Get the <span> element that closes the modal
    var psan = document.getElementsByClassName("klous")[0];

    // When the user clicks the button, open the modal
    bat.onclick = function() {
      dom.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    psan.onclick = function() {
      dom.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == dom) {
        dom.style.display = "none";
      }
    }
</script>


  </body>
</html>
