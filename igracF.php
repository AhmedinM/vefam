<?php

require_once "database.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $mark = $_POST["link"];
    $player = $_POST["team_id"];
    $team = $_POST["teamD_id"];

    $val = $mark*0.5-100*0.25;
    
    $sql = "UPDATE players SET mark = $mark, `value` = $val WHERE id = $player";
    $res = $conn->query($sql);
    if($res===false){
        die($conn->error);
    }
    header("Location: igraci.php?team_id=".$team);
    exit;
}