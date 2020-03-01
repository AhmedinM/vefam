<?php

require_once "database.php";

session_start();

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

$sql2 = "SELECT * FROM clubs WHERE id = ".$teamId;
$res2 = $conn->query($sql2);

$row2 = null;
$row2 = $res2->fetch_assoc();

$sql1 = "SELECT * FROM players WHERE club = $teamId  ORDER BY `name` ASC";
$res1 = $conn->query($sql1);
$arr2 = null;

/*if($res1===false){
  die($conn->error);
}*/
$i = 0;
while($row1 = $res1->fetch_assoc()){
  $arr2[] = $row1;
  $i++;
}


?>

<html>
    <head>
        <title>Players</title>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="CSS/timovi3.css">
        <link rel="icon" type="image/ico" href="img/logo.jpg" />
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body>

    <header>

<div class="main">
  <div class="logo">
	 <img src="img/logo.jpg" alt="logo">
  </div>
  <ul class="proba" style="position: absolute; margin-left: 85px;">

	<li><a href="start.php">My Team</a></li>
	<li><a href="league1.php">League 1</a></li>
	<li><a href="league2.php">League 2</a></li>
	<li><a href="fmcup.php">FM Cup</a></li>
	<li><a href="pretraga.php">Search</a></li>
	<?php if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1){
    echo "<li><a href=\"panel.php\">Admin</a></li>";
  }?>
	<label for="chec" class="rot"> <i class="fas fa-user"></i> My Account <i class="fas fa-angle-down"></i></label>

<input id="chec" type="checkbox">

<div class="test" style="position: relative;">
<p> <a href="profil.php">Profile</a></p>
<p><a href="logout.php">Log out</a></p>
</div>

  </ul>

</div>
</header>



        <div class = "op">
          <br> <br> <br>
          <h1 class="cent">List of Teams</h1> <br>
          <ul class="opa">
            <br>
            <?php 
            if($row2!==null){
              
                echo "<br>";
                echo "<h2>".$row2["name"]."</h2>";
                echo "<br>";
                if($arr2!==null){
                  for($j=0;$j<count($arr2);$j++){
                    if($arr2[$j]["club"]==$row2["id"]){
                      echo "<li>
                              <div>
                                <span class=\"spa\">".$arr2[$j]["name"]."</span>
                                <a class=\"dugme\" href=\"igrac.php?team_id=".$arr2[$j]["id"]."\">Edit</a>
                              </div>
                            </li>";
                    }
                  }
                }
              
              
            }
            ?>
            
            <!--<h2>Name of the League</h2>
            <br>
            
            <li>
              <div>
                <span class="spa"> Barselona </span>
                <a class="dugme" href="tim.php?team_id=1">Edit</a>
              </div>
            </li>
            <li>
              <div>
                <span class="spa"> Barselona </span>
                <a class="dugme" href="tim.php?team_id=1">Edit</a>
              </div>
            </li>
            <br>
            <hr>
            <br>
            <h2>Name of the League</h2>
            <br>
            <li>
              <div>
                <span class="spa"> Barselona </span>
                <a class="dugme" href="tim.php?team_id=1">Edit</a>
              </div>
            </li>
            <li>
              <div>
                <span class="spa"> Barselona </span>
                <a class="dugme" href="tim.php?team_id=1">Edit</a>
              </div>
            </li>-->
         </ul>


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
