<?php

session_start();

if(isset($_SESSION["logged"]) && $_SESSION["logged"]===true){
  header("Location: start.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/validate.css">

    <link rel="icon" type="image/ico" href="img/logo.jpg" />
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="JS/js.js" charset="utf-8" defer></script>
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

    <header>

    <div class="main">
      <div class="logo">
         <img src="img/logo.jpg" alt="logo">
      </div>
      <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>    <!--class="fas fa-chevron-down" -->
        

        <!--<label for="chec" class="rot"> <i class="fas fa-user"></i> My Account   <i class="fas fa-angle-down"></i></label>

<input id="chec" type="checkbox">

<div class="test">
 <p> <a id = "myBtn">Sign In</a></p>
 <p><a id = "bat">Sign Up</a></p>
</div>-->

      </ul>

  </div>




  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
  <div class="login-wrap">
   <div class="login-html">
     <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log in</label>

     <div id="loginform" class="login-form">
       <form class="sign-in-htm" action="login.php" method="POST">
         <div id="lgngroup" class="group">
           <label for="user" class="label">Username: </label>
           <input id="username" name="username" type="text" class="input">
         </div>
         <div id="lgngroup" class="group">
           <label for="pass" class="label">Password: </label>
           <input id="password" name="password" type="password" class="input" data-type="password"> <br>
         </div>
         <div id="lgngroup" class="group">
           <!--<input id="check" type="checkbox" class="check" checked>
           <label for="check"><span class="icon"></span> Ostavi me prijavljenog</label>-->
         </div>
         <div id="lgngroup" class="group">
           <input type="submit" class="button" value="Log in"> <br> <br> <br> <br> <br>
         </div>
         <div class="hr"></div>
         <div class="foot-lnk">
           <!--<a href="#forgot" class="reg">Zaboravio si lozinku?</a>-->
         </div>
       </form>
     </div>
   </div>
  </div>
</div>
</div>



<div id="maj" class="moja">


  <div class="mojasad">
    <span class="klous">&times;</span>

    <div class="login-wrap">
     <div class="login-html">

       <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Register</label>
       <div id= "regform" class="login-form">

         <form class="sign-up-htm" action="register.php" method="POST">
           <div class="group">
             <br>
             <label for="user" class="label">Username:</label>
				<input type="text" name="username" placeholder="Enter Username" required  onblur="usernameBlur(this)" id="username" class="input"><span id="usernspan"></span>	
           </div>
           <div class="group">
            <label for="user" class="label">Email:</label>
				<input type="email" placeholder="Enter Email" name="email" required onblur="emailBlur(this)" id="emaill" class="input"><span id="email"></span>
          </div>
           <div class="group">
             <label for="pass" class="label">Password:</label>
            <input type="password" name="password" placeholder="Enter Password" required id="inLozinka" onblur="passwBlur(this)" class="input" data-type="password"><span id="passspan"></span>
           </div>
           <div class="group">
             <label for="pass" class="label">Confirm password:</label>
            <input type="password" name="passwordd" placeholder="Enter Password" required onblur="potvrdilBlur(this)" id="inpoLozinka" class="input" data-type="password"> </input><span id="potvrdaLozinke"></span>
             <br>
           </div>
           <div class="group">
             <input type="submit" id="submitt" class="button" value="Register">
           </div>
		   <div class="group" id="vec">
		    <!--<a href="log.html">Already regitered?</a>-->
		   </div>
          </form>
		 <script src="JS/register-validate3.js"> </script>
       </div>
     </div>
    </div>

  </div>
</div>



<div class="bg">

</div>
    <div class="title">
           <h2>Virtual European Football Association</h2>
           <h2 class="podnaslov">Of Managers</h2>
           <h4>Create and manage your own football team. Set winning tactics to beat opponents and take your club from dust to glory.</h4> <br>
    </div>

      <div class="button">
          <a href="#" class="btn" id="myBtn">PLAY NOW FOR FREE</a>
          <a href="#" class="btn" id="bat">BECOME A MANAGER</a>
      </div>

    </header>

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
