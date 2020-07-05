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
    <script type="text/javascript" src="JS/js7.js" defer>
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/css5.css" type="text/css">

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
$idofP=0;
?>

  <div class="teren">

    <div class="napad1" id="klik1" onclick="select(this)">
    </div> <span class="napad1txt">  </span>
    <div class="napad2" id="klik" onclick="select(this)">
    </div><span class="napad2txt">  </span>
    <div class="napad3" id="klik" onclick="select(this)">
    </div><span class="napad3txt"> </span>

    <div class="vezni1 igrac1" id="klik" onclick="select(this)">
    </div><span class="vezni1txt"></span>
    <div class="vezni2" id="klik" onclick="select(this)">
    </div><span class="vezni2txt"> </span>
    <div class="vezni3" id="klik" onclick="select(this)">
    </div><span class="vezni3txt"></span>
    <div class="vezni4" id="klik" onclick="select(this)">
    </div><span class="vezni4txt"></span>
    <div class="vezni5" id="klik" onclick="select(this)">
    </div><span class="vezni5txt"></span>

    <div class="odbrana1" id="klik" onclick="select(this)">
    </div><span class="odbrana1txt"></span>
    <div class="odbrana2" id="klik" onclick="select(this)">
    </div><span class="odbrana2txt"></span>
    <div class="odbrana3" id="klik" onclick="select(this)">
    </div><span class="odbrana3txt"></span>
    <div class="odbrana4" id="klik" onclick="select(this)">
    </div><span class="odbrana4txt"></span>
    <div class="odbrana5" id="klik" onclick="select(this)">
    </div><span class="odbrana5txt"></span>

    <div class="golman1" id="klik" onclick="select(this)">
    </div><span class="golman1txt"></span>

  </div>
<script>

</script>

  <div class="igraci">
    <div class="budzet">
      Budget : <span>€
              <?php if($row22!==null){
                echo $row22["money"];
              }?>m
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
            $idofP+=1;
            if($i%2===0){
              echo "<li id='" ; echo $idofP ; echo "' style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"vzn\" onclick=\"switcheroo(this)\">".$at[$i]["name"]." | ".$at[$i]["value"]."m</li>";
              echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$at[$i]["id"]."\">";
            }else{
              echo "<li id='" ; echo $idofP ; echo "' style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"vzn\" onclick=\"switcheroo(this)\">".$at[$i]["name"]." | ".$at[$i]["value"]."m</li>";
              echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$at[$i]["id"]."\">";
            }
          }
        } ?>
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
              $idofP+=1;
              if($i%2===0){
                echo "<li id='" ; echo $idofP ; echo "'  style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"vzn\" onclick=\"switcheroo(this)\">".$mf[$i]["name"]." | ".$mf[$i]["value"]."m</li>";
                echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$mf[$i]["id"]."\">";
              }else{
                echo "<li id='" ; echo $idofP ; echo "' style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"vzn\" onclick=\"switcheroo(this)\">".$mf[$i]["name"]." | ".$mf[$i]["value"]."m</li>";
                echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$mf[$i]["id"]."\">";
              }
            }
          } ?>
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
                $idofP+=1;
                if($i%2===0){
                  echo "<li  id='" ; echo $idofP ; echo "' style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"odb\" onclick=\"switcheroo(this)\">".$df[$i]["name"]." | ".$df[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$df[$i]["id"]."\">";
                }else{
                  echo "<li id='" ; echo $idofP ; echo "' style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\"  class=\"odb\" onclick=\"switcheroo(this)\">".$df[$i]["name"]." | ".$df[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$df[$i]["id"]."\">";
                }
              }
            } ?>
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
                $idofP+=1;
                if($i%2===0){
                  echo "<li id='" ; echo $idofP ; echo "' style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"gk\" onclick=\"switcheroo(this)\">".$gk[$i]["name"]." | ".$gk[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$gk[$i]["id"]."\">";
                }else{
                  echo "<li id='" ; echo $idofP ; echo "' style=\"background:linear-gradient(rgba(0,0,0,0.9),rgba(0,0,0,0.9))\" class=\"gk\" onclick=\"switcheroo(this)\">".$gk[$i]["name"]." | ".$gk[$i]["value"]."m</li>";
                  echo "<input type=\"hidden\" name=\"".$nm."\" value=\"".$gk[$i]["id"]."\">";
                }
              }
            } ?>
      </ul>
      </div>



    <div class="PrvaForm"  title="change formation" onclick="selected(1)">
      </div>

      <div class="DrugaForm" title="change formation" onclick="selected(2)">
      </div>

      <div class="TrecaForm" title="change formation" onclick="selected(3)">
      </div>
