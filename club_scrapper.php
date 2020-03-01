<?php

require_once "simple_html_dom.php";
require_once "database.php";

session_start();
$websiteURL = $_POST["link"];
//$clubCrest = $_FILES["photo"];
$teamId = $_POST["team_id"];

$_SESSION["old"] = $websiteURL;


function getPlayers($websiteURL){  //sofascore.com -> tim
    //$websiteURL = "https://www.sofascore.com/sr/tim/fudbal/manchester-united/35";
    $html = file_get_html($websiteURL);
    $niz1 = [];
    $niz2 = [];
    $i = 0;
    foreach($html->find('.squad-player') as $postDiv){
        $poc1 = $postDiv->find('.squad-player__name');
        $poc2 = $postDiv->find('.squad-player__position');
        foreach($poc1 as $res1){
            //echo $res1->text()."<br/>";
            $niz1[] = $res1->text();
        }
        foreach($poc2 as $res2){
            $niz2[] = str_replace(" ","",$res2->text());
        }
    }
    for($j=0;$j<count($niz1);$j++){
        //echo $niz1[$j]." - ".$niz2[$j]."<br/>";
    }
    $niz3 = [$niz1,$niz2];
    return $niz3;
}

function getMark($player){
    //pretrazuje fajl sa ocjenama igraca po imenu
    $xml = simplexml_load_file("statistics.xml");
    $mark2 = rand(60,90);
    //$player = "Mohamed Salah";
    $p = strval($player);
    //$p = "Cristiano Ronaldo";
    //die($p);
    //$i = 0;
    /*foreach($xml->player as $row){
        echo $i."<br";
        $i++;
        if($row->name==$p){
            die($row->name);
            $mark2 = intval($row->mark);
            break;
        }
        if($i==10){
            die("da");
        }
    }*/
    /*for($i=0;$i<count($xml->player);$i++){
        //$row = $xml->player[$i];
        if($xml->player[$i]->name==$p){
            //die($mark2);
            $mark2 = intval($xml->player[$i]->mark);
            break;
        }
    }*/
    
    return $mark2;
}

function getValue($mark){
    //racuna odnos ocjene i odredjene konstante
    $value = $mark*0.5-100*0.25;
    
    return $value;
}

function insertClub($players,$teamId){
    global $conn;
    for($i=0;$i<count($players[0]);$i++){
        $mark = getMark($players[0][$i]);
        $value = getValue($mark);
        $sql = "INSERT INTO players(`id`,`name`,`position`,`mark`,`value`,`_condition`,`sum_points`,`last_points`,`club`) "
                . "VALUES (NULL,'{$players[0][$i]}','{$players[1][$i]}',$mark,$value,100,0,0,$teamId)";
        $result = $conn->query($sql);
        if($result===false){
            $_SESSION["porukaTim"] = "Cannot insert players into database.";
            //die($conn->error);
            header("Location: tim.php?team_id=".$teamId);
        }else{
            $_SESSION["porukaTim"] = "Players are successfully inserted.";
            //die($conn->error);
            header("Location: tim.php?team_id=".$teamId);
        }
    }
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($websiteURL!==""){
        $players = getPlayers($websiteURL);
        //die($players[1][0]);
        insertClub($players,$teamId);
    }
}else{
    $_SESSION["porukaTim"] = "ERROR";
    header("Location: tim.php?team_id=".$teamId);
}