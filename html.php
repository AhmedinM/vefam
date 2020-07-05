<?php

require_once "database.php";

session_start();

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
  header("Location: index.php");
  exit;
}

$sql = "SELECT * FROM `players` ORDER BY `value` DESC";
$res = $conn->query($sql);
if($res===false){
  die($conn->error);
}

$at;
$a = 0;
$mf;
$m = 0;
$df;
$d = 0;
$gk;
$g = 0;

while($row = $res->fetch_assoc()){
  if($row["position"]=="Forward"){
    $at[] = $row;
    $a++;
  }else if($row["position"]=="Midfielder"){
    $mf[] = $row;
    $m++;
  }else if($row["position"]=="Defender"){
    $df[] = $row;
    $d++;
  }else if($row["position"]=="Goalkeeper"){
    $gk[] = $row;
    $g++;
  }
}

if($a>0){
  for($i=0;$i<count($at)-1;$i++){
    for($j=$i+1;$j<count($at);$j++){
      if($at[$i]<$at[$j]){
        $t = $at[$i];
        $at[$i] = $at[$j];
        $at[$j] = $t;
      }
    }
  }
}

if($m>0){
  for($i=0;$i<count($mf)-1;$i++){
    for($j=$i+1;$j<count($mf);$j++){
      if($mf[$i]<$mf[$j]){
        $t = $mf[$i];
        $mf[$i] = $mf[$j];
        $mf[$j] = $t;
      }
    }
  }
}

if($d>0){
  for($i=0;$i<count($df)-1;$i++){
    for($j=$i+1;$j<count($df);$j++){
      if($df[$i]<$df[$j]){
        $t = $df[$i];
        $df[$i] = $df[$j];
        $df[$j] = $t;
      }
    }
  }
}

if($g>0){
  for($i=0;$i<count($gk)-1;$i++){
    for($j=$i+1;$j<count($gk);$j++){
      if($gk[$i]<$gk[$j]){
        $t = $gk[$i];
        $gk[$i] = $gk[$j];
        $gk[$j] = $t;
      }
    }
  }
}

$msgT = null;
if(isset($_SESSION["oldTeamMsg"])){
  $msgT = $_SESSION["oldTeamMsg"];
  unset($_SESSION["oldTeamMsg"]);
}

$idU = $_SESSION["id"];
$sql22 = "SELECT * FROM `user_teams` WHERE `user_id` = ".$idU;
$res22 = $conn->query($sql22);
$row22 = null;
$row22 = $res22->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Players</title>
    <link rel="icon" type="image/ico" href="img/logo.jpg" />
    <script type="text/javascript" src="JS/js6.js" defer>
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/css4.css" type="text/css">

  </head>
  <body>

  
  <style>
body  {
 background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/manager.jpg) no-repeat center center fixed;
/* background-image:url(img/manager.jpg) no-repeat center center fixed; */
height: 110%;
background-position: center;
/*  background-repeat: no-repeat;*/
background-size:cover;

}
</style>

    <div class="main">

<?php

if($msg!==null){
  //echo "<script>alert($msg);</script>";
  echo $msg;
}

