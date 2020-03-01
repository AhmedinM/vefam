<?php
$con = mysqli_connect('localhost','root','','fantasym');


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}



if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
$Username=$_POST['username'];
$Password=$_POST['password'];
}
$Password = md5($Password);
$sql="SELECT * FROM users WHERE username='$Username' AND `password`='$Password'";
$result=$con->query($sql);
$name;

if($result->num_rows>0)
{
	while($row = $result->fetch_assoc())
{
	/*$status = session_status();
//if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
	$_SESSION["user"]=$row["username"];
   $_SESSION["id"]=$row["id"];
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

//header("Location:../index.php?log=yes");
header("Location: start.php");
exit;
}
}
	else {
		$n=1;
		 echo "<script>alert('Unijeli ste pogresne podatke'); </script>" ;
		 if($n==1){
		//	header("Location:../log.php?log=no"); 
		header("Location: index.php");
		 }
		}
		
?>