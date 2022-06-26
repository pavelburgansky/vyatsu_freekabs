<?php

set_time_limit(20000);
require_once 'rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=schedulefree','root', '' );
if ( !R::testConnection() )
                {
                exit ('Нет соединения с базой данных');
                }
                if  (!R::testConnection()){
                die('no con db');
                }
$find_audit=[];
$find_audit1=array();                
foreach ($_POST['para'] as $us=>$para){
     $users1 = R::find('freecabinets','datee=? AND korpus=? AND para=?',[$_POST['calendar'],$_POST['корпус'],$para]);
     foreach($users1 as $num){
    //echo 'Аудитория:'.$num->audience.' '.$num->para;
    $find_audit=[$num->audience,$num->para];
    array_push($find_audit1,$find_audit);
    //print_r($find_audit);
}
}
//print_r($find_audit1);



echo "<body style=\"background-color: D4E6B3;\">";

function sorter(array $a, array $b) {
    return [$a[0]] <=> [$b[0]];
}

usort($find_audit1, 'sorter');
echo "<table><tr><td width=50>Аудитория</td><td width=60></td><td width=120>Свободная пара</td></tr></table>";
foreach ($find_audit1 as $id) {
    echo "<table><tr><td width=50>$id[0]</td><td width=100></td><td width=50>$id[1]</td></tr></table>" ;
}

