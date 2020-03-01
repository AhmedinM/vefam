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
    <link rel="stylesheet" href="CSS/league11.css">
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
    
    <div id="Table" class="tabcontent" class="boja">
      <table class="tabela">
        <tr class="zaglavlje">
          <th>#</th>
          <th> <b>Team</b></th>
          <th> <b>Manager</b></th>
          <th> <b> Last match</b></th>
          <th><b>Sum</b></th>
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
								echo "<td>"; echo "<a href=\"manager.php?user_id=".$row["id"]."\">".$row2['username']."</a>"; echo "</td>";
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

    <div class="poruka">
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


  </body>
</html>
