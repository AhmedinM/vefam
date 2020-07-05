<?php

session_start();

require_once "database.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_SESSION["id"];
    $p;
    $p[] = $_POST["player1"];
    $p[] = $_POST["player2"];
    $p[] = $_POST["player3"];
    $p[] = $_POST["player4"];
    $p[] = $_POST["player5"];
    $p[] = $_POST["player6"];
    $p[] = $_POST["player7"];
    $p[] = $_POST["player8"];
    $p[] = $_POST["player9"];
    $p[] = $_POST["player10"];
    $p[] = $_POST["player11"];

    $pl;
    for($i=0;$i<11;$i++){ //trenutno; ceka se golman
        if($p[$i]==0){
            $_SESSION["oldTeamMsg"] = "Insert all players!";
            header("Location: html.php");
            exit;
        }
    }
	
    $uId = $_SESSION["id"];
    $sql4 = "SELECT * FROM user_teams WHERE `user_id` = $uId";
    $res4 = $conn->query($sql4);
        if($res4===false){
            die($conn->error);
        }
        $row4 = $res4->fetch_assoc();
        $tId = $row4["id"];
    $sql5 = "DELETE FROM user_players WHERE team_id = $tId";
    $res5 = $conn->query($sql5);
        if($res5===false){
            die($conn->error);
        }
    for($i=0;$i<11;$i++){   //goman za 11
        $sql1 = "SELECT * FROM players WHERE id = ".$p[$i];
        $res1 = $conn->query($sql1);
        if($res1===false){
            die($conn->error);
        }
        $pl[$i] = $res1->fetch_assoc();
    }

    $pr = 0;
    for($i=0;$i<11;$i++){   //gk
        $pr = $pr+$pl[$i]["value"];
    }

    $sql2 = "SELECT * FROM `user_teams` WHERE `user_id` = ".$id;
    $res2 = $conn->query($sql2);
    if($res2===false){
        die($conn->error);
    }
    $u = $res2->fetch_assoc();

    if($pr>$u["money"]){
        $_SESSION["oldTeamMsg"] = "You don't have enough money for that team";
        header("Location: html.php");
        exit;
    }

    for($i=0;$i<11;$i++){   //gk
        $pid = $pl[$i]["id"];
		$tid = $u["id"];
        $sql3 = "INSERT INTO `user_players` (player_id,team_id) VALUES ($pid,$tid)";
        $res3 = $conn->query($sql3);
        if($res3===false){
            die($conn->error);
        }
    }

    header("Location: start.php");
    exit;

    //die($p1." rez");
}