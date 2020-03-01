<?php

include('simple_html_dom.php');

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
            $niz2[] = $res2->text();
        }
    }
    for($j=0;$j<count($niz1);$j++){
        echo $niz1[$j]." - ".$niz2[$j]."<br/>";
    }
}

function getTeams($websiteURL){    //flashscore.com -> liga -> timovi
    //$websiteURL = "https://www.flashscore.com/football/england/premier-league/teams/";
    $html = file_get_html($websiteURL);
    /*foreach($html->find('.leagueTable__team') as $postDiv){
        echo $postDiv->text()."<br/>";
    }*/
    //var_dump($html->find('.standing-table__cell--name-link'));
    foreach($html->find('.standing-table__cell--name-link') as $team){
        echo $team->text()."<br/>";
    }
    //echo "IDE";
}

function ocjene(){
    /*$websiteURL = "https://www.futhead.com/players/?";
    $html = file_get_html($websiteURL);
    foreach($html->find('.display-block') as $postDiv){
        foreach($postDiv->find(".revision-gradient") as $res1){
            echo $res1->text()."<br/>";
        }
        echo $postDiv->text()."<br/>";
    }*/
    
    $xml = new DOMDocument("1.0","utf8");
    $xml->formatOutput = true;
    $players = $xml->createElement("players");
    $xml->appendChild($players);
    
    for($i=0;$i<1;$i++){
        $websiteURL = "https://www.futhead.com/players/?page=".$i;
        $html = file_get_html($websiteURL);

        foreach($html->find('.display-block') as $postDiv){
            $n1;
            $n2;
            
            $player = $xml->createElement("player");
            $players->appendChild($player);

            foreach($postDiv->find(".revision-gradient") as $res1){
                $n1 = $res1->text();
            }
            foreach($postDiv->find(".player-name") as $res2){
                $n2 = $res2->text();
            }
            //echo $n1." ".$n2."<br/>";
            $name = $xml->createElement("name",$n2);
            $player->appendChild($name);
            $mark = $xml->createElement("mark",$n1);
            $player->appendChild($mark);
        }
        echo "Kraj $i <br>";
    }
    echo "<xmp>".$xml->saveXML()."</xmp>";
    $xml->save("statistics7.xml") or die("Greska");
}

function stampa(){
    //require_once "statistics.xml";
    $xml=simplexml_load_file("statistics.xml");
    echo "<pre>";
    print_r($xml);
    echo "</pre>";
}

//$websiteURL = "https://www.sofascore.com/sr/tim/fudbal/manchester-united/35";
//$html = file_get_html($websiteURL);
//var_dump($html);
//var_dump($html->find('.match'));
echo "<br><br><br>";
/*foreach($html->find('.match') as $postDiv){
    //echo $postDiv;
    //die(var_dump($postDiv));
    foreach($postDiv->find('time') as $res1){
        echo $res1->text()."<br/>";
    }
}*/

$websiteURLt = "https://www.skysports.com/premier-league-table";
$websiteURLp = "https://www.sofascore.com/team/football/manchester-united/35";

//getPlayers($websiteURLp);
echo "Loading...";
echo "<br><br><br>";

//getTeams($websiteURLt);
echo "<br><br><br>";
stampa();

//ocjene();

?>