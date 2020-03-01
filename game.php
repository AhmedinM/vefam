<?php

session_start();

require_once "database.php";

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
    header("Location: index.php");
    exit;
}

if(!isset($_SESSION["admin"]) || $_SESSION["admin"]!=1){
    header("Location: start.php");
    exit;
}

if(!isset($_GET["val"])){
    header("Location: panel.php");
    exit;
}

$val = $_GET["val"];

/// 1

if($val==1){
    $sql = "DELETE FROM user_players";
    $res = $conn->query($sql);
    if($res===false){
        die($conn->error);
    }
    $msg = "Successfully deleted.";
    header("Location: panel.php?msg=$msg");
    exit;

/// 2

}else if($val==2){
    $sql1 = "SELECT * FROM `round`";
    $res1 = $conn->query($sql1);
    if($res1===false){
        die($conn->error);
    }
    $row1 = $res1->fetch_assoc();
    $number = intval($row1["number"]);
    $number++;

    $sql2 = "SELECT * FROM matches WHERE `round` = ".$number;
    $res2 = $conn->query($sql2);
    if($res2===false){
        die($conn->error);
    }
    $matches;

    $z = 0;
    while($row2 = $res2->fetch_assoc()){
        $matches[] = $row2;
        $z++;
    }
    if($z>0){
        for($i=0;$i<count($matches);$i++){
            $sql3 = "SELECT * FROM clubs WHERE id = ".$matches[$i]["home"]." OR id = ".$matches[$i]["away"];
            $res3 = $conn->query($sql3);
            if($res3===false){
                die($conn->error);
            }
            $teams;
            $z2 = 0;
            while($row3 = $res3->fetch_assoc()){
                $teams[] = $row3;
                $z2++;
            }
            if($z2>0){
                $sql4 = "SELECT * FROM players WHERE club = ".$teams[0]["id"]." OR club = ".$teams[1]["id"];
                $res4 = $conn->query($sql4);
                if($res4===false){
                    die($conn->error);
                }
                
                $players;
                $z3 = 0;
                while($row4 = $res4->fetch_assoc()){
                    $players[] = $row4;
                    $z3++;
                }
                
                if($z3>0){
                    $r1 = rand(0,4);
                    $r2 = rand(0,4);
                    $p = rand(0,10);
                    if($p==3 || $p==8){
                        $r1 = $r1+rand(0,4);
                    }else if($p==2 || $p==7){
                        $r2 = $r2+rand(0,4);
                    }

                    $home = $teams[0]["_condition"];
                    $away = $teams[1]["_condition"];
                    
                    $home += rand(0,25);
                    $away += rand(0,25);

                    $con1 = $teams[0]["_condition"];
                    $con2 = $teams[1]["_condition"];
                    
                    $rc1 = rand(0,25);
                    $rcp1 = rand(0,1);
                    $rc2 = rand(0,25);
                    $rcp2 = rand(0,1);

                    if($rcp1===0 && $con1>$rc1){
                        $con1 = $con1-$rc1;
                    }else if($rcp1===0 && $con1<$rc1){
                        $con1 = $con1+$rc1;
                    }else{
                        if($con1+$rc1>100){
                            $con1 = $con1-$rc1;
                        }else{
                            $con1 = $con1+$rc1;
                        }
                    }
                    if($rcp2===0 && $con2>$rc2){
                        $con2 = $con2-$rc2;
                    }else if($rcp2===0 && $con2<$rc2){
                        $con2 = $con2+$rc2;
                    }else{
                        if($con2+$rc2>100){
                            $con2 = $con2-$rc2;
                        }else{
                            $con2 = $con2+$rc2;
                        }
                    }
                    
                    if($home<$away){
                        if($r1>$r2){
                            $t = $r2;
                            $r2 = $r1;
                            $r1 = $t;
                        }
                    }else if($home>$away){
                        if($r1<$r2){
                            $t = $r2;
                            $r2 = $r1;
                            $r1 = $t;
                        }
                    }
                    //r1 za 1, r2 za 2
                    
                    for($j=0;$j<count($players);$j++){
                        if($players[$j]["club"]==$matches[0]["id"]){
                            $points = $players[$j]["_condition"];
                            $points = intval($points/10)*intval($r1/2)+rand(0,10);
                        }else{
                            $points = $players[$j]["_condition"];
                            $points = intval($points/10)*intval($r2/2)+rand(0,10);
                        }

                        $conP = $players[$j]["_condition"];
                        
                        $rcP = rand(0,25);
                        $rcpP = rand(0,1);

                        if($rcpP===0 && $conP>$rcP){
                            $conP = $conP-$rcP;
                        }else if($rcpP===0 && $conP<$rcP){
                            $conP = $conP+$rcP;
                        }else{
                            if($conP+$rcP>100){
                                $conP = $conP-$rcP;
                            }else{
                                $conP = $conP+$rcP;
                            }
                        }
                        
                        $sum = $players[$j]["sum_points"]+$points;
                        
                        $sql5 = "UPDATE players SET `_condition` = $conP, `sum_points` = $sum, `last_points` = $points WHERE id = ".$players[$j]["id"];
                        $res5 = $conn->query($sql5);
                        if($res5===false){
                            die($conn->error);
                        }
                    }
                    
                    $sql6 = "UPDATE clubs SET `_condition` = $con1 WHERE id = ".$teams[0]["id"];
                    $res6 = $conn->query($sql6);
                    if($res6===false){
                        die($conn->error);
                    }
                    $sql7 = "UPDATE clubs SET `_condition` = $con2 WHERE id = ".$teams[1]["id"];
                    $res7 = $conn->query($sql7);
                    if($res7===false){
                        die($conn->error);
                    }
                }
            }

        }
    }

    //racunanje korisnickih bodova

    $sql8 = "SELECT * FROM user_teams";
    $res8 = $conn->query($sql8);
    if($res8===false){
        die($conn->error);
    }
    $countingT;
    $cz = 0;
    while($row8 = $res8->fetch_assoc()){
        $countingT[] = $row8;
        $cz++;
    }
    if($cz>0){
        for($ci=0;$ci<count($countingT);$ci++){
            $last = 0;
            $sql9 = "SELECT * FROM user_players WHERE team_id = ".$countingT[$ci]["id"];
            $res9 = $conn->query($sql9);
            if($res9===false){
                die($conn->error);
            }
            $countingP;
            $cz2 = 0;
            while($row9 = $res9->fetch_assoc()){
                $countingP[] = $row9;
                $cz2++;
            }
            if($cz2>0){
                for($cz3=0;$cz3<count($countingP);$cz3++){
                    $sql10 = "SELECT * FROM players WHERE id = ".$countingP[$cz3]["player_id"];
                    $res10 = $conn->query($sql10);
                    if($res10===false){
                        die($conn->error);
                    }
                    $row10 = null;
                    $row10 = $res10->fetch_assoc();
                    if($row10!==null){
                        $last = $last+$row10["last_points"];
                    }
                }
                $sumP = $countingT[$ci]["sum"]+$last;
                $mon = 250-(0.75*$last);
                $sql11 = "UPDATE user_teams SET `sum` = $sumP, `last` = $last, `money` = $mon WHERE id = ".$countingT[$ci]["id"];
                $res11 = $conn->query($sql11);
                if($res11===false){
                    die($conn->error);
                }
                /// Smjestanje kupa
                if($number>18 && $number<27){
                    $sql13 = "SELECT * FROM cups WHERE team_id = ".$countingT[$ci]["id"]." AND phase = 2";
                }else if($number>26 && $number<33){
                    $sql13 = "SELECT * FROM cups WHERE team_id = ".$countingT[$ci]["id"]." AND phase = 3";
                }else if($number>32 && $number<37){
                    $sql13 = "SELECT * FROM cups WHERE team_id = ".$countingT[$ci]["id"]." AND phase = 4";
                }else if($number>36 && $number<39){
                    $sql13 = "SELECT * FROM cups WHERE team_id = ".$countingT[$ci]["id"]." AND phase = 5";
                }else{
                    $sql13 = "SELECT * FROM cups WHERE team_id = ".$countingT[$ci]["id"]." AND phase = 1";
                }
                //$sql13 = "SELECT * FROM cups WHERE team_id = ".$countingT[$ci]["id"];
                $res13 = $conn->query($sql13);
                if($res13===false){
                    die($conn->error);
                }
                $row13 = null;
                $row13 = $res13->fetch_assoc();
                
                if($row13!==null){
                    $sumC = $row13["sum"];
                    $sumC += $last;
                    $sql14 = "UPDATE cups SET `sum` = $sumC WHERE id = ".$row13["id"];
                    $res14 = $conn->query($sql14);
                    if($res14===false){
                        die($conn->error);
                    }
                }

            }
        }
    }
    //  runde za kup i smjestanje runde u bazu  
    if($number==18){
        $cupT;
        $zp = 0;
        for($cc=1;$cc<9;$cc++){
            $sql12 = "SELECT * FROM cups WHERE phase = 1 AND _group = ".$cc;
            $res12 = $conn->query($sql12);
            if($res12===false){
                die($conn->error);
            }
            $cupTT;
            $zpt = 0;
            while($row12 = $res12->fetch_assoc()){
                $cupTT[] = $row12;
                $zpt++;
            }
            if($zpt>0){
                $zp++;
                $m1 = $cupTT[0];
                $m2 = $cupTT[1];
                $t;
                if($m1["sum"]<$m2["sum"]){
                    $t = $m2;
                    $m2 = $m1;
                    $m1 = $t;
                }
                for($mp=2;$mp<4;$mp++){
                    if($cupTT[$mp]["sum"]>$m2["sum"]){
                        $m2 = $cupTT[$mp];
                        if($cupTT[$mp]["sum"]>$m1["sum"]){
                            $t = $m1;
                            $m1 = $cupTT[$mp];
                            $m2 = $t;
                        }
                    }
                }
                $cupT[] = $m1;
                $cupT[] = $m2;
            }
        }
        if($zp>0){
            $p = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8];
            shuffle($p);
            for($k=0;$k<16;$k++){
                $pT = $p[$k];
                $tT = $cupT[$k]["team_id"];
                $sql13 = "INSERT INTO cups(`id`,`team_id`,`phase`,`_group`,`sum`) VALUES (NULL,$tT,2,$pT,0)";
                $res13 = $conn->query($sql13);
                if($res13===false){
                    die($conn->error);
                }
            }
        }
    }else if($number==26){
        $cupT;
        $zp = 0;
        for($cc=1;$cc<9;$cc++){
            $sql12 = "SELECT * FROM cups WHERE phase = 2 AND _group = ".$cc;
            $res12 = $conn->query($sql12);
            if($res12===false){
                die($conn->error);
            }
            $cupTT;
            $zpt = 0;
            while($row12 = $res12->fetch_assoc()){
                $cupTT[] = $row12;
                $zpt++;
            }
            if($zpt>0){
                $zp++;
                $m1 = $cupTT[0];
                $m2 = $cupTT[1];
                $t;
                if($m1["sum"]<$m2["sum"]){
                    $t = $m2;
                    $m2 = $m1;
                    $m1 = $t;
                }
                $cupT[] = $m1;
            }
        }
        if($zp>0){
            $p = [1,1,2,2,3,3,4,4];
            shuffle($p);
            for($k=0;$k<8;$k++){
                $sql13 = "INSERT INTO cups(`id`,`team_id`,`phase`,`_group`,`sum`) VALUES (NULL,{$cupT[$k]["team_id"]},3,{$p[$k]},0)";
                $res13 = $conn->query($sql13);
                if($res13===false){
                    die($conn->error);
                }
            }
        } 
    }else if($number==32){
        $cupT;
        $zp = 0;
        for($cc=1;$cc<5;$cc++){
            $sql12 = "SELECT * FROM cups WHERE phase = 3 AND _group = ".$cc;
            $res12 = $conn->query($sql12);
            if($res12===false){
                die($conn->error);
            }
            $cupTT;
            $zpt = 0;
            while($row12 = $res12->fetch_assoc()){
                $cupTT[] = $row12;
                $zpt++;
            }
            if($zpt>0){
                $zp++;
                $m1 = $cupTT[0];
                $m2 = $cupTT[1];
                $t;
                if($m1["sum"]<$m2["sum"]){
                    $t = $m2;
                    $m2 = $m1;
                    $m1 = $t;
                }
                $cupT[] = $m1;
            }
        }
        if($zp>0){
            $p = [1,1,2,2];
            shuffle($p);
            for($k=0;$k<4;$k++){
                $sql13 = "INSERT INTO cups(`id`,`team_id`,`phase`,`_group`,`sum`) VALUES (NULL,{$cupT[$k]["team_id"]},4,{$p[$k]},0)";
                $res13 = $conn->query($sql13);
                if($res13===false){
                    die($conn->error);
                }
            }
        } 
    }else if($number==36){
        $cupT;
        $zp = 0;
        for($cc=1;$cc<3;$cc++){
            $sql12 = "SELECT * FROM cups WHERE phase = 3 AND _group = ".$cc;
            $res12 = $conn->query($sql12);
            if($res12===false){
                die($conn->error);
            }
            $cupTT;
            $zpt = 0;
            while($row12 = $res12->fetch_assoc()){
                $cupTT[] = $row12;
                $zpt++;
            }
            if($zpt>0){
                $zp++;
                $m1 = $cupTT[0];
                $m2 = $cupTT[1];
                $t;
                if($m1["sum"]<$m2["sum"]){
                    $t = $m2;
                    $m2 = $m1;
                    $m1 = $t;
                }
                $cupT[] = $m1;
            }
        }
        if($zp>0){
            $p = [1,1,2,2];
            shuffle($p);
            for($k=0;$k<2;$k++){
                $sql13 = "INSERT INTO cups(`id`,`team_id`,`phase`,`_group`,`sum`) VALUES (NULL,{$cupT[$k]["team_id"]},5,{$p[$k]},0)";
                $res13 = $conn->query($sql13);
                if($res13===false){
                    die($conn->error);
                }
            }
        }
    }
    $sql14 = "UPDATE `round` SET `number` = ".$number;
                $res14 = $conn->query($sql14);
                if($res14===false){
                    die($conn->error);
                }
    $msg = "Successfully played.";
    header("Location: panel.php?msg=$msg");
    exit;

    /// 3
}else if($val==3){
    $sql1 = "SELECT * FROM user_teams WHERE league = 1";
    $res1 = $conn->query($sql1);
    if($res1===false){
        die($conn->error);
    }
    $winner1 = [
        "sum" => 0,
        "id" => null
    ];

    $zw = 0;
    while($row1 = $res1->fetch_assoc()){
        if($row1["sum"]>$winner1["sum"]){
            $winner1["sum"] = $row1["sum"];
            $winner1["id"] = $row1["user_id"];
            $zw++;
        }
    }
    /*if($winner1["id"]===null){
        die("ERROR!");
    }*/
    if($zw>0){
        $sql2 = "SELECT * FROM users WHERE id = ".$winner1["id"];
        $res2 = $conn->query($sql2);
        if($res2===false){
            die($conn->error);
        }
        $row2 = $res2->fetch_assoc();
        $l = intval($row2["league_one"]);
        $l++;
        $sql3 = "UPDATE users SET `league_one` = $l WHERE id = ".$row2["id"];
        $res3 = $conn->query($sql3);
        if($res3===false){
            die($conn->error);
        }
    }

    /// Liga 2

    $sql4 = "SELECT * FROM user_teams WHERE league = 0";
    $res4 = $conn->query($sql4);
    if($res4===false){
        die($conn->error);
    }
    $winner2 = [
        "sum" => 0,
        "id" => null
    ];
    $zw = 0;
    while($row4 = $res4->fetch_assoc()){
        if($row4["sum"]>$winner2["sum"]){
            $winner2["sum"] = $row4["sum"];
            $winner2["id"] = $row4["user_id"];
            $zw++;
        }
    }
    /*if($winner2["id"]===null){
        die($conn->error);
    }*/
    if($zw>0){
        $sql5 = "SELECT * FROM users WHERE id = ".$winner2["id"];
        $res5 = $conn->query($sql5);
        if($res5===false){
            die($conn->error);
        }
        $row5 = $res5->fetch_assoc();
        $l = intval($row5["league_two"]);
        $l++;
        $sql6 = "UPDATE users SET `league_two` = $l WHERE id = ".$row5["id"];
        $res6 = $conn->query($sql6);
        if($res6===false){
            die($conn->error);
        }
    }

    /// Relegacija

    $sql7 = "SELECT * FROM user_teams WHERE league = 1";
    $res7 = $conn->query($sql7);
    if($res7===false){
        die($conn->error);
    }

    $teams1;
    $z = 0;
    while($row7 = $res7->fetch_assoc()){
        $teams1[] = $row7;
        $z++;
    }
    if($z>0){
        for($i=0;$i<count($teams1)-1;$i++){
            for($j=$i+1;$j<count($teams1);$j++){
                if($teams1[$i]["sum"]>$teams1[$j]["sum"]){
                    $t = $teams1[$i];
                    $teams1[$i] = $teams1[$j];
                    $teams1[$j] = $t;
                }
            }
        }
        if(count($teams1)>25){
            for($i=25;$i<count($teams1);$i++){
                $sql8 = "UPDATE user_teams SET `league` = 0, `sum` = 0 WHERE id = ".$teams1[$i]["id"];
                $res8 = $conn->query($sql8);
                if($res8===false){
                    die($conn->error);
                }
            }
        }
    }

    /// Promocija

    $sql9 = "SELECT * FROM user_teams WHERE league = 0 AND `sum` <> 0";
    $res9 = $conn->query($sql9);
    if($res9===false){
        die($conn->error);
    }

    $teams2;
    $z = 0;
    while($row9 = $res9->fetch_assoc()){
        $teams2[] = $row9;
        $z++;
    }
    if($z>0){
        for($i=0;$i<count($teams2)-1;$i++){
            for($j=$i+1;$j<count($teams2);$j++){
                if($teams2[$i]["sum"]>$teams2[$j]["sum"]){
                    $t = $teams2[$i];
                    $teams2[$i] = $teams2[$j];
                    $teams2[$j] = $t;
                }
            }
        }
        $m = 7;
        if(count($teams2)<$m){
            $m = count($teams2);
        }
        for($i=0;$i<$m;$i++){
            $sql10 = "UPDATE user_teams SET `league` = 1, `sum` = 0 WHERE id = ".$teams2[$i]["id"];
            $res10 = $conn->query($sql10);
            if($res10===false){
                die($conn->error);
            }
        }
    }
    $sql10 = "UPDATE user_teams SET `last_points` = 0, `sum` = 0";
            $res10 = $conn->query($sql10);
            if($res10===false){
                die($conn->error);
            }

    /// Kup

    $sql11 = "SELECT * FROM cups WHERE phase = 8";
    $res11 = $conn->query($sql11);
    if($res11===false){
        die($conn->error);
    }
    $cup;
    $z = 0;
    while($row11 = $res11->fetch_assoc()){
        $cup[] = $row11;
        $z++;
    }
    if($z>0){
        $m = null;
        if($cup[0]["sum"]>$cup[1]["sum"]){
            $m = $cup[0];
        }else{
            $m = $cup[1];
        }

        $sql12 = "SELECT * FROM user_teams WHERE id = ".$m["team_id"];
        $res12 = $conn->query($sql12);
        if($res12===false){
            die($conn->error);
        }
        $row12 = $res12->fetch_assoc();

        $sql13 = "SELECT * FROM users WHERE id = ".$row12["user_id"];
        $res13 = $conn->query($sql13);
        if($res13===false){
            die($conn->error);
        }
        $row13 = $res13->fetch_assoc();
        $c = intval($row13["cup"]);
        $c++;
        
        $sql14 = "UPDATE users SET `cup` = $c WHERE id = ".$row13["id"];
        $res14 = $conn->query($sql14);
        if($res14===false){
            die($conn->error);
        }
    }

    /// Kup - grupe

    $sql15 = "DELETE FROM cups";
    $res15 = $conn->query($sql15);
    if($res15===false){
        die($conn->error);
    }

    $sql16 = "SELECT * FROM user_teams WHERE league = 1";
    $res16 = $conn->query($sql16);
    if($res16===false){
        die($conn->error);
    }

    $teams7;
    $z7 = 0;
    while($row16 = $res16->fetch_assoc()){
        $teams7[] = $row16;
        $z7++;
    }
    if($z7===32){
        $p = [1,1,1,1,2,2,2,2,3,3,3,3,4,4,4,4,5,5,5,5,6,6,6,6,7,7,7,7,8,8,8,8];
        shuffle($p);
        for($k=0;$k<32;$k++){
            $id7 = $teams7[$k]["id"];
            $p7 = $p[$k];
            $sql17 = "INSERT INTO cups(`id`,`team_id`,`phase`,`_group`,`sum`) VALUES (NULL,$id7,1,$p7,0)";
            $res17 = $conn->query($sql17);
            if($res17===false){
                die($conn->error);
            }
        }
    }
    
    $sql14 = "UPDATE `round` SET `number` = 0";
    $res14 = $conn->query($sql14);
    if($res14===false){
        die($conn->error);
    }
    $msg = "Successfully ended.";
    header("Location: panel.php?msg=$msg");
    exit;
}