<script>
function changeFormation(f)
{
  if(f[0]==4 && f[1]==3 && f[2]==3)
  {

    document.getElementsByClassName("napad1")[0].style.left="70px";
    document.getElementsByClassName("napad1")[0].style.top="90px";

    document.getElementsByClassName("napad1txt")[0].style.left="90px";
    document.getElementsByClassName("napad1txt")[0].style.top="140px";

    document.getElementsByClassName("napad2")[0].style.display="inline-block";
    document.getElementsByClassName("napad2")[0].style.left="202px";
    document.getElementsByClassName("napad2")[0].style.top="90px";

    document.getElementsByClassName("napad2txt")[0].style.display="inline-block";
    document.getElementsByClassName("napad2txt")[0].style.left="220px";
    document.getElementsByClassName("napad2txt")[0].style.top="140px";

    document.getElementsByClassName("napad3")[0].style.display="inline-block";
    document.getElementsByClassName("napad3")[0].style.left="330px";
    document.getElementsByClassName("napad3")[0].style.top="90px";

    document.getElementsByClassName("napad3txt")[0].style.display="inline-block";
    document.getElementsByClassName("napad3txt")[0].style.left="350px";
    document.getElementsByClassName("napad3txt")[0].style.top="140px";

    document.getElementsByClassName("igrac1")[0].style.left="70px";
    document.getElementsByClassName("igrac1")[0].style.top="250px";

    document.getElementsByClassName("vezni1txt")[0].style.left="85px";
    document.getElementsByClassName("vezni1txt")[0].style.top="300px";

    document.getElementsByClassName("vezni2")[0].style.left="202px";
    document.getElementsByClassName("vezni2")[0].style.top="250px";

    document.getElementsByClassName("vezni2txt")[0].style.left="220px";
    document.getElementsByClassName("vezni2txt")[0].style.top="300px";

    document.getElementsByClassName("vezni3")[0].style.left="330px";
    document.getElementsByClassName("vezni3")[0].style.top="250px";

    document.getElementsByClassName("vezni3txt")[0].style.left="345px";
    document.getElementsByClassName("vezni3txt")[0].style.top="300px";

   document.getElementsByClassName("vezni4")[0].style.display="none";
   // document.getElementsByClassName("vezni4")[0].style.top="180px";

   document.getElementsByClassName("vezni4txt")[0].style.display="none";
   // document.getElementsByClassName("vezni4txt")[0].style.top="180px";
   document.getElementsByClassName("vezni5")[0].style.display="none";
   document.getElementsByClassName("vezni5txt")[0].style.display="none";

    document.getElementsByClassName("odbrana1")[0].style.left="30px";
    document.getElementsByClassName("odbrana1")[0].style.top="400px";

    document.getElementsByClassName("odbrana1txt")[0].style.left="45px";
    document.getElementsByClassName("odbrana1txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana2")[0].style.left="130px";
    document.getElementsByClassName("odbrana2")[0].style.top="400px";

    document.getElementsByClassName("odbrana2txt")[0].style.left="145px";
    document.getElementsByClassName("odbrana2txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana3")[0].style.left="270px";
    document.getElementsByClassName("odbrana3")[0].style.top="400px";

    document.getElementsByClassName("odbrana3txt")[0].style.left="285px";
    document.getElementsByClassName("odbrana3txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana4")[0].style.left="370px";
    document.getElementsByClassName("odbrana4")[0].style.top="400px";

    document.getElementsByClassName("odbrana4txt")[0].style.left="385px";
    document.getElementsByClassName("odbrana4txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana5")[0].style.display="none";
    document.getElementsByClassName("odbrana5txt")[0].style.display="none";
	
	document.getElementsByClassName("golman1")[0].style.left="202px";
    document.getElementsByClassName("golman1")[0].style.top="460px";
	
	document.getElementsByClassName("golman1txt")[0].style.left="220px";
    document.getElementsByClassName("golman1txt")[0].style.top="510px";
  }
  else if(f[0]==4 && f[1]==4 && f[2]==2)
  {
   document.getElementsByClassName("napad1")[0].style.left="100px";
    document.getElementsByClassName("napad1")[0].style.top="90px";

    document.getElementsByClassName("napad1txt")[0].style.left="120px";
    document.getElementsByClassName("napad1txt")[0].style.top="140px";

    document.getElementsByClassName("napad2")[0].style.display="inline-block";
    document.getElementsByClassName("napad2")[0].style.left="300px";
    document.getElementsByClassName("napad2")[0].style.top="90px";

    document.getElementsByClassName("napad2txt")[0].style.display="inline-block";
    document.getElementsByClassName("napad2txt")[0].style.left="320px";
    document.getElementsByClassName("napad2txt")[0].style.top="140px";

   document.getElementsByClassName("napad3")[0].style.display="none";
   document.getElementsByClassName("napad3txt")[0].style.display="none";

   document.getElementsByClassName("igrac1")[0].style.left="30px";
   document.getElementsByClassName("igrac1")[0].style.top="250px";

   document.getElementsByClassName("vezni1txt")[0].style.left="45px";
   document.getElementsByClassName("vezni1txt")[0].style.top="300px";

   document.getElementsByClassName("vezni2")[0].style.left="130px";
   document.getElementsByClassName("vezni2")[0].style.top="250px";

   document.getElementsByClassName("vezni2txt")[0].style.left="145px";
   document.getElementsByClassName("vezni2txt")[0].style.top="300px";

   document.getElementsByClassName("vezni3")[0].style.left="270px";
   document.getElementsByClassName("vezni3")[0].style.top="250px";

   document.getElementsByClassName("vezni3txt")[0].style.left="285px";
   document.getElementsByClassName("vezni3txt")[0].style.top="300px";

   var a=document.getElementsByClassName("vezni4")[0];
   a.style.position="absolute";
   a.style.backgroundImage='url("img/dres.png")';
   a.style.backgroundSize="contain";
   a.style.height="70px";
   a.style.width="70px";
   a.style.display="inline-block";
   a.style.left="370px";
   a.style.top="250px";

   document.getElementsByClassName("vezni4txt")[0].style.display="inline-block";
   document.getElementsByClassName("vezni4txt")[0].style.left="385px";
   document.getElementsByClassName("vezni4txt")[0].style.top="300px";

   document.getElementsByClassName("vezni5")[0].style.display="none";
   document.getElementsByClassName("vezni5txt")[0].style.display="none";

   document.getElementsByClassName("odbrana1")[0].style.left="30px";
   document.getElementsByClassName("odbrana1")[0].style.top="400px";

   document.getElementsByClassName("odbrana1txt")[0].style.left="45px";
   document.getElementsByClassName("odbrana1txt")[0].style.top="450px";

   document.getElementsByClassName("odbrana2")[0].style.left="130px";
   document.getElementsByClassName("odbrana2")[0].style.top="400px";

   document.getElementsByClassName("odbrana2txt")[0].style.left="145px";
   document.getElementsByClassName("odbrana2txt")[0].style.top="450px";

   document.getElementsByClassName("odbrana3")[0].style.left="270px";
   document.getElementsByClassName("odbrana3")[0].style.top="400px";

   document.getElementsByClassName("odbrana3txt")[0].style.left="285px";
   document.getElementsByClassName("odbrana3txt")[0].style.top="450px";

   document.getElementsByClassName("odbrana4")[0].style.left="370px";
   document.getElementsByClassName("odbrana4")[0].style.top="400px";

   document.getElementsByClassName("odbrana4txt")[0].style.left="385px";
   document.getElementsByClassName("odbrana4txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana5")[0].style.display="none";
    document.getElementsByClassName("odbrana5txt")[0].style.display="none";
	
	document.getElementsByClassName("golman1")[0].style.left="202px";
    document.getElementsByClassName("golman1")[0].style.top="460px";
	
	document.getElementsByClassName("golman1txt")[0].style.left="220px";
    document.getElementsByClassName("golman1txt")[0].style.top="510px";
  }
  else if(f[0]==5 && f[1]==4 && f[2]==1)
  {
    document.getElementsByClassName("napad1")[0].style.left="202px";
    document.getElementsByClassName("napad1")[0].style.top="90px";

    document.getElementsByClassName("napad1txt")[0].style.left="220px";
    document.getElementsByClassName("napad1txt")[0].style.top="140px";

    document.getElementsByClassName("napad2")[0].style.display="none";
    document.getElementsByClassName("napad2")[0].style.left="210px";
    document.getElementsByClassName("napad2")[0].style.top="40px";

    document.getElementsByClassName("napad2txt")[0].style.display="none";
    document.getElementsByClassName("napad2txt")[0].style.left="220px";
    document.getElementsByClassName("napad2txt")[0].style.top="90px";

    document.getElementsByClassName("napad3")[0].style.display="none";
    document.getElementsByClassName("napad3txt")[0].style.display="none";

    document.getElementsByClassName("igrac1")[0].style.left="30px";
    document.getElementsByClassName("igrac1")[0].style.top="250px";

    document.getElementsByClassName("vezni1txt")[0].style.left="45px";
    document.getElementsByClassName("vezni1txt")[0].style.top="300px";

    document.getElementsByClassName("vezni2")[0].style.left="130px";
    document.getElementsByClassName("vezni2")[0].style.top="250px";

    document.getElementsByClassName("vezni2txt")[0].style.left="145px";
    document.getElementsByClassName("vezni2txt")[0].style.top="300px";

    document.getElementsByClassName("vezni3")[0].style.left="270px";
    document.getElementsByClassName("vezni3")[0].style.top="250px";

    document.getElementsByClassName("vezni3txt")[0].style.left="285px";
    document.getElementsByClassName("vezni3txt")[0].style.top="300px";

    var a=document.getElementsByClassName("vezni4")[0];
    a.style.position="absolute";
    a.style.backgroundImage='url("img/dres.png")';
    a.style.backgroundSize="contain";
    a.style.height="70px";
    a.style.width="70px";
    a.style.display="inline-block";
    a.style.left="370px";
    a.style.top="250px";

    document.getElementsByClassName("vezni4txt")[0].style.display="inline-block";
    document.getElementsByClassName("vezni4txt")[0].style.left="385px";
    document.getElementsByClassName("vezni4txt")[0].style.top="300px";

    document.getElementsByClassName("vezni5")[0].style.display="none";
    document.getElementsByClassName("vezni5txt")[0].style.display="none";

    document.getElementsByClassName("odbrana1")[0].style.left="20px";
    document.getElementsByClassName("odbrana1")[0].style.top="400px";

    document.getElementsByClassName("odbrana1txt")[0].style.left="30px";
    document.getElementsByClassName("odbrana1txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana2")[0].style.left="90px";
    document.getElementsByClassName("odbrana2")[0].style.top="400px";

    document.getElementsByClassName("odbrana2txt")[0].style.left="100px";
    document.getElementsByClassName("odbrana2txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana3")[0].style.left="202px";
    document.getElementsByClassName("odbrana3")[0].style.top="400px";

    document.getElementsByClassName("odbrana3txt")[0].style.left="220px";
    document.getElementsByClassName("odbrana3txt")[0].style.top="450px";

    document.getElementsByClassName("odbrana4")[0].style.left="320px";
    document.getElementsByClassName("odbrana4")[0].style.top="400px";

    document.getElementsByClassName("odbrana4txt")[0].style.left="335px";
    document.getElementsByClassName("odbrana4txt")[0].style.top="450px";

    var aa=document.getElementsByClassName("odbrana5")[0];
    aa.style.position="absolute";
    aa.style.backgroundImage='url("img/dres.png")';
    aa.style.backgroundSize="contain";
    aa.style.height="70px";
    aa.style.width="70px";
    aa.style.display="inline-block";
    aa.style.left="390px";
    aa.style.top="400px";
    document.getElementsByClassName("odbrana5txt")[0].style.display="inline-block";
    document.getElementsByClassName("odbrana5txt")[0].style.left="405px";
    document.getElementsByClassName("odbrana5txt")[0].style.top="450px";

	document.getElementsByClassName("golman1")[0].style.left="202px";
    document.getElementsByClassName("golman1")[0].style.top="460px";
	
	document.getElementsByClassName("golman1txt")[0].style.left="220px";
    document.getElementsByClassName("golman1txt")[0].style.top="510px";
  }
}
function selected(e) {
if (e==1){
document.getElementsByClassName("PrvaForm")[0].style.top="480px";
document.getElementsByClassName("DrugaForm")[0].style.top="490px";
document.getElementsByClassName("TrecaForm")[0].style.top="490px";

document.getElementsByClassName("PrvaForm")[0].style.boxShadow="-1px 0px 76px 41px rgba(20,120,8,1)";
document.getElementsByClassName("DrugaForm")[0].style.boxShadow="none";
document.getElementsByClassName("TrecaForm")[0].style.boxShadow="none";
var f=new Array(3);
f=[4,3,3];
formation=[4,3,3];
changeFormation(f);
for (i=0;i<11;i++){ //isprazni listu dodatih igraca
  if(listplayers[i]!=null){
    document.getElementById(listplayers[i]).style.display="block";
  }
}
document.getElementsByClassName("vezni1txt")[0].innerHTML="";
}
else if(e==2) {
document.getElementsByClassName("PrvaForm")[0].style.top="490px";
document.getElementsByClassName("DrugaForm")[0].style.top="480px";
document.getElementsByClassName("TrecaForm")[0].style.top="490px";

document.getElementsByClassName("PrvaForm")[0].style.boxShadow="none";
document.getElementsByClassName("DrugaForm")[0].style.boxShadow="-1px 0px 76px 41px rgba(20,120,8,1)";
document.getElementsByClassName("TrecaForm")[0].style.boxShadow="none";
var f=new Array(3);
f=[4,4,2];
formation=[4,4,2];
changeFormation(f);
for (i=0;i<11;i++){
  if(listplayers[i]!=null){
    document.getElementById(listplayers[i]).style.display="block";
  }
}
isprazniTxt();
}
else {
document.getElementsByClassName("PrvaForm")[0].style.top="490px";
document.getElementsByClassName("DrugaForm")[0].style.top="490px";
document.getElementsByClassName("TrecaForm")[0].style.top="480px";

document.getElementsByClassName("PrvaForm")[0].style.boxShadow="none";
document.getElementsByClassName("DrugaForm")[0].style.boxShadow="none";
document.getElementsByClassName("TrecaForm")[0].style.boxShadow="-1px 0px 76px 41px rgba(20,120,8,1)";
var f=new Array(3);
f=[5,4,1];
formation=[5,4,1];
changeFormation(f);
for (i=0;i<11;i++){
  if(listplayers[i]!=null){
    document.getElementById(listplayers[i]).style.display="block";
  }
}
isprazniTxt();
}
}

