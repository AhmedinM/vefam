<?php

$r = $_GET["search"];

if($r==null || !isset($r)){
    header("Location: start.php");
    exit;
}

$sql1 = "SELECT * FROM users WHERE `username` LIKE '%".$r."%'";
$sql2 = "SELECT * FROM user_teams WHERE `name` LIKE '%".$r."%'";
$sql3 = "SELECT * FROM players WHERE `name` LIKE '%".$r."%'";
             