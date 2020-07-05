<?php

session_start();

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
  header("Location: index.php");
  exit;
}

$pos = null;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>League 1</title>
    <link rel="stylesheet" href="CSS/league1.css">
    <link rel="icon" type="image/ico" href="img/logo.jpg" />
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="CSS/styleI.css">
<link rel="stylesheet" href="CSS/validateI.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="JS/js.js" charset="utf-8" defer></script>
 
<style>
      body  {
      
      background-image:  url(img/league.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      
      
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
          <li class="nav-item active">
            <a class="nav-link" href="#" id="prvi">My Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >League 1</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">League 2</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">FM Cup</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Admin</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="profile">
              <a class="dropdown-item" href="#" style="color:black;">Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" style="color:black;">Log out</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" id="src">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    
    <div id="Table" class="container-fluid row">
      <table class="table">
        <tr colspan=2>
          <th class="zaglavlje">#</th>
          <th class="zaglavlje"> <b>Team</b></th>
          <th class="zaglavlje"> <b>Manager</b></th>
          <th class="zaglavlje"> <b> Last match</b></th>
          <th class="zaglavlje"><b>Sum</b></th>
        </tr>
    <?php 
		$con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$imeLige=1;
			$sql="SELECT * FROM user_teams  WHERE league='$imeLige' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
							$brojac +=1;
              echo "<tr class='red'>";
              if($brojac>25){
                if($brojac%2===0){
                  echo "<td class=\"bot\">"; echo $brojac; echo ".</td>";
                }else{
                  echo "<td class=\"bott\">"; echo $brojac; echo ".</td>";
                }
              }else{
                echo "<td>"; echo $brojac; echo ".</td>";
              }
							echo "<td>"; echo $row['name']; echo "</td>";
              $userid=$row['user_id'];
              if(isset($_SESSION["id"]) && $userid == $_SESSION["id"]){
                $pos = $brojac;
              }
							$sql2="SELECT * FROM users  WHERE id='$userid'";
							$result2=$con->query($sql2);
							while($row2=mysqli_fetch_array($result2))
							{
								echo "<td>"; echo "<a href=\"manager.php?user_id=".$row["user_id"]."\">".$row2['username']."</a>"; echo "</td>";
							}
							$templast=$row['last'];
							
							echo "<td>"; echo $templast ; echo "</td>";
							echo "<td>"; echo $row['sum']; echo "</td>";
							echo "</tr>";
			}
		}

		?>
      </table>
    </div>

    <div class="poruka well">
        Teams on positions from 26 to 32 - relegation at the end of sesason to the League 2. <br>
        <?php
          if($pos!==null){
            echo "<b>Your team is on postion <i>".$pos."</i>.</b>";
          }
        ?>
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

<script>
// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
document.getElementById("header").style.fontSize = "30px";
} else {
document.getElementById("header").style.fontSize = "90px";
}
}
</script>


</body>
</html>