function prepareOnload()
  {
    var f=new Array(3);
    f=[4,3,3];
    formation=[4,3,3];
    changeFormation(f);
    selected(1);

  }
function isprazniTxt(){
  document.getElementsByClassName("napad1txt")[0].innerHTML="";
  document.getElementsByClassName("napad2txt")[0].innerHTML="";
  document.getElementsByClassName("napad3txt")[0].innerHTML="";
  document.getElementsByClassName("odbrana1txt")[0].innerHTML="";
  document.getElementsByClassName("odbrana2txt")[0].innerHTML="";
  document.getElementsByClassName("odbrana3txt")[0].innerHTML="";
  document.getElementsByClassName("odbrana4txt")[0].innerHTML="";
  document.getElementsByClassName("odbrana5txt")[0].innerHTML="";
  document.getElementsByClassName("vezni1txt")[0].innerHTML="";
  document.getElementsByClassName("vezni2txt")[0].innerHTML="";
  document.getElementsByClassName("vezni3txt")[0].innerHTML="";
  document.getElementsByClassName("vezni4txt")[0].innerHTML="";
  document.getElementsByClassName("vezni5txt")[0].innerHTML="";
  document.getElementsByClassName("golman1txt")[0].innerHTML="";

}


window.onload = prepareOnload;
</script>

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
         <button  onclick="save()" name="button">Save</button>
       </div>
  </form>
  <script>
  function save() {
    console.log(document.getElementsByName("player1")[0].value);
    console.log(document.getElementsByName("player2")[0].value);
    console.log(document.getElementsByName("player3")[0].value);
    console.log(document.getElementsByName("player4")[0].value);
    console.log(document.getElementsByName("player5")[0].value);
    console.log(document.getElementsByName("player6")[0].value);
    console.log(document.getElementsByName("player7")[0].value);
    console.log(document.getElementsByName("player8")[0].value);
    console.log(document.getElementsByName("player9")[0].value);
    console.log(document.getElementsByName("player10")[0].value);
    console.log(document.getElementsByName("player11")[0].value);
  }
  </script>
      <div class="cancel">

       <a href="start.php"><button type="button" name="next" class="cancel">Cancel</button></a>



    </div>


  </body>
</html>
