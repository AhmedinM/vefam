<?php

require_once "simple_html_dom.php";
require_once "simulator.php";

session_start();
$websiteURL = $_POST["link"];
$leagueName = $_POST["name"];
$_SESSION["old"] = $_POST;

function insertLeague($leagueName){
    require_once "database.php";
    $sql = "INSERT INTO leagues (`name`) VALUES ('$leagueName')";
    $result = $conn->query($sql);
    if($result===false){
        $_SESSION["porukaLiga"] = "Error while insreting into database.";
        header("Location: liga.php");
        exit;
    }
}

function getTeams($websiteURL,$leagueName){    //flashscore.com -> liga -> timovi
    $html = file_get_html($websiteURL);
    $niz;
    $i = 0;
    foreach($html->find('.standing-table__cell--name-link') as $postDiv){
        //echo $postDiv->text()."<br/>";
        $name = $postDiv->text();
        $photo = "img/club.jpg";
        $niz[$i] = [
            'name' => $name
        ];
        $i++;
    }
    $t = true;
    for($j=0;$j<$i;$j++){
        $sql = "INSERT INTO clubs (`name`,`league`,`_condition`) VALUES ('{$niz[$j]["name"]}','$leagueName',100)";
        //require_once "database.php";
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $databasename = "fantasym";

        $conn = new mysqli($host,$username,$password,$databasename);
        $result = $conn->query($sql);
        if($result===FALSE){
            $t = false;
        }
    }
    if($t===true){
        $_SESSION["porukaLiga"] = "Data is inserted successfully.";
    }else{
        $_SESSION["porukaLiga"] = "Error while inserting into database.";
    }
    //header("Location: liga.php");
}

function raspored($leagueName){
    //require_once "database.php";
    $sql = "SELECT * FROM clubs WHERE league= '$leagueName'";
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "fantasym";

    $conn = new mysqli($host,$username,$password,$databasename);
    $result = $conn->query($sql);
    $niz = [];
    while($new = $result->fetch_assoc()){
        //nastavak
        $niz[] = $new["id"];
    }
    $system = fixtures($niz);
    $r = 1;
    foreach ($system as $round){
        //echo "<br/><br/><b>".$r.". kolo:</b><br/><br/>";
        foreach($round as $match){
            //echo $utakmica['home']." <b>vs</b> ".$utakmica['away']."<br/>";
            //die($match["home"]." ".$match["away"]);
            $m = [
                "home" => $match["home"],
                "away" => $match["away"]
            ];
            $res = match($m);
            $sql2 = "INSERT INTO matches(`id`,`home`,`away`,`round`,r1,r2) VALUES (NULL,{$match["home"]},{$match["away"]},$r,$res[0],$res[1])";
            $conn->query($sql2);
        }
        $r++;
    }
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($websiteURL=="" || $leagueName==""){
        $_SESSION["porukaLiga"] = "You didn't fill all fields.";
        header("Location: liga.php");
    }
    insertLeague($leagueName);
    getTeams($websiteURL,$leagueName);
    raspored($leagueName);
    header("Location: liga.php");
}else{
    $_SESSION["porukaLiga"] = "ERROR";
    header("Location: liga.php");
}

?>