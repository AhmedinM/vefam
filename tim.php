<?php

session_start();
require_once "database.php";

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
  header("Location: index.php");
  exit;
}

if(!isset($_SESSION["admin"]) || $_SESSION["admin"]!=1){
  header("Location: start.php");
  exit;
}

if(!isset($_GET["team_id"])){
    header("Location: timovi.php");
    exit;
}
 
$teamId = $_GET["team_id"];

$link = NULL;
//$photo = NULL;

if(isset($_SESSION["old"])){
    $link = $_SESSION["old"][0];
    //$photo = $_SESSION["old"][1];
    unset($_SESSION["old"]);
}

$image = null;

$sql = "SELECT * FROM clubs WHERE id = $teamId";
$result = $conn->query($sql);

$club = $result->fetch_assoc();

$poruka = null;
if(isset($_SESSION["porukaTim"])){
  $poruka = $_SESSION["porukaTim"];
  unset($_SESSION["porukaTim"]);
}

?>

<html>
    <head>
        <title>Team</title>
        <meta charset="utf-8">
        
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/styleI.css">
		
        <link rel="stylesheet" href="CSS/tim.css">
        <link rel="icon" type="image/ico" href="img/logo.jpg" />
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
      <ul style="margin-bottom: -20px;" class="navbar-nav mr-auto" >
        <li class="nav-item">
          <a class="nav-link" href="start.php" id="prvi">My Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="league1.php" >League 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="league2.php">League 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="fmcup.php">FM Cup</a>
        </li>
        <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1){
			echo "<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"panel.php\">Admin</a>
			</li>";
		} ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            My Account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="profile">
            <a class="dropdown-item" href="profil.php" style="color:black;">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" style="color:black;">Log out</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0"method="post" action="pretraga.php">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search..." aria-label="Search" id="src">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
</nav>

        <div class = "op">
          <br> <br> <br>
          <h1 style="color: black;"><?=$club["name"]?></h1>
          <br/><br/>
          <?php

            if($poruka!==null){
              echo "<span>".$poruka."</span>";
            }

          ?>
             <form action="club_scrapper.php" method="POST">
             <div>
               <label for="linkInput" class="ime">Players Link <i>(form sofascore.com)</i>:</label>
               <br/>
               <input type="text" name="link" id="linkInput" placeholder="Insert link for players...">
               <input type="hidden" name="team_id" value=<?=$teamId?>>
            </div>
          <br/>

          <br/>
           <div>
           <button class="dugme">Save</button>
        </div>
      </form>
     </div>


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
