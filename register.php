<?php
$con = mysqli_connect('localhost','root','','fantasym');


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//////////
$sqll="SELECT * FROM users";
$resultt=$con->query($sqll);

$id=0;
$l = 0;

if($resultt->num_rows>0)
{
while($row=$resultt->fetch_assoc()){
	
	$xx=intval($row['id']);
if($xx>$id || $xx==$id){

	$id=$xx+1;
}
}
	} 

$sql2="SELECT * FROM users";
$result2=$con->query($sql2);
if($resultt->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		$l++;
	}
}else{
	$l = 0;
}

///////////


if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
$Username=$_POST['username'];
$Password=$_POST['password'];
$email=$_POST['email'];
$PasswordPotvrdi=$_POST['passwordd'];
	$url = 'validate.php';
    $url .= '?Username='.$Username;
    $url .= '&Email='.$email;
    $url .= '&Password='.$Password;
	$url .= '&PasswordPotvrdi='.$PasswordPotvrdi;
	$url .= '&Id='.$id;
	$url .= '&l='.$l;
	header('Location: '.$url);
}
		
?>