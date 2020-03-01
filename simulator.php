<?php

function match($u){
    $r1 = rand(0,4);
    $r2 = rand(0,4);
    $p = rand(0,10);
    if($p==3 || $p==8){
        $r1 = $r1+rand(0,4);
    }else if($p==2 || $p==7){
        $r2 = $r2+rand(0,4);
    }

    // home i away se vade iz baze
    $home = 1.25;
    $away = 1.05;
    $home += 0.8;
    $away += 1.0;
    $home += 0.85;
    $away += 0.85;
    /*if($home == $away){
        $r2 = $r1;
    }else */if($home<$away){
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
    //echo $u['home']." - ".$u['away']." ".$r1.":".$r2;
    //echo "<br/>";
    $res = [$r1,$r2];
    return $res;
}

function stampa($n){
    for($j=0;$j<count($n);$j++){
        echo $n[$j].", ";
    }
}

function bodovanje($result){
    $ht = [1,1,1,1,1,2,2,2,3,3,3,3,3,3,3,3,4,5,6,7,8,9,10,10,10,10,10,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
    $at = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];

    $niz;
    $i1 = 0;
    while($i1<14){
        $t1 = false;
        $p;
        while($t1===false){
            $t2 = true;
            $p = rand(0,count($ht));
            for($i=0;$i<$i1;$i++){
                if($niz[$i]==$ht[$p]){
                    $t2 = false;
                }
            }
            if($t2===true){
                $t1 = true;
            }
        }
        $niz[$i1] = $ht[$p];
        $i1++;
    }

    $niz2;
    $i2 = 0;
    while($i2<14){
        $t1 = false;
        $p;
        while($t1===false){
            $t2 = true;
            $p = rand(0,count($at));
            for($i=0;$i<$i2;$i++){
                if($niz2[$i]==$ht[$p]){
                    $t2 = false;
                }
            }
            if($t2===true){
                $t1 = true;
            }
        }
        $niz2[$i2] = $p;
        $i2++;
    }

    stampa($niz);
    echo "<br/><br/>";
    stampa($niz2);

    //bodovanje igraca

    

}

function fixtures($liga){
    $sistem = [
        [   //1. kolo
            [
                'home' => $liga[18],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[5]
            ],
        ],
        [   //2. kolo
            [
                'home' => $liga[6],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[7]
            ],
        ],
        [   //3. kolo
            [
                'home' => $liga[18],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[7]
            ],
        ],
        [   //4. kolo
            [
                'home' => $liga[8],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[17]
            ],
        ],
        [   //5. kolo
            [
                'home' => $liga[18],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[17]
            ],
        ],
        [   //6. kolo
            [
                'home' => $liga[19],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[15]
            ],
        ],
        [   //7. kolo
            [
                'home' => $liga[18],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[5]
            ],
        ],
        [   //8. kolo
            [
                'home' => $liga[3],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[0]
            ],
        ],
        [   //9. kolo
            [
                'home' => $liga[18],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[0]
            ],
        ],
        [   //10. kolo
            [
                'home' => $liga[5],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[16]
            ],
        ],
        [   //11. kolo
            [
                'home' => $liga[18],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[16]
            ],
        ],
        [   //12. kolo
            [
                'home' => $liga[7],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[16]
            ],
        ],
        [   //13. kolo
            [
                'home' => $liga[18],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[11]
            ],
        ],
        [   //14. kolo
            [
                'home' => $liga[17],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[10]
            ],
        ],
        [   //15. kolo
            [
                'home' => $liga[18],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[10]
            ],
        ],
        [   //16. kolo
            [
                'home' => $liga[15],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[1]
            ],
        ],
        [   //17. kolo
            [
                'home' => $liga[18],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[1]
            ],
        ],
        [   //18. kolo
            [
                'home' => $liga[0],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[14]
            ],
        ],
        [   //19. kolo
            [
                'home' => $liga[18],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[14]
            ],
        ],
        [   //20. kolo
            [
                'home' => $liga[16],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[12]
            ],
        ],
        [   //21. kolo
            [
                'home' => $liga[18],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[12]
            ],
        ],
        [   //22. kolo
            [
                'home' => $liga[11],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[2]
            ],
        ],
        [   //23. kolo
            [
                'home' => $liga[18],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[2]
            ],
        ],
        [   //24. kolo
            [
                'home' => $liga[10],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[9]
            ],
        ],
        [   //25. kolo
            [
                'home' => $liga[18],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[9]
            ],
        ],
        [   //26. kolo
            [
                'home' => $liga[1],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[13]
            ],
        ],
        [   //27. kolo
            [
                'home' => $liga[18],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[13]
            ],
        ],
        [   //28. kolo
            [
                'home' => $liga[14],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[4]
            ],
        ],
        [   //29. kolo
            [
                'home' => $liga[18],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[4]
            ],
        ],
        [   //30. kolo
            [
                'home' => $liga[12],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[6]
            ],
        ],
        [   //31. kolo
            [
                'home' => $liga[18],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[6]
            ],
        ],
        [   //32. kolo
            [
                'home' => $liga[2],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[8]
            ],
        ],
        [ //33. kolo
            [
                'home' => $liga[18],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[8]
            ],
        ],
        [   //34. kolo
            [
                'home' => $liga[9],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[14]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[3]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[19]
            ],
        ],
        [   //35. kolo
            [
                'home' => $liga[18],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[19]
            ],
        ],
        [   //36. kolo
            [
                'home' => $liga[13],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[0],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[4],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[5]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[3]
            ],
        ],
        [   //37. kolo
            [
                'home' => $liga[18],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[13],
                'away' => $liga[4]
            ],
            [
                'home' => $liga[15],
                'away' => $liga[16]
            ],
            [
                'home' => $liga[9],
                'away' => $liga[6]
            ],
            [
                'home' => $liga[17],
                'away' => $liga[11]
            ],
            [
                'home' => $liga[2],
                'away' => $liga[8]
            ],
            [
                'home' => $liga[7],
                'away' => $liga[10]
            ],
            [
                'home' => $liga[12],
                'away' => $liga[19]
            ],
            [
                'home' => $liga[5],
                'away' => $liga[1]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[3]
            ],
        ],
        [   //38. kolo
            [
                'home' => $liga[4],
                'away' => $liga[18]
            ],
            [
                'home' => $liga[16],
                'away' => $liga[0]
            ],
            [
                'home' => $liga[6],
                'away' => $liga[13]
            ],
            [
                'home' => $liga[11],
                'away' => $liga[15]
            ],
            [
                'home' => $liga[8],
                'away' => $liga[9]
            ],
            [
                'home' => $liga[10],
                'away' => $liga[17]
            ],
            [
                'home' => $liga[19],
                'away' => $liga[2]
            ],
            [
                'home' => $liga[1],
                'away' => $liga[7]
            ],
            [
                'home' => $liga[3],
                'away' => $liga[12]
            ],
            [
                'home' => $liga[14],
                'away' => $liga[5]
            ],
        ]
    ];
    //echo "<b>1. kolo:</b><br/><br/>";
    /*$r = 1;
    foreach ($sistem as $kolo){
        echo "<br/><br/><b>".$r.". kolo:</b><br/><br/>";
        foreach($kolo as $utakmica){
            echo $utakmica['home']." <b>vs</b> ".$utakmica['away']."<br/>";
        }
        $r++;
    }*/
    return $sistem;
}

$liga = [
    'Manchester United',
    'Arsenal',
    'Chelsea',
    'Barcelona',
    'Real Madrid',
    'Bayern Munich',
    'Paris Saint Germain',
    'Ajax',
    'Juventus',
    'Inter',
    'Liverpool',
    'Everton',
    'Milan',
    'Atletico Madrid',
    'PSV',
    'Valencia',
    'Sevilla',
    'Burnley',
    'Norwich',
    'Roma',
];

$rez = [
    'ht' => 'Manchester United',
    'at' => 'Arsenal',
    'hr' => 2,
    'ar' => 1
];
$u = [
    'home' => 'Manchester United',
    'away'=> 'Arsenal'
];
$u2 = [
    'home' => 'Barcelona',
    'away'=> 'Real Madrid'
];
//bodovanje($rez);
//utakmica($u);
//utakmica($u2);

echo "<br/><br/>";
//fixtures($liga);

?>