<?php

require_once "database.php";

session_start();

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
    header("Location: index.php");
    exit;
}

if(!isset($_GET["user_id"])){
    header("Location: start.php");
    exit;
}

$id = $_GET["user_id"];

$sql = "SELECT * FROM users WHERE id = $id";
$res = $conn->query($sql);
if($res===false){
  die($conn->error);
}

$row = $res->fetch_assoc();

$sql2 = "SELECT * FROM user_teams WHERE `user_id` = $id";
$res2 = $conn->query($sql2);
if($res2===false){
  die($conn->error);
}

$row2 = null;
$row2 = $res2->fetch_assoc();

if($row["league"]==1){
  $row["league"] = "League One";
}else{
  $row["league"] = "League Two";
}

?>
<html>
    <head>
        <title>Manager</title>
        <meta charset="utf-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Work+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" href="CSS/manager.css">
        <link rel="icon" type="image/ico" href="img/logo.jpg" />
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body>



      <style>
body  {
background:linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)), url(img/manager.jpg) /*repeat 0 0 */ no-repeat center center fixed;
height: 70%;
background-position: center;
/*  background-repeat: no-repeat;*/
background-size:cover;

}
</style>

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


<div class="ok">

<h1 class="Career">Career</h1>


<div class="opis">

   <p><img src="img/avatar.jpg" alt="Pineapple" class="slk" style="width:200px;height:230px;margin-right:15px;">
<span>Personal data</span> <br>
<div class="podaci">
<div class="pod">
  <span class="krit">  Username  </span>  <span class="dr"> <?=$row["username"]?></span> <br>
</div>
<span class="krit">   </span>  <span class="dr"></span> <br>
<!--<div class="pod">
  <span class="krit">  Day of Birth  </span>  <span class="dr" id="dan"> 01/01/2015</span> <br>
</div>
<span class="krit">  Age  </span>  <span class="dr" id="god"> 50</span> <br>-->
<div class="pod">
  <span class="krit"> </span>  <span class="dr" id="oba1"> <!--Spanish--></span> <br>
</div>
<span class="krit">  </span>  <span class="dr" id="oba"> </span> <br>
<div class="pod">
  <span class="krit">  Club  </span>  <span class="dr" id="club"> <?php if($row2!==null){$row2["name"];}?></span> <br>
</div>
<span class="krit">  League  </span>  <span class="dr" id="league"> <?=$row["league"]?></span> <br>
<div class="pod">
  <span class="krit">   </span>  <span class="dr" id="club"> </span> <br>
</div>
<span class="krit">   </span>  <span class="dr" id="league"> </span> <br>
</div>

<div class="pl">
  Experience
</div>
<div class="plo">
<!--<div class="plod" style="margin-top:0px;">
  At Club Since
</div>
<span class="odg">01/01/2018</span>-->
<div class="plod">
  League 1 Titles
</div>
<span class="odg"><?=$row["league_one"]?></span>
<div class="plod">
  League 2 Titles
</div>
<span class="odg"><?=$row["league_two"]?></span>
<div class="plod">
  Cup Titles
</div>
<span class="odg"><?=$row["cup"]?></span>
</div>


<div class="okvir">
<div class="pk">
   <br> <br>
  <div class="">
  
  </div>
</div>

</div>

<br> <br>
<div class="okvir">

<h4>My career</h4>
<div class="red">
<span class="cl">Title</span>
<span class="p">P</span>
<span class="w">W</span>
<span class="d">A</span>
<span class="l">L</span>
<span class="gf">M</span>
<span class="ga">T</span>
<span class="gd">S</span>
</div>
<br>
<div class="red2">
  <span class="klub">League</span>
  <span class="poeni">4</span>
  <span class="win">2</span>
  <span class="draw">5</span>
  <span class="lost">5</span>
  <span class="goalsf">52</span>
  <span class="goalsa">25</span>
  <span class="goalsd">1</span>
</div>
<div class="red3" id="poslednje">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
<div class="red2" id="prazno">
  <span class="klub">Cup</span>
  <span class="poeni">4</span>
  <span class="win">2</span>
  <span class="draw">5</span>
  <span class="lost">5</span>
  <span class="goalsf">52</span>
  <span class="goalsa">25</span>
  <span class="goalsd">1</span>
</div>
<div class="red3" id="poslednje">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
<div class="red2" id="prazno">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
<div class="red3" id="poslednje">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
<div class="red2" id="prazno">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
<div class="red3" id="poslednje">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
<div class="red2" id="prazno">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
<div class="red3" id="poslednje">
  <span class="klub"></span>
  <span class="poeni"></span>
  <span class="win"></span>
  <span class="draw"></span>
  <span class="lost"></span>
  <span class="goalsf"></span>
  <span class="goalsa"></span>
  <span class="goalsd"></span>
</div>
</div>

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
