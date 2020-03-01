<?php

	$Username=$_GET['Username'];
$Password=$_GET['Password'];
$email=$_GET['Email'];
$PasswordPotvrdi=$_GET['PasswordPotvrdi'];
$id=$_GET['Id'];
$l = $_GET["l"];

$CheckUsername=0;
$CheckEmail=0;	
$CheckPassword=0;	
$CheckPasswordpotvrdi=0;
$temp=strlen($Username);
/////////Username
if ($temp>3) 
	{
     $CheckUsername=1;
    }
	else 
	{
		$CheckUsername=0;
	}
///////email	
if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)) {
     $CheckEmail=0;	
    }
	else
	{
	$CheckEmail=1;	
	}
////////password
if (!preg_match("/^[a-zA-Z ]\w{7,20}$/",$Password)) {
     $CheckPassword=0;
    }
	else 
	{
	$CheckPassword=1;
	}
///////potvrdipassword
if (!preg_match("/^[a-zA-Z ]\w{7,20}$/",$PasswordPotvrdi)) {
	
      $CheckPasswordpotvrdi=0;
    }
	else{
		if($Password==$PasswordPotvrdi){
			 $CheckPasswordpotvrdi=1;
		}
		else {
			 $CheckPasswordpotvrdi=0;
			echo "Sifre su razlicite" ;
		}
	}
////////////// kraj provjere

if(($CheckUsername>0) && ($CheckEmail>0) && ($CheckPassword>0) && ($CheckPasswordpotvrdi>0)){
/*$con = mysqli_connect('localhost','root','','fantasym');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}*/
require_once "database.php";
$k = 0;
if($l<=32){
	$k = 1;
}
$Password = md5($Password);
$sql="INSERT INTO `users` (id,username,email,`password`,league_one,league_two,cup,`admin`) values ('$id','$Username','$email','$Password',0,0,0,0)";
$result=$conn->query($sql);
$id2 = $conn->insert_id;

$sql2 = "INSERT INTO user_teams(`id`,`user_id`,`name`,`league`,`last`,`sum`,`money`) VALUES (NULL,$id2,'$Username',$k,0,0,150)";
$result2=$conn->query($sql2);

//mysqli_close($con);
/////////////////////////////////ulogovanje
/*	$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
	$_SESSION["user"]=$row["username"];
   $_SESSION["id"]=$row["id"];
   $_SESSION["logged"] = true;
   $_SESSION["admin"] = $row["admin"];
}else
if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else
if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one*/
    session_destroy();
    session_start();
	$_SESSION["user"]=$row["username"];
   $_SESSION["id"]=$row["id"];
   $_SESSION["logged"] = true;
   $_SESSION["admin"] = $row["admin"];
//}
/////////////kraj ulogovanja
//header("Location:../index.php?reg=yes");
header("Location: liga.php");
exit;
}
else {
	echo "Pogresno unijeti podaci";
	echo "<br>";
// 	header("Location:../reg.php?reg=no");
header("Location: index.php");
}
?>