<?php

session_start();

require_once "database.php";

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
    header("Location: index.php");
    exit;
}

$msg = null;

$sql = "SELECT * FROM `notification`";
$res = $conn->query($sql);
if($res===false){
  die($conn->error);
}
$msg = $res->fetch_assoc();

$id = $_SESSION["id"];
$team = null;
$players = null;
$playersR = null;
$gk = null;
$df = null;
$mf = null;
$at = null;

$sql1 = "SELECT * FROM `user_teams` WHERE `user_id` = $id";
$res1 = $conn->query($sql1);

if($res1===false){
  die($conn->error);
}
$team = $res1->fetch_assoc();

if($team!==null){
    $tId = $team["id"];
    $sql2 = "SELECT * FROM `user_players` WHERE `team_id` = $tId";
    $res2 = $conn->query($sql2);
    if($res2===false){
      die($conn->error);
    }
    
    while($row2 = $res2->fetch_assoc()){
      $players[] = $row2;
    }
    if($players!==null){
      for($i=0;$i<count($players);$i++){
        $pId = $players[$i]["player_id"];
        $sql3 = "SELECT * FROM `players` WHERE `id` = $pId";
        $res3 = $conn->query($sql3);
        if($res3===false){
          die($conn->error);
        }
        $playersR[] = $res3->fetch_assoc();
      }
      if($playersR!==null){
        for($i=0;$i<count($playersR);$i++){
          if($playersR[$i]["position"]=="Goalkeeper"){
            $gk = $playersR[$i];
          }else if($playersR[$i]["position"]=="Defender"){
            $df[] = $playersR[$i];
          }else if($playersR[$i]["position"]=="Midfielder"){
            $mf[] = $playersR[$i];
          }else if($playersR[$i]["position"]=="Forward"){
            $at[] = $playersR[$i];
          }
        }
      }
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Team</title>
    <link rel="stylesheet" href="CSS/okvir.css">
    <link rel="icon" type="image/ico" href="img/logo.jpg" />
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

   <!--<style>/*
   body  {
   background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/3.jpg) /*repeat 0 0 */ no-repeat center center fixed;
   height: 70%;
   background-position: center;
   background-size:cover;
*/
   }
  </style>-->

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

    <!--Poruka-->
    <div style="margin-left:25%; margin-right:25%; margin-top: 10px; border: solid 3px red; color:red;">
      <?php
        if($msg!==null){
          echo "<h3>Notification:</h3> ".$msg["text"];
        }
      ?>
    </div>
    <!--Sadrzaj-->
    <br><br><br>
    <div style="margin-left:25px; margin-right:25%; margin-bottom:-35%; background-color: #1a75ff; padding: 10px; color: white">
        <div>
          <h3>Budget:</h3> €<?php if($team!==null){
                echo $team["money"];
          }?>m
          <br><br>
          <h3>Last Points:</h3> <?php if($team!==null){
                echo $team["last"];
          }?>
          <br><br>
          <h3>Season points:</h3> <?php if($team!==null){
                echo $team["sum"];
          }?>
          <br>
        </div>
        <br>
        <hr>
        <br>
        <div>
          <h3>Players:</h3>
          <br><br>
          <?php
            if($gk!==null){
              echo "<i>Goalkeeper:</i> ".$gk["name"]." - <b>".$gk["last_points"]."</b> points <br><br>";
            }
            echo "<br>";
            if($df!==null){
              for($j=0;$j<count($df);$j++){
                echo "<i>Defender:</i> ".$df[$j]["name"]." - <b>".$df[$j]["last_points"]."</b> points <br><br>";
              }
            }
            echo "<br>";
            if($mf!==null){
              for($j=0;$j<count($mf);$j++){
                echo "<i>Midfielder:</i>" .$mf[$j]["name"]." - <b>".$mf[$j]["last_points"]."</b> points <br><br>";
              }
            }
            echo "<br>";
            if($at!==null){
              for($j=0;$j<count($at);$j++){
                echo "<i>Forward:</i> ".$at[$j]["name"]." - <b>".$at[$j]["last_points"]."</b> points <br><br>";
              }
            }

          ?>
        </div>
        <br>
        <hr>
        <br>
        <div>
            <a style="border: solid 2px white; background-color: red; padding: 5px" href="html.php">New Players</a>
        </div>
        <br><b></b>
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
