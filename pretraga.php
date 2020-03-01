<?php

require_once "database.php";

session_start();

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
  header("Location: index.php");
  exit;
}

$p = null;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = null;
    $user = $_POST["user"];
    $team = null;
    $team = $_POST["team"];
    $player = null;
    $player = $_POST["player"];

    $t = 0;
    if($user !== null && $user != ""){
      $t = 1;  
      $sql = "SELECT * FROM users WHERE username = '$user'";
    }else if($team !== null && $team != ""){
      $t = 2;
      $sql = "SELECT * FROM user_teams WHERE name = '$team'";
    }else if($player !== null && $player != ""){
      $t = 3;
      $player = "                 ".$player."             ";
      $sql = "SELECT * FROM players WHERE `name` = '$player'";
    }else{
      $t = 0;
    }

    if($t!=0){
      $res = $conn->query($sql);
      if($res===false){
        die($conn->error);
      }
      $array = null;
      while($row = $res->fetch_assoc()){
        $array[] = $row;
      }
      //$p = null;
      if($t==1){
        $p = 1;
      }
      if($t==2){
        $p = 2;
      }
      if($t==3){
        $p = 3;
      }
    }
}

?>
<html>
    <head>
        <title>Search</title>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="CSS/pretraga.css">
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

              <h1>Search</h1> <br> <br>
  <form class="oh" method="POST" action="pretraga.php">
    <div>
        <label for="nameInput" class="ime">User</label>

        <input type="text" name="user" id="nameInput" placeholder="Insert name of the user...">
    </div>
    <br/>

    <div>
        <label for="linkInput" class="ime">Team</label>
        <br/>
        <input type="text" name="team" id="linkInput" placeholder="Insert name of the team...">
    </div>
    <br/>

    <div>
        <label for="linkInput" class="ime">Player</label>
        <br/>
        <input type="text" name="player" id="linkInput" placeholder="Insert name of the player...">
    </div>
    <br/>
<div>
  <button class="dugme" id ="lol">Search</button>
</div>

<br> <br>
<ul class="bv">
<!--
<li class="presedan">
   <form action="">
        <span class="ime"> Naziv tima </span>
 </form>
</li> -->
  <?php

    if($p!==null && $array!==null){
      echo "<h1>Results:</h1><br><hr><br>";
      if($p==1){
        echo "<h3>Users:</h3><br>";
        for($i=0;$i<count($array);$i++){
          echo "<li class=\"presedan\">
                  <a href=\"manager.php?user_id=".$array[$i]["id"]."\" class=\"ime\">".$array[$i]["username"]."</a>
                </li>";
        }
      }else if($p==2){
        echo "<h3>Teams:</h3><br>";
        for($i=0;$i<count($array);$i++){
          echo "<li class=\"presedan\">
                  <span class=\"ime\">".$array[$i]["name"]."</span>
                </li>";
        }
      }else if($p==3){
        echo "<h3>Players:</h3><br>";
        for($i=0;$i<count($array);$i++){
          echo "<li class=\"presedan\">
                  <span class=\"ime\">".$array[$i]["name"]."</span>
                </li>";
        }
      }

      echo "<br><br><br><br>";
    }

  ?>


</ul>



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