?>

  <div class="teren">

    <div class="napad1 napad" id="klik" onclick="select(this)">
    </div>
    <div class="napad2 napad" id="klik" onclick="select(this)">
    </div>
    <div class="napad3 napad" id="klik" onclick="select(this)">
    </div>

    <div class="vezni1 vezni" id="klik" onclick="select(this)">
    </div>
    <div class="vezni2 vezni" id="klik" onclick="select(this)">
    </div>
    <div class="vezni3 vezni" id="klik" onclick="select(this)">
    </div>
    <div class="vezni4 vezni" id="klik" onclick="select(this)">
    </div>
    <div class="vezni5 vezni" id="klik" onclick="select(this)">
    </div>

    <div class="odbrana1 odbrana" id="klik" onclick="select(this)">
    </div>
    <div class="odbrana2 odbrana" id="klik" onclick="select(this)">
    </div>
    <div class="odbrana3 odbrana" id="klik" onclick="select(this)">
    </div>
    <div class="odbrana4 odbrana" id="klik" onclick="select(this)">
    </div>
    <div class="odbrana5 odbrana" id="klik" onclick="select(this)">
    </div>

    <div class="golman1 golman" id="klik" onclick="select(this)">
    </div>

  </div>


  <div class="igraci">
    <div class="budzet">
      Budget : <span>€
              <?php if($row22!==null){
                echo $row22["money"];
              }?>
            </span>
    </div> <br>
    <div class="napadaci">
		<span class="dodaj">Add atacker:</span>
      <ul  id="nav">
        <?php if($a!==0){
          for($i=0;$i<count($at);$i++){
            $strT = $at[$i]["name"]." | ".$at[$i]["value"]."m";
            $nm = str_replace(" ","",$strT);
            $nm = str_replace("|","",$nm);
            if($i%2===0){
              echo "<li style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"vzn\" onclick=\"switcheroo(this)\">".$at[$i]["name"]." | ".$at[$i]["value"]."m</li>";
              echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$at[$i]["id"]."\">";
            }else{
              echo "<li class=\"vzn\" onclick=\"switcheroo(this)\">".$at[$i]["name"]." | ".$at[$i]["value"]."m</li>";
              echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$at[$i]["id"]."\">";
            }
          }
        } ?>
        <li class="npd" onclick="switcheroo(this)">  Messi 23m </li>
        <li class="npd" onclick="switcheroo(this)"> Ronaldo 23m</li>
        <li class="npd" onclick="switcheroo(this)"> Lingard 50m</li>
      </ul>
    </div>
      <div class="veznii">
        <span class="dodaj">Add midfielder:</span>
        <ul id="nav">
            <?php if($m!==0){
            for($i=0;$i<count($mf);$i++){
              $strT = $mf[$i]["name"]." | ".$mf[$i]["value"]."m";
              $nm = str_replace(" ","",$strT);
              $nm = str_replace("|","",$nm);
              if($i%2===0){
                echo "<li style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"vzn\" onclick=\"switcheroo(this)\">".$mf[$i]["name"]." | ".$mf[$i]["value"]."m</li>";
                echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$mf[$i]["id"]."\">";
              }else{
                echo "<li class=\"vzn\" onclick=\"switcheroo(this)\">".$mf[$i]["name"]." | ".$mf[$i]["value"]."m</li>";
                echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$mf[$i]["id"]."\">";
              }
            }
          } ?>
          <li class="vzn" onclick="switcheroo(this)"> Modric 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Hazzard 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Xavi 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Derbuyne 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Inesta 23m</li>

          <li class="vzn" onclick="switcheroo(this)"> Modric 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Hazzard 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Xavi 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Derbuyne 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Inesta 23m</li>

          <li class="vzn" onclick="switcheroo(this)"> Modric 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Hazzard 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Xavi 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Derbuyne 23m</li>
          <li class="vzn" onclick="switcheroo(this)"> Inesta 23m</li>

        </ul>
      </div>

      <div class="odbrambeni">
	  <span class="dodaj">Add defender:</span>
          <ul id="nav">
          <?php if($d!==0){
              for($i=0;$i<count($df);$i++){
                $strT = $df[$i]["name"]." | ".$df[$i]["value"]."m";
                $nm = str_replace(" ","",$strT);
                $nm = str_replace("|","",$nm);
                if($i%2===0){
                  echo "<li style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"odb\" onclick=\"switcheroo(this)\">".$df[$i]["name"]." | ".$df[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$df[$i]["id"]."\">";
                }else{
                  echo "<li class=\"odb\" onclick=\"switcheroo(this)\">".$df[$i]["name"]." | ".$df[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$df[$i]["id"]."\">";
                }
              }
            } ?>
        <li class="odb" onclick="switcheroo(this)"> Vidic </li>
        <li class="odb" onclick="switcheroo(this)"> Ferdinand </li>
        <li class="odb" onclick="switcheroo(this)"> Shaw </li>
        <li class="odb" onclick="switcheroo(this)"> Pepe </li>
        <li class="odb" onclick="switcheroo(this)"> Ramos </li>
      </ul>

      </div>

      <div class="golmani">
      <span class="dodaj">Add goalkeeper:</span>
          <ul id="nav">
          <?php if($g!==0){
              for($i=0;$i<count($gk);$i++){
                $strT = $gk[$i]["name"]." | ".$gk[$i]["value"]."m";
                $nm = str_replace(" ","",$strT);
                $nm = str_replace("|","",$nm);
                if($i%2===0){
                  echo "<li style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"gk\" onclick=\"switcheroo(this)\">".$gk[$i]["name"]." | ".$gk[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$gk[$i]["id"]."\">";
                }else{
                  echo "<li class=\"gk\" onclick=\"switcheroo(this)\">".$gk[$i]["name"]." | ".$gk[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$gk[$i]["id"]."\">";
                }
              }
            } ?>
        <li class="gk" onclick="switcheroo(this)"> De Hea </li>
      </ul>
      </div>



      <!--<div class="PrvaForm" onclick="form(this)" title="change formation">
      </div>

      <div class="DrugaForm" onclick="form(this)" title="change formation">
      </div>

      <div class="TrecaForm" onclick="form(this)" title="change formation">
      </div>-->



  </div>
  <form action="save.php" method="POST" value="0">
    <input type="hidden" name="player1" value="0">
    <input type="hidden" name="player2" value="0">
    <input type="hidden" name="player3" value="0">
    <input type="hidden" name="player4" value="0">
    <input type="hidden" name="player5" value="0">
    <input type="hidden" name="player6" value="0">
    <input type="hidden" name="player7" value="0">
    <input type="hidden" name="player8" value="0">
    <input type="hidden" name="player9" value="0">
    <input type="hidden" name="player10" value="0">
    <input type="hidden" name="player11" value="0">
       <div class="next">
         <button name="button">Save</button>
       </div>
  </form>
      <div class="cancel">

       <a href="start.php"><button type="button" name="next" class="cancel">Cancel</button></a>



    </div>


  </body>
</html>
