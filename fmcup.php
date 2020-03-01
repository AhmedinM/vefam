<?php

session_start();

require_once "database.php";

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
    header("Location: index.php");
    exit;
}

$sqlO = "SELECT * FROM `round`";
$resO = $conn->query($sqlO);

$rowO = $resO->fetch_assoc();

$number = $rowO["number"];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>FM Cup</title>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="CSS/fmcup2.css">
    <script src="JS/fmcup.js" defer></script>
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
    <!--<br><br><br><br>
    <img src="img/fmcup.jpg" alt="Nema" id="slika">
    <br/>
    <br/>-->
    <br>
    <div class="glavna">
    <div class="tab">
      <button id="dugme1" class="dugme">Groups</button> <!--onclick="openTab(event, 'Table')"-->
      <button id="dugme2" class="dugme">Playoffs</button> <!--onclick="openTab(event, 'Cup')"-->
    </div>

    <div id="table" class="tabcontent" style="display: block">
      <br/>
  <br>

      <div class="okvir">
	  
	  <?php //// prve dvije grupee
	  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
		//11111
		echo ' <div class="maina">';
			$imeGrupe=1;
			$brFaze=1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				 echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
					
					///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				//echo '</td><td>xx</td><td>xx</td><td>';
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		////2222222222222222
			$imeGrupe=2;
			$brFaze = 1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
	
				 	///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		echo '</div>';
		/////222222 kraj
	//   echo ' <div class="maina">';
	//    echo ' <div class="a">';
	//	echo '<table class="grupa">';
	//	echo '<tr > <th class="thead" colspan="5"> Group ';  echo '</th></tr>';
	//	echo '<tr class="member"> <td class="prolaz">1.</td><td>Team1</td><td>xx</td><td>xx</td><td>xxx</td> </tr>';
	//	echo '<tr class="member"> <td class="prolaz">2.</td><td>Team2</td><td>xx</td><td>xx</td><td>xxx</td> </tr>';
	//	echo '<tr class="member"> <td class="ispadanje">3.</td><td>Team3</td><td>xx</td><td>xx</td><td>xxx</td> </tr>';
	//	echo ' <tr class="member"> <td class="ispadanje">4.</td><td>Team4</td><td>xx</td><td>xx</td><td>xxx</td> </tr>';
	//	echo ' </table>';
	//	echo '</div>';
	//	echo '</div>';
		
	  ?>
	    <?php //// druge dvije grupee
	  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
		//11111
		echo ' <div class="maina">';
			$imeGrupe=3;    //////////////ime grupeeeeeeeeeeee
			$brFaze = 1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
	
					///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				 
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		////2222222222222222
			$imeGrupe=4;
			$brFaze = 1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
	
					///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				 
				 
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		echo '</div>';
	
	  ?>
	   <?php //// trece dvije grupee
	  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
		//11111
		echo ' <div class="maina">';
			$imeGrupe=5;    //////////////ime grupeeeeeeeeeeee
			$brFaze = 1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
	
					///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				 
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		////2222222222222222
			$imeGrupe=6;
			$brFaze = 1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
	
					///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				 
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		echo '</div>';
	
	  ?>
	   <?php //// cetvrte dvije grupee
	  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
		//11111
		echo ' <div class="maina">';
			$imeGrupe=7;    //////////////ime grupeeeeeeeeeeee
			$brFaze = 1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
	
					///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				 
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		////2222222222222222
			$imeGrupe=8;
			$brFaze = 1;
			$sql="SELECT * FROM cups  WHERE _group='$imeGrupe' AND phase='$brFaze' order by sum DESC";
			$result=$con->query($sql);
			if($result->num_rows>0)
		{
				echo ' <div class="a">';
				 echo '<table class="grupa">';
				 echo '<tr > <th class="thead" colspan="5"> Group ';echo $imeGrupe ;  echo '</th></tr>';
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
				$klas="";
				$brojac +=1;
				if($brojac<3)
				{
					$klas="prolaz";
				}
				else 
				{
					$klas="ispadanje";
				}
				echo "<tr class=\"member\"> <td class=\"".$klas."\">".$brojac.".</td><td>";
				 $timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;}
	
					///round
					$sql3="SELECT * FROM round ";
			 $result3=$con->query($sql3);
				 while($row3=mysqli_fetch_array($result3)){echo '</td><td>';echo $row3['number'] ; echo'</td><td>';}
				//end round
				 
				 echo $row["sum"];echo'</td> </tr>';				
			}
			 echo ' </table>';
				 echo '</div>';
		}
		echo '</div>';
	
	  ?>
	  <br><br>
        </div>
      </div>

      <br><br>
      <!--pocetak--><div id="cup" class="tabcontent" style="display: none">
        <div class="">
          <div class="tournament-headers">
         <h3>Round of 16</h3>
         <h3>Quarter-Finals</h3>
         <h3>Semi-Finals</h3>
         <h3>Final</h3>

       </div>
        <div class="bracket_">
          <ul class = "bracket bracket1">
		  
		  <?php ///plejof grupa 1 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=1;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo "</td> <td>".$number."</td> <td>".$row2["sum"]."</td>  </tr>  <tr class=\"row\">  <td class=\"unk\">";
				 }
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo "<td>".$number."</td> <td>".$row2["sum"]."</td>  </tr> </table>  </li>";
				 }
				}
				
			}
			
		}
		  ?>
		   <?php ///plejof grupa 2 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=2;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo "</td> <td>".$number."</td> <td>".$row2["sum"]."</td>  </tr>  <tr class=\"row\">  <td class=\"unk\">";
				 }
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  ?>
		   <?php ///plejof grupa 3 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=3;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  ?>
		   <?php ///plejof grupa 4 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=4;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  ?>
		   <?php ///plejof grupa 5 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=5;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  ?>
		   <?php ///plejof grupa 6 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=6;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  ?>
		   <?php ///plejof grupa 7 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=7;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  ?>
		   <?php ///plejof grupa 8 faza1
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=8;
			$faza=2;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  ?>
          </ul>
          <ul class = "bracket bracket2">
		  <?php //////////////////////////////// 4thfinaleee--------------//////////////////
		   ///plejof grupa 1 faza2
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=1;
			$faza=3;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item1"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  
		  ?>
		   <?php //////////////////////////////// 4thfinaleee--------------//////////////////
		   ///plejof grupa 2 faza2
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=2;
			$faza=3;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item1"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  
		  ?>
		   <?php //////////////////////////////// 4thfinaleee--------------//////////////////
		   ///plejof grupa 3 faza2
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=3;
			$faza=3;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item1"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  
		  ?>
		   <?php //////////////////////////////// 4thfinaleee--------------//////////////////
		   ///plejof grupa 4 faza2
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=4;
			$faza=3;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item1"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  
		  ?>
          </ul>
          <ul class = "bracket bracket3">
             <?php //////////////////////////////// 2thfinaleee--------------//////////////////
		   ///plejof grupa 1 faza3
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=1;
			$faza=4;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item3"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  
		  ?>
		      <?php //////////////////////////////// 2thfinaleee--------------//////////////////
		   ///plejof grupa 2 faza3
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=2;
			$faza=4;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item3"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  
		  ?>
          </ul>
        <ul class = "bracket bracket4">
              <?php //////////////////////////////// 2thfinaleee--------------//////////////////
		   ///plejof grupa 1 faza4
		  $con = mysqli_connect('localhost','root','','fantasym');


		if (!$con)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			$grupa=1;
			$faza=5;
			$sql="SELECT * FROM cups  WHERE _group='$grupa' AND phase='$faza' ";
			$result=$con->query($sql);
			if($result->num_rows>1)
		{
			$brojac=0;
			while($row=mysqli_fetch_array($result))
			{
			 $brojac+=1;	
				if($brojac==1)
				{
					echo'<li class="team-item3"> <table class="tbl">  <tr class="row">  <td class="unk">'; 
					$timid=$row['team_id'] ;
				 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '</td> <td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr>  <tr class="row">  <td class="unk">';}
				}
				else if($brojac==2)
				{
					$timid=$row['team_id'] ;
					 $sql2="SELECT * FROM user_teams  WHERE id='$timid'";
				 $result2=$con->query($sql2);
				 while($row2=mysqli_fetch_array($result2)){echo $row2['name'] ;
				 echo '<td>'.$number.'</td> <td>'.$row2["sum"].'</td>  </tr> </table>  </li>';}
				}
				
			}
			
		}
		  
		  ?>
        </ul>
      </div>

        </div><!--kraj-->

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